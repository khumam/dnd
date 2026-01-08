<?php

namespace App\Services;

use App\Enums\AI\ImageAspectRatio;
use App\Enums\AI\RequestStatus;
use App\Enums\AI\RequestType;
use App\Enums\AspectRatio;
use App\Enums\OutputFormat;
use App\Jobs\AI\GenerateCharacterImageJob;
use App\Models\AiRequestLog;
use App\Models\AIResponseLog;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Request;

class KieaiService
{
    protected string $baseUrl;
    protected string $apiKey;
    protected string $model;
    protected string $prompt;
    protected ImageAspectRatio $aspectRatio;
    protected Model $data;
    protected RequestType $requestType;
    
    /**
     * Constructor for KieaiService class.
     */
    public function __construct()
    {
        $this->baseUrl = config('kieai.base_url');
        $this->apiKey = config('kieai.api_key');
        $this->model = config('kieai.image_generation_model');
    }
    
    /**
     * Set the prompt for the image generation.
     * 
     * @param string $prompt The prompt for the image generation.
     * @return $this
     */
    public function prompt(string $prompt): KieaiService
    {
        $this->prompt = $prompt;
        
        return $this;
    }
    
    /**
     * Set the data for the image generation.
     * 
     * @param Model $data The data for the image generation.
     * @return $this
     */
    public function data(Model $data): KieaiService
    {
        $this->data = $data;
        
        return $this;
    }
    
    /**
     * Set the model for the image generation.
     * 
     * @param string $model The model for the image generation.
     * @return $this
     */
    public function model(string $model): KieaiService
    {
        $this->model = $model;
        
        return $this;
    }
    
    /**
     * Set the aspect ratio for the image generation.
     * 
     * @param ImageAspectRatio $ratio The aspect ratio for the image generation.
     * @return $this
     */
    public function aspectRatio(ImageAspectRatio $ratio): KieaiService
    {
        $this->aspectRatio = $ratio;
        
        return $this;
    }
    
    /**
     * Set the request type for the image generation.
     * 
     * @param RequestType $requestType The request type for the image generation.
     * @return $this
     */
    public function requestType(RequestType $requestType): KieaiService
    {
        $this->requestType = $requestType;
        
        return $this;
    }
    
    /**
     * Send the request to generate image in the Kieai API.
     * 
     * @return AiRequestLog
     */
    public function generateImage(): AIRequestLog
    {
        try {
            $url = "{$this->baseUrl}/createTask";
            $headers = $this->getHeaders();
            $body = $this->getBody();
    
            $response = Http::withHeaders($headers)->post($url, $body);
            
            if ($response->ok()) {
                $result = $response->json();
                if ($result['code'] !== 200) {
                    throw new Exception($result['message']);
                }
    
                $requestLog = $this->data->aiRequestLog()->create([
                    'user_id' => auth()->id(),
                    'type' => $this->requestType,
                    'status' => RequestStatus::Pending,
                    'request_data' => $body,
                    'response_data' => $result,
                    'task_id' => $result['data']['taskId'],
                    'record_id' => $result['data']['recordId']
                ]);
                
                return $requestLog;
            }
            
            throw new Exception("Failed to create image");
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * Get the status of a task.
     * 
     * @param Model $aiRequestLog The AI request log.
     * @return string|bool
     */
    public function getTaskStatus(Model $aiRequestLog, string $savePath): string|bool
    {
        try {
            $url = "{$this->baseUrl}/recordInfo?taskId={$aiRequestLog->task_id}";
            $headers = $this->getHeaders();
            
            $response = Http::withHeaders($headers)->get($url);
            
            if ($response->ok()) {
                $result = $response->json();
                AIResponseLog::create([
                    'task_id' => $aiRequestLog->task_id,
                    'record_id' => $aiRequestLog->record_id ?? "-",
                    'response_data' => $result,
                ]);
                
                if ($result['data']['resultJson'] !== "") {
                    $aiRequestLog->update(['status' => RequestStatus::Completed]);
                    
                    $resultImages = json_decode($result['data']['resultJson'], true);
                    $imageUrl = $resultImages['resultUrls'][0];
                    $generatedImage = file_get_contents($imageUrl);
                    $savedAs = "{$savePath}/" . substr($imageUrl, strrpos($imageUrl, '/') + 1);
                    Storage::put($savedAs, $generatedImage);

                    return $savedAs;
                }
            }
    
            return false;
        } catch (Exception $e) {
            $aiRequestLog->update(['status' => RequestStatus::Failed]);
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * Get the headers for the request.
     * 
     * @return array
     */
    protected function getHeaders(): array
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->apiKey}"
        ];
        
        return $headers;
    }
    
    /**
     * Get the body for the request.
     * 
     * @return array
     */
    protected function getBody(): array
    {
        $body = [
            'model' => $this->model,
            "input" => [
                "prompt" => $this->prompt,
                "aspect_ratio" => $this->aspectRatio->value,
                "quality" => "medium",
            ]
        ];
        
        return $body;
    }
}

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default KIE AI base URL
    |--------------------------------------------------------------------------
    |
    | Here you may specify the base URL for the KIE AI API.
    | This is the URL where the KIE AI API is hosted.
    | We will use this URL to make requests to the KIE AI API.
    |
    */

    'base_url' => env("KIEAI_BASE_URL", ""),
    
    /*
    |--------------------------------------------------------------------------
    | KIE AI API Key
    |--------------------------------------------------------------------------
    |
    | Here you may specify the API key for the KIE AI API.
    | This is the API key that you will use to authenticate your requests.
    |
    */

    'api_key' => env("KIEAI_API_KEY", ""),
    
    /*
    |--------------------------------------------------------------------------
    | KIE AI Model
    |--------------------------------------------------------------------------
    |
    | Here you may specify the model for the KIE AI API.
    | This is the model that you will use to make requests to the KIE AI API.
    |
    */

    'image_generation_model' => env("KIEAI_IMAGE_GENERATION_MODEL", "gpt-image/1.5-text-to-image"),
];

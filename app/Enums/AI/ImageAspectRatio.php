<?php

namespace App\Enums\AI;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ImageAspectRatio: string implements HasLabel, HasColor, HasIcon
{
    case OneOne = '1:1';
    case NineSixteen = '9:16';
    case SixteenNine = '16:9';
    case ThreeFour = '3:4';
    case FourThree = '4:3';
    case TwoThree = '2:3';
    case ThreeTwo = '3:2';
    
    /**
     * Get the label for the image aspect ratio.
     * 
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::OneOne => '1:1',
            self::NineSixteen => '9:16',
            self::SixteenNine => '16:9',
            self::ThreeFour => '3:4',
            self::FourThree => '4:3',
            self::TwoThree => '2:3',
            self::ThreeTwo => '3:2',
            default => 'Unknown',
        };
    }
    
    /**
     * Get the color for the image aspect ratio.
     * 
     * @return string|array|null
     */
    public function getColor(): string|array|null
    {
        return 'success';
    }
    
    /**
     * Get the icon for the image aspect ratio.
     * 
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return 'heroicon-o-rectangle-stack';
    }
}

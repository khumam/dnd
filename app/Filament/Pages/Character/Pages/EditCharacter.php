<?php

namespace App\Filament\Pages\Character\Pages;

use Filament\Pages\Page;

class EditCharacter extends Page
{
    protected static ?string $slug = "character/edit/{id}";
    protected string $view = 'filament.pages.character.pages.edit-character';
    
    /**
     * Hide the page from navigation.
     * 
     * @return bool
     */
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}

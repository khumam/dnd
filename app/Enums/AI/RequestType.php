<?php

namespace App\Enums\AI;

enum RequestType: string
{
    case CharacterImageGeneration = 'character-image-generation';
    case CampaignCoverImageGeneration = 'campaign-cover-image-generation';
}

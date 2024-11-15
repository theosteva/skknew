<?php

namespace App\Filament\Resources\ImageContentResource\Pages;

use App\Filament\Resources\ImageContentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImageContents extends ListRecords
{
    protected static string $resource = ImageContentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
} 
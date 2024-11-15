<?php

namespace App\Filament\Resources\ImageContentResource\Pages;

use App\Filament\Resources\ImageContentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageContent extends EditRecord
{
    protected static string $resource = ImageContentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
} 
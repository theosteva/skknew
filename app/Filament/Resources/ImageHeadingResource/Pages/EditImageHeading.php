<?php

namespace App\Filament\Resources\ImageHeadingResource\Pages;

use App\Filament\Resources\ImageHeadingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageHeading extends EditRecord
{
    protected static string $resource = ImageHeadingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
} 
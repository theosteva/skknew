<?php

namespace App\Filament\Resources\ProductContentResource\Pages;

use App\Filament\Resources\ProductContentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductContent extends EditRecord
{
    protected static string $resource = ProductContentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
} 
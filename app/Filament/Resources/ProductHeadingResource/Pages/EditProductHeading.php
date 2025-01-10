<?php

namespace App\Filament\Resources\ProductHeadingResource\Pages;

use App\Filament\Resources\ProductHeadingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductHeading extends EditRecord
{
    protected static string $resource = ProductHeadingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
} 
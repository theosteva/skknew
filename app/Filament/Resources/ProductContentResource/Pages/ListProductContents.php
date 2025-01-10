<?php

namespace App\Filament\Resources\ProductContentResource\Pages;

use App\Filament\Resources\ProductContentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductContents extends ListRecords
{
    protected static string $resource = ProductContentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
} 
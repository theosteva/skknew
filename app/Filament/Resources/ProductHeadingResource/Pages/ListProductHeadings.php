<?php

namespace App\Filament\Resources\ProductHeadingResource\Pages;

use App\Filament\Resources\ProductHeadingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductHeadings extends ListRecords
{
    protected static string $resource = ProductHeadingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
} 
<?php

namespace App\Filament\Resources\BodyHeaderResource\Pages;

use App\Filament\Resources\BodyHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBodyHeaders extends ListRecords
{
    protected static string $resource = BodyHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
} 
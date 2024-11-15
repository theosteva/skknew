<?php

namespace App\Filament\Resources\FaqHeaderResource\Pages;

use App\Filament\Resources\FaqHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqHeaders extends ListRecords
{
    protected static string $resource = FaqHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

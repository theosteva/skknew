<?php

namespace App\Filament\Resources\FaqHeaderResource\Pages;

use App\Filament\Resources\FaqHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaqHeader extends EditRecord
{
    protected static string $resource = FaqHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

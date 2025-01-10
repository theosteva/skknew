<?php

namespace App\Filament\Resources\MetaSettingResource\Pages;

use App\Filament\Resources\MetaSettingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMetaSetting extends ManageRecords
{
    protected static string $resource = MetaSettingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
} 
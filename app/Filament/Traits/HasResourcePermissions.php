<?php

namespace App\Filament\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ViewRecord;

trait HasResourcePermissions
{
    public static function getPermissionPrefixes(): array
    {
        // Dapatkan nama resource dari nama class
        $resourceName = Str::of(class_basename(static::class))
            ->before('Resource')
            ->toString();

        // Mapping khusus untuk beberapa resource
        $mapping = [
            'About' => 'content',
            'Body' => 'body',
            'BodyHeader' => 'body',
            'Faq' => 'faqs',
            'FaqHeader' => 'faqs',
            'ProductContent' => 'content',
            'ProductHeading' => 'content',
            'ContactForm' => 'contacts',
            'MetaSetting' => 'meta-settings',
            'User' => 'users',
            'Role' => 'roles',
            'Slider' => 'sliders',
        ];

        // Gunakan mapping jika ada, jika tidak gunakan versi kebab dari nama resource
        $prefix = $mapping[$resourceName] ?? Str::kebab(Str::plural($resourceName));

        return [
            'view' => "view-{$prefix}",
            'create' => "create-{$prefix}",
            'update' => "edit-{$prefix}",
            'delete' => "delete-{$prefix}",
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can(static::getPermissionPrefixes()['view']) ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can(static::getPermissionPrefixes()['create']) ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can(static::getPermissionPrefixes()['update']) ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can(static::getPermissionPrefixes()['delete']) ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can(static::getPermissionPrefixes()['delete']) ?? false;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return static::canViewAny();
    }
} 
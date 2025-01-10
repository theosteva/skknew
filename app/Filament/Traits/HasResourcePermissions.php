<?php

namespace App\Filament\Traits;

use Illuminate\Support\Str;

trait HasResourcePermissions
{
    public static function getPermissionPrefixes(): array
    {
        // Dapatkan nama resource dari nama class
        $resourceName = Str::of(class_basename(static::class))
            ->before('Resource')
            ->toString();

        // Tambahkan mapping khusus untuk resource tertentu
        $mapping = [
            'About' => 'content',
            'BodyHeader' => 'body',
            'Body' => 'body',
            'FaqHeader' => 'faqs',
            'ProductContent' => 'products',
            'ProductHeading' => 'products',
        ];

        // Gunakan mapping jika ada, jika tidak gunakan versi slug dari nama resource
        $prefix = $mapping[$resourceName] ?? Str::slug(Str::plural($resourceName));

        return [
            'view' => "view-{$prefix}",
            'create' => "create-{$prefix}",
            'update' => "edit-{$prefix}",
            'delete' => "delete-{$prefix}",
        ];
    }
} 
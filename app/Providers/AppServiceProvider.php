<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Css;
use Spatie\Permission\Models\Permission;
use Filament\Facades\Filament;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Filament::serving(function () {
            $navigationItems = collect(Filament::getNavigationItems());
            
            // Kelompokkan item berdasarkan grup navigasi
            $groupedItems = $navigationItems->groupBy(function ($item) {
                return $item->getGroup() ?? 'No Group';
            });

            foreach ($groupedItems as $groupName => $items) {
                // Buat permission untuk setiap grup
                $groupSlug = Str::slug($groupName);
                Permission::firstOrCreate(
                    ['name' => "view-{$groupSlug}"],
                    [
                        'group' => 'Manajemen CMS',
                        'sub_group' => $groupName
                    ]
                );

                foreach ($items as $item) {
                    $label = Str::slug($item->getLabel());
                    
                    // Buat permission CRUD untuk setiap item
                    $permissions = [
                        "view-{$label}" => "Lihat {$item->getLabel()}",
                        "create-{$label}" => "Tambah {$item->getLabel()}",
                        "edit-{$label}" => "Edit {$item->getLabel()}",
                        "delete-{$label}" => "Hapus {$item->getLabel()}"
                    ];

                    foreach ($permissions as $permission => $description) {
                        Permission::firstOrCreate(
                            ['name' => $permission],
                            [
                                'group' => 'Manajemen CMS',
                                'sub_group' => $groupName
                            ]
                        );
                    }
                }
            }
        });

        if (Schema::hasTable('meta_settings') && \App\Models\MetaSetting::count() === 0) {
            \App\Models\MetaSetting::create([
                'meta_title' => config('app.name'),
                'meta_description' => 'Deskripsi default website'
            ]);
        }
    }
}

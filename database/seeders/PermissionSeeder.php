<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $cmsModules = [
            'Blog',
            'Gallery',
            'Event',
            // Tambahkan CMS baru di sini
        ];

        foreach ($cmsModules as $module) {
            Permission::firstOrCreate(['name' => "view-{$module}"]);
            Permission::firstOrCreate(['name' => "create-{$module}"]);
            Permission::firstOrCreate(['name' => "edit-{$module}"]);
            Permission::firstOrCreate(['name' => "delete-{$module}"]);
        }
    }
}
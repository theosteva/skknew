<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'Manajemen CMS' => [
                'Slider Management' => [
                    'view-sliders' => 'Lihat Slider',
                    'create-sliders' => 'Tambah Slider',
                    'edit-sliders' => 'Edit Slider',
                    'delete-sliders' => 'Hapus Slider',
                ],
                'Body Management' => [
                    'view-body' => 'Lihat Body',
                    'create-body' => 'Tambah Body',
                    'edit-body' => 'Edit Body',
                    'delete-body' => 'Hapus Body',
                ],
                'Image Management' => [
                    'view-images' => 'Lihat Image',
                    'create-images' => 'Tambah Image',
                    'edit-images' => 'Edit Image',
                    'delete-images' => 'Hapus Image',
                ],
                'FAQ Management' => [
                    'view-faqs' => 'Lihat FAQ',
                    'create-faqs' => 'Tambah FAQ',
                    'edit-faqs' => 'Edit FAQ',
                    'delete-faqs' => 'Hapus FAQ',
                ],
                'Content Management' => [
                    'view-content' => 'Lihat Content',
                    'create-content' => 'Tambah Content',
                    'edit-content' => 'Edit Content',
                    'delete-content' => 'Hapus Content',
                ],
                'Contact Management' => [
                    'view-contacts' => 'Lihat Contact',
                    'reply-contacts' => 'Balas Contact',
                    'delete-contacts' => 'Hapus Contact',
                ],
            ],
            'Manajemen Admin' => [
                'User Management' => [
                    'view-users' => 'Lihat User',
                    'create-users' => 'Tambah User',
                    'edit-users' => 'Edit User',
                    'delete-users' => 'Hapus User',
                ],
                'Role Management' => [
                    'view-roles' => 'Lihat Role',
                    'create-roles' => 'Tambah Role',
                    'edit-roles' => 'Edit Role',
                    'delete-roles' => 'Hapus Role',
                ],
            ],
        ];

        // Buat permissions dengan firstOrCreate
        foreach ($permissions as $group => $items) {
            foreach ($items as $subGroup => $permissions) {
                foreach ($permissions as $permission => $description) {
                    Permission::firstOrCreate(
                        ['name' => $permission, 'guard_name' => 'web'],
                        [
                            'group' => $group,
                            'sub_group' => $subGroup,
                        ]
                    );
                }
            }
        }

        // Buat atau update role super-admin
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->syncPermissions(Permission::all());
    }
}

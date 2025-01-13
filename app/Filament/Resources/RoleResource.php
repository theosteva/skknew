<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Spatie\Permission\Models\Role;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Traits\HasResourcePermissions;

class RoleResource extends Resource
{
    use HasResourcePermissions;

    protected static ?string $model = Role::class;
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Admin Panel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Role')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\Section::make('Akses CMS')
                            ->description('Pilih modul CMS yang dapat diakses')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('slider_management')
                                            ->label('Slider Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-sliders', 'create-sliders', 'edit-sliders', 'delete-sliders'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $sliderPermissions = ['view-sliders', 'create-sliders', 'edit-sliders', 'delete-sliders'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($sliderPermissions);
                                                } else {
                                                    $record->revokePermissionTo($sliderPermissions);
                                                }
                                            }),

                                        Forms\Components\Checkbox::make('body_management')
                                            ->label('Body Page')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-body', 'create-body', 'edit-body', 'delete-body'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $bodyPermissions = ['view-body', 'create-body', 'edit-body', 'delete-body'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($bodyPermissions);
                                                } else {
                                                    $record->revokePermissionTo($bodyPermissions);
                                                }
                                            }),

                                        Forms\Components\Checkbox::make('image_management')
                                            ->label('Image Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-images', 'create-images', 'edit-images', 'delete-images'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $imagePermissions = ['view-images', 'create-images', 'edit-images', 'delete-images'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($imagePermissions);
                                                } else {
                                                    $record->revokePermissionTo($imagePermissions);
                                                }
                                            }),

                                        Forms\Components\Checkbox::make('faq_management')
                                            ->label('FAQ Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-faqs', 'create-faqs', 'edit-faqs', 'delete-faqs'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $faqPermissions = ['view-faqs', 'create-faqs', 'edit-faqs', 'delete-faqs'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($faqPermissions);
                                                } else {
                                                    $record->revokePermissionTo($faqPermissions);
                                                }
                                            }),

                                        Forms\Components\Checkbox::make('button_management')
                                            ->label('Button Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-content', 'create-content', 'edit-content', 'delete-content'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $contentPermissions = ['view-content', 'create-content', 'edit-content', 'delete-content'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($contentPermissions);
                                                } else {
                                                    $record->revokePermissionTo($contentPermissions);
                                                }
                                            }),

                                        Forms\Components\Checkbox::make('contact_management')
                                            ->label('Contact Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-contacts', 'reply-contacts', 'delete-contacts'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $contactPermissions = ['view-contacts', 'reply-contacts', 'delete-contacts'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($contactPermissions);
                                                } else {
                                                    $record->revokePermissionTo($contactPermissions);
                                                }
                                            }),
                                    ]),
                            ]),

                        Forms\Components\Section::make('Admin Permissions')
                            ->description('Kelola akses untuk fitur administratif')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('user_management')
                                            ->label('User Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-users', 'create-users', 'edit-users', 'delete-users'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $userPermissions = ['view-users', 'create-users', 'edit-users', 'delete-users'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($userPermissions);
                                                } else {
                                                    $record->revokePermissionTo($userPermissions);
                                                }
                                            }),

                                        Forms\Components\Checkbox::make('role_management')
                                            ->label('Role Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-roles', 'create-roles', 'edit-roles', 'delete-roles'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $rolePermissions = ['view-roles', 'create-roles', 'edit-roles', 'delete-roles'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($rolePermissions);
                                                } else {
                                                    $record->revokePermissionTo($rolePermissions);
                                                }
                                            }),
                                            Forms\Components\Checkbox::make('meta_settings_management')
                                            ->label('Meta Settings Management')
                                            ->dehydrated(false)
                                            ->live()
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                if ($record) {
                                                    $permissions = $record->permissions->pluck('name')->toArray();
                                                    $component->state(
                                                        !empty(array_intersect(
                                                            ['view-meta-settings', 'create-meta-settings', 'edit-meta-settings', 'delete-meta-settings'],
                                                            $permissions
                                                        ))
                                                    );
                                                }
                                            })
                                            ->afterStateUpdated(function ($state, $record) {
                                                if (!$record) return;
                                                
                                                $metaSettingsPermissions = ['view-meta-settings', 'create-meta-settings', 'edit-meta-settings', 'delete-meta-settings'];
                                                
                                                if ($state) {
                                                    $record->givePermissionTo($metaSettingsPermissions);
                                                } else {
                                                    $record->revokePermissionTo($metaSettingsPermissions);
                                                }
                                            }),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
               
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('view-roles');
    }
}

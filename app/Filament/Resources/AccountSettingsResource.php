<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;
use App\Filament\Resources\AccountSettingsResource\Pages\EditAccountSettings;

class AccountSettingsResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'My Account';
    protected static ?string $navigationLabel = 'Account Settings';
    protected static ?int $navigationSort = 1;
    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Update Email')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),

                Section::make('Update Password')
                    ->schema([
                        TextInput::make('current_password')
                            ->label('Current Password')
                            ->password()
                            ->required()
                            ->rules(['current_password']),
                            
                        TextInput::make('new_password')
                            ->label('New Password')
                            ->password()
                            ->required()
                            ->rules([Password::defaults()])
                            ->different('current_password'),
                            
                        TextInput::make('new_password_confirmation')
                            ->label('Confirm New Password')
                            ->password()
                            ->required()
                            ->same('new_password'),
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => EditAccountSettings::route('/'),
        ];
    }
}
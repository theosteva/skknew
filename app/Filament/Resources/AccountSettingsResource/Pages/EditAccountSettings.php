<?php

namespace App\Filament\Resources\AccountSettingsResource\Pages;

use App\Filament\Resources\AccountSettingsResource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\Rules\Password;

class EditAccountSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = AccountSettingsResource::class;

    protected static string $view = 'filament.resources.account-settings.pages.edit-account-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
                    ])
            ]);
    }

    public function submit()
    {
        $data = $this->form->getState();
        
        $user = auth()->user();

        // Validasi password lama
        if (!Hash::check($data['current_password'], $user->password)) {
            Notification::make()
                ->title('Current password is incorrect')
                ->danger()
                ->send();
            return;
        }

        // Update password
        $user->password = Hash::make($data['new_password']);
        $user->save();

        // Reset form fields
        $this->form->fill([
            'current_password' => '',
            'new_password' => '',
            'new_password_confirmation' => '',
        ]);

        Notification::make()
            ->title('Password berhasil diperbarui')
            ->success()
            ->send();
    }
}
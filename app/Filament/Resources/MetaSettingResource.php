<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MetaSettingResource\Pages;
use App\Models\MetaSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Traits\HasResourcePermissions;

class MetaSettingResource extends Resource
{
    use HasResourcePermissions;
    protected static ?string $model = MetaSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Admin Panel';
    protected static ?string $navigationLabel = 'Meta Settings';
    protected static ?string $modelLabel = 'Meta Setting';
    protected static bool $isSingleRecord = true;
    protected static ?int $navigationSort = 1;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('view-meta-settings');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Card::make()->schema([
                Forms\Components\TextInput::make('meta_title')
                    ->required(),
                Forms\Components\TextInput::make('meta_description')
                    ->required(),
                Forms\Components\TextInput::make('meta_keywords')
                    ->required(),
                Forms\Components\TextInput::make('meta_author')
                    ->required(),
                Forms\Components\TextInput::make('google_analytics_id')
                    ->label('Google Analytics ID'),
                Forms\Components\TextInput::make('google_ads_id')
                    ->label('Google Ads ID'),
                Forms\Components\TextInput::make('og_title'),
                Forms\Components\TextInput::make('og_description'),
                Forms\Components\FileUpload::make('og_image')
                    ->image(),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->label('Meta Description')
                    ->limit(50),
                Tables\Columns\TextColumn::make('google_analytics_id')
                    ->label('Google Analytics ID'),
                Tables\Columns\TextColumn::make('google_ads_id')
                    ->label('Google Ads ID'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMetaSettings::route('/'),
            'create' => Pages\CreateMetaSetting::route('/create'),
            'edit' => Pages\EditMetaSetting::route('/{record}/edit'),
        ];
    }
}
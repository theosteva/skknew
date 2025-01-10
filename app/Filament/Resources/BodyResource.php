<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BodyResource\Pages;
use App\Models\Body;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use App\Filament\Traits\HasResourcePermissions;

class BodyResource extends Resource
{
    use HasResourcePermissions;
    protected static ?string $model = Body::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Body Page';
    protected static ?string $navigationLabel = 'Body Content';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Body Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Body Title')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Body Description')
                            ->required()
                            ->maxLength(65535)
                            ->rows(3),
                        
                        Select::make('icon')
                            ->label('Body Icon')
                            ->options(Body::getIconOptions())
                            ->required()
                            ->searchable(),
                            
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon'),
                    
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBody::route('/'),
            'create' => Pages\CreateBody::route('/create'),
            'edit' => Pages\EditBody::route('/{record}/edit'),
        ];
    }
} 
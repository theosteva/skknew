<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageHeadingResource\Pages;
use App\Models\ImageHeading;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ImageHeadingResource extends Resource
{
    protected static ?string $model = ImageHeading::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Image Section';
    protected static ?string $navigationLabel = 'Image Heading';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Image Heading';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Heading Title')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Heading Description')
                            ->required()
                            ->maxLength(65535)
                            ->rows(3),
                            
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
                    ->label('Heading Title')
                    ->searchable()
                    ->limit(50),
                    
                Tables\Columns\TextColumn::make('description')
                    ->label('Heading Description')
                    ->limit(100),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImageHeadings::route('/'),
            'create' => Pages\CreateImageHeading::route('/create'),
            'edit' => Pages\EditImageHeading::route('/{record}/edit'),
        ];
    }
} 
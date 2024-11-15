<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BodyHeaderResource\Pages;
use App\Models\BodyHeader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BodyHeaderResource extends Resource
{
    protected static ?string $model = BodyHeader::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Body Page';
    protected static ?string $navigationLabel = 'Body Heading';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Body Heading';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Section Title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Section Description')
                            ->required()
                            ->maxLength(65535)
                            ->rows(3)
                            ->columnSpanFull(),
                            
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
            'index' => Pages\ListBodyHeaders::route('/'),
            'create' => Pages\CreateBodyHeader::route('/create'),
            'edit' => Pages\EditBodyHeader::route('/{record}/edit'),
        ];
    }    
} 
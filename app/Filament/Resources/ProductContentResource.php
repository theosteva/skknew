<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductContentResource\Pages;
use App\Filament\Traits\HasResourcePermissions;
use App\Models\ProductContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;

class ProductContentResource extends Resource
{
    use HasResourcePermissions;
    protected static ?string $model = ProductContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationGroup = 'Product Section';

    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->directory('image-contents'),
                Forms\Components\TextInput::make('title')
                    ->label('Project Title')
                    ->placeholder('Enter project title'),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->height(60)
                    ->circular(false)
                    ->square()
                    ->extraImgAttributes(['class' => 'hover:scale-105 transition-transform cursor-zoom-in'])
                    ->openUrlInNewTab()
                    ->tooltip('Klik untuk memperbesar')
                    ->action(function ($record, $column) {
                        $column->modalImage($record->image);
                    }),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('order'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductContents::route('/'),
            'create' => Pages\CreateProductContent::route('/create'),
            'edit' => Pages\EditProductContent::route('/{record}/edit'),
        ];
    }
} 
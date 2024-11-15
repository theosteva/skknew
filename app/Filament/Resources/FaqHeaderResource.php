<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqHeaderResource\Pages;
use App\Filament\Resources\FaqHeaderResource\RelationManagers;
use App\Models\FaqHeader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqHeaderResource extends Resource
{
    protected static ?string $model = FaqHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Frequently Asked Questions';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'FAQ Header';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqHeaders::route('/'),
            'create' => Pages\CreateFaqHeader::route('/create'),
            'edit' => Pages\EditFaqHeader::route('/{record}/edit'),
        ];
    }
}

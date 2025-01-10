<?php

namespace App\Filament\Resources;

use App\Filament\Traits\HasResourcePermissions;
use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

class SliderResource extends Resource
{
    use HasResourcePermissions;

    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Slider Management';
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Kolom Kiri (Konten Utama)
                Forms\Components\Card::make()
                    ->schema([
                        Section::make('Main Content')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan('full'),
                                
                                Forms\Components\FileUpload::make('image')
                                    ->required()
                                    ->image()
                                    ->imageEditor()
                                    ->directory('sliders')
                                    ->preserveFilenames()
                                    ->visibility('public')
                                    ->imagePreviewHeight('250')
                                    ->maxSize(5120)
                                    ->disk('public')
                                    ->columnSpan('full'),
                            ]),

                        Section::make('Display Settings')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\TextInput::make('order')
                                            ->numeric()
                                            ->default(0)
                                            ->label('Display Order'),
                                        
                                        Forms\Components\TextInput::make('overlay_opacity')
                                            ->label('Overlay Darkness')
                                            ->numeric()
                                            ->default(0.2)
                                            ->step(0.1)
                                            ->minValue(0)
                                            ->maxValue(1)
                                            ->helperText('0 = transparent, 1 = dark'),
                                        
                                        Forms\Components\Toggle::make('is_active')
                                            ->default(true)
                                            ->label('Active Status')
                                            ->inline(false),
                                    ]),
                            ]),
                    ])->columnSpan(2),

                // Kolom Kanan (Styling)
                Forms\Components\Card::make()
                    ->schema([
                        Section::make('Text Styling')
                            ->schema([
                                Forms\Components\ColorPicker::make('text_color')
                                    ->label('Title Color')
                                    ->default('#FFFFFF'),
                                
                                Forms\Components\TextInput::make('title_size')
                                    ->label('Title Size')
                                    ->numeric()
                                    ->default(32)
                                    ->suffix('px')
                                    ->minValue(12)
                                    ->maxValue(100),
                            ]),

                        Section::make('Button Settings')
                            ->schema([
                                Forms\Components\TextInput::make('button_text')
                                    ->label('Button Label')
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('button_link')
                                    ->label('Button URL')
                                    ->maxLength(255)
                                    ->url(),
                                
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\ColorPicker::make('button_bg_color')
                                            ->label('Button Color')
                                            ->default('#FF5126'),
                                        
                                        Forms\Components\ColorPicker::make('button_text_color')
                                            ->label('Button Text')
                                            ->default('#FFFFFF'),
                                    ]),
                                
                                Forms\Components\Select::make('button_size')
                                    ->label('Button Size')
                                    ->options([
                                        'very-small' => 'Very Small',
                                        'small' => 'Small',
                                        'medium' => 'Medium',
                                        'large' => 'Large',
                                        'very-large' => 'Very Large',
                                    ])
                                    ->default('medium'),
                            ]),
                    ])->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->width(120)
                    ->height(60)
                    ->label('Preview'),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('button_text')
                    ->label('Button')
                    ->limit(20),
                
                Tables\Columns\ColorColumn::make('button_bg_color')
                    ->label('Button Color'),
                
                Tables\Columns\TextColumn::make('button_size')
                    ->badge()
                    ->colors([
                        'warning' => 'very-small',
                        'info' => 'small',
                        'success' => 'medium',
                        'danger' => 'large',
                        'primary' => 'very-large',
                    ])
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Status'),
                
                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->label('#'),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('view-sliders');
    }
} 
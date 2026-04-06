<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationGroup = 'Menu Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('menu_category_id')
                            ->relationship('menuCategory', 'name')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name['en'] ?? 'Unnamed Category')
                            ->required(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name.en')
                                    ->label('Name (EN)')
                                    ->required(),
                                Forms\Components\TextInput::make('name.ar')
                                    ->label('Name (AR)')
                                    ->required(),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Textarea::make('description.en')
                                    ->label('Description (EN)'),
                                Forms\Components\Textarea::make('description.ar')
                                    ->label('Description (AR)'),
                            ]),
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->numeric()
                                    ->prefix('$')
                                    ->required(),
                                Forms\Components\TextInput::make('currency')
                                    ->default('USD')
                                    ->required(),
                                Forms\Components\TextInput::make('order')
                                    ->numeric()
                                    ->default(0),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_featured')
                                    ->default(false),
                                Forms\Components\Toggle::make('is_available')
                                    ->default(true),
                            ]),
                    ]),
                Forms\Components\Section::make('Media')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('image')
                            ->image(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('name.en')
                    ->label('Name (EN)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('menuCategory.name')
                    ->label('Category')
                    ->formatStateUsing(fn ($state) => $state['en'] ?? 'Unnamed')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_featured'),
                Tables\Columns\ToggleColumn::make('is_available'),
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
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}

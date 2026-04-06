<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryAlbumResource\Pages;
use App\Models\GalleryAlbum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class GalleryAlbumResource extends Resource
{
    protected static ?string $model = GalleryAlbum::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Gallery Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Album Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title.en')
                                    ->label('Title (EN)')
                                    ->required(),
                                Forms\Components\TextInput::make('title.ar')
                                    ->label('Title (AR)')
                                    ->required(),
                            ]),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('order')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\Toggle::make('is_active')
                                    ->default(true),
                            ]),
                    ]),
                Forms\Components\Section::make('Cover Image')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('cover')
                            ->collection('cover')
                            ->image(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover')
                    ->collection('cover')
                    ->circular(),
                Tables\Columns\TextColumn::make('title.en')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gallery_photos_count')
                    ->counts('galleryPhotos')
                    ->label('Photos'),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
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
            'index' => Pages\ListGalleryAlbums::route('/'),
            'create' => Pages\CreateGalleryAlbum::route('/create'),
            'edit' => Pages\EditGalleryAlbum::route('/{record}/edit'),
        ];
    }
}

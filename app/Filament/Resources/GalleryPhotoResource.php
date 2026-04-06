<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryPhotoResource\Pages;
use App\Models\GalleryPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class GalleryPhotoResource extends Resource
{
    protected static ?string $model = GalleryPhoto::class;
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationGroup = 'Gallery Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Photo Details')
                    ->schema([
                        Forms\Components\Select::make('gallery_album_id')
                            ->relationship('galleryAlbum', 'title')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->title['en'] ?? 'Unnamed Album')
                            ->required(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('caption.en')
                                    ->label('Caption (EN)'),
                                Forms\Components\TextInput::make('caption.ar')
                                    ->label('Caption (AR)'),
                            ]),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                    ]),
                Forms\Components\Section::make('Media')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('photo')
                            ->collection('photo')
                            ->image()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('photo')
                    ->collection('photo')
                    ->square(),
                Tables\Columns\TextColumn::make('galleryAlbum.title')
                    ->label('Album')
                    ->formatStateUsing(fn ($state) => $state['en'] ?? 'Unnamed')
                    ->sortable(),
                Tables\Columns\TextColumn::make('caption.en')
                    ->label('Caption')
                    ->searchable(),
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
            'index' => Pages\ListGalleryPhotos::route('/'),
            'create' => Pages\CreateGalleryPhoto::route('/create'),
            'edit' => Pages\EditGalleryPhoto::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title.en')->label('Title (EN)')->required(),
                Forms\Components\TextInput::make('title.ar')->label('Title (AR)')->required(),
                Forms\Components\RichEditor::make('body.en')->label('Body (EN)')->required()->columnSpanFull(),
                Forms\Components\RichEditor::make('body.ar')->label('Body (AR)')->required()->columnSpanFull(),
                Forms\Components\Textarea::make('excerpt.en')->label('Excerpt (EN)'),
                Forms\Components\Textarea::make('excerpt.ar')->label('Excerpt (AR)'),
                Forms\Components\Toggle::make('is_published')->default(false),
                Forms\Components\DateTimePicker::make('published_at'),
                SpatieMediaLibraryFileUpload::make('cover')->collection('cover'),
                Forms\Components\Hidden::make('user_id')->default(auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title.en')->label('Title')->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Author'),
                Tables\Columns\ToggleColumn::make('is_published'),
                Tables\Columns\TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('cover')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('sub_title'),
                Forms\Components\TextInput::make('category'),
                Forms\Components\TextInput::make('authors'),
                Forms\Components\TextInput::make('isbn')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('title'),
                 Tables\Columns\TextColumn::make('sub_title'),
                 Tables\Columns\ImageColumn::make('cover'),
                 Tables\Columns\TextColumn::make('category'),
                 Tables\Columns\TextColumn::make('authors'),
                 Tables\Columns\TextColumn::make('isbn'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->button(),
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
            'view' => Pages\ViewBook::route('/{record}/view'),
            'meta' => Pages\BookMeta::route('/{record}/meta'),
            'chapters' => Pages\BookChapters::route('/{record}/chapters'),
        ];
    }

    public static function getRecordSubNavigation(Page|\Filament\Resources\Pages\Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewBook::class,
            Pages\BookMeta::class,
            Pages\BookChapters::class,
            Pages\EditBook::class,
        ]);
    }
}

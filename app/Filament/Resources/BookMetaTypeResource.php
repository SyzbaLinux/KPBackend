<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookMetaTypeResource\Pages;
use App\Filament\Resources\BookMetaTypeResource\RelationManagers;
use App\Filament\Resources\BookResource\RelationManagers\ChaptersRelationManager;
use App\Models\BookMetaType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookMetaTypeResource extends Resource
{
    protected static ?string $model = BookMetaType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\TextInput::make('title')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('title')->searchable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookMetaTypes::route('/'),
            'create' => Pages\CreateBookMetaType::route('/create'),
            'edit' => Pages\EditBookMetaType::route('/{record}/edit'),
        ];
    }


}

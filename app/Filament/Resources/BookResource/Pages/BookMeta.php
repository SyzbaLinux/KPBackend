<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use App\Models\BookMetaType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;

class BookMeta extends ManageRelatedRecords
{
    protected static string $resource = BookResource::class;

    protected static string $relationship = 'book_metas';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Book Metas';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('meta_type_id')
                    ->options(BookMetaType::get()->pluck('title','id'))
                    ->label('Select Meta Type')
                    ->required(),

                Forms\Components\RichEditor::make('details')
                    ->required()
                    ->columnSpanFull()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('meta_type_id')
            ->columns([
                Tables\Columns\TextColumn::make('metaType.title'),
                Tables\Columns\TextColumn::make('details')->html(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),
            ]) ;
    }
}

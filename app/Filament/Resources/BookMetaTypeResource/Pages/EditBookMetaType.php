<?php

namespace App\Filament\Resources\BookMetaTypeResource\Pages;

use App\Filament\Resources\BookMetaTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookMetaType extends EditRecord
{
    protected static string $resource = BookMetaTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

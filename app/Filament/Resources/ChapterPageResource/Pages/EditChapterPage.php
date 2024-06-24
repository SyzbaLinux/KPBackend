<?php

namespace App\Filament\Resources\ChapterPageResource\Pages;

use App\Filament\Resources\ChapterPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChapterPage extends EditRecord
{
    protected static string $resource = ChapterPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

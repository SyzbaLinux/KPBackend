<?php

namespace App\Filament\Resources\ChapterPageResource\Pages;

use App\Filament\Resources\ChapterPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChapterPages extends ListRecords
{
    protected static string $resource = ChapterPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

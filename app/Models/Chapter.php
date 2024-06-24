<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{


    public function chapterPages()
    {
        return $this->hasMany(ChapterPage::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

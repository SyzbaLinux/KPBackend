<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function book_metas()
    {
        return $this->hasMany(BookMeta::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapters::class);
    }
}

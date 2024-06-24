<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookMeta extends Model
{
    protected $appends =[
        'metaType'
    ];

    public function metaType()
    {
        return $this->belongsTo(BookMetaType::class);
    }
}

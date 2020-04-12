<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'premium', 'categoryId'];

    public function category() {
        return $this->belongsTo(Categories::class, 'categoryId')->first();
    }

}

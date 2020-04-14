<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['categoryTxt', 'name'];

    public function news() {
        return $this->hasMany(News::class, 'categoryId');
    }
}

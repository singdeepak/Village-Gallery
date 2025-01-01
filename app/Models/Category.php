<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];


    public function photos(){
        return $this->hasMany(Photo::class, 'category_id', 'id');
    }
}

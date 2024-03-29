<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    //==== Realationship->Category====//
    public function category()
    {
        return $this->belongsTo(Category::Class);
    }
}

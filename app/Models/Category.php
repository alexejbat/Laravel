<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function news() {
        return $this->hasMany(News::class, 'category_id')->get();
    }
}

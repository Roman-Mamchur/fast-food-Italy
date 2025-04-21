<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryTranslate extends Model
{
    use HasFactory;
    protected $table = 'blog_category_translate';
    protected $fillable = [
        'name'
    ];
}

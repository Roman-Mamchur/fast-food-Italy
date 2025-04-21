<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $fillable = [
        'slug',
        'status'
    ];
    public function category_translate()
    {
        return $this->belongsTo(BlogCategoryTranslate::class,'id','blog_category_id')->where('lang_code','en');
    }
}

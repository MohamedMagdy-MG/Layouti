<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['category','author','titleEn','titleAr','image'];

    public function Paragraphs()
    {
        return $this->hasMany(BlogParagraph::class,'blog','id');
    }

    public function Images()
    {
        return $this->hasMany(BlogImages::class,'blog','id');
    }

    public function SEO()
    {
        return $this->hasOne(BlogParagraphSeo::class,'blog','id');
    }

    public function Category()
    {
        return $this->belongsTo(BlogCategory::class,'category','id');
    }

    public function Author()
    {
        return $this->belongsTo(BlogAuthor::class,'author','id');
    }
}

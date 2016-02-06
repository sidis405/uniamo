<?php

namespace Uniamo\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['category', 'slug'];
    protected $table = 'categories';


    public function news()
    {
        return $this->belongsToMany(News::class, 'categories_news', 'category_id', 'news_id');
    }

    public function pages()
    {
        return $this->belongsToMany(Pages::class, 'categories_pages', 'category_id', 'page_id');
    }
    

    public static function make($category, $active)
    {
        $category = rtrim($category);
        $slug = str_slug($category);
        
        $cat = new static(compact('category', 'slug', 'active'));

        return $cat;
    }

    public static function edit($category_id, $category, $active)
    {
        $category = rtrim($category);

        $cat = static::find($category_id);

        $cat->category = $category;
        $cat->slug = str_slug($category);
        $cat->active = $active;

        return $cat;
    }
}

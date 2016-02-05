<?php

namespace App\Uniamo\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['category', 'slug'];
    protected $table = 'categories';


    public function prodotti()
    {
        return $this->belongsToMany(News::class, 'categories_news', 'category_id', 'news_id');
    }
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

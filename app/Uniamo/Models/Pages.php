<?php

namespace Uniamo\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'pages';


    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'categories_pages', 'page_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'pages_tags', 'page_id', 'tag_id');
    }

    public static function make($title, $content, $active)
    {
        $title = rtrim($title);
        $slug = str_slug($title);
        
        $page = new static(compact('title', 'content', 'slug', 'active'));

        return $page;
    }

    public static function edit($page_id, $title, $content, $active)
    {
        $title = rtrim($title);

        $page = static::find($page_id);

        $page->title = $title;
        $page->slug = str_slug($title);
        $page->content = $content;
        $page->active = $active;

        return $page;
    }

    
}

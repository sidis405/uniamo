<?php

namespace Uniamo\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'categories_news', 'news_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'news_tags', 'news_id', 'tag_id');
    }

    public static function make($title, $excerpt, $body, $active){

        $slug = str_slug(rtrim($title));

        $user_id = \Auth::user()->id;

        $news = new static(compact('title', 'slug', 'excerpt', 'body', 'user_id', 'active'));

        return $news;
    }

    public static function edit($news_id, $title, $excerpt, $body, $active){

        $slug = str_slug(rtrim($title));

        $news = static::find($news_id);

        $news->title = $title;
        $news->slug = $slug;
        $news->excerpt = $excerpt;
        $news->body = $body;
        $news->active = $active;

        return $news;
    }
}

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

    public function relatedByCategories()
    {
        return \DB::select( \DB::raw("SELECT 
                    news.id, 
                    news.title,
                    news.excerpt,
                    news.slug,
                    news.image_path,
                    categories.category,
                    categories.slug as category_slug,
                    count(DISTINCT r2.category_id) as relevance
                    FROM categories, categories_news r1
                    INNER JOIN categories_news r2 ON (r1.category_id = r2.category_id AND r1.news_id <> r2.news_id) 
                    INNER JOIN news ON (r2.news_id = news.id) 
                    WHERE r1.news_id = '{$this->id}' and categories.id = r1.category_id 
                    GROUP BY news.id, categories.id
                    HAVING (relevance > 0)
                    ORDER BY relevance DESC")
                    )
                    ;
    }

    public function relatedByTags()
    {
        return \DB::select( \DB::raw("SELECT 
                    news.id, 
                    news.title,
                    news.excerpt,
                    news.slug,
                    news.image_path,
                    tags.tag,
                    tags.slug as tag_slug,
                    count(DISTINCT r2.tag_id) as relevance
                    FROM tags, news_tags r1
                    INNER JOIN news_tags r2 ON (r1.tag_id = r2.tag_id 
                                                       AND r1.news_id <> r2.news_id) 
                    INNER JOIN news ON (r2.news_id = news.id) 
                    WHERE r1.news_id = '{$this->id}' and tags.id = r1.tag_id 
                    GROUP BY news.id, tags.id
                    HAVING (relevance > 0)
                    ORDER BY relevance DESC")
                    )
                    ;
    }
}

<?php

namespace Uniamo\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['tag', 'slug'];
    protected $table = 'tags';


     public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags', 'tag_id', 'news_id');
    }

    public function pages()
    {
        return $this->belongsToMany(Pages::class, 'pages_tags', 'tag_id', 'page_id');
    }
    

    public static function make($tag, $active)
    {
        $tag = rtrim($tag);
        $slug = str_slug($tag);
        
        $tag_object = new static(compact('tag', 'slug', 'active'));

        return $tag_object;
    }

    public static function edit($tag_id, $tag, $active)
    {
        $tag = rtrim($tag);

        $tag_object = static::find($tag_id);

        $tag_object->tag = $tag;
        $tag_object->slug = str_slug($tag);
        $tag_object->active = $active;

        return $tag_object;
    }
}

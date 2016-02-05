<?php

namespace App\Uniamo\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['tag', 'slug'];
    protected $table = 'tags';


    public function prodotti()
    {
        return $this->belongsToMany(News::class, 'news_tags', 'tag_id', 'news_id');
    }
    }

    public static function make($tag, $active)
    {
        $tag = rtrim($tag);
        $slug = str_slug($tag);
        
        $tag_object = new static(compact('tag', 'slug', 'active'));

        return $tag_object;
    }

    public static function edit($ttag_id, $tag, $active)
    {
        $tag = rtrim($tag);

        $tag_object = static::find($tag_id);

        $tag_object->tag = $tag;
        $tag_object->slug = str_slug($tag);
        $tag_object->active = $active;

        return $tag_object;
    }
}

<?php

namespace Uniamo\Repositories;

use Uniamo\Models\News;

/**
* News Repo
*/
class NewsRepo
{
    public function save(News $news)
    {
        $news->save();

        return $news;
    }

    public function remove($id)
    {
        $news = $this->getById($id);

        $news->categories()->detach();
        $news->tags()->detach();

        $news->delete();

        return true;
    }

    public function getAll()
    {
        return News::with('categories', 'tags', 'user')->orderBy('created_at', 'DESC')->get();
    } 

    public function getAllFront($howMany = 10)
    {
        return News::with('categories', 'tags', 'user')->where('active', 1)->orderBy('created_at', 'DESC')->take($howMany)->get();
    } 

    public function getAllListing()
    {
        return News::where('active', 1)->orderBy('created_at', 'DESC')->get();
    }

    public function getById($id)
    {
        return News::with('categories', 'tags', 'user')->where('id', $id)->first();
    } 
}

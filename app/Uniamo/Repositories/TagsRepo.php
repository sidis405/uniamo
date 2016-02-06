<?php

namespace Uniamo\Repositories;

use Uniamo\Models\Tags;

/**
* Tags Repo
*/
class TagsRepo
{
    public function save(Tags $tag)
    {
        $tag->save();

        return $tag;
    }

    public function remove($id)
    {
        $tag = $this->getById($id);

        $tag->news()->detach();
        $tag->pages()->detach();

        $tag->delete();

        return true;
    }

    public function getAll()
    {
        return Tags::with('news', 'pages')->orderBy('tag')->get();
    } 

    public function getById($id)
    {
        return Tags::where('id', $id)->with('news', 'pages')->first();
    } 

    public function getBySlug($slug)
    {
        return Tags::with('news')->where('slug', $slug)->first();
    } 
}

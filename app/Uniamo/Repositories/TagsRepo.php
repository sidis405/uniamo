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

        if( count($tag->news ) > 0) return false;

        $tag->delete();

        return true;
    }

    public function getAll()
    {
        return Tags::with('news')->orderBy('nome')->get();
    } 

    public function getById($id)
    {
        return Tags::where('id', $id)->with('news')->first();
    } 
}

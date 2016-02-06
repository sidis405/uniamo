<?php

namespace Uniamo\Repositories;

use Uniamo\Models\Pages;

/**
* Pages Repo
*/
class PagesRepo
{
    public function save(Pages $page)
    {
        $page->save();

        return $page;
    }

    public function remove($id)
    {
        $page = $this->getById($id);

        $page->categories()->detach();
        $page->tags()->detach();

        $page->delete();

        return true;
    }

    public function getAll()
    {
        return Pages::with('categories', 'tags')->orderBy('created_at', 'DESC')->get();
    } 

    public function getAllFront()
    {
        return Pages::where('active', 1)->orderBy('created_at', 'DESC')->get();
    } 

    public function getById($id)
    {
        return Pages::with('categories', 'tags')->where('id', $id)->first();
    } 

    public function getBySlug($slug)
    {
        return Pages::with('categories', 'tags')->where('slug', $slug)->first();
    } 
}

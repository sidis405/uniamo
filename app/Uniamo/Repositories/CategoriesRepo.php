<?php

namespace Uniamo\Repositories;

use Uniamo\Models\Categories;

/**
* Categories Repo
*/
class CategoriesRepo
{
    public function save(Categories $category)
    {
        $category->save();

        return $category;
    }

    public function remove($id)
    {
        $category = $this->getById($id);

        $category->news()->detach();
        $category->pages()->detach();

        $category->delete();

        return true;
    }

    public function getAll()
    {
        return Categories::with('news', 'pages')->orderBy('category')->get();
    } 

    public function getById($id)
    {
        return Categories::where('id', $id)->with('news', 'pages')->first();
    } 

    public function getBySlug($slug)
    {
        return Categories::with('news')->where('slug', $slug)->first();
    } 

}

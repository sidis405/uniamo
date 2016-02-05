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

        if( count($category->news ) > 0) return false;

        $category->delete();

        return true;
    }

    public function getAll()
    {
        return Categories::with('news')->orderBy('nome')->get();
    } 

    public function getById($id)
    {
        return Categories::where('id', $id)->with('news')->first();
    } 
}

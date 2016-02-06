<?php

namespace Uniamo\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Uniamo\Repositories\CategoriesRepo;

class CategoriesController extends FrontController
{

    public function show($slug, CategoriesRepo $categories_repo)
    {
        $category = $categories_repo->getBySlug($slug);

        return view('categories.show', compact('category'));
    }

}

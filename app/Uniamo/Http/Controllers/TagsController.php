<?php

namespace Uniamo\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Uniamo\Repositories\TagsRepo;

class TagsController extends FrontController
{

    public function show($slug, TagsRepo $tags_repo)
    {
        $tag = $tags_repo->getBySlug($slug);

        return view('tags.show', compact('tag'));
    }

}

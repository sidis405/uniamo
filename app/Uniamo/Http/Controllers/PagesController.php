<?php

namespace Uniamo\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Uniamo\Repositories\PagesRepo;

class PagesController extends FrontController
{
    
    

    public function show($slug, PagesRepo $pages_repo)
    {
        $page = $pages_repo->getBySlug($slug);

        return view('pages.show', compact('page'));
    }

}

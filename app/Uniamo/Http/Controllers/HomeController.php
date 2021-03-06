<?php

namespace Uniamo\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Uniamo\Repositories\NewsRepo;

class HomeController extends FrontController
{
    
    public function index(NewsRepo $news_repo)
    {
        $news = $news_repo->getAllFront();

        return view('home', compact('news'));

    }

}

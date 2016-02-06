<?php

namespace Uniamo\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Uniamo\Repositories\NewsRepo;

class NewsController extends FrontController
{
    
    public function index(NewsRepo $news_repo)
    {
        $news = $news_repo->getAllFront();

        return view('news.index', compact('news'));

    }

    public function show($id, $slug, NewsRepo $news_repo)
    {
        $news = $news_repo->getById($id);

        return view('news.show', compact('news'));
    }

}

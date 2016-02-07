<?php

namespace Uniamo\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Uniamo\Repositories\NewsRepo;

class NewsController extends FrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('cachebefore', ['only' => ['show']]);
        $this->middleware('cacheafter', ['only' => ['show']]);
    }
    
    public function index(NewsRepo $news_repo)
    {
        $news = $news_repo->getAllFront();
        return view('news.index', compact('news'));

    }

    public function show($id, $slug, NewsRepo $news_repo)
    {
        $news = $news_repo->getById($id);

        $relatedByCategories = $news->relatedByCategories();
        $relatedByTags = $news->relatedByTags();

        $related = flattenRelatedForNews($relatedByCategories, $relatedByTags);

        return view('news.show', compact('news', 'related'));
    }

}

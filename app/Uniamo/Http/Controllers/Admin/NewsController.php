<?php

namespace Uniamo\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Uniamo\Repositories\CategoriesRepo;
use Uniamo\Repositories\NewsRepo;
use Uniamo\Repositories\TagsRepo;
use Illuminate\Http\Request;


class NewsController extends AdminController
{
    /**
     * Display a listing of the News.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsRepo $news_repo)
    {
        $news = $news_repo->getAll();

        // return $news;

        return view('admin.news.index', compact('news'));

    }

     /**
     * Show the form for creating a new Fascia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriesRepo $categories_repo, TagsRepo $tags_repo)
    {
        $categories = $categories_repo->getAll();
        $tags = $tags_repo->getAll();
        return view('admin.news.create', compact('categories', 'tags'));
    }



    /**
     * Store a newly created News in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();
        $data = $this->manageUploads($request);

        $news = $this->dispatchFrom('Uniamo\Commands\News\CreateNewsCommand', $request, $data);
        
        return redirect()->to('/admin/news');
    }

    /**
     * Display the specified News.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, NewsRepo $news_repo)
    {
        $news = $news_repo->getById($id);

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified News.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, NewsRepo $news_repo, CategoriesRepo $categories_repo, TagsRepo $tags_repo)
    {
        $categories = $categories_repo->getAll();
        $tags = $tags_repo->getAll();
        $news = $news_repo->getById($id);


        return view('admin.news.edit', compact('news', 'categories', 'tags'));
    }

    /**
     * Update the specified News in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->manageUploads($request);

        $news = $this->dispatchFrom('Uniamo\Commands\News\UpdateNewsCommand', $request, $data);

        flash()->success('News aggiornata correttamente.');

        return redirect()->to('/admin/news');
    }

    /**
     * Remove the specified News from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, NewsRepo $news_repo)
    {
        $delete = $news_repo->remove($id);

        return 'true';
    }

    protected function manageUploads($request)
    {
        $data = [];

        if($request->hasFile('image_path'))
        {
            $data['image_path'] = $request->file('image_path');
        }else{
            $data['image_path'] = false;
        }

        if($request->has('active'))
        {
            $data['active'] = $request->input('active');
        }else{
            $data['active'] = 0;
        }

        return $data;
    }

}

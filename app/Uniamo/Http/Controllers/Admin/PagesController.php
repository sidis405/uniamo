<?php

namespace Uniamo\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Uniamo\Repositories\CategoriesRepo;
use Uniamo\Repositories\PagesRepo;
use Uniamo\Repositories\TagsRepo;
use Illuminate\Http\Request;


class PagesController extends AdminController
{
    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PagesRepo $pages_repo)
    {
        $pages = $pages_repo->getAll();

        // return $pages;

        return view('admin.pages.index', compact('pages'));

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
        return view('admin.pages.create', compact('categories', 'tags'));
    }



    /**
     * Store a newly created pages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->manageUploads($request);

        $page = $this->dispatchFrom('Uniamo\Commands\Pages\CreatePageCommand', $request, $data);
        
        return redirect()->to('/admin/pagine');
    }

    /**
     * Display the specified pages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, PagesRepo $pages_repo)
    {
        $page = $pages_repo->getById($id);

        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified pages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, PagesRepo $pages_repo, CategoriesRepo $categories_repo, TagsRepo $tags_repo)
    {
        $categories = $categories_repo->getAll();
        $tags = $tags_repo->getAll();

        $page = $pages_repo->getById($id);

        return view('admin.pages.edit', compact('page', 'categories', 'tags'));
    }

    /**
     * Update the specified pages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->manageUploads($request);

        $page = $this->dispatchFrom('Uniamo\Commands\Pages\UpdatePageCommand', $request, $data);

        flash()->success('Categoria aggiornata correttamente.');

        return redirect()->to('/admin/pagine');
    }

    /**
     * Remove the specified pages from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PagesRepo $pages_repo)
    {
        $delete = $pages_repo->remove($id);

        return 'true';
    }

    protected function manageUploads($request)
    {
        $data = [];

        if($request->hasFile('immagine_path'))
        {
            $data['immagine_path'] = $request->file('immagine_path');
        }else{
            $data['immagine_path'] = false;
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

<?php

namespace Uniamo\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Uniamo\Repositories\CategoriesRepo;
use Illuminate\Http\Request;


class CategoriesController extends AdminController
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesRepo $categories_repo)
    {
        $categories = $categories_repo->getAll();

        // return $categories;

        return view('admin.categories.index', compact('categories'));

    }

     /**
     * Show the form for creating a new Fascia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }



    /**
     * Store a newly created categories in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->manageUploads($request);

        $category = $this->dispatchFrom('Uniamo\Commands\Categories\CreateCategoryCommand', $request, $data);
        
        return redirect()->to('/admin/categorie');
    }

    /**
     * Display the specified categories.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, CategoriesRepo $categories_repo)
    {
        $category = $categories_repo->getById($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified categories.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CategoriesRepo $categories_repo)
    {
        $category = $categories_repo->getById($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified categories in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->manageUploads($request);

        $category = $this->dispatchFrom('Uniamo\Commands\Categories\UpdateCategoryCommand', $request, $data);

        flash()->success('Categoria aggiornata correttamente.');

        return redirect()->to('/admin/categorie');
    }

    /**
     * Remove the specified categories from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CategoriesRepo $categories_repo)
    {
        $delete = $categories_repo->remove($id);

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

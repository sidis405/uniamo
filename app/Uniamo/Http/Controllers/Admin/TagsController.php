<?php

namespace Uniamo\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Uniamo\Repositories\TagsRepo;
use Illuminate\Http\Request;


class TagsController extends AdminController
{
    /**
     * Display a listing of the Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagsRepo $tags_repo)
    {
        $tags = $tags_repo->getAll();

        // return $tags;

        return view('admin.tags.index', compact('tags'));

    }

     /**
     * Show the form for creating a new Fascia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }



    /**
     * Store a newly created Tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $this->manageUploads($request);

        $tag = $this->dispatchFrom('Uniamo\Commands\Tags\CreateTagCommand', $request, $data);
        
        return redirect()->to('/admin/tags');
    }

    /**
     * Display the specified Tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, TagsRepo $tags_repo)
    {
        $tag = $tags_repo->getById($id);

        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified Tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, TagsRepo $tags_repo)
    {
        $tag = $tags_repo->getById($id);

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified Tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->manageUploads($request);

        $tag = $this->dispatchFrom('Uniamo\Commands\Tags\UpdateTagCommand', $request, $data);

        flash()->success('Tag aggiornato correttamente.');

        return redirect()->to('/admin/tags');
    }

    /**
     * Remove the specified Tag from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, TagsRepo $tags_repo)
    {
        $delete = $tags_repo->remove($id);

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

<?php

namespace Uniamo\Repositories;

use Uniamo\Models\Categories;
use Uniamo\Models\Pages;
use Uniamo\Models\Tags;

/**
* Pages Repo
*/
class PagesRepo
{
    public function save(Pages $page)
    {
        $page->save();

        return $page;
    }

    public function remove($id)
    {
        $page = $this->getById($id);

        $page->categories()->detach();
        $page->tags()->detach();

        $page->delete();

        return true;
    }

    public function getAll()
    {
        return Pages::with('categories', 'tags')->orderBy('created_at', 'DESC')->get();
    } 

    public function getAllFront()
    {
        return Pages::where('active', 1)->orderBy('created_at', 'DESC')->get();
    } 

    public function getById($id)
    {
        return Pages::with('categories', 'tags')->where('id', $id)->first();
    } 

    public function getBySlug($slug)
    {
        return Pages::with('categories', 'tags')->where('slug', $slug)->first();
    } 

    public function getRelatedNewsByCategoryAndTags(Pages $page)
    {
        $category_ids = array_pluck($page->categories, 'id');
        $tag_ids = array_pluck($page->tags, 'id');

        if(count($category_ids) < 1) $category_ids = [''];
        if(count($tag_ids) < 1) $tag_ids = [''];

        $category_news = array_pluck(Categories::with('news.categories', 'news.tags')->whereIn('id', $category_ids)->get(), 'news');
        $tag_news = array_pluck(Tags::with('news.categories', 'news.tags')->whereIn('id', $tag_ids)->get(), 'news');

        if(count($category_news)) $category_news = $category_news[0];
        if(count($tag_news)) $tag_news = $tag_news[0];

        return array($category_news, $tag_news);
    }
}

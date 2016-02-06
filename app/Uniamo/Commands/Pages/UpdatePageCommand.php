<?php

namespace Uniamo\Commands\Pages;

use Uniamo\Commands\Command;

class UpdatePageCommand extends Command
{

    public $page_id;
    public $title;
    public $content;
    public $active;
    public $categories;
    public $tags;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($page_id, $title, $content, $active, $categories = [], $tags = [])
    {
        $this->page_id  = $page_id;
        $this->title = $title;
        $this->content = $content;
        $this->active = $active;
        $this->categories = $categories;
        $this->tags = $tags;
    }
}

<?php

namespace Uniamo\Commands\News;

use Uniamo\Commands\Command;

class CreateNewsCommand extends Command
{
    public $title;
    public $image_path;
    public $excerpt;
    public $body;
    public $active;
    public $categories;
    public $tags;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($title, $image_path, $excerpt, $body, $active, $categories = [], $tags = [])
    {
        
        $this->title = $title;
        $this->image_path = $image_path;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->active = $active;
        $this->categories = $categories;
        $this->tags = $tags;
    }
}

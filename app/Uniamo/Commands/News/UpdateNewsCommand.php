<?php

namespace Uniamo\Commands\News;

use Uniamo\Commands\Command;

class UpdateNewsCommand extends Command
{

    public $news_id;
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
    public function __construct($news_id, $title, $image_path, $excerpt, $body, $active, $categories = [], $tags = [])
    {
        
        $this->news_id = $news_id;
        $this->title = $title;
        $this->image_path = $image_path;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->active = $active;
        $this->categories = $categories;
        $this->tags = $tags;
    }

}

<?php

namespace Uniamo\Commands\Pages;

use Uniamo\Commands\Command;

class CreatePageCommand extends Command
{

    
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
    public function __construct( $title, $content, $active, $categories = [], $tags = [])
    {
        
        $this->title = $title;
        $this->content = $content;
        $this->active = $active;
        $this->categories = $categories;
        $this->tags = $tags;
    }
}

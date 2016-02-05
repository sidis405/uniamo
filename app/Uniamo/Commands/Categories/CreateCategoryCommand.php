<?php

namespace Uniamo\Commands\Categories;

use Uniamo\Commands\Command;

class CreateCategoryCommand extends Command
{

    public $category;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($category)
    {
        $this->category  = $category;
    }
}

<?php

namespace Uniamo\Commands\Categories;

use Uniamo\Commands\Command;

class UpdateCategoryCommand extends Command
{

      public $category_id;
      public $category;

    /**
     * Update a command instance.
     *
     * @return void
     */
    public function __construct($category_id, $category)
    {
        $this->category_id = $category_id;
        $this->category = $category;
    }
}

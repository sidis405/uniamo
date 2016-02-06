<?php

namespace Uniamo\Handlers\Commands\Categories;

use Event;
use Uniamo\Commands\Categories\UpdateCategoryCommand;
use Uniamo\Events\Categories\CategoryWasUpdated;
use Uniamo\Models\Categories;
use Uniamo\Repositories\CategoriesRepo;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCategoryCommandHandler
{
    public $repo;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(CategoriesRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param  UpdateCategoryCommand  $command
     * @return void
     */
    public function handle(UpdateCategoryCommand $command)
    {
        $active = 1;
        // $active = ($command->active === 'on') ? 1 : 0;

        $category_object = Categories::edit($command->category_id, $command->category, $active);

        $category = $this->repo->save($category_object);

        Event::fire(new CategoryWasUpdated($category));

        return $category;
    }

}

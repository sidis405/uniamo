<?php

namespace Uniamo\Handlers\Commands\Categories;

use Event;
use Uniamo\Commands\Categories\CreateCategoryCommand;
use Uniamo\Events\Categories\CategoryWasCreated;
use Uniamo\Models\Categories;
use Uniamo\Repositories\CategoriesRepo;
use Illuminate\Queue\InteractsWithQueue;

class CreateCategoryCommandHandler
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
     * @param  CreateCategoryCommand  $command
     * @return void
     */
    public function handle(CreateCategoryCommand $command)
    {
        $active = ($command->active === 'on') ? 1 : 0;


        $category_object = Categories::make($command->category, $active);

        $category = $this->repo->save($category_object);

        Event::fire(new CategoryWasCreated($category));

        return $category;

    }

}

<?php

namespace Uniamo\Handlers\Commands\Pages;

use Event;
use Uniamo\Commands\Pages\CreatePageCommand;
use Uniamo\Events\Pages\PageWasCreated;
use Uniamo\Models\Pages;
use Uniamo\Repositories\PagesRepo;
use Illuminate\Queue\InteractsWithQueue;

class CreatePageCommandHandler
{
    public $repo;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(PagesRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param  CreatePageCommand  $command
     * @return void
     */
    public function handle(CreatePageCommand $command)
    {
        $active = ($command->active === 'on') ? 1 : 0;


        $page_object = Pages::make($command->title , $command->content, $active);

        $page = $this->repo->save($page_object);

        $page->categories()->sync($command->categories);
        $page->tags()->sync($command->tags);

        Event::fire(new PageWasCreated($page));

        return $page;

    }


}

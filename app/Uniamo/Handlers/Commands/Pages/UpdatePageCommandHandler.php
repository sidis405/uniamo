<?php

namespace Uniamo\Handlers\Commands\Pages;

use Event;
use Uniamo\Commands\Pages\UpdatePageCommand;
use Uniamo\Events\Pages\PageWasUpdated;
use Uniamo\Models\Pages;
use Uniamo\Repositories\PagesRepo;
use Illuminate\Queue\InteractsWithQueue;

class UpdatePageCommandHandler
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
     * @param  UpdatePageCommand  $command
     * @return void
     */
    public function handle(UpdatePageCommand $command)
    {
        $active = ($command->active === 'on') ? 1 : 0;

        $page_object = Pages::edit($command->page_id, $command->title, $command->content, $active);

        $page = $this->repo->save($page_object);

        $page->categories()->sync($command->categories);
        $page->tags()->sync($command->tags);


        Event::fire(new PageWasUpdated($page));

        return $page;
    }

}

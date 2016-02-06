<?php

namespace Uniamo\Handlers\Commands\Tags;

use Event;
use Uniamo\Commands\Tags\UpdateTagCommand;
use Uniamo\Events\Tags\TagWasUpdated;
use Uniamo\Models\Tags;
use Uniamo\Repositories\TagsRepo;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTagCommandHandler
{
    public $repo;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(TagsRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param  UpdateTagCommand  $command
     * @return void
     */
    public function handle(UpdateTagCommand $command)
    {
        $active = 1;
        // $active = ($command->active === 'on') ? 1 : 0;

        $category_object = Tags::edit($command->tag_id, $command->tag, $active);

        $tag = $this->repo->save($category_object);

        Event::fire(new TagWasUpdated($tag));

        return $tag;
    }

}

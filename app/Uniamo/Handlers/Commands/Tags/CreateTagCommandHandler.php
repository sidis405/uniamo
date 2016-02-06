<?php

namespace Uniamo\Handlers\Commands\Tags;

use Event;
use Uniamo\Commands\Tags\CreateTagCommand;
use Uniamo\Events\Tags\TagWasCreated;
use Uniamo\Models\Tags;
use Uniamo\Repositories\TagsRepo;
use Illuminate\Queue\InteractsWithQueue;

class CreateTagCommandHandler
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
     * @param  CreateTagCommand  $command
     * @return void
     */
    public function handle(CreateTagCommand $command)
    {
        
        $active = 1;
        // $active = ($command->active === 'on') ? 1 : 0;


        $tag_object = Tags::make($command->tag, $active);

        $tag = $this->repo->save($tag_object);

        Event::fire(new TagWasCreated($tag));

        return $tag;

    }

}

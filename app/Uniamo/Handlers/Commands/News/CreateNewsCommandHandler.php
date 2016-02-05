<?php

namespace Uniamo\Handlers\Commands\News;

use Event;
use Uniamo\Commands\News\CreateNewsCommand;
use Uniamo\Events\News\NewsWasCreated;
use Uniamo\Models\News;
use Uniamo\Repositories\NewsRepo;
use Illuminate\Queue\InteractsWithQueue;
use Uniamo\Utils\FileUtility;

class CreateNewsCommandHandler
{
    public $repo;
    public $file_utility;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(NewsRepo $repo, FileUtility $file_utility)
    {
        $this->repo = $repo;
        $this->file_utility = $file_utility;
    }

    /**
     * Handle the command.
     *
     * @param  CreateNewsCommand  $command
     * @return void
     */
    public function handle(CreateNewsCommand $command)
    {
        $active = ($command->active === 'on') ? 1 : 0;


        $news_object = News::make($command->title , $command->excerpt, $command->body, $active);

        $news = $this->repo->save($news_object);

        $news->categories()->sync($command->categories);
        $news->tags()->sync($command->tags);

        $this->caricaImmagine($news, $command->image_path);

        Event::fire(new NewsWasCreated($news));

        return $news;

    }

    protected function caricaImmagine($news, $immagine)
    {

        if($immagine)
        {
            $image_path = $this->file_utility->putFile($news->id, 'news_immagine', $immagine);

            $news->update(['image_path' => $image_path]);
            
        }

    }
}

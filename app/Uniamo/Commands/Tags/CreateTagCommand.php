<?php

namespace Uniamo\Commands\Tags;

use Uniamo\Commands\Command;

class CreateTagCommand extends Command
{

    public $tag;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag  = $tag;
    }
}

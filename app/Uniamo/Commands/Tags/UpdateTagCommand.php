<?php

namespace Uniamo\Commands\Tags;

use Uniamo\Commands\Command;

class UpdateTagCommand extends Command
{

      public $tag_id;
      public $tag;

    /**
     * Update a command instance.
     *
     * @return void
     */
    public function __construct($tag_id, $tag)
    {
        $this->tag_id = $tag_id;
        $this->tag = $tag;
    }
}

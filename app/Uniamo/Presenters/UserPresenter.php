<?php

namespace Uniamo\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function niceName()
    {
         return $this->name;
    }
}

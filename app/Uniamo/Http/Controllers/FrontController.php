<?php

namespace Uniamo\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Uniamo\Repositories\PagesRepo;

class FrontController extends Controller
{

    function __construct() {
        $pages_repo = new PagesRepo();
        view()->share('pages', $pages_repo->getAllFront());
    }

}

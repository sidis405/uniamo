<?php

namespace Uniamo\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    function __construct() {
        view()->share('user', \Auth()->user());
    }

}

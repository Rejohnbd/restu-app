<?php

namespace App\Http\Controllers;

use App\Models\Admin\Client;
use Illuminate\Http\Request;

class MenuViewController extends Controller
{
    public function index($slug)
    {
        $checkExist = Client::where('resturant_name_slug', $slug)->where('url_status', 1)->first();
        if ($checkExist) :
            dd($slug);
        else :
            return redirect('/');
        endif;
    }
}

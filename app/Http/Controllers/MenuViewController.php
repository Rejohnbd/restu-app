<?php

namespace App\Http\Controllers;

use App\Models\Admin\Client;
use Illuminate\Http\Request;

class MenuViewController extends Controller
{
    public function index($slug)
    {
        $menuItemsData = Client::with('menuItems')->where('resturant_name_slug', $slug)->where('url_status', 1)->first();
        if ($menuItemsData) :
            return view('frontend.menu_list.index', compact('menuItemsData'));
        else :
            return redirect('/');
        endif;
    }
}

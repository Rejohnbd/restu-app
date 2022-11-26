<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Client;
use App\Models\Client\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $totalItmes = MenuItem::where('user_id', $userId)->get();
        $inactiveItmes = MenuItem::where('user_id', $userId)->where('status', 0)->get();
        return view('client.dashboard.index', compact('totalItmes', 'inactiveItmes'));
    }

    public function restuInfo()
    {
        $userId = Auth::user()->id;
        $client = Client::where('user_id', $userId)->first();
        return view('client.restu_info.index', compact('client'));
    }
}

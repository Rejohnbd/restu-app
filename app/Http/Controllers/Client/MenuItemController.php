<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\MenuStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Admin\Client;
use App\Models\Client\MenuItem;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MenuItem::where('user_id', Auth::user()->id)->paginate(10);
        return view('client.menu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $userId = Auth::user()->id;
        $clientInfo = Client::where('user_id', $userId)->first();

        $newMenuItem = new MenuItem;
        $newMenuItem->user_id           = $userId;
        $newMenuItem->client_id         = $clientInfo->id;
        $newMenuItem->menu_name         = $request->menu_name;
        $newMenuItem->menu_price        = $request->menu_price;
        $newMenuItem->menu_description  = $request->menu_description;
        $newMenuItem->status            = $request->status;
        if ($request->hasFile('menu_image')) :
            $menuNameSlug = Str::slug($request->menu_name);
            $currentDate = date('Y_m_d_H_i');
            $file = $request->file('menu_image');
            $fileExtension = $request->menu_image->extension();
            $menuItemLocation = $clientInfo->resturant_directory_name . '/' . $menuNameSlug . '-' . $currentDate . $fileExtension;
            $file->move(storage_path('/app/public/' . $clientInfo->resturant_directory_name) . '/', $menuNameSlug . '-' . $currentDate . $fileExtension);
            $newMenuItem->menu_image = $menuItemLocation;
        endif;
        $saveNewMenuItem = $newMenuItem->save();

        if ($saveNewMenuItem) :
            session()->flash('success', 'Client Created Successfully.');
            return redirect()->route('menus.index');
        else :
            session()->flash('error', 'Something Happend Wrong');
            return redirect()->route('menus.index');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

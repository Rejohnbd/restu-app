<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use App\Models\Admin\Client;

use App\Http\Requests\Admin\Client\ClientSaveRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Client::paginate(15);
        return view('admin.client.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientSaveRequest $request)
    {
        $resturant_full_url = env('APP_URL', 'http://restuapp.com') . '/menu/' . $request->resturant_name_slug;

        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObject = $builder->destinationUrl($resturant_full_url)->make();
        $shortURL = $shortURLObject->default_short_url;
        $shortURLKey = $shortURLObject->url_key;
        // dd($shortURLObject, $shortURL, $shortURLKey, $resturant_full_url);

        $slugExist = Client::where('resturant_short_url_slug', $shortURLKey)->exists();

        if (!$slugExist) :
            $userInfo = User::create([
                'role_id'       => 2,
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
            ]);

            $newClient = new Client;
            $newClient->user_id                     = $userInfo->id;
            $newClient->resturant_name              = $request->resturant_name;
            $newClient->resturant_name_slug         = $request->resturant_name_slug;
            $newClient->resturant_directory_name    = $request->resturant_name_slug;
            $newClient->resturant_full_url          = $resturant_full_url;
            $newClient->resturant_short_url_slug    = $shortURLKey;
            $newClient->resturant_full_short_url    = $shortURL;
            $newClient->resturant_location          = $request->resturant_location;
            $newClient->resturant_comment           = $request->resturant_comment;
            $newClient->client_phone_one            = $request->client_phone_one;
            $newClient->client_phone_two            = $request->client_phone_two;
            $newClient->url_status                  = $request->url_status;
            $saveNewClient = $newClient->save();

            if ($saveNewClient) :
                session()->flash('success', 'Client Created Successfully.');
                return redirect()->route('clients.index');
            else :
                session()->flash('error', 'Something Happend Wrong');
                return redirect()->route('clients.index');
            endif;

        else :
            session()->flash('error', 'Resturant Name, Slug, URL Already Exist. Try Again!');
            return redirect()->back();
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
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

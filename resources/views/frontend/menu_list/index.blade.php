@extends('layouts.menu_list')

@section('title', $menuItemsData->resturant_name)

@section('content')

<div class="text-center mb-5 mt-20">
    <img src="{{ asset('storage/'. $menuItemsData->resturant_logo) }}" alt="{{$menuItemsData->resturant_name}}" style="width: 120px;" />
</div>
<div class="box" style="background-color: #fff;">
    <div class="box-header">
        <h3 class="box-title text-center pt-20">{{ $menuItemsData->resturant_name }}</h3>
        <p class="text-center">{{ $menuItemsData->resturant_location }}</p>
        <div class="p-20">
            <a href="@if($menuItemsData->resturant_menu == 'default_menu.pdf') {{ asset('files/default_menu.pdf') }} @else {{ asset('storage/'.$menuItemsData->resturant_menu) }} @endif" class="btn btn-primary" download="">Download Menu</a>
            <a href="@if($menuItemsData->resturant_menu == 'default_menu.pdf') {{ asset('files/default_menu.pdf') }} @else {{ asset('storage/'.$menuItemsData->resturant_menu) }} @endif" target="_blank" class="btn btn-primary pull-right">View Menu</a>
        </div>
    </div>

    <div class="box-body p-20">
        <table id="menuListTable" class="table table-bordered table-striped">
            <thead class="thtf-bg">
                <tr>
                    <th>Sl</th>
                    <th>Menu Name</th>
                    <th>Image</th>
                    <th>Price(s)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuItemsData->menuItems as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$data->menu_name}}</td>
                    <td class="img-center">@if($data->menu_image)<a href="{{ asset('storage/'.$data->menu_image) }}"> <img src="{{ asset('storage/'.$data->menu_image) }}" alt="{{$data->menu_name}}" style="width: 60px; height: 60px;"></a>@else @endif</td>
                    <td>{{$data->menu_price}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="thtf-bg">
                <tr>
                    <th>Sl</th>
                    <th>Menu Name</th>
                    <th>Image</th>
                    <th>Price(s)</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
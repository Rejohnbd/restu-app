@extends('layouts.menu_list')

@section('title', $menuItemsData->resturant_name)

@section('content')
<div class="container">
    <div style="display: block; margin-left: auto; margin-right: auto; width: 50%">
        <img src="{{ asset('storage/'. $menuItemsData->resturant_logo) }}" alt="{{$menuItemsData->resturant_name}}" style="width: 120px;" />
    </div>
    <div class="box" style="background-color: #fff;">
        <div class="box-header">
            <h3 class="box-title text-center">Menu List of {{ $menuItemsData->resturant_name }}</h3>
        </div>
        <div class="box-body">
            <table id="menuListTable" class="table table-bordered table-striped">
                <thead>
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
                        <td>@if($data->menu_image)<a href="{{ asset('storage/'.$data->menu_image) }}"> <img src="{{ asset('storage/'.$data->menu_image) }}" alt="{{$data->menu_name}}" style="width: 60px; height: 60px;"></a>@else @endif</td>
                        <td>{{$data->menu_price}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
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

    <div class="text-center">
        <b>Developed by</b>
        Developed by: <b><a href="mailto:rejohnbd@gmail.com">Rejohn</a></b><br>
        <strong>Copyright &copy; 2021-{{ date('Y') }}. All rightsreserved.</strong>
    </div>
</div>
@endsection
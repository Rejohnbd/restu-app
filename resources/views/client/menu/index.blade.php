@extends('layouts.layout')

@section('title', 'Menu List')

@section('content')

@component('client.partials.breadcrumb',[
'title' => 'Menu List',
'activePage' => 'Menu List'
])
@endcomponent

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-coffee"></i>
                    <h3 class="box-title">Menu List</h3>
                    <div class="box-tools">
                        <a href="{{ route('menus.create') }}" type="button" class="btn btn-info btn-flat btn-xs pull-right">Add Menu</a>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px; margin-right: 10px">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="box-tools m">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px; margin-right: 10px">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                        </div>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px; margin-right: 10px">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($data as $menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menu->menu_name}}</td>
                                <td>@if($menu->menu_image) <img src="{{ asset('storage/'.$menu->menu_image) }}" alt="{{$menu->menu_name}}" style="width: 60px">@endif</td>
                                <td>{{ $menu->menu_price }}</td>
                                <td>{{ date('d/m/Y', strtotime($menu->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('menus.show', $menu->id) }}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Show {{ $menu->menu_name }} Details"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('menus.edit', $menu->id) }}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit {{ $menu->menu_name }} info"><i class="fa fa-edit"></i></a>
                                    <a href="#" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete {{ $menu->menu_name }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No Menu Created.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                        <ul class="pagination pagination-sm no-margin">
                            {!! $data->render() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('vendors/sweet-alert/sweetalert.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('vendors/sweet-alert/sweetalert.js') }}"></script>
@if(session('success'))
<script>
    $(document).ready(function() {
        Swal.fire(
            'Good job!',
            "{{ session('success') }}",
            'success'
        );
    })
</script>
@endif

@if(session('error'))
<script>
    $(document).ready(function() {
        Swal.fire({
            title: "Alert",
            text: "{{ session('error') }}",
            icon: "error",
            showCancelButton: true,
            confirmButtonText: 'Exit',
            cancelButtonText: 'Stay on the page'
        });
    });
</script>
@endif
@endsection
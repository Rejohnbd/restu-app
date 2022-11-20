@extends('layouts.layout')

@section('title', 'Client List')

@section('content')

@component('admin.partials.breadcrumb',[
'title' => 'Client List',
'activePage' => 'Client List'
])
@endcomponent

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Client List</h3>
                    <div class="box-tools">
                        <a href="{{ route('clients.create') }}" type="button" class="btn btn-info btn-flat btn-xs pull-right">Add Client</a>
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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Resturant Name</th>
                                <th>Phone</th>
                                <th>Full URL</th>
                                <th>Short URL</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($data as $client)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $client->user->first_name }} {{ $client->user->last_name }}</td>
                                <td>{{ $client->user->email }}</td>
                                <td>{{ $client->resturant_name }}</td>
                                <td>{{ $client->client_phone_one }}@if(isset($client->client_phone_two)), &nbsp; {{ $client->client_phone_two }}@endif</td>
                                <td><a href="{{ $client->resturant_full_url }}" target="_blank"> {{$client->resturant_full_url }}</a></td>
                                <td><a href="{{ $client->resturant_full_short_url }}" target="_blank"> {{$client->resturant_full_short_url }}</a></td>
                                <td>{{ date('d/m/Y', strtotime($client->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('clients.show', $client->id) }}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Show {{ $client->resturant_name }} Details"><i class="fa fa-eye"></i></a>
                                    <a href="" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit {{ $client->resturant_name }} info"><i class="fa fa-edit"></i></a>
                                    <a href="#" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete {{ $client->resturant_name }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="text-center">No Client Created.</td>
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
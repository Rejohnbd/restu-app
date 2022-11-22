@extends('layouts.layout')

@section('title', 'Client Details')

@section('content')

@component('admin.partials.breadcrumb',[
'title' => 'Details of: ' . $client->user->first_name . ' ' . $client->user->last_name,
'itemOne' => 'Client List',
'itemOneUrl' => 'clients.index',
'activePage' => 'Client Details'
])
@endcomponent

<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Client Info</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/default.png') }}" alt="{{ $client->first_name . ' ' . $client->last_name}}">
                    <h3 class="profile-username text-center">{{ $client->resturant_name }}</h3>
                    <p class="text-muted text-center">{{ $client->user->email }}</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Full Name</b> <a class="pull-right">{{ $client->user->first_name . ' ' . $client->user->last_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone Number</b> <a class="pull-right">{{ $client->client_phone_one }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone Number</b> <a class="pull-right">{{ $client->client_phone_two }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Full Url Slug</b> <a class="pull-right">{{$client->resturant_name_slug }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Full Url</b> <a class="pull-right" href="{{ $client->resturant_full_url }}" target="_blank"> {{$client->resturant_full_url }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Short Url Slug</b> <a class="pull-right">{{$client->resturant_short_url_slug }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Short Url</b> <a class="pull-right" href="{{ $client->resturant_full_short_url }}" target="_blank"> {{$client->resturant_full_short_url }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Created Date</b> <a class="pull-right">{{ date('d-m-Y', strtotime($client->created_at)) }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Extra Info</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Comments</strong>
                    <p class="text-muted">
                        {{ $client->resturant_comment }}
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
                    <p class="text-muted">{{ $client->resturant_location }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#documents" data-toggle="tab">Documents</a></li>
                    <li><a href="#addDocument" data-toggle="tab">Add QR Code & Logo</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="documents">
                        <div class="box-footer">
                            <ul class="mailbox-attachments clearfix">
                                <li>
                                    <span class="mailbox-attachment-icon has-img"><img src="{{ $client->resturant_logo == 'default_logo.png' ? asset('img/default_logo.png') : asset('storage/' . $client->resturant_logo) }}" alt="{{ $client->resturant_name }}"></span>
                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> {{ $client->resturant_logo == 'default_logo.png' ? 'default_logo.png' : substr(strrchr($client->resturant_logo, "/"), 1) }}</a>
                                        <span class="mailbox-attachment-size">
                                            <a href="{{ $client->resturant_logo == 'default_logo.png' ? asset('img/default_logo.png') : asset('storage/' . $client->resturant_logo) }}" class="btn btn-default btn-xs pull-right" download=""><i class=" fa fa-cloud-download"></i></a>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <span class="mailbox-attachment-icon has-img"><img src="{{ $client->resturant_barcode == 'default_barcode.png' ? asset('img/default_logo.png') : asset('storage/' . $client->resturant_barcode) }}" alt="{{ $client->resturant_name }}"></span>
                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> {{ $client->resturant_barcode == 'default_barcode.png' ? 'default_barcode.png' : substr(strrchr($client->resturant_barcode, "/"), 1) }}</a>
                                        <span class="mailbox-attachment-size">
                                            <a href="{{ $client->resturant_barcode == 'default_barcode.png' ? asset('img/default_logo.png') : asset('storage/' . $client->resturant_barcode) }}" class="btn btn-default btn-xs pull-right" download=""><i class="fa fa-cloud-download"></i></a>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane" id="addDocument">
                        <form id="uploadImage" class="form-horizontal" action="javascript:void(0)" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            <div class="form-group">
                                <label for="resturantLogo" class="col-sm-2 control-label">Resturant Logo</label>
                                <div class="col-sm-3">
                                    <input type="file" name="resturant_logo" class="form-control" id="resturantLogo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="resturantQrCode" class="col-sm-2 control-label">Resturant Barcode</label>
                                <div class="col-sm-3">
                                    <input type="file" name="resturant_barcode" class="form-control" id="resturantQrCode">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary pull-right">Upload Document</button>
                                </div>
                            </div>
                        </form>
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
<script>
    $(document).ready(function() {
        $('#uploadImage').submit(function() {
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '{{ route("clients-images-upload") }}',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    // console.log(resposne);
                    if (response.success) {
                        Swal.fire(
                            'Good job!',
                            response.message,
                            'success'
                        );
                        location.reload();
                    }
                },
                error: function(errors) {
                    console.log(errors);
                }
            });
        });
    });
</script>
@endsection
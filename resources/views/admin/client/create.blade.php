@extends('layouts.layout')

@if(isset($client))
@section('title', 'Client Update')
@else
@section('title', 'Client Create')
@endif

@section('content')

@component('admin.partials.breadcrumb',[
'title' => isset($client) ? 'Client Update' : 'Client Create',
'activePage' => isset($client) ? 'Client Update' : 'Client Create'
])
@endcomponent

<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">@if(isset($client)) Update Client @else Create Client @endif</h3>
        </div>
        <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST">
            @csrf
            @if(isset($client))
            @method('PUT')
            @endif
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('first_name') has-error @enderror">
                            <label for="firstName" class="control-label">Client First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" id="firstName" value="{{ isset($client) ? $client->first_name : old('first_name') }}" placeholder="Enter First Name" required>
                            @error('first_name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('last_name') has-error @enderror">
                            <label for="lastName" class="control-label">Client Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" id="lastName" value="{{ isset($client) ? $client->last_name : old('last_name') }}" placeholder="Enter Last Name" required>
                            @error('last_name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('email') has-error @enderror">
                            <label for="clientEmail" class="control-label">Client Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="clientEmail" value="{{ isset($client) ? $client->email : old('email') }}" placeholder="Client Email" required>
                            @error('email')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('password') has-error @enderror">
                            <label for="clientPassword" class="control-label">Client Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="clientPassword" value="{{ isset($client) ? $client->password : old('password') }}" placeholder="Client Password" required>
                            @error('password')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('client_phone_one') has-error @enderror">
                            <label for="phoneNumber" class="control-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="number" name="client_phone_one" class="form-control" id="phoneNumber" value="{{ isset($client) ? $client->client_phone_one : old('client_phone_one') }}" placeholder="Phone Number" required>
                            @error('client_phone_one')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('client_phone_two') has-error @enderror">
                            <label for="phoneNumberOptional" class="control-label">Phone Number Optional</label>
                            <input type="number" name="client_phone_two" class="form-control" id="phoneNumberOptional" value="{{ isset($client) ? $client->client_phone_two : old('client_phone_two') }}" placeholder="Phone Number Optional">
                            @error('client_phone_two')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('resturant_name') has-error @enderror">
                            <label for="resturantName" class="control-label">Resturant Name <span class="text-danger">*</span></label>
                            <input type="text" name="resturant_name" class="form-control" id="resturantName" value="{{ isset($client) ? $client->resturant_name : old('resturant_name') }}" placeholder="Enter Resturat Name" required>
                            @error('resturant_name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('resturant_name_slug') has-error @enderror">
                            <label for="resturantNameSlug" class="control-label">Resturant Name Slug <span class="text-danger">*</span></label>
                            <input type="text" name="resturant_name_slug" class="form-control" id="resturantNameSlug" value="{{ isset($client) ? $client->resturant_name_slug : old('resturant_name_slug') }}" placeholder="Enter Resturat Name Slug" required>
                            @error('resturant_name_slug')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('resturant_location') has-error @enderror">
                            <label for="clientAddress" class="control-label">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="resturant_location" rows="3" id="clientAddress" placeholder="Enter Address" required>{{ isset($client) ? $client->resturant_location : old('resturant_location') }}</textarea>
                            @error('resturant_location')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('resturant_comment') has-error @enderror">
                            <label for="clientComments" class="control-label">Comments</label>
                            <textarea class="form-control" name="resturant_comment" rows="3" id="clientComments" placeholder="Enter Comments">{{ isset($client) ? $client->resturant_comment : old('resturant_comment') }}</textarea>
                            @error('resturant_comment')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('url_status') has-error @enderror">
                            <label>Active Status</label>
                            <select name="url_status" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                            @error('url_status')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <a href="{{ route('clients.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">@if(isset($client)) Update Client @else Create Client @endif</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('vendors/sweet-alert/sweetalert.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('vendors/sweet-alert/sweetalert.js') }}"></script>
<script>
    document.getElementById("resturantName").addEventListener("input", function() {
        let theSlug = string_to_slug(this.value);
        document.getElementById("resturantNameSlug").value = theSlug;
    });

    function string_to_slug(str) {
        str = str.replace(/^\s+|\s+$/g, ""); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to = "aaaaeeeeiiiioooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
        }

        str = str
            .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
            .replace(/\s+/g, "-") // collapse whitespace and replace by -
            .replace(/-+/g, "-"); // collapse dashes

        return str;
    }
</script>
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
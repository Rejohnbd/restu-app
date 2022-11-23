@extends('layouts.layout')

@if(isset($menu))
@section('title', 'Menu Update')
@else
@section('title', 'Menu Create')
@endif

@section('content')

@component('client.partials.breadcrumb',[
'title' => isset($menu) ? 'Menu Update' : 'Menu Create',
'activePage' => isset($menu) ? 'Menu Update' : 'Menu Create'
])
@endcomponent

<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">@if(isset($menu)) Update Menu @else Create Menu @endif</h3>
        </div>
        <form action="{{ isset($menus) ? route('menus.update', $menu->id) : route('menus.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @if(isset($menu))
            @method('PUT')
            @endif
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('menu_name') has-error @enderror">
                            <label for="menuName" class="control-label">Menu Name <span class="text-danger">*</span></label>
                            <input type="text" name="menu_name" class="form-control" id="firstName" value="{{ isset($menu) ? $menu->menu_name : old('menu_name') }}" placeholder="Enter Menu Name" required>
                            @error('menu_name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('menu_price') has-error @enderror">
                            <label for="menuPrice" class="control-label">Menu Price <span class="text-danger">*</span></label>
                            <input type="number" name="menu_price" class="form-control" id="menuPrice" value="{{ isset($menu) ? $menu->menu_price : old('menu_price') }}" placeholder="Enter Menu Price" required>
                            @error('menu_price')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('menu_image') has-error @enderror">
                                    <label for="menuImage">Menu Image</label>
                                    <input type="file" name="menu_image" id="menuImage" onchange="readURL(this);">
                                    @error('menu_image')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="previewImage" class="attachment-img" src="" style="width: 110px; float: right;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('menu_description') has-error @enderror">
                            <label for="menuDescription" class="control-label">Menu Description</label>
                            <textarea class="form-control" name="menu_description" rows="3" id="menuDescription" placeholder="Enter Menu Description">{{ isset($menu) ? $menu->menu_description : old('menu_description') }}</textarea>
                            @error('menu_description')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('status') has-error @enderror">
                            <label>Active Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                            @error('status')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <a href="{{ route('menus.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">@if(isset($menu)) Update Menu @else Create Menu @endif</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {

    });
</script>

@endsection
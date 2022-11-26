@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')

@component('client.partials.breadcrumb',[
'title' => 'Dashboard',
'activePage' => 'Dashboard'
])
@endcomponent

<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ count($totalItmes) }}</h3>
                    <p>Total Items</p>
                </div>
                <div class="icon">
                    <i class="fa fa-coffee"></i>
                </div>
                <a href="{{ route('menus.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ count($totalItmes) - count($inactiveItmes) }}</h3>
                    <p>Active Item</p>
                </div>
                <div class="icon">
                    <i class="fa fa-coffee"></i>
                </div>
                <a href="{{ route('menus.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ count($inactiveItmes) }}</h3>
                    <p>Inactive Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('menus.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Feature Comming...</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
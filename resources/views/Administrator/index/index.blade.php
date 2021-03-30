@extends('layouts.admin')
@section('content')
<a href="{{ route('brands.index') }}">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i>
            </div>
            <div class="count">{{$brands}}</div>

            <h3>{{  trans('admin.brand.main_title')}}</h3>
        </div>
    </div> 
</a>
<a href="{{ route('modelcars.index') }}">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i>
            </div>
            <div class="count">{{$models}}</div>

            <h3>{{  trans('admin.modelcar.main_title')}}</h3>
        </div>
    </div> 
</a>
<a href="{{ route('cars.index') }}">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i>
            </div>
            <div class="count">{{$cars}}</div>

            <h3>{{  trans('admin.car.main_title')}}</h3>
        </div>
    </div>
</a>
@endsection
@extends('layouts.admin')

@section('content')
{{ App::setLocale('ru') }}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{  trans('admin.car.title_add')}}</h2>
            <div class="clearfix"></div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <form id="demo-form2"  class="form-horizontal form-label-left"
                      method="post" enctype="multipart/form-data"
                      action="{{ route('cars.store') }}">
                    @csrf
                    <div id="myTabContent" class="tab-content">


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 "  for="first-name">
                                {{  trans('admin.car.image')}}
                                <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" accept=".jpg, .jpeg, .png" id="first-name"
                                       name="file" data-fileuploader-limit="1" required
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                            <p>{{trans('admin.format')}}</p>
                            <p>{{trans('admin.maxsize')}}</p>
                            @if($errors->has('fileuploader-list-file'))
                            <p style="color: red" >{{trans('admin.select_image')}}</p>
                            @elseif($errors->has('file.*'))
                            <p style="color: red" >{{trans('admin.not_valid_image')}}</p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('year') ? 'bad' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
                            {{  trans('admin.car.year')}}
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"
                                   value="{{old('year')}}"
                                   name="year"
                                   class="form-control col-md-7 col-xs-12"
                                   required
                                   >
                        </div>
                    </div>

                        <div class="form-group {{ $errors->has('brand') ? 'bad' : '' }}">
                            <label @php echo $errors->has( 'brand' ) ? 'style="color: red"' : ''; @endphp class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                    {{trans('admin.modelcar.main_title') }}
                                    <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="model"  >
                                    <option value="0">{{trans('admin.car.select_modelcar') }}</option>
                                    @forelse($modelcars as  $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('number') ? 'bad' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
                            {{  trans('admin.car.number')}}
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"
                                   value="{{old('number')}}"
                                   name="number"
                                   class="form-control col-md-7 col-xs-12"
                                   required
                                   >
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('color') ? 'bad' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">
                            {{  trans('admin.car.color')}}
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"
                                   value="{{old('color')}}"
                                   name="color"
                                   class="form-control col-md-7 col-xs-12"
                                   required
                                   >
                        </div>
                    </div>
                        @php
                        $transmission = [
                            1 => 'автомат',
                            2 => 'механика'
                        ];
                        @endphp
                    <div class="form-group {{ $errors->has('transmission') ? 'bad' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="transmission">
                            {{  trans('admin.car.transmission')}}
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="transmission"  >
                                    <option value="0">{{trans('admin.car.select_transmission') }}</option>
                                    @foreach($transmission as $key =>  $val)
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('rent_price_per_day') ? 'bad' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rent_price_per_day">
                            {{  trans('admin.car.rent_price_per_day')}}
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" step="0.01"
                                   value="{{ old('rent_price_per_day') }}"
                                   name="rent_price_per_day"
                                   class="form-control col-md-7 col-xs-12"
                                   required
                                   >
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                {{ trans('admin.publish') }}
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="checkbox" class="flat" name="status" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">
                                {{  trans('admin.add_save')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection


@push('js')
    <script>

$(document).ready(function ()
{
     $('input[name="file"]').fileuploader({
        addMore: false,
        maxSize: 1 //1MB
        });
});

    </script>
    @endpush

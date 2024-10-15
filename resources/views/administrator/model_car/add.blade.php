@extends('layouts.admin')

@section('content')
{{ App::setLocale('ru') }}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{  trans('admin.modelcar.title_add')}}</h2>
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
                      method="post"
                      action="{{ route('modelcars.store') }}">
                    @csrf
                    <div id="myTabContent" class="tab-content">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                {{  trans('admin.name')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text"
                                       value="{{old('name')}}"
                                       name="name"
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('brand') ? 'bad' : '' }}">
                            <label @php echo $errors->has( 'brand' ) ? 'style="color: red"' : ''; @endphp class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                {{trans('admin.brand.main_title') }}
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="brand"  >
                                        <option value="0">{{trans('admin.modelcar.select_brand') }}</option>
                                        @forelse($brands as  $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
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




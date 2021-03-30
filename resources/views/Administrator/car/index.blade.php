@extends('layouts.admin')
@section('content')

@if($items->count() > 0)
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel admin_container">
        <div class="x_title">
            <h2>{{ trans('admin.car.main_title') }}</h2>
            <a class="btn btn-primary btn-sm pull-right" href="{{ route('cars.create') }}"> 
                <i class="fa fa-plus"></i> {{ trans('admin.add') }}
            </a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if( Session::has('dane_add') )
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>{{ Session::get('dane_add') }}</strong>
            </div>
            @endif
            @if( Session::has('error_add') )
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>{{ Session::get('error_add') }}</strong>
            </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin.publish') }}</th>
                        <th>{{ trans('admin.car.image') }}</th>
                        <th>{{ trans('admin.car.brand') }}</th>
                        <th>{{ trans('admin.car.modelcar') }}</th>
                        <th>{{ trans('admin.car.year') }}</th>
                        <th>{{ trans('admin.car.number') }}</th>
                        <th>{{ trans('admin.car.color') }}</th>
                        <th>{{ trans('admin.car.transmission') }}</th>
                        <th>{{ trans('admin.car.rent_price_per_day') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $key =>  $item)
                    <tr style="cursor:move"  >
                        <td class="text-center sort" id="sort{{$key}}" data-id="{{$item->id}}" data-ordering ="{{ $item->sort }}">
                            {{$item->sort}}
                        </td>
                         <td>
                            <div class="iradio">
                                <input type="checkbox" data-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }} class="js-switch change" />
                            </div>
                        </td>
                        <td>
                            <img src="{{$item->image}}" width="100" height="100" alt="img" />
                        </td>
                        <td>
                        {{$item->brand_name}}
                        </td>
                        <td>
                        {{$item->modelcar_name}}
                        </td>
                        <td>
                        {{$item->year}}
                        </td>
                        <td>
                        {{$item->number}}
                        </td>
                        <td>
                        {{$item->color}}
                        </td>
                        <td>
                        @if($item->transmission == 1)
                            автомат
                        @elseif($item->transmission == 2)
                            механика
                        @endif
                        </td>
                        <td>
                        {{$item->rent_price_per_day}}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm pull-right" 
                               href="{{ route('cars.edit' , $item->id) }}"> <i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a>
                            <button class="btn btn-danger btn-sm pull-right deleteItem" data-id="{{ $item->id }}"> <i class="fa fa-trash"></i> {{ trans('admin.remove') }}</button>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
            <table>
                {{ $items->links('vendor.pagination.default') }}
            </table>
        </div>
    </div>
</div>
@else
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_title">
        <img src="/Administrator/images/not_found.png" alt="image" width="20" height="20" >
        {{ trans('admin.car.add') }}
        <a class="btn btn-primary btn-sm pull-right" href="{{ route('cars.create') }}"> 
            <i class="fa fa-plus"></i> {{ trans('admin.add') }}
        </a>
        <div class="clearfix"></div>
    </div>
</div>
@endif
@endsection
@push('js')
<script>
    $('.change').change(function (e) {
        var ItemId = $(this).data('id');

        $.ajax({
            url: "{{ route('AdminChangeStatusCar') }}",
            type: 'post',
            dataType: 'json',
            data: {'id': ItemId}
        }).done(function (data) {
            if (data.status) {
                new PNotify({
                    text: '{{ trans("admin.dane_add") }}',
                    type: 'success',
                    styling: 'bootstrap3'
                });
            } else {
                new PNotify({
                    text: '{{ trans("admin.dane_add") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
        });
    });


    $('.deleteItem').click(function (event) {
        event.preventDefault();
        var ItemId = $(this).data('id');
        var Item_This = $(this);
        bootbox.confirm("{{ trans('admin.question_done') }}", function (result) {
            if (result) {
                $.ajax({
                    url: "/admin/cars/" + ItemId,
                    type: 'DELETE',
                    dataType: 'json'
                }).done(function (data) {
                    if (data.status) {
                        new PNotify({
                            text: '{{ trans("admin.dane_add") }}',
                            type: 'success',
                            styling: 'bootstrap3'
                        });

                        $(Item_This).parents('tr').hide().remove();

                    } else {
                        new PNotify({
                            text: '{{ trans("admin.dane_add") }}',
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                    }
                });
            }
        });
    });


</script>
<script>

    function changeordering()
    {
        var multi = $('.sort');
        var arr = [];
        for (var i = 0; i < multi.length; i++)
        {
            arr.push([$('#sort' + i).attr('data-id'), $('#sort' + i).attr('data-ordering')]);
        }
        arr = JSON.stringify(arr);
        $.ajax({
            url: "{{ route('orderingCar') }}",
            type: "POST",
            data: "_token={{csrf_token()}}" + "&ordering=" + arr
        })
                .done(function (data) {
                    console.log(data);
                });
    }

</script>
<script>
    $(document).ready(function () {

        $k = 0;
        $('.admin_container tbody').sortable({
            start: function (event, ui) {

                var start_pos = ui.item.index();
                ui.item.data('start_pos', start_pos);
            },
            update: function (event, ui) {
                var index = ui.item.index();
                var start_pos = ui.item.data('start_pos');

                //update the html of the moved item to the current index
                $('.admin_container tbody tr:nth-child(' + (index + 1) + ') .sort').html(index + $k + 1).attr('data-ordering', index + $k + 1);

                if (start_pos < index)
                {
                    //update the items before the re-ordered item
                    for (var i = index; i > 0; i--)
                    {
                        $('.admin_container tbody tr:nth-child(' + i + ') .sort').html(i + $k).attr('data-ordering', i + $k);

                    }
                } else {
                    //update the items after the re-ordered item
                    for (var i = index + 2; i <= $(".admin_container tbody tr").length; i++)
                    {
                        $('.admin_container tbody tr:nth-child(' + i + ') .sort').html(i + $k).attr('data-ordering', i + $k);
                    }
                }
                changeordering();
            }
        });
    });
</script>
@endpush

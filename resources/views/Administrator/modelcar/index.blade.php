@extends('layouts.admin')
@section('content')

@if($items->count() > 0)
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel admin_container">
        <div class="x_title">
            <h2>{{ trans('admin.modelcar.main_title') }}</h2>
            <a class="btn btn-primary btn-sm pull-right" href="{{ route('modelcars.create') }}"> 
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
                        <th>ID</th>
                        <th>{{ trans('admin.modelcar.status') }}</th>
                        <th>{{ trans('admin.brand.main_title') }}</th>
                        <th>{{ trans('admin.modelcar.name') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $key =>  $item)
                    <tr style="cursor:move"  >
                        <td class="text-center sort" id="sort{{$key}}" data-id="{{$item->id}}" data-ordering ="{{ $item->sort }}">
                            {{$item->sort}}
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>
                            <div class="iradio">
                                <input type="checkbox" data-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }} class="js-switch change" />
                            </div>
                        </td>

                        <td>{{ $item->brand_name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm pull-right" 
                               href="{{ route('modelcars.edit' , $item->id) }}"> <i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a>
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
        {{ trans('admin.modelcar.add') }}
        <a class="btn btn-primary btn-sm pull-right" href="{{ route('modelcars.create') }}"> 
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
            url: "{{ route('AdminChangeStatusModelcar') }}",
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
                    url: "/admin/modelcars/" + ItemId,
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
            url: "{{ route('orderingModelcar') }}",
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

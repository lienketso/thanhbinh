@extends('wadmin-dashboard::master')
@section('content')
    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="">Danh sách Danh mục</a></li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title">Danh sách Danh mục</h4>
            <p>Danh sách Danh mục trên trang</p>
        </div>

        <div class="search_page">
            <div class="panel-body">
                <div class="row">
                    <form method="get">
                        <div class="col-sm-5">
                            <input type="text" name="name" placeholder="Nhập tiêu đề" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                            <a href="{{route('wadmin::cat.index.get')}}" class="btn btn-default">Làm lại</a>
                        </div>
                        <div class="col-sm-5">
                            <div class="button_more">
                                <a class="btn btn-primary" href="{{route('wadmin::cat.create.get')}}">Thêm mới</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                @if (session('edit'))
                    <div class="alert alert-info">{{session('edit')}}</div>
                @endif
                @if (session('create'))
                    <div class="alert alert-success">{{session('create')}}</div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-success">{{session('delete')}}</div>
                @endif
                <table class="table nomargin">
                    <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Thứ tự</th>
                        <th class="">Trạng thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->name}}</td>
                            <td><input type="number" min="0" name="sort_order" id="sortID_{{$d->id}}"
                                       class="sortclass"
                                       data-url="{{route('ajax.cat.order.get')}}"
                                       data-id="{{$d->id}}"
                                       data-old-sort="{{$d->sort_order}}"
                                       value="{{$d->sort_order}}"
                                >
                            </td>
                            <td><a href="{{route('wadmin::cat.change.get',$d->id)}}"
                                   class="btn btn-sm {{($d->status=='active') ? 'btn-success' : 'btn-warning'}} radius-30">
                                    {{($d->status=='active') ? 'Đang hiển thị' : 'Tạm ẩn'}}</a></td>
                            <td>
                                <ul class="table-options">
                                    <li><a href="{{route('wadmin::cat.edit.get',$d->id)}}"><i class="fa fa-pencil"></i></a></li>
                                    <li><a class="example-p-6" data-url="{{route('wadmin::cat.remove.get',$d->id)}}"><i class="fa fa-trash"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$data->links()}}
            </div><!-- table-responsive -->
        </div>
    </div>
@endsection

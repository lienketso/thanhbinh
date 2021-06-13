@extends('wadmin-dashboard::master')

@section('js-init')
    <script type="text/javascript">
        var node_blog = $('.node_blog');
        node_blog.hide();
        var node_page = $('.node_page');
        node_page.hide();

            var nodeType = $('select[name="type"]');
            if(nodeType.val() === 'blog'){
                node_blog.show();
            }
            if(nodeType.val() === 'page'){
            node_page.show();
            }

        nodeType.on('change', function (e) {
            var _this = $(e.currentTarget);
            var value = _this.val();
            if (value === 'blog') {
                node_blog.show();
                node_page.hide();
                $('#selectBlog').attr('disabled',false);
            }
            else if(value === 'page'){
                node_page.show();
                node_blog.hide();
                $('#selectBlog').attr('disabled',true);
            }
            else if(value === 'link'){
                node_page.hide();
                node_blog.hide();
                $('#urlLink').attr('readonly',false);
            }
        });

        $('select[id="selectBlog"]').on('change', function (e) {
            var selectedData = $(this).children("option:selected").text();
            var url = $(this).children("option:selected").val();
            $('input[name="name"]').val(selectedData);
            $('input[name="link"]').val(url);
            $('#urlLink').attr('readonly',true);
        });

        $('select[id="selectPage"]').on('change', function (e) {
            var selectedData = $(this).children("option:selected").text();
            var url = $(this).children("option:selected").val();
            $('input[name="name"]').val(selectedData);
            $('input[name="link"]').val(url);
            $('#urlLink').attr('readonly',true);
        });


    </script>

@endsection

@section('content')
    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="">Danh sách Danh mục</a></li>
    </ol>


    <div class="panel">
        <div class="row">
        <div class="col-sm-5">
            <div class="panel-heading">
                <h4 class="panel-title">Quản lý menu</h4>
                <p>Quản lý thông tin menu trên trang web.</p>
                @if (session('edit'))
                    <div class="alert alert-info">{{session('edit')}}</div>
                @endif
                @if (session('create'))
                    <div class="alert alert-success">{{session('create')}}</div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-success">{{session('delete')}}</div>
                @endif
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <hr>
                <form id="" action="" method="post" class="form-horizontal" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loại menu</label>
                        <div class="col-sm-8">
                            <select id="selectType" name="type" class="form-control" style="width: 100%" data-placeholder="">
                                <option value="0">--Chọn loại--</option>
                                <option value="blog">Danh mục bài viết</option>
                                <option value="page">Trang tĩnh</option>
                                <option value="link">Link khác</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group node_blog" >
                        <label class="col-sm-3 control-label">Danh mục bài viết</label>
                        <div class="col-sm-8">
                            <select id="selectBlog" name="blog" class="form-control" style="width: 100%" >
                                <option value="0">--Chọn danh mục--</option>
                                @foreach($listBlog as $b)
                                <option value="{{domain_url().'/blog/'.$b->slug}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group node_page" >
                        <label class="col-sm-3 control-label">Trang tĩnh</label>
                        <div class="col-sm-8">
                            <select id="selectPage" name="page" class="form-control" style="width: 100%" >
                                <option value="0">--Chọn trang tĩnh--</option>
                                @foreach($listPage as $b)
                                    <option value="{{domain_url().'/page/'.$b->slug}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên menu <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên menu" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Danh mục cha</label>
                        <div class="col-sm-8">
                        <select id="" name="parent" class="form-control" style="width: 100%" data-placeholder="">
                            <option value="0">--Không chọn--</option>
                           {{$menuModel->optionMenu(0,1,4,0,0)}}
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Thứ tự </label>
                        <div class="col-sm-8">
                            <input type="number" min="0" name="sort_order" value="{{0}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">URL</label>
                        <div class="col-sm-8">
                            <input type="text" id="urlLink" name="link" class="form-control">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-success btn-quirk btn-wide mr5" type="submit">Thêm mới</button>
                            <button type="reset" class="btn btn-quirk btn-wide btn-default">Làm lại</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
            <div class="col-sm-7">
                <div class="list_menu_home">
                <h3 class="text-center mb-4 bg-info title_head">Danh sách menu</h3>
                <ul id="tree1" class="tree1">
                    @foreach($menus as $menu)
                        <li>
                            {{ $menu->name }} <span><a href="{{route('wadmin::menu.edit.get',$menu->id)}}"><i class="fa fa-pencil"></i></a>
                                <a class="example-p-6" href="javascript:void(0)" data-url="{{route('wadmin::menu.remove.get',$menu->id)}}"><i class="fa fa-trash"></i></a></span>

                        </li>
                        @if(count($menu->childs))
                            @include('wadmin-menu::blocks.manageChild',['childs' => $menu->childs])
                        @endif
                    @endforeach
                </ul>
                </div>
            </div>

        </div>
    </div>

@endsection

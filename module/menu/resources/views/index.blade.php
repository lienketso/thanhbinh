@extends('wadmin-dashboard::master')

@section('js-init')
    <script type="text/javascript">
        var node_blog = $('.node_blog');
        node_blog.hide();
        var node_page = $('.node_page');
        node_page.hide();
        var node_product = $('.node_product');
        node_product.hide();

            var nodeType = $('select[name="type"]');
            if(nodeType.val() === 'blog'){
                node_blog.show();
            }
            if(nodeType.val() === 'page'){
            node_page.show();
            }
            if(nodeType.val() === 'product'){
            node_product.show();
            }

        nodeType.on('change', function (e) {
            var _this = $(e.currentTarget);
            var value = _this.val();
            if (value === 'blog') {
                node_blog.show();
                node_page.hide();
                node_product.hide();
                $('#selectBlog').attr('disabled',false);
            }
            else if (value === 'product') {
                node_product.show();
                node_blog.hide();
                node_page.hide();
                $('#selectProduct').attr('disabled',false);
            }
            else if(value === 'page'){
                node_page.show();
                node_blog.hide();
                node_product.hide();
                $('#selectBlog').attr('disabled',true);
            }
            else if(value === 'link'){
                node_page.hide();
                node_blog.hide();
                node_product.hide();
                $('#urlLink').attr('readonly',false);
            }
        });

        $('select[id="selectBlog"]').on('change', function (e) {
            var selectedData = $(this).children("option:selected").text();
            var idType = $(this).children('option:selected').attr('data-id');

            var url = $(this).children("option:selected").val();
            $('input[name="name"]').val(selectedData);
            $('input[name="link"]').val(url);
            $('#typeID').val(idType);
            $('#urlLink').attr('readonly',true);
        });

        $('select[id="selectProduct"]').on('change', function (e) {
            var selectedData = $(this).children("option:selected").text();
            var idType = $(this).children('option:selected').attr('data-id');
            var url = $(this).children("option:selected").val();
            $('input[name="name"]').val(selectedData);
            $('input[name="link"]').val(url);
            $('#typeID').val(idType);
            $('#urlLink').attr('readonly',true);
        });

        $('select[id="selectPage"]').on('change', function (e) {
            var selectedData = $(this).children("option:selected").text();
            var idType = $(this).children('option:selected').attr('data-id');
            var url = $(this).children("option:selected").val();
            $('input[name="name"]').val(selectedData);
            $('input[name="link"]').val(url);
            $('#typeID').val(idType);
            $('#urlLink').attr('readonly',true);
        });


    </script>

@endsection

@section('content')
    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="">Danh s??ch Danh m???c</a></li>
    </ol>


    <div class="panel">
        <div class="row">
        <div class="col-sm-5">
            <div class="panel-heading">
                <h4 class="panel-title">Qu???n l?? menu</h4>
                <p>Qu???n l?? th??ng tin menu tr??n trang web.</p>
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
                        <label class="col-sm-3 control-label">Lo???i menu</label>
                        <div class="col-sm-8">
                            <select id="selectType" name="type" class="form-control" style="width: 100%" data-placeholder="">
                                <option value="0">--Ch???n lo???i--</option>
                                <option value="blog">Danh m???c b??i vi???t</option>
                                <option value="product">Danh m???c s???n ph???m</option>
                                <option value="page">Trang t??nh</option>
                                <option value="link">Link kh??c</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group node_blog" >
                        <label class="col-sm-3 control-label">Danh m???c b??i vi???t</label>
                        <div class="col-sm-8">
                            <select id="selectBlog" name="blog" class="form-control" style="width: 100%" >
                                <option value="0">--Ch???n danh m???c--</option>
                                @foreach($listBlog as $b)
                                <option data-id="{{$b->id}}" value="{{domain_url().'/blog/'.$b->slug}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group node_product" >
                        <label class="col-sm-3 control-label">Danh m???c s???n ph???m</label>
                        <div class="col-sm-8">
                            <select id="selectProduct" name="blog" class="form-control" style="width: 100%" >
                                <option value="0">--Ch???n danh m???c--</option>
                                @foreach($listCatProduct as $c)
                                    <option data-id="{{$c->id}}" value="{{domain_url().'/category/'.$c->slug}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group node_page" >
                        <label class="col-sm-3 control-label">Trang t??nh</label>
                        <div class="col-sm-8">
                            <select id="selectPage" name="page" class="form-control" style="width: 100%" >
                                <option value="0">--Ch???n trang t??nh--</option>
                                @foreach($listPage as $b)
                                    <option data-id="{{$b->id}}" value="{{domain_url().'/page/'.$b->slug}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">T??n menu <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" placeholder="Nh???p t??n menu" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Danh m???c cha</label>
                        <div class="col-sm-8">
                        <select id="" name="parent" class="form-control" style="width: 100%" data-placeholder="">
                            <option value="0">--Kh??ng ch???n--</option>
                           {{$menuModel->optionMenu(0,1,4,0,0)}}
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Th??? t??? </label>
                        <div class="col-sm-8">
                            <input type="number" min="0" name="sort_order" value="{{0}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">URL</label>
                        <div class="col-sm-8">
                            <input type="hidden" id="typeID" name="type_id" value="">
                            <input type="text" id="urlLink" name="link" class="form-control">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-success btn-quirk btn-wide mr5" type="submit">Th??m m???i</button>
                            <button type="reset" class="btn btn-quirk btn-wide btn-default">L??m l???i</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
            <div class="col-sm-7">
                <div class="list_menu_home">
                <h3 class="text-center mb-4 bg-info title_head">Danh s??ch menu</h3>
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

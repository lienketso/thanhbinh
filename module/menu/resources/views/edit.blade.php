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
            if (value === 'product') {
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
            let public_url = window.location.protocol+'//'+window.location.hostname;
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
        <li><a href="{{route('wadmin::menu.index.get')}}">Menu</a></li>
        <li class="active">S???a Menu</li>
    </ol>

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">S???a Menu</h4>
                        <p>B???n c???n nh???p ?????y ????? c??c th??ng tin ????? S???a Menu </p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lo???i menu</label>
                            <div class="col-sm-8">
                                <select id="selectType" name="type" class="form-control" style="width: 100%" data-placeholder="">
                                    <option value="0">--Ch???n lo???i--</option>
                                    <option value="blog" {{($data->type=='blog') ? 'selected' : ''}}>Danh m???c b??i vi???t</option>
                                    <option value="product" {{($data->type=='product') ? 'selected' : ''}}>Danh m???c s???n ph???m</option>
                                    <option value="page" {{($data->type=='page') ? 'selected' : ''}}>Trang t??nh</option>
                                    <option value="link" {{($data->type=='link') ? 'selected' : ''}}>Link kh??c</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group node_blog" >
                            <label class="col-sm-3 control-label">Danh m???c b??i vi???t</label>
                            <div class="col-sm-8">
                                <select id="selectBlog" name="blog" class="form-control" style="width: 100%" >
                                    <option value="0">--Ch???n danh m???c--</option>
                                    @foreach($listBlog as $b)
                                        <option data-id="{{$b->id}}" value="{{domain_url().'/blog/'.$b->slug}}" {{($b->slug==str_slug($data->name))?'selected' : ''}} >{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group node_product" >
                            <label class="col-sm-3 control-label">Danh m???c s???n ph???m</label>
                            <div class="col-sm-8">
                                <select id="selectProduct" name="product" class="form-control" style="width: 100%" >
                                    <option value="0">--Ch???n danh m???c--</option>
                                    @foreach($listCatProduct as $c)
                                        <option data-id="{{$c->id}}" value="{{domain_url().'/category/'.$c->slug}}" {{($c->slug==str_slug($data->name) ? 'selected' : '')}} >{{$c->name}}</option>
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
                                <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Nh???p t??n menu" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Danh m???c cha</label>
                            <div class="col-sm-8">
                                <select id="" name="parent" class="form-control" style="width: 100%" data-placeholder="">
                                    <option value="0">--Kh??ng ch???n--</option>
                                   {{$menuModel->optionMenu(0,1,4,$data->parent,$data->id)}}
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">URL</label>
                            <div class="col-sm-8">
                                <input type="text" id="urlLink" value="{{$data->link}}" name="link" class="form-control">
                                <input type="hidden" name="type_id" id="typeID" value="{{$data->type_id}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">L??u l???i</button>
                            <button class="btn btn-success" name="continue_post" value="1">L??u v?? ti???p t???c th??m</button>
                        </div>
                    </div>
                </div><!-- panel -->

            </div><!-- col-sm-6 -->

            <!-- ####################################################### -->

            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">T??y ch???n th??m</h4>
                        <p>Th??ng tin c??c t??y ch???n th??m </p>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Th??? t??? ??u ti??n</label>
                            <input class="form-control"
                                   name="sort_order"
                                   type="number"
                                   min="0"
                                   value="{{$data->sort_order}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Tr???ng th??i</label>
                            <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Tr???ng th??i">
                                <option value="active" {{ ($data->status=='active') ? 'selected' : ''}}>Hi???n th???</option>
                                <option value="disable" {{ ($data->status=='disable') ? 'selected' : ''}}>T???m ???n</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <button class="btn btn-primary">L??u l???i</button>
                            <button class="btn btn-success" name="continue_post" value="1">L??u v?? ti???p t???c th??m</button>
                        </div>

                    </div><!-- col-sm-6 -->
                </div><!-- row -->

            </div>

        </form>
    </div>
@endsection

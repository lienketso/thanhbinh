@extends('wadmin-dashboard::master')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/themes/lib/select2/select2.css')}}">
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/libs/ckfinder/ckfinder.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/main.js')}}"></script>
    <script src="{{asset('admin/themes/lib/select2/select2.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{asset("admin/libs/ckfinder/ckfinder.html")}}',
            filebrowserImageBrowseUrl: '{{asset("admin/libs/ckfinder/ckfinder.html?type=Images")}}',
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}', //route dashboard/upload
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script type="text/javascript">
        $("#select1").select2({  });
    </script>
@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::product.index.get')}}">Sản phẩm</a></li>
        <li class="active">Thêm sản phẩm</li>
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
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Thêm sản phẩm</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để thêm sản phẩm mới</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   value="{{old('name')}}"
                                   placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <textarea id="" name="description" class="form-control" rows="3" placeholder="Mô tả ngắn sản phẩm">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung sản phẩm</label>
                            <textarea id="editor1" name="content" class="form-control makeMeRichTextarea" rows="3" placeholder="Nội dung sản phẩm">{{old('content')}}</textarea>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Giá sản phẩm</label>--}}
{{--                            <input class="form-control"  onkeyup="this.value=FormatNumber(this.value);" name="price" value="{{old('price',0)}}" type="text" placeholder="Giá bán">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Giá cũ</label>--}}
{{--                            <input class="form-control" onkeyup="this.value=FormatNumber(this.value);" name="disprice" value="{{old('disprice',0)}}" type="text" placeholder="Giá gốc">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Giảm giá (%)</label>--}}
{{--                            <input class="form-control" min="0" max="100" name="discount" value="{{old('discount',0)}}" type="number" placeholder="Giảm giá">--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Thẻ Meta title</label>
                            <input class="form-control"
                                   name="meta_title"
                                   type="text"
                                   value="{{old('meta_title')}}"
                                   placeholder="Nhập hoặc để trống tự động lấy theo tên">
                        </div>
                        <div class="form-group">
                            <label>Thẻ meta description</label>
                            <textarea id="" name="meta_desc" class="form-control" rows="3" placeholder="Thẻ Meta description">{{old('meta_desc')}}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
                        </div>
                    </div>
                </div><!-- panel -->

            </div><!-- col-sm-6 -->

            <!-- ####################################################### -->

            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tùy chọn thêm</h4>
                        <p>Thông tin các tùy chọn thêm </p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select id="" name="cat_id" class="form-control" style="width: 100%" data-placeholder="Danh mục sản phẩm">
                                <option value="">--Chọn danh mục--</option>
                                {{$catmodel->optionCat(0,1,4,0,0)}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhà máy</label>
                            <select id="" name="factory_id" class="form-control" style="width: 100%" >
                                <option value="0">--Chọn nhà máy--</option>
                                @foreach($factory as $d)
                                <option value="{{$d->id}}" {{(old('factory_id')==$d->id) ? 'selected' : '' }} >{{$d->name}}</option>
                               @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Vị trí hiển thị</label>
                            <select id="" name="display" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="0" {{ (old('display') ==0 ) ? 'selected' : ''}}>Không chọn</option>
                                <option value="2" {{ (old('display') ==2 ) ? 'selected' : ''}}>Nổi bật</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b>Hiển thị trên trang</b> (Cho phép sản phẩm của nhà máy hiển thị trong các danh mục trên trang chính)</label>
                            <label class="rdiobox">
                                <input type="radio" value="{{old('main_display',0)}}" name="main_display" checked="">
                                <span>Không hiển thị</span>
                            </label>
                            <label class="rdiobox">
                                <input type="radio" value="{{old('main_display',1)}}" name="main_display" >
                                <span>Có hiển thị</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái ( Cho phép hiển thị hoặc tạm ẩn sản phẩm )</label>
                            <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="active" {{ (old('status')=='active') ? 'selected' : ''}}>Hiển thị</option>
                                <option value="disable" {{ (old('status')=='disable') ? 'selected' : ''}}>Tạm ẩn</option>
                            </select>
                        </div>

{{--                        <div class="form-group mb-3">--}}
{{--                            <label>Ảnh đại diện</label>--}}
{{--                            <div class="custom-file">--}}
{{--                                <input type="file" name="thumbnail" value="{{old('thumbnail')}}" class="custom-file-input" id="inputGroupFile01" >--}}
{{--                                <label class="custom-file-label" for="inputGroupFile01">{{old('thumbnail')}}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <div class="input-group col-xs-12" style="display: flex">
                                <input type="text" name="thumbnail" value="<?= old('thumbnail'); ?>" id="ckfinder-input-1" class="form-control file-upload-info" placeholder="Upload Image">
                                <span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="ckfinder-popup-1"  type="button">Chọn ảnh</button>
							</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
                        </div>

                    </div><!-- col-sm-6 -->
                </div><!-- row -->

            </div>

        </form>
    </div>
@endsection

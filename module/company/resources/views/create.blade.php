@extends('wadmin-dashboard::master')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/themes/lib/select2/select2.css')}}">
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/libs/ckfinder/ckfinder_v1.js')}}"></script>
    <script src="{{asset('admin/themes/lib/select2/select2.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}', //route dashboard/upload
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script type="text/javascript">
        $("#select6").select2({ tags: true, maximumSelectionLength: 3 });
    </script>
@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::company.index.get')}}">Công ty</a></li>
        <li class="active">Thêm Công ty</li>
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
                        <h4 class="panel-title">Thêm công ty</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để thêm công ty mới</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tên công ty</label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   value="{{old('name')}}"
                                   placeholder="Tên công ty">
                        </div>
                        <div class="form-group">
                            <label>Thành phố</label>
                            <input class="form-control"
                                   name="city"
                                   type="text"
                                   value="{{old('city')}}"
                                   placeholder="Tên thành phố">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control"
                                   name="address"
                                   type="text"
                                   value="{{old('address')}}"
                                   placeholder="Địa chỉ chi tiết">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control"
                                   name="email"
                                   type="text"
                                   value="{{old('email')}}"
                                   placeholder="Địa chỉ email">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control"
                                   name="phone"
                                   type="text"
                                   value="{{old('phone')}}"
                                   placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label>Lĩnh vực ngành nghề</label>
                            <select id="select6" class="form-control select2-hidden-accessible" name="cat_id[]" style="width: 100%"
                                    data-placeholder="Chọn các ngành" multiple="" tabindex="-1" aria-hidden="true">
                                @foreach($categoryList as $c)
                                    <option value="{{$c->id}}" >{{$c->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <textarea id="" name="description" class="form-control" rows="3" placeholder="Mô tả ngắn">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung về công ty</label>
                            <textarea id="editor1" name="content" class="form-control makeMeRichTextarea" rows="3" placeholder="Nội dung bài viết">{{old('content')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Thẻ Meta title</label>
                            <input class="form-control"
                                   name="meta_title"
                                   type="text"
                                   value="{{old('meta_title')}}"
                                   placeholder="">
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
                            <label>Mã số thuế</label>
                            <input class="form-control"
                                   name="tax_name"
                                   type="text"
                                   value="{{old('tax_name')}}"
                                   placeholder="Mã số doanh nghiệp">
                        </div>
                        <div class="form-group">
                            <label>Vốn điều lệ</label>
                            <input class="form-control"
                                   name="moneyrule"
                                   type="text"
                                   value="{{old('moneyrule')}}"
                                   placeholder="Vốn điều lệ">
                        </div>
                        <div class="form-group">
                            <label>Năm thành lập</label>
                            <input class="form-control"
                                   name="operating_year"
                                   type="text"
                                   value="{{old('operating_year')}}"
                                   placeholder="Năm thành lập">
                        </div>
                        <div class="form-group">
                            <label>Loại hình công ty</label>
                            <select id="" name="legal_type" class="form-control" style="width: 100%" >
                                <option value="1" {{ (old('legal_type') ==1) ? 'selected' : ''}}>Công ty cổ phần</option>
                                <option value="2" {{ (old('legal_type') ==2 ) ? 'selected' : ''}}>Công ty TNHH</option>
                                <option value="3" {{ (old('legal_type') ==3 ) ? 'selected' : ''}}>Công ty tư nhân</option>
                                <option value="4" {{ (old('legal_type') ==4 ) ? 'selected' : ''}}>Công ty hợp doanh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tình trạng hoạt động</label>
                            <select id="" name="operating_status" class="form-control" style="width: 100%" >
                                <option value="active" {{ (old('operating_status')=='active') ? 'selected' : ''}}>Đang hoạt động</option>
                                <option value="disable" {{ (old('operating_status')=='disable') ? 'selected' : ''}}>Ngừng hoạt động</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vị trí hiển thị</label>
                            <select id="" name="display" class="form-control" style="width: 100%" >
                                <option value="0" {{ (old('display') ==0 ) ? 'selected' : ''}}>Không chọn</option>
                                <option value="1" {{ (old('display') ==1 ) ? 'selected' : ''}}>Top Hot</option>
                                <option value="2" {{ (old('display') ==2 ) ? 'selected' : ''}}>Latest home</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="active" {{ (old('status')=='active') ? 'selected' : ''}}>Hiển thị</option>
                                <option value="disable" {{ (old('status')=='disable') ? 'selected' : ''}}>Tạm ẩn</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Ảnh đại diện</label>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" value="{{old('thumbnail')}}" class="custom-file-input" id="inputGroupFile01" >
                                <label class="custom-file-label" for="inputGroupFile01">{{old('thumbnail')}}</label>
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

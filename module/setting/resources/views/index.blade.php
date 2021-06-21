@extends('wadmin-dashboard::master')

@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/libs/ckfinder/ckfinder_v1.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}',
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::setting.index.get')}}">Cấu hình chung</a></li>
        <li class="active">Thông tin cấu hình</li>
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
                        <h4 class="panel-title">Thông tin cấu hình chung</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để cấu hình thông tin mong muốn</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control"
                                   name="site_name_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('site_name_'.$language)}}"
                                   placeholder="Tên website">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="" name="site_description_{{$language}}" class="form-control" rows="3"
                                      placeholder="Mô tả website">{{$setting->getSettingMeta('site_description_'.$language)}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Số hotline</label>
                            <input class="form-control" name="site_hotline_{{$language}}" value="{{$setting->getSettingMeta('site_hotline_'.$language)}}" type="text" placeholder="Số hotline">
                        </div>
                        <div class="form-group">
                            <label>Số hotline 2</label>
                            <input class="form-control" name="site_hotline_2_{{$language}}" value="{{$setting->getSettingMeta('site_hotline_2_'.$language)}}" type="text" placeholder="Số điện thoại khác">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control"
                                   name="site_address_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('site_address_'.$language)}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control"
                                   name="site_email_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('site_email_'.$language)}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Iframe google map</label>
                            <textarea id="" name="site_goolge_map"
                                      class="form-control makeMeRichTextarea" rows="4"
                                      placeholder="">{{$setting->getSettingMeta('site_goolge_map')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Link facebook</label>
                            <input class="form-control"
                                   name="site_facebook"
                                   type="text"
                                   value="{{$setting->getSettingMeta('site_facebook')}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Link Twitter</label>
                            <input class="form-control"
                                   name="site_twitter"
                                   type="text"
                                   value="{{$setting->getSettingMeta('site_twitter')}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Link Instagram</label>
                            <input class="form-control"
                                   name="site_instagram"
                                   type="text"
                                   value="{{$setting->getSettingMeta('site_instagram')}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Nội dung trang nhà máy</label>
                            <textarea id="editor1" name="site_footer_info_{{$language}}"
                                      class="form-control makeMeRichTextarea" rows="3"
                                      placeholder="Nội dung mục chân trang">{{$setting->getSettingMeta('site_footer_info_'.$language)}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Banner trang nhà máy</label>
                            <div class="custom-file">
                                <input type="file" name="banner_factory" value="" class="custom-file-input" id="inputGroupFile01" >
                                <div class="thumbnail_w" style="padding-top: 10px">
                                    <img src="{{ ($setting->getSettingMeta('banner_factory')!='null') ? upload_url($setting->getSettingMeta('banner_factory')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                </div>
                            </div>
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

                        <div class="form-group mb-3">
                            <label>Ảnh logo</label>
                            <div class="custom-file">
                                <input type="file" name="site_logo" value="" class="custom-file-input" id="inputGroupFile01" >
                                <div class="thumbnail_w" style="padding-top: 10px">
                                <img src="{{ ($setting->getSettingMeta('site_logo')!='null') ? upload_url($setting->getSettingMeta('site_logo')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tải lên profile</label>
                            <div class="custom-file">
                                <input type="file" name="site_profile" value="" class="custom-file-input" id="inputGroupFile01" >
                                <div class="thumbnail_w" style="padding-top: 10px">
                                    <a href="{{upload_url($setting->getSettingMeta('site_profile'))}}"> <i class="fa fa-file-pdf-o"></i> File is here</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Banner trang dự án</label>
                            <div class="custom-file">
                                <input type="file" name="banner_project" value="" class="custom-file-input" id="" >
                                <div class="thumbnail_w" style="padding-top: 10px">
                                    <img src="{{ ($setting->getSettingMeta('banner_project')!='null') ? upload_url($setting->getSettingMeta('banner_project')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Banner trang sản phẩm</label>
                            <div class="custom-file">
                                <input type="file" name="banner_product" value="" class="custom-file-input" id="" >
                                <div class="thumbnail_w" style="padding-top: 10px">
                                    <img src="{{ ($setting->getSettingMeta('banner_product')!='null') ? upload_url($setting->getSettingMeta('banner_product')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Banner trang liên hệ</label>
                            <div class="custom-file">
                                <input type="file" name="banner_contact" value="" class="custom-file-input" id="" >
                                <div class="thumbnail_w" style="padding-top: 10px">
                                    <img src="{{ ($setting->getSettingMeta('banner_contact')!='null') ? upload_url($setting->getSettingMeta('banner_contact')) :  public_url('admin/themes/images/no-image.png')}}" width="100" alt="">
                                </div>
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

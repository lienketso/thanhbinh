<?php


namespace Setting\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Setting\Models\Setting;
use Setting\Repositories\SettingRepositories;

class SettingController extends BaseController
{
    protected $model;
    protected $langcode;
    public function __construct(SettingRepositories $settingRepositories)
    {
        $this->model = $settingRepositories;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $setting = $this->model;
        $langcode = $this->langcode;
        return view('wadmin-setting::index',['setting'=>$setting,'language'=>$langcode]);
    }

    public function getFact(){
        $setting = $this->model;
        $langcode = $this->langcode;
        return view('wadmin-setting::fact',['setting'=>$setting,'language'=>$langcode]);
    }

    public function getKeyword(){
        $setting = $this->model;
        $langcode = $this->langcode;
        return view('wadmin-setting::keyword',['setting'=>$setting,'language'=>$langcode]);
    }

    public function getAbout(){
        $setting = $this->model;
        $langcode = $this->langcode;
        $check = $this->model->getSettingMeta('about_section_list_1_title_'.$langcode);

        $checkList = json_decode($check);
        return view('wadmin-setting::about',['setting'=>$setting,'language'=>$langcode,'checkList'=>$checkList]);
    }

    public function postAbout(Request $request){
        $langcode = $this->langcode;
        $data = $request->except('_token');
        if($request->hasFile('about_banner_page')){
            $image = $request->about_banner_page;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['about_banner_page'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('about_section_1_img')){
            $image = $request->about_section_1_img;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['about_section_1_img'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('about_section_2_img')){
            $image = $request->about_section_2_img;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['about_section_2_img'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('about_section_3_img')){
            $image = $request->about_section_3_img;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['about_section_3_img'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }

        $about_title = $data['about_section_list_1_title_'.$langcode];
        $data['about_section_list_1_title_'.$langcode] = json_encode($about_title);


        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function saveSetting($data){
        foreach($data as $key=>$val){
            Setting::updateOrCreate(['setting_key'=>$key],['setting_value'=>$val]);
        }
    }

    public function postIndex(Request $request){
        $data = $request->except('_token');
        if($request->hasFile('site_logo')){
            $image = $request->site_logo;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['site_logo'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('site_profile')){
            $image = $request->site_profile;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['site_profile'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('banner_factory')){
            $image = $request->banner_factory;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['banner_factory'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('banner_project')){
            $image = $request->banner_project;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['banner_project'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('banner_product')){
            $image = $request->banner_product;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['banner_product'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('banner_contact')){
            $image = $request->banner_contact;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['banner_contact'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function postFact(Request $request){
        $data = $request->except(['_token']);
        if($request->hasFile('fact_image')){
            $image = $request->fact_image;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['fact_image'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        if($request->hasFile('fact_background')){
            $image = $request->fact_background;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['fact_background'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function postKeyword(Request $request){
        $data = $request->except('_token');
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }


}

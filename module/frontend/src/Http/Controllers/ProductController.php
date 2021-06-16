<?php


namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
use Product\Models\Product;
use Product\Repositories\CatproductRepository;
use Product\Repositories\ProductRepository;

class ProductController extends BaseController
{
    protected $model;
    protected $lang;
    protected $cat;
    public function __construct(ProductRepository $productRepository, CatproductRepository $catproductRepository)
    {
        $this->model = $productRepository;
        $this->lang = session('lang');
        $this->cat = $catproductRepository;
    }

    public function index($slug){
        $catInfor = $this->cat->findWhere(['slug'=>$slug])->first();

        $data = $this->model->scopeQuery(function ($e) use ($catInfor){
            return $e->orderBy('created_at','desc')->where('cat_id',$catInfor->id)
                ->where('status',1)->where('lang_code',$this->lang);
        })->paginate(20);

        //all category
        $allCatProduct = $this->cat->with('getProductCat')->orderBy('sort_order','asc')
            ->findWhere(['status'=>'active','lang_code'=>$this->lang,'parent'=>0])->all();

        //cấu hình các thẻ meta
        $meta_title = $catInfor->meta_title;
        $meta_desc = cut_string($catInfor->meta_desc,190);
        $meta_url = route('frontend::product.index.get',$catInfor->slug);
        if($catInfor->thumbnail!=''){
            $meta_thumbnail = upload_url($catInfor->thumbnail);
        }else{
            $meta_thumbnail = public_url('admin/themes/images/no-image.png');
        }
        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

        return view('frontend::product.index',[
            'catInfor'=>$catInfor,
            'data'=>$data,
            'allCatProduct'=>$allCatProduct
        ]);
    }

    public function detail($slug){
        $data = $this->model->findWhere(['slug'=>$slug])->first();
        //related product
        $relatedProduct = $this->model->scopeQuery(function ($e) use($data){
            return $e->orderBy('created_at','desc')->where('cat_id',$data->cat_id)->where('id','!=',$data->id);
        })->limit(8);

        $catInforName = $this->cat->findWhere(['id'=>$data->cat_id])->first();

        //cấu hình các thẻ meta
        $meta_title = $data->meta_title;
        $meta_desc = cut_string($data->meta_desc,190);
        $meta_url = route('frontend::product.detail.get',$data->slug);
        if($data->thumbnail!=''){
            $meta_thumbnail = upload_url($data->thumbnail);
        }else{
            $meta_thumbnail = public_url('admin/themes/images/no-image.png');
        }
        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

        //update count view
        $input['count_view'] = $data->count_view+1;
        $this->model->update($input,$data->id);
        //end update count view

        return view('frontend::product.detail',['data'=>$data,'relatedProduct'=>$relatedProduct,'catInforName'=>$catInforName]);
    }

    function search(Request $request){
        $name = $request->get('name');
        $q = Product::query();

        if (!is_null($name))
        {
            $q = $q->where('name','LIKE', '%'.$name.'%');
        }

        $data = $q->orderBy('created_at','desc')
            ->where('lang_code',$this->lang)
            ->where('status','active')->paginate(15);

        $allCategory = $this->cat->orderBy('sort_order','asc')->findWhere(['status'=>1,'lang_code'=>$this->lang])->all();
        $countProduct = $this->model->findWhere(['lang_code'=>$this->lang,'status'=>'active'])->count();
        return view('frontend::product.search',[
            'data'=>$data,
            'allCategory'=>$allCategory,
            'countProduct'=>$countProduct,
            'name'=>$name
        ]);
    }

}

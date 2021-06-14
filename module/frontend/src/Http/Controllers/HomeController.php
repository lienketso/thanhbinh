<?php


namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Company\Repositories\CompanyRepository;
use Contact\Http\Requests\ContactCreateRequest;
use Contact\Repositories\ContactRepository;
use Gallery\Repositories\GalleryRepository;
use Illuminate\Http\Request;
use Newsletter\Repositories\NewsletterRepository;
use Post\Repositories\PostRepository;
use Product\Repositories\CatproductRepository;
use Product\Repositories\ProductRepository;
use Transaction\Http\Requests\TransactionCreateRequest;
use Transaction\Repositories\TransactionRepository;

class HomeController extends BaseController
{
    protected $com;
    protected $lang;
    protected $cat;
    protected $ga;
    protected $po;
    public function __construct(CompanyRepository $companyRepository,CatproductRepository $catproductRepository,
                                GalleryRepository $galleryRepository, ProductRepository $productRepository)
    {
        $this->lang = session('lang');
        $this->com = $companyRepository;
        $this->cat = $catproductRepository;
        $this->ga = $galleryRepository;
        $this->po = $productRepository;
    }

    private $langActive = ['vn','en'];
    public function changeLang(Request $request, $lang){
        if(in_array($lang,$this->langActive)){
            $request->session()->put(['lang'=>$lang]);
            return redirect()->back();
        }
    }
    function getIndex(PostRepository $postRepository){

        $gallery = $this->ga->scopeQuery(function ($e){
            return $e->orderBy('sort_order','asc')
                ->where('status','active')
                ->where('lang_code',$this->lang);
        })->limit(20);

        $popularCat = $this->cat->scopeQuery(function($e){
           return $e->orderBy('sort_order','asc')->where('status',1)->where('lang_code',$this->lang)->get();
        })->limit(4);

        $pageAbout = $postRepository->findWhere(['lang_code'=>$this->lang,'status'=>'active','display'=>1,'post_type'=>'page'])->first();

        $linhVuc = $postRepository->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')
                ->where('lang_code',$this->lang)
                ->where('status','active')
                ->where('post_type','page')
                ->where('display',2)->get();
        })->limit(4);

        //sản phẩm nổi bật
        $productHot = $this->po->scopeQuery(function ($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('display',2)->get();
        })->limit(20);
        //dự án nổi bật
        $projectHot = $postRepository->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('display',1)
                ->where('post_type','project')
                ->get();
        })->limit(6);

        return view('frontend::home.index',[
            'gallery'=>$gallery,
            'productHot'=>$productHot,
            'popularCat'=>$popularCat,
            'linhVuc'=>$linhVuc,
            'pageAbout'=>$pageAbout,
            'projectHot'=>$projectHot
        ]);
    }

    public function contact(){
        return view('frontend::contact.contact');
    }
    public function postContact(ContactCreateRequest $request, ContactRepository $contactRepository){
            $input = $request->except(['_token']);
            $contactRepository->create($input);
            return view('frontend::contact.success',['data'=>$input]);
    }

    public function createNewletter(Request $request, NewsletterRepository $newsletterRepository){
        $email = $request->get('email');
        $input = ['email'=>$email];
        $newsletterRepository->create($input);
        echo 'Subscribe successful !';
    }

    public function createPartner(TransactionCreateRequest $request, TransactionRepository $transactionRepository){
        $input = $request->except(['_token']);
        try{
            $create = $transactionRepository->create($input);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}

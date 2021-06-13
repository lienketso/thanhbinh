<?php


namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Company\Repositories\CompanyRepository;
use Contact\Http\Requests\ContactCreateRequest;
use Contact\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Newsletter\Repositories\NewsletterRepository;
use Post\Repositories\PostRepository;
use Product\Repositories\CatproductRepository;
use Transaction\Http\Requests\TransactionCreateRequest;
use Transaction\Models\Transaction;
use Transaction\Repositories\TransactionRepository;

class HomeController extends BaseController
{
    protected $com;
    protected $lang;
    protected $cat;
    public function __construct(CompanyRepository $companyRepository,CatproductRepository $catproductRepository)
    {
        $this->lang = session('lang');
        $this->com = $companyRepository;
        $this->cat = $catproductRepository;
    }

    private $langActive = ['vn','en'];
    public function changeLang(Request $request, $lang){
        if(in_array($lang,$this->langActive)){
            $request->session()->put(['lang'=>$lang]);
            return redirect()->back();
        }
    }
    function getIndex(PostRepository $postRepository){
        //dd(config('app.locale'));
        $topHotCompany = $this->com->scopeQuery(function ($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')->where('display',1)->where('lang_code',$this->lang);
        })->limit(8);
        $latestCompany = $this->com->scopeQuery(function ($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')->where('lang_code',$this->lang)->where('display',2);
        })->limit(8);

        $popularCat = $this->cat->scopeQuery(function($e){
           return $e->orderBy('sort_order','asc')->where('status',1)->where('lang_code',$this->lang)->get(['name','slug']);
        })->limit(4);

        $allCat = $this->cat->orderBy('sort_order','asc')->findWhere(['status'=>1,'lang_code'=>$this->lang])->all();

        $catHome = $this->cat->scopeQuery(function($e){
            return $e->orderBy('sort_order','asc')->where('status',1)->where('lang_code',$this->lang)->get(['name','slug']);
        })->limit(8);

        $pageAbout = $postRepository->findWhere(['lang_code'=>$this->lang,'status'=>'active','display'=>1])->first();

        return view('frontend::home.index',[
            'topHotCompany'=>$topHotCompany,
            'latestCompany'=>$latestCompany,
            'popularCat'=>$popularCat,
            'allCat'=>$allCat,
            'catHome'=>$catHome,
            'pageAbout'=>$pageAbout
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

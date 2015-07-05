<?php namespace App\Http\Controllers;


use App\Mircurius\Repositories\Category\CategoryRepository;
use App\Mircurius\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $product;
    private $category;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        //$this->middleware('auth');

        $this->product = $productRepository;

        $this->category = $categoryRepository;
    }


    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
$curl = curl_init('https://www.sima-land.ru/api/v2/item/577397?expand=photo');

curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($curl);
curl_close($curl);
       dd($json);
        return view('index');
    }



}

<?php namespace App\Http\Controllers;


use App\Mircurius\Repositories\Category\CategoryRepository;
use App\Mircurius\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Input;

use App\Mircurius\Models\Category;

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
    public function getIndex()
    {
        return view('home.index', [
            'products'=>  $this->product->getAll()
        ]);
    }

    public function getContact()
    {
        return view('home.contact');
    }

    public function getAbout()
    {
        return view('home.about');
    }
    public function getRules()
    {
        return view('home.rules');
    }


}

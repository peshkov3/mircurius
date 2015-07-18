<?php namespace App\Http\Controllers;


use App\Mircurius\Models\Product;
use App\Mircurius\Repositories\Category\CategoryRepository;
use App\Mircurius\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Input;

use App\Mircurius\Models\Category;

class CategoryController extends Controller
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
        return view('index');
    }

    public function getList($one)
    {

        $id =  $one;

        $v = Validator::make(['id' => $id], ['id' => 'required|integer']);

        if ($v->fails()) abort(400);

        $root_category = Category::where('id', (int)$id)->get()->first();


        return view('category.index', [
            'root_category'=>$root_category,
            'categories'=> Category::where('root_id', (int)$id)->where('slug','!=', $root_category->slug)->orderBy('name', 'DESC')->paginate(20)
        ]);
    }

    public function getView()
    {

        $id =  Input::get('id');

        $v = Validator::make(['id' => $id], ['id' => 'required|integer']);

        if ($v->fails()) abort(400);


        return view('category.index', [
            'root_category'=>Product::where('id', (int)$id)->get()->first(),
            'categoruies'=> Category::where('root_id', (int)$id)->orderBy('name', 'DESC')->paginate(20)
        ]);
    }

}

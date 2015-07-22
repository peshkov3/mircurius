<?php namespace App\Http\Controllers;


use App\Mircurius\Models\Product;
use App\Mircurius\Repositories\Brand\BrandRepository;
use App\Mircurius\Repositories\Category\CategoryRepository;
use App\Mircurius\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Input;

use App\Mircurius\Models\Category;
use Psy\Exception\ErrorException;

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
    private $brand;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, BrandRepository $brandRepository)
    {
        //$this->middleware('auth');

        $this->product = $productRepository;

        $this->category = $categoryRepository;

        //$this->$brand = $brandRepository;
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


        $id = $one;

        $v = Validator::make(['id' => $id], ['id' => 'required|integer']);

        if ($v->fails()) abort(400);

        $root_category = Category::where('id', (int)$id)->get()->first();

        dd($root_category);

        try {
            $category = Category::where('root_id', (int)$id)->where('slug', '!=', $root_category->slug)->orderBy('name', 'DESC')->paginate(20);
            return view('category.index', [
                'root_category' => $root_category,
                'categories' => $category
            ]);
        }
        catch(\Exception $e){
dd($e);
        }

    }

    public function getView()
    {

        $id = Input::get('id');

        $v = Validator::make(['id' => $id], ['id' => 'required|integer']);

        if ($v->fails()) abort(400);


        return view('category.index', [
            'root_category' => Product::where('id', (int)$id)->get()->first(),
            'categories' => Category::where('root_id', (int)$id)->orderBy('name', 'DESC')->paginate(20)
        ]);
    }

    public function getSearch()
    {

        $query = Input::get('query');

        $v = Validator::make(['id' => $query], ['id' => 'max:200']);

        if ($v->fails()) abort(400);


//dd( Category::where('name', 'like', '%'.$query.'%')->get());
        dd($this->category->findBy('name','%'.$query.'%','like'));


        return view('category.index', [
            'root_category' => Product::where('id', (int)$id)->get()->first(),
            'categoruies' =>  $this->category->findBy('name',$query,'LIKE')
        ]);
    }

}

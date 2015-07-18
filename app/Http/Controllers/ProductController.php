<?php namespace App\Http\Controllers;

use App\Mircurius\Repositories\Category\CategoryRepository;
use App\Mircurius\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\Validator;
use Input;


class ProductController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Product Controller
    |--------------------------------------------------------------------------
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



    public function getProductByCategoryId($id)
    {
        $v = Validator::make(['id' => $id], ['id' => 'required|integer']);

        if ($v->fails()) abort(400);

        return view('product.index', [
            'category'=> $this->category->findByRootId($id),
            'products'=>  $this->product->findByCategoryId($id)
        ]);
    }

    public function getProduct($id)
    {
        $v = Validator::make(['id' => $id], ['id' => 'required|integer']);

        if ($v->fails()) abort(400);

        dd($this->product->findByProductId($id)->category);

        return view('product.view', [
            'product'=>  $this->product->findByProductId($id)
        ]);
    }

}

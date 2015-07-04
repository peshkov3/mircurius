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

        try {

            $curl = curl_init('https://www.sima-land.ru/api/v2/item?category_id=2851');
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($curl);
            curl_close($curl);

            dd($json);

        } catch (Exception $e) {

            dd($e);

        }

        return view('home');
    }


    protected function saveCategory($id)
    {

        $v = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|integer']);

        if ($v->fails()) abort(400);

        $curl = curl_init('https://www.sima-land.ru/api/v2/category?children=' . $id . '&page=1&per_page=50');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        $categories = (array)json_decode($json);
        $categories = $categories['items'];

        // store them to mongodb
        if (count($categories) != 0)
            foreach ($categories as $category) {
                $asArray = (array)$category;
                $this->category->create($asArray);
                //     dd($asArray['id']);
                $this->saveSubCategory($asArray['id']);
            }

    }

    protected function saveSubCategory($id)
    {

        $v = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|integer']);

        if ($v->fails()) abort(400);

        // Get high-level categories and determine their total number
        $curl = curl_init('https://www.sima-land.ru/api/v2/category?children=' . $id . '&page=1&per_page=50');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        $categories = (array)json_decode($json);
        $categories = $categories['items'];

        if (count($categories) == 50) dd('There are more than 50 items in this category. If you see this method - you should reorganize the HomeController@saveSubCategory method.');

        // store them to mongodb
        if (count($categories) != 0)
            foreach ($categories as $category) {
                $asArray = (array)$category;
                if ($asArray ['is_leaf'] == 1){
                    $this->category->create($asArray);
                }

            }
    }
}

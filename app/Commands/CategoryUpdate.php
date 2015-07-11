<?php namespace App\Commands;

use App\Mircurius\Repositories\Category\CategoryRepository;
use App\Mircurius\Repositories\Product\ProductRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CategoryUpdate extends Command
{
    protected $name = 'update-db';
    protected $description = 'Update categories from the main server';
    
    
    private $category;
    private $product;
    
    
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        parent::__construct();
        $this->category = $categoryRepository;
        $this->product = $productRepository;
    }
    protected function getResponse($url){
       
        do{
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));    
 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $json = curl_exec($curl);
            curl_close($curl);
            
         }while(count((array)json_decode($json))==0);
                
        return (array)json_decode($json);
    }
    public function handle()
    {
        try {
            
            $this->product->create([
            'sid'=>'894951',
            'photo' => [ 
            'base_url'=> 'url',
            'indexes'=> [0,1]
            ]]);            
            dd('Not work');
            
            DB::connection('mongodb')->table('categories')->delete();
            DB::connection('mongodb')->table('products')->delete();
            
            $categories = config('frontend.categories.items');
            
            foreach ($categories as $category_dev_name) {
                
             
                    $cat = $this->getResponse('https://www.sima-land.ru/api/v2/category?slug='.$category_dev_name);
              
               
                $category = $cat['items'];
                $category = (array)$category;
                $category = $category[0];
               
                $obj = $this->category->create((array)$category);
          
               
                  
                if (isset($category->id))
                    $this->saveCategory($category->id);
                
                else
                    dd('Can not find category with slug name: '
                        . $category_dev_name
                        . '. Check the category name in category.php config file. Check if this category is steel exist in sima-land datebase.');
                      
            }
            \Illuminate\Support\Facades\Log::info("Categories for products were successfully updated");
        } catch (Exception $e) {
            dd($e);
        }
    }
    protected function saveCategory($id)
    {
        $v = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|integer']);
        if ($v->fails()) abort(400);
        
    
        
        $categories = $this->getResponse('https://www.sima-land.ru/api/v2/category?children=' . $id . '&page=1&per_page=50');
       
   
        $_meta = (array)$categories['_meta'];
        $pageCount = $_meta['pageCount'];
        
        $categories = $categories['items'];
        if ($pageCount > 1) {
            do {
                $categories = $this->getResponse('https://www.sima-land.ru/api/v2/category?children=' . $id . '&page=' . $pageCount . '&per_page=50');
                $categories = $categories['items'];
                if (count($categories) != 0) {
                    foreach ($categories as $category) {
                        $asArray = (array)$category;
                        $this->category->create($asArray);
                        //     dd($asArray['id']);
                        $this->saveSubCategory($asArray['id']);
                    }
                }
                $pageCount--;
            } while ($pageCount != 0);
        }
        else {
            // store them to mongodb
            if (count($categories) != 0)
                foreach ($categories as $category) {
                    $asArray = (array)$category;
                    $this->category->create($asArray);
                    //     dd($asArray['id']);
                    $this->saveSubCategory($asArray['id']);
                }
            else {
                \Illuminate\Support\Facades\Log::info('There is no category');
                $this->comment("There is no category");
                dd('There is no category in first level');
            }
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
        $categories = $this->getResponse('https://www.sima-land.ru/api/v2/category?children=' . $id . '&page=1&per_page=50');
        $_meta = (array)$categories['_meta'];
        $pageCount = $_meta['pageCount'];
        $categories = $categories['items'];
        if ($pageCount > 1) {
            do {
                $categories = $this->getResponse('https://www.sima-land.ru/api/v2/category?expand=photo&children=' . $id . '&page=' . $pageCount . '&per_page=50');
                $categories = $categories['items'];
                if (count($categories) != 0) {
                    foreach ($categories as $category) {
                        $asArray = (array)$category;
                        if ($asArray ['is_leaf'] == 1)
                            $this->category->create($asArray);
                    }
                }
                $pageCount--;
            } while ($pageCount != 0);
        }
        else {
            // store them to mongodb
            if (count($categories) != 0){
                foreach ($categories as $category) {
                    $asArray = (array)$category;
                    if ($asArray ['is_leaf'] == 1){
                        $this->category->create($asArray);
                        $this->getAndSaveCategoryProduct($asArray['id']);
                    }
                }
            }
            else {
                \Illuminate\Support\Facades\Log::info('There is no category');
                $this->comment("There is no category");
            //    dd('There is no category in last level ');
            }
        }
    }
    protected function getAndSaveCategoryProduct($category_id)
    {
        $products = $this->getResponse('https://www.sima-land.ru/api/v2/item?category_id=' . $category_id);
        $_meta = (array)$products['_meta'];
        $pageCount = $_meta['pageCount'];
        $products = $products['items'];
        if ($pageCount > 1)
        {
            do{
                $products = $this->getResponse('https://www.sima-land.ru/api/v2/item?expand=photo&category_id=' . $category_id. '&page=' . $pageCount . '&per_page=50');
                $products = $products['items'];
                if (count($products) != 0){
                    foreach ($products as $product) {
                     
                        $this->product->create((array)$product);
                    }
                }else{
                    \Illuminate\Support\Facades\Log::info("There is no product with category_id = ".$category_id);
                    $this->comment("There is no product with category_id = ".$category_id);
                }
                $pageCount--;
            }while($pageCount!=0);
        }else {
            if (count($products) != 0){
                foreach ($products as $product) {
                        
                        
                  
                    $this->product->create((array)$product);
                }
            }else {
                \Illuminate\Support\Facades\Log::info("There is no product with category_id = ".$category_id);
                $this->comment("There is no product with category_id = ".$category_id);
            }
        }
    }
}
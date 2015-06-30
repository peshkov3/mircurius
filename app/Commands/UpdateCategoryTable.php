<?php namespace App\Commands;


use App\Mircurius\Repositories\Category\CategoryRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateCategoryTable extends Command
{


    protected $name = 'category-update';

    protected $description = 'Update categories from the main server';

    private $category;

    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->category = $categoryRepository;
    }


    public function handle()
    {
        DB::connection('mongodb')->table('categories')->delete();

        try {

            $page = 1;
            do {
                $output = file_get_contents('https://www.sima-land.ru/api/v2/category?page=' . $page . '&per_page=50');
                $output = json_decode($output);
                $items = $output->items;
                if (count($items) != 0)
                    foreach ($items as $item) {
                        //  dd((array)$item);
                        $this->category->create((array)$item);
                    }
                else dd('Could not find category items');
                $page++;

            } while ($page < 2000);


            \Illuminate\Support\Facades\Log::info("Categories for products were successfully updated");

        } catch (Exception $e) {

            dd($e);
            // learn more about that exception
        }
    }

}

<?php namespace App\Mircurius\Observers;

use App\Mircurius\Models\Products;
use Validator;
use App;

use Illuminate\Support\Facades\File;
use Input;
use Image;
use Exception;

use App\Mircurius\Models\Brand;

class ProductObserver
{

    protected $model;
    protected $username = 'peshkov-maximum@yandex.ru';
    protected $password = '786ZS4';
    protected $saveImgDir = 'public/mircurius/img';
    protected $images = [];

    public function creating($model)
    {
        if (isset($model->sid)) {
            if (isset($model->photo)) {

                $this->model = $model;

                $this->getImagesBySID($model);

                $model->photo = $this->images;

                $this->images = [];
            } else {

                $this->log('There is no photo parametr in Product');

            }

        } else {
            $this->log('There is no sid parametr in Product');
        }

    }

    public function saving($model)
    {
        //
    }

    public function saved($model)
    {
        //
    }

    protected function getImagesBySID($model)
    {

        $sid = $model->sid;

        $v = Validator::make([
            'id' => $sid
        ], [
            'id' => 'required|integer']);

        if ($v->fails()) dd('wrong sid =' . $sid);

        if (isset($model->photo->indexes)) {

            $indexes = (array)$model->photo;

            foreach ($indexes['indexes'] as $index => $value) {

                $image = $this->getResponse('https://www.sima-land.ru/api/GetImageSource?id=' . $sid . '&n=' . (int)$index . '&username=' . $this->username . '&password=' . $this->password);

                if ($image != false) $this->saveImages($image, (int)$sid, (int)$index); else ($this->log('There is no photo with such index sid = ' . $sid));
            }

        } else {

            dd('there is no photo -indexes');
        }
    }

    protected function saveImages($image, $sid, $index)
    {

        $v = Validator::make([
            'index' => $index,

            'id' => $sid
        ], [
            'index' => 'required|integer',

            'id' => 'required|integer']);

        if ($v->fails()) dd('wrong sid =' . $sid);


        try {

            $image = Image::make($image);


            // check the directories
            if (!File::exists($this->saveImgDir)) {
                File::makeDirectory($this->saveImgDir);
            }
            if (!File::exists($this->saveImgDir . '/products')) {
                File::makeDirectory($this->saveImgDir . '/products');
            }
            if (!File::exists($this->saveImgDir . '/products/' . $sid)) {
                File::makeDirectory($this->saveImgDir . '/products/' . $sid);
            }


            // dir to save image
            $dir = $this->saveImgDir . '/products/' . $sid . '/' . $index;

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            // save medium
            $image->fit(240, 240)->save($dir . '/medium.jpg');
            $this->images[$index]['medium'] = 'mircurius/img/products/' . $sid . '/' . $index . '/medium.jpg';

        } catch (Exception $e) {

            $error = (array)$image;

            $this->log(json_encode($error));

            $this->log($e);

        }

    }


    protected function getResponse($url)
    {

        do {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $json = curl_exec($curl);
            curl_close($curl);

        } while ($json == null || $json == false);

        return $json;
    }

    protected function log($message)
    {
        \Illuminate\Support\Facades\Log::info('ProductObserver@error: ' . $message);
    }


}
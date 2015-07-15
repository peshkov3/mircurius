<?php namespace App\Mircurius\Observers;

use App\Mircurius\Models\Products;
use Validator;
use App;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Input;
use Image;

class ProductObserver{


    protected $username = 'peshkov-maximum@yandex.ru';
    protected $password = '786ZS4';
    protected $saveImgDir = 'mircurius/img';


    public function creating($model)
    {
        if (isset($model->sid))
        {
            if (isset($model->photo)) {
           
                     $this->getImageBySID($model);
            } else {
                 $this->log('There is no photo parametr in Product');
            }
       
        }
        else {
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
    
    protected function getImageBySID($model){
        
        $sid=$model->sid;
        
         $v = Validator::make([
            'id' => $sid
        ], [
            'id' => 'required|integer']);
            
        if ($v->fails()) dd('wrong sid ='. $sid);
        
        $image = $this->getResponse( 'https://www.sima-land.ru/api/GetImageSource?id='.$sid.'&n=0&username='.$this->username.'&password='.$this->password);
        
        if ($image!=false) $this->saveImage($sid, $image);
    }
    
    protected function saveImage($sid,$image){
        
           $image = Image::make($image);
           
           $image->save('public/bar.jpg');
           
           $image->fit(140, 140)->save('public/bar_140.jpg');
           
           $image->fit(240, 240)->save('public/bar_240.jpg');
    
           $image_extension  = $image->getClientOriginalExtension();
         
           // check the directory mircurius/img
           if (!File::exists($this->saveImgDir)) {
                File::makeDirectory($this->saveImgDir);
           }
           
           $originalDir = $this->saveImgDir.'/origanals/products/'.$sid;
           // check the directory origanals
           if (!File::exists($originalDir)) {
                File::makeDirectory($originalDir);
           }
           
           $thumbDir = $this->saveImgDir.'/thumb/products';
            // check the directory thumb
           if (!File::exists($thumbDir)) {
                File::makeDirectory($thumbDir);
           }
           
           // configure original path
           $originalDir=$originalDir.'/'.$sid;
         
            if (!File::exists($dir)) {
                chmod($dir, 0777);
                File::makeDirectory($dir);
                $image->fit(480, 360)->save($path_to_file);
                $video->image = $path_to_file;
            } else {
                File::delete($path_to_file);
                $image->fit(480, 360)->save($path_to_file);
                $video->image = $path_to_file;
            }
         
              dd($image_extension);
            $image = Image::make($image);
            
            $dir = 'mircurius/img/original/products/'.$sid;
            dd($dir);
            $path_to_file = $dir . '/high.' . $image_extension;
            
            $dir_video='images/thumb/video';
            if (!File::exists($dir_video)) {
                File::makeDirectory($dir_video);
           }
            
        
      
    }
    
    
     protected function getResponse($url){
       
        do{
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));    
 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $json = curl_exec($curl);
            curl_close($curl);
           
         }while($json==null||$json==false);
                
        return $json;
    }
    
    protected function log($message){
         \Illuminate\Support\Facades\Log::info('ProductObserver@error: '.$message);
        
    }   
 


}

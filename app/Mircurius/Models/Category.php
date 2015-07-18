<?php namespace App\Mircurius\Models;

use Jenssegers\Mongodb\Model;

class Category extends Model {

    protected $connection = 'mongodb';

    protected $guarded = ['_id'];
    public $timestamps = false;


    public function products()
    {
        return $this->hasMany('\App\Mircurius\Models\Product', 'category_id', 'root_id');
    }
}

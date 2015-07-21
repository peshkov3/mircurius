<?php namespace App\Mircurius\Models;

use Jenssegers\Mongodb\Model;

class Brand extends  Model{

    protected $connection = 'mongodb';

    protected $guarded = ['_id'];
    public $timestamps = false;


    public function products()
    {
        return $this->hasMany('\App\Mircurius\Models\Product', 'trademark_id', 'id');
    }
}

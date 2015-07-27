<?php namespace App\Mircurius\Models;

use Jenssegers\Mongodb\Model;

class Product extends Model {

	//
    protected $connection = 'mongodb';

    protected $guarded = ['_id'];

    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo('\App\Mircurius\Models\Category', 'category_id', 'root_id');
    }

    public function orders()
    {
        return $this->hasMany('\App\Mircurius\Models\Order','product_id', 'id');
    }

}

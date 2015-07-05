<?php namespace App\Mircurius\Models;

use Jenssegers\Mongodb\Model;

class Product extends Model {

	//
    protected $connection = 'mongodb';

    protected $guarded = ['_id'];
    public $timestamps = false;

}

<?php namespace App\Mircurius\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

	//
    protected $connection = 'mongodb';

    protected $guarded = ['_id'];
    public $timestamps = false;

}

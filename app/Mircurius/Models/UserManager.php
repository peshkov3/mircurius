<?php

namespace App\Mircurius\Models;

use Illuminate\Database\Eloquent\Model;

class UserManager extends Model {

    protected $fillable = ['id', 'user_id', "manager_id"];

    public function manager()
    {
        return $this->belongsTo('\App\Mircurius\User');
    }

    public function user()
    {
        return $this->belongsTo('\App\Mircurius\User');
    }
}
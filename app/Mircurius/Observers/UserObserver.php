<?php
namespace App\Mircurius\Observers;

use App\Mircurius\Models\User;
use App\Mircurius\Models\UserManager;
use App\Mircurius\Repositories\User\UserRepository;

class UserObserver {


    private $user;


    public function __construct(UserRepository $userRepository)
    {
        //  $this->middleware('auth');

        $this->user = $userRepository;

    }
    public function creating($model)
    {
    }

    public function created($model)
    {
        UserManager::create(['user_id'=>$model->id,'manager_id'=>$this->user->findBy('name' ,config('frontend.default_manager_name'))->id]);
    }

    public function saving($model)
    {
        //
    }

    public function saved($model)
    {
        //
    }
}
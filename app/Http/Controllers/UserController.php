<?php namespace App\Http\Controllers;


use App\Mircurius\Repositories\Category\CategoryRepository;
use App\Mircurius\Repositories\Product\ProductRepository;
use App\Mircurius\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Input;

use App\Mircurius\Models\Category;

class UserController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $user;

    public function __construct(UserRepository $userRepository)
    {
      //  $this->middleware('auth');

        $this->user = $userRepository;

    }


    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function getProfile()
    {
        return view('user.profile')->withUser(Auth::user());
    }

    public function getUpdate()
    {
        return view('user.form')->withUser(Auth::user());
    }

    public function postUpdate()
    {


        return view('user.profile');
    }



}

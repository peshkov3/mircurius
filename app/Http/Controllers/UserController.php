<?php namespace App\Http\Controllers;


use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Mircurius\Repositories\User\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Auth;

use Hash;
use Illuminate\Support\Facades\Redirect;
use Input;
use Request;
use Image;
use File;


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
    protected $saveImgDir = 'mircurius/img';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $user;
    private $password;


    public function __construct(Guard $auth, UserRepository $userRepository, PasswordBroker $passwords)
    {
        //  $this->middleware('auth');

        $this->user = $userRepository;
        $this->password = $passwords;
        $this->auth = $auth;
    }

    public function getIndex($id = null)
    {
       if (Auth::check()){
           return view('user.index')->withUser($id!=null?$this->user->findById($id):$this->user->findById(Auth::user()->id));
       } else return view('user.index')->withUser($id!=null ? $this->user->findById($id) : $this->user->create([]));
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function getProfile()
    {
        if (Auth::check()){
            return view('user.profile')->withUser(Auth::user());
        } else abort(404);
    }

    public function getUpdate()
    {
        return view('user.form')->withUser(Auth::user());
    }

    public function postUpdate(UserRequest $request)
    {


        $user = $this->user->findById(Auth::user()->id);

        $user->name = $request->input('name');
        $user->fio = $request->input('fio');

        $user->phone_number = $request->input('phone');

        $user->address = $request->input('address');
        $user->birth = $request->input('birth');
        $user->get_news = $request->input('get_news');

        $user->email = $request->input('email');


        if ($request->hasFile('photo')) {
            try {

                $image = Image::make($request->file('photo'));

                //  check the directories
                if (!File::exists($this->saveImgDir)) {
                    File::makeDirectory($this->saveImgDir);
                }
                if (!File::exists($this->saveImgDir . '/avatars')) {
                    File::makeDirectory($this->saveImgDir . '/avatars');
                }
                if (!File::exists($this->saveImgDir . '/avatars/' . $user->id)) {
                    File::makeDirectory($this->saveImgDir . '/avatars/' . $user->id);
                }

                // dir to save image
                $dir = $this->saveImgDir . '/avatars/' . $user->id;

                if (!File::exists($dir)) {
                    File::makeDirectory($dir);
                }

                // save medium
                $image->fit(240, 240)->save($dir . '/avatar.jpg');
                $user->photo = $dir . '/avatar.jpg';

            } catch (Exception $e) {

                dd($e);

            }
        } else {
            dd(56);
        }


        $user->save();

        return view('user.profile')->withUser($user);
    }

    public function getChangePassword()
    {
        return view('auth.reset');
    }

    protected $passwords;

    public function postChangePassword(ChangePasswordRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();


            // Get passwords from the user's input
            $old_password = $request->input('password_old');
            $password = $request->input('password');

            // test input password against the existing one
            if (Hash::check($old_password, $user->getAuthPassword())) {

                $user->password = $password;

                // save the new password
                if ($user->save()) {
                    return redirect('user/profile')
                        ->withErrors([
                            'password' => 'Ваш пароль успешно изменен'
                        ]);
                }

            } else {
                return redirect($this->changePasswordPath())
                    ->withErrors([
                        'password' => 'Вы ввели неверный старый пароль'
                    ]);

            }

//            if ($this->auth->attempt([
//                'email' =>$user->email,
//                'password' =>$request->input('password_old')
//            ])) {
//
//                $hash=  Hash::make($request->input('password'));
//
//                $user->password =$hash;
//
//                $user->save();
//
//                $this->auth->login($user);
//
//                return view('user.profile',['password_was_changed'=>'Пароль бых изменен'])->withUser($user);
//
//            } else  return redirect($this->changePasswordPath())
//                ->withErrors([
//                    'password'=> 'Вы ввели неверный старый пароль'
//                ]);

        } else {
            return redirect($this->changePasswordPath())
                ->withErrors([
                    'password' => 'Пользователь не авторизован'
                ]);
        }

    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function changePasswordPath()
    {
        return property_exists($this, 'passwordPath') ? $this->passwordPath : '/user/change-password';
    }

}

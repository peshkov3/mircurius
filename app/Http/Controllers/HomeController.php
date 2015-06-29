<?php namespace App\Http\Controllers;


class HomeController extends Controller {

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
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
	    

try
{
    $output = file_get_contents('https://www.sima-land.ru/api/v2/item');
   $output=json_decode($output);
   
    dd($output->items);
        
    
}
catch(Exception $e)
{
    
    dd($e);
    // learn more about that exception
}
        
       

        
   		return view('home');
	}

}

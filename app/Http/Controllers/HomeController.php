<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Auth\Guard as Auth;
use App\Decision as Decision;
use App\User as User;
use Carbon;

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
	public function index(Auth $auth)
	{
		$decision_made = Decision::made($auth->id())->count();

		$decisions = Decision::all();
		$is_playing = Decision::isPlaying()->count();
		$not_playing = Decision::notPlaying()->count();
		$total = $is_playing + $not_playing;
		$num_users = User::all()->count();
		$undecided = $num_users - $total;

		return view('home', [
			'decision_made' => $decision_made,
			'is_playing' => $is_playing,
			'total' => $total,
			'undecided' => $undecided
		]);

	}

}

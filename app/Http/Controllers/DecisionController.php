<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Auth\Guard as Auth;
use App\Decision as Decision;
use App\User as User;

class DecisionController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$decisions = Decision::all();
		$is_playing = Decision::isPlaying()->count();
		$not_playing = Decision::notPlaying()->count();
		$total = $is_playing + $not_playing;
		$num_users = User::all()->count();
		$undecided = $num_users - $total;

		return view('thank-you', [
			'is_playing' => $is_playing,
			'total' => $total,
			'undecided' => $undecided
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Auth $auth)
	{
		$input = Request::input('cd-dropdown');
		
		if (!isset($input)) {
			return redirect('error')->with('message', 'Sorry, this service is currently unavailable.');
		} else {
			$user_id = $auth->id();
			$decision = new Decision();
			$decision->choice = $input;
			$decision->user_id = $user_id;
			$decision->save();

			return redirect('thank-you');
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

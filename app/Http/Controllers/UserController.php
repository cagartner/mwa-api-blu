<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    
	public function all()
	{
		return User::all();
	}

	public function create(Request $request)
	{
		$user = User::create($request->all());
		return $user;
	}

	public function update(Request $request)
	{
		$user = User::create($request->all());
		return $user;
	}

	public function get($id)
	{
		$user = User::create($request->all());
		return $user;
	}

	public function delete($id)
	{
		User::delete($id);
	}
}

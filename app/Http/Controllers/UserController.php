<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use \Dingo\Api\Exception\UpdateResourceFailedException;
use \Dingo\Api\Exception\StoreResourceFailedException;

class UserController extends BaseController
{
	public function all()
	{
		return User::all();
	}

	public function create(Request $request)
	{
        $validator = app('validator')->make($request->all(), [
        	'email' => ['required', 'email', 'unique:users,email', 'max:50'],
       		'password' => ['required', 'min:7', 'max:20']
        ]);

        if ($validator->fails()) {
            throw new StoreResourceFailedException('Não foi possível criar um usuário.', $validator->errors());
        }

		$user = User::create($request->all());

		return $user;
	}

	public function update(Request $request, $id)
	{
        /** @var User $user */
        $user = User::find($id);

        if (is_null($user))
        	throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("Usuário informado não existe");
        
        if (!is_null($user)) {

            $validator = app('validator')->make($request->all(), [
            	'email' => ['required', 'email', 'unique:users,email,'.$user->id, 'max:50'],
           		'password' => ['required', 'min:7', 'max:20']
            ]);

	        if ($validator->fails()) {
	            throw new UpdateResourceFailedException('Não foi possível atualizar o usuário.', $validator->errors());
	        }

            $user->update($request->all());

            return ['Usuário atualizado com sucesso!'];
        }
	}

	public function get($id)
	{
		$user = User::find($id);
		return $user;
	}

	public function delete($id)
	{
		User::delete($id);
	}
}

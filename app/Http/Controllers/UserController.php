<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Model\User;
use App\Utils\ModelMapper as mapper;

class UserController extends Controller {

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAllUsers() {
        $users = $this->user->getAllUsers();

        return response($users, 200)->header('Content-Type', 'application/json');
    }

    public function getUser($id) {
        $user = $this->user->getUser($id);
        
        return response($user, 200)->header('Content-Type', 'application/json');
    }
    
    public function createUser(Request $request) {
        $user = mapper::mapperFieldsInput($request->all());
        $user['password'] = app('hash')->make($request->password);

        if ($this->findByName($request->username)) {
            User::create($user);
            $user = ['username' => $request->username];
            $code = 201;

            Log::info(sprintf('Usuário %s cadastrado com sucesso.', $request->username));
        } else {
            $user = ['username' => 'Usuário '.$request->username.' já cadastrado.'];
            $code = 200;

            Log::info(sprintf('Usuário %s já cadastrado.', $request->username));
        }

        return response($user, $code)->header('Content-Type', 'application/json');
    }

    public function updateUser(Request $request) {
        $data = $request->all();
        $data['password'] = app('hash')->make($request->password);
        unset($data['id']);

        $user = User::where('id', $request->id)
            ->update(mapper::mapperFieldsInput($data));

        if ($user > 0) {
            $message = ['username' => $request->username];

            Log::info(sprintf('Usuário %s atualizado com sucesso.', $request->username));
        }

        return response($message, 201)->header('Content-Type', 'application/json');
    }

    public function changePassword(Request $request) {
        return response()->json($this->user->changePassword($request))
            ->header('Content-Type', 'application/json');
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $username = $user->username;

        if ($user->delete()) {
            $user = "{}";

            Log::info(sprintf('Usuário %s excluído com sucesso.', $username));
        }

        return response($user)->header('Content-Type', 'application/json');
    }

    private function findByName($username) {
        $user = DB::table('users')->where('username', $username)->count();

        if ($user > 0) {
            return false;
        } else {
            return true;
        }
    }

}

<?php

namespace App\Model;

use App\Utils\GenerateSQL as SQL;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class User extends Model {

    
    protected $table = "users";

    protected $fillable = [
        'id',
        'fullname',
        'username',
        'email',
        'password',
        'is_blocked',
        'change_password'
    ];

    protected $hidden = ['password'];

    public function getAllUsers($isBlocked = false) {
        $colNames = SQL::aliasColname($this->fillable, $this->hidden);

        if ($isBlocked) {
            $users = DB::table('users')->select($colNames)->get();
        } else {
            $users = DB::table('users')->select($colNames)->where('is_blocked', false)->get();
        }
        
       return $users;
    }

    public function getUser($id) {
        $colNames = SQL::aliasColname($this->fillable, $this->hidden);
        $user = DB::table('users')->select($colNames)->where('id', $id)->get();

        return json_encode($user[0]);
    }

    public function changePassword($request) {
        $password = app('hash')->make($request->password);
        $user = User::where('username', $request->username)->update(['password' => $password]);

        if ($user > 0) {
            return ['message' => 'Senha alterada com sucesso.'];
        } else {
            return ['message' => 'Não foi possível aterar a senha. Tente novamente mais tarde!'];
        }
    }

}

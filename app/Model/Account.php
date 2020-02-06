<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Utils\GenerateSQL as SQL;

class Account extends Model {

    protected $table = "account";

    protected $fillable = ['id', 'name', 'active'];

    protected $hidden = [];

    public function getAllAccounts() {
        $colnames = SQL::aliasColname($this->fillable, $this->hidden);

        $accounts = DB::table($this->table)->select($colnames)->get();

        return $accounts;
    }

    public function getAccount($id) {
        $colnames = SQL::aliasColname($this->fillable, $this->hidden);

        $account = DB::table($this->table)->select($colnames)->where('id', $id)->get();

        return json_encode($account[0]);
    }

}

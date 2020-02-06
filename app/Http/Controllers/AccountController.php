<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Account;
use App\Utils\Messages as msg;

class AccountController extends Controller {

    public function __construct(Account $account) {
        $this->account = $account;
    }

    public function getAllAccount() {
        return response($this->account->getAllAccounts(), 200)->header('Content-type', 'application/json');
    }

    public function getAccount($id) {
        return response($this->account->getAccount($id), 200)->header('Content-Type', 'application/json');
    }

    public function createAccount(Request $request) {
        $account = Account::where('name', $request->name)->count();

        if ($account > 0) {
            return response(['message' =>  msg::getFormattedMessage('conflict_account', $request->name)], 400)
                ->header('Content-Type', 'application/json');
        }

        Account::create($request->all());

        return response(['account' => $request->name], 201)
            ->header('Content-Type', 'application/json');
    }

    public function updateAccount(Request $request) {
        $account = Account::where('id', $request->id)->update($request->all());

        if ($account > 0) {
            return response(['message' => msg::getMessage('updated')], 201)
                ->header('Content-Type', 'application/json');
        }

        return response(['message' => msg::getMessage('error_updated')], 200)
            ->heander('Content-Type', 'application/json');
    }

    public function deleteAccount($id) {
        $account = Account::findOrFail($id);
        $name = $account->name;

        if ($account->delete()) {
            return response(['message' => msg::getFormattedMessage('deleted', $name)])
                ->header('Content-Type', 'application/json');
        }

        return response(['message' => msg::getMessage('error_deleting')], 500)
            ->header('Content-Type', 'application/json');
    }
    
}

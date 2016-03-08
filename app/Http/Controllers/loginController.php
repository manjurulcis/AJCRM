<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loginController extends Controller {

    public function index() {
        return view('login');
    }

    public function admin_login_check(Request $data) {
        $username = $data->username;
        $password = $data->password;

        $admin_info = DB::table('tbl_users')
                ->select("*")
                ->where('username', '=', $username)
                ->where('password', '=', md5($password))
                ->get();

        if ($admin_info) {
            return redirect('/dashboard');
        } else {
            session::put('msg', 'Username or Password Invalid !!!!');
            return redirect('/');
        }
    }

    public function admin_register(Request $data) {
        $sdata['fname'] = $data->fname;
        $sdata['lname'] = $data->lname;
        $sdata['username'] = $data->username;
        $sdata['email'] = $data->email;
        $sdata['password'] = md5($data->password);

        $user_info = DB::table('tbl_users')
                ->insert($sdata);
        
        return redirect('/');
    }

}

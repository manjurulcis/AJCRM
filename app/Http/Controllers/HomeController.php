<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard");
    }
    public function add_company()
    {
        return view("add_company");
    }
    public function add_team()
    {
        return view("add_team");
    }
    public function add_project()
    {
        return view("add_project");
    }
    public function view_profile(Request $request)
    {
//        echo $request->id;
        $user_info = User::find($request->id);
//        echo "<pre>";
//        print_r($user_info);
//        echo "</pre>";
//        exit();
        return view("profile")->with('user_info',$user_info);
    }
    public function delete_profile( Request $request) {
        echo $request->id;
        $user_info = User::find($request->id);
        $user_info->delete();
        return redirect::back();
    }
    public function users_list()
    {
        $data=User::all() ;
//        dd($data);
        return view("users_list")->with('users_list', $data);
    }
}

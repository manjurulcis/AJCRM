<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\addCompany;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("dashboard");
    }

    public function add_company() {
        return view("add_company");
    }

    public function save_company(Request $data) {
        $store = new addCompany();
        $store->name = $data->cname;
        $store->email = $data->cemail;
        $store->description = $data->cdescription;
        $store->address = $data->caddress;
        $store->contact_no = $data->cno;

        $destinationPath = 'upload'; // upload path
        $extension = $data->file('clogo')->getClientOriginalExtension();
        $fileName = rand(1, 999) . '.' . $extension;
        $data->file('clogo')->move($destinationPath, $fileName);

        $store->logo = $destinationPath . '/' . $fileName;
        $store->save();
        return redirect::back();
    }

    public function company_list() {
        $data = addCompany::all();
//        dd($data);
        return view("company_list")->with('company_list', $data);
    }

    public function add_team() {
        return view("add_team");
    }

    public function team_list() {
        return view("team_list");
    }

    public function add_project() {
        return view("add_project");
    }

    public function project_list() {
        return view("project_list");
    }

    public function view_profile(Request $request) {
//        echo $request->id;
        $user_info = User::find($request->id);
//        echo "<pre>";
//        print_r($user_info);
//        echo "</pre>";
//        exit();
        return view("profile")->with('user_info', $user_info);
    }

    public function delete_profile(Request $request) {
        echo $request->id;
        $user_info = User::find($request->id);
        $user_info->delete();
        return redirect::back();
    }

    public function users_list() {
        $data = User::all();
//        dd($data);
        return view("users_list")->with('users_list', $data);
    }

}

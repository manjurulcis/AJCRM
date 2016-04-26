<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\addCompany;
use App\Team;
use App\client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
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

        $destinationPath = 'upload/company'; // upload path
        $extension = $data->file('clogo')->getClientOriginalExtension();
        $fileName = rand(1, 999) . '.' . $extension;
        $data->file('clogo')->move($destinationPath, $fileName);

        $store->logo = $destinationPath . '/' . $fileName;
        $store->save();
        return redirect::back();
    }

    public function company_list() {
        $data = addCompany::all();
        return view("company_list")->with('company_list', $data);
    }

    public function add_team() {
        $companies = addCompany::select('id','name')->get();
        return view("add_team")->with('companies', $companies);
    }
    public function save_team(Request $data) {
        $store = new Team();
        $store->name = $data->tname;
        $store->company_id = $data->tcompany;
        $store->description = $data->tdescription;

        $destinationPath = 'upload/team'; // upload path
        $extension = $data->file('tlogo')->getClientOriginalExtension();
        $fileName = rand(1, 999) . '.' . $extension;
        $data->file('tlogo')->move($destinationPath, $fileName);

        $store->logo = $destinationPath . '/' . $fileName;
        $store->save();
        return redirect::back();
    }

    public function team_list() {
        $data = DB::table('teams')
            ->join('companies', 'teams.company_id', '=', 'companies.id')
            ->select('teams.*', 'companies.name as company_name')
            ->get();
        return view("team_list")->with('team_list', $data);
    }

    public function add_project() {
        
        return view("add_project");
    }
    public function add_client() {
        return view("add_client");
    }
    
    public function save_client(Request $data) {
        $store = new client();
        $store->client_name = $data->name;
        $store->client_address = $data->address;
        $store->client_email = $data->email;
        $store->birthdate = $data->bdate;
        $store->contact_no = $data->cno;

        $destinationPath = 'upload/client'; // upload path
        $extension = $data->file('photo')->getClientOriginalExtension();
        $fileName = rand(1, 999) . '.' . $extension;
        $data->file('photo')->move($destinationPath, $fileName);

        $store->client_photo = $destinationPath . '/' . $fileName;
        $store->save();
        return redirect::back();
    }

    public function client_list() {
        $data = client::all();
        return view("client_list")->with('client_list', $data);
    }
    
    public function project_list() {
        return view("project_list");
    }

    public function view_profile(Request $request) {
        $user_info = User::find($request->id);
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
        return view("users_list")->with('users_list', $data);
    }

}

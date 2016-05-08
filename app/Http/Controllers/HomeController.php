<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\addCompany;
use App\Team;
use App\client;
use App\project;
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
    public function update_company(Request $data) {
        $store = addCompany::find($data->cid);
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

    public function delete_company(Request $request) {
        $company_info = addCompany::find($request->id);
        $company_info->delete();
        return redirect::back();
    }
    
    public function add_team() {
        $companies = addCompany::select('id', 'name')->get();
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

    public function delete_team(Request $request) {
        $team_info = Team::find($request->id);
        $team_info->delete();
        return redirect::back();
    }
    
    public function add_project() {
        $data = client::select('client_id', 'client_name')->get();
        return view("add_project")->with('client_info', $data);
    }

    public function save_project(Request $data) {
        $store = new project();
        $store->client_id = $data->client;
        $store->project_title = $data->name;
        $store->project_desc = $data->description;
        $store->project_status = $data->status;
        $store->end_time = $data->enddate;

        $destinationPath = 'upload/project'; // upload path
        $extension = $data->file('logo')->getClientOriginalExtension();
        $fileName = rand(1, 999) . '.' . $extension;
        $data->file('logo')->move($destinationPath, $fileName);

        $store->logo = $destinationPath . '/' . $fileName;
        $store->save();
        return redirect::back();
    }

    public function project_list() {
        $data = DB::table('projects')
                ->join('clients', 'projects.client_id', '=', 'clients.id')
                ->select('projects.*', 'clients.client_name')
                ->get();
        return view("project_list")->with('project_info', $data);
    }

    public function delete_project(Request $request) {
        $project_info = project::find($request->id);
        $project_info->delete();
        return redirect::back();
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

    public function delete_client(Request $request) {
        $client_info = client::find($request->id);
        $client_info->delete();
        return redirect::back();
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

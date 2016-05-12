<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\addCompany;
use App\Team;
use App\client;
use App\project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view("dashboard");
    }

//    ============= Company Section ===========

    public function add_company() {

        return view("add_company");
    }

    public function save_company(Request $data) {
        $rules = [
            'cname' => 'required|max:255|alpha',
            'caddress' => 'required|string|max:400',
            'cemail' => 'required|email',
            'cno' => 'required|digits:14',
            'cdescription' => 'required|string',
            'clogo' => 'required|image|mimes:jpeg,bmp,png',
        ];
        $messages = [
            'cname.required' => 'Name is required',
            'caddress.required' => 'Address is required',
            'cemail.required' => 'Email is required',
            'cno.required' => 'Contact no is required',
            'cdescription.required' => 'Description is required',
            'clogo.required' => 'Logo is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $store = new addCompany();
        $store->name = $data->cname;
        $store->email = $data->cemail;
        $store->description = $data->cdescription;
        $store->address = $data->caddress;
        $store->contact_no = $data->cno;
        $store->logo = "";

        if ($data->hasFile('clogo') && $data->file('clogo')->isValid()) {
            $destinationPath = 'upload/company'; // upload path
            $extension = $data->file('clogo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('clogo')->move($destinationPath, $fileName);

            $store->logo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('error', 'Uploaded file not valid');
            return redirect::back();
        }

        $store->save();
        Session::flash('msg', 'Added Successfully');
        return redirect::back();
    }

    public function company_list() {
        $data = addCompany::all();
        return view("company_list")->with('company_list', $data);
    }

    public function view_company(Request $request) {
        $company_info = addCompany::find($request->id);
        return view("company_info")->with('company_info', $company_info);
    }

    public function update_company(Request $data) {
        $rules = [
            'cname' => 'required',
            'caddress' => 'required',
            'cemail' => 'required',
            'cno' => 'required',
            'cdescription' => 'required',
            'clogo' => 'required',
        ];
        $messages = [
            'cname.required' => 'Name is required',
            'caddress.required' => 'Address is required',
            'cemail.required' => 'Email is required',
            'cno.required' => 'Contact no is required',
            'cdescription.required' => 'Description is required',
            'clogo.required' => 'Logo is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withInput()->withErrors($validator);
        }
        $store = addCompany::find($data->cid);
        $store->name = $data->cname;
        $store->email = $data->cemail;
        $store->description = $data->cdescription;
        $store->address = $data->caddress;
        $store->contact_no = $data->cno;

        $store->logo = "";

        if ($data->hasFile('clogo') && $data->file('clogo')->isValid()) {
            $destinationPath = 'upload/company'; // upload path
            $extension = $data->file('clogo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('clogo')->move($destinationPath, $fileName);

            $store->logo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('error', 'Uploaded file not valid');
            return redirect::back();
        }
        $store->save();
        Session::flash('msg', 'Updated Successfully ');
        return redirect::back();
    }

    public function delete_company(Request $request) {
        $company_info = addCompany::find($request->id);
        $company_info->delete();
        return redirect::back();
    }

//    ============= Team Section ===========

    public function add_team() {
        $companies = addCompany::select('id', 'name')->get();
        return view("add_team")->with('companies', $companies);
    }

    public function save_team(Request $data) {
        $rules = [
            'tname' => 'required',
            'tcompany' => 'required',
            'tlogo' => 'required',
            'tdescription' => 'required',
        ];
        $messages = [
            'tname.required' => 'Team Name is required',
            'tcompany.required' => 'Company name is required',
            'tlogo.required' => 'Logo is required',
            'tdescription.required' => 'Description is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withErrors($validator)->withInput();
        }

        $store = new Team();
        $store->name = $data->tname;
        $store->company_id = $data->tcompany;
        $store->description = $data->tdescription;
        $store->logo = "";

        if ($data->hasFile('tlogo') && $data->file('tlogo')->isValid()) {
            $destinationPath = 'upload/team'; // upload path
            $extension = $data->file('tlogo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('tlogo')->move($destinationPath, $fileName);

            $store->logo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('msg', 'Uploaded file not valid');
            return redirect::back();
        }
        $store->save();
        Session::flash('msg', 'Added Successfully ');
        return redirect::back();
    }

    public function team_list() {
        $companies = addCompany::select('id', 'name')->get();
        $data = DB::table('teams')
                ->join('companies', 'teams.company_id', '=', 'companies.id')
                ->select('teams.*', 'companies.name as company_name')
                ->get();
        return view("team_list")->with('team_list', $data)
                        ->with('companies', $companies);
    }

    public function view_team(Request $request) {
        $team_info = DB::table('teams')
                ->where("teams.id", '=', $request->id)
                ->join('companies', 'teams.company_id', '=', 'companies.id')
                ->select('teams.*', 'companies.name as company_name')
                ->first();
        return view("team_info")->with('team_info', $team_info);
    }

    public function update_team(Request $data) {
        $rules = [
            'tname' => 'required',
            'tcompany' => 'required',
            'tlogo' => 'required',
            'tdescription' => 'required',
        ];
        $messages = [
            'tname.required' => 'Team Name is required',
            'tcompany.required' => 'Company name is required',
            'tlogo.required' => 'Logo is required',
            'tdescription.required' => 'Description is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withErrors($validator)->withInput();
        }

        $store = Team::find($data->id);

        $store->name = $data->tname;
        $store->company_id = $data->tcompany;
        $store->description = $data->tdescription;
        $store->logo = "";

        if ($data->hasFile('tlogo') && $data->file('tlogo')->isValid()) {
            $destinationPath = 'upload/team'; // upload path
            $extension = $data->file('tlogo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('tlogo')->move($destinationPath, $fileName);

            $store->logo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('msg', 'Uploaded file not valid');
            return redirect::back();
        }
        $store->save();
        Session::flash('msg', 'Updated Successfully ');
        return redirect::back();
    }

    public function delete_team(Request $request) {
        $team_info = Team::find($request->id);
        $team_info->delete();
        return redirect::back();
    }

//    ============= Project Section ===========

    public function add_project() {
        $data = client::select('id', 'client_name')->get();
        return view("add_project")->with('client_info', $data);
    }

    public function save_project(Request $data) {
        $rules = [
            'client' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'enddate' => 'required',
            'logo' => 'required',
        ];
        $messages = [
            'client.required' => 'Client Name is required',
            'name.required' => 'Project Name is required',
            'description.required' => 'Description is required',
            'status.required' => 'Status is required',
            'enddate.required' => 'Deadline is required',
            'logo.required' => 'Project logo is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withErrors($validator)->withInput();
        }
        $store = new project();
        $store->client_id = $data->client;
        $store->project_title = $data->name;
        $store->project_desc = $data->description;
        $store->project_status = $data->status;
        $store->end_time = $data->enddate;
        $store->logo = "";

        if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
            $destinationPath = 'upload/project'; // upload path
            $extension = $data->file('logo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('logo')->move($destinationPath, $fileName);

            $store->logo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('error', 'Uploaded File not valid ');
            return redirect::back();
        }
        $store->save();
        Session::flash('msg', 'Added Successfully ');
        return redirect::back();
    }

    public function project_list() {
        $client_info = client::select('id', 'client_name')->get();
        $project_list = DB::table('projects')
                ->join('clients', 'projects.client_id', '=', 'clients.id')
                ->select('projects.*', 'clients.client_name')
                ->get();
        return view("project_list")->with('project_info', $project_list)
                        ->with('client_info', $client_info);
    }

    public function view_project(Request $request) {
        $project_info = DB::table('projects')
                ->where("projects.id", '=', $request->id)
                ->join('clients', 'clients.id', '=', 'projects.client_id')
                ->select('projects.*', 'clients.client_name')
                ->first();
        return view("project_info")->with('project_info', $project_info);
    }

    public function update_project(Request $data) {
        $rules = [
            'client' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'enddate' => 'required',
            'logo' => 'required',
        ];
        $messages = [
            'client.required' => 'Client Name is required',
            'name.required' => 'Project Name is required',
            'description.required' => 'Description is required',
            'status.required' => 'Status is required',
            'enddate.required' => 'Deadline is required',
            'logo.required' => 'Project logo is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withErrors($validator)->withInput();
        }
        $store = project::find($data->id);
        $store->client_id = $data->client;
        $store->project_title = $data->name;
        $store->project_desc = $data->description;
        $store->project_status = $data->status;
        $store->end_time = $data->enddate;
        $store->logo = "";

        if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
            $destinationPath = 'upload/project'; // upload path
            $extension = $data->file('logo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('logo')->move($destinationPath, $fileName);
            $store->logo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('error', 'Uploaded File not valid ');
            return redirect::back();
        }
        $store->save();
        Session::flash('msg', ' Updated Successfully ');
        return redirect::back();
    }

    public function delete_project(Request $request) {
        $project_info = project::find($request->id);
        $project_info->delete();
        return redirect::back();
    }

//    ============= Client Section ===========

    public function add_client() {
        return view("add_client");
    }

    public function save_client(Request $data) {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'bdate' => 'required',
            'cno' => 'required',
            'photo' => 'required',
        ];
        $messages = [
            'name.required' => 'Client Name is required',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required',
            'bdate.required' => 'Birthdate is required',
            'cno.required' => 'Contact No is required',
            'photo.required' => 'Photo is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withErrors($validator)->withInput();
        }
        $store = new client();
        $store->client_name = $data->name;
        $store->client_address = $data->address;
        $store->client_email = $data->email;
        $store->birthdate = $data->bdate;
        $store->contact_no = $data->cno;
        $store->client_photo = "";

        if ($data->hasFile('photo') && $data->file('photo')->isValid()) {
            $destinationPath = 'upload/client'; // upload path
            $extension = $data->file('photo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('photo')->move($destinationPath, $fileName);

            $store->client_photo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('error', 'Uploaded file not valid ');
            return redirect::back();
        }
        $store->save();
        Session::flash('msg', 'Added Successfully ');
        return redirect::back();
    }

    public function client_list() {
        $data = client::all();
        return view("client_list")->with('client_list', $data);
    }

    public function view_client(Request $request) {
        $data = client::find($request->id);
        return view("client_info")->with('client_info', $data);
    }

    public function update_client(Request $data) {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'bdate' => 'required',
            'cno' => 'required',
            'photo' => 'required',
        ];
        $messages = [
            'name.required' => 'Client Name is required',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required',
            'bdate.required' => 'Birthdate is required',
            'cno.required' => 'Contact No is required',
            'photo.required' => 'Photo is required',
        ];
        $validator = Validator::make($data->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect::back()->withErrors($validator)->withInput();
        }
        $store = client::find($data->id);
        $store->client_name = $data->name;
        $store->client_address = $data->address;
        $store->client_email = $data->email;
        $store->birthdate = $data->bdate;
        $store->contact_no = $data->cno;
        $store->client_photo = "";

        if ($data->hasFile('photo') && $data->file('photo')->isValid()) {
            $destinationPath = 'upload/client'; // upload path
            $extension = $data->file('photo')->getClientOriginalExtension();
            $fileName = rand(1, 999) . '.' . $extension;
            $data->file('photo')->move($destinationPath, $fileName);
            $store->client_photo = $destinationPath . '/' . $fileName;
        } else {
            Session::flash('error', 'Uploaded file not valid ');
            return redirect::back();
        }
        $store->save();
        Session::flash('msg', 'Updated Successfully ');
        return redirect::back();
    }

    public function delete_client(Request $request) {
        $client_info = client::find($request->id);
        $client_info->delete();
        return redirect::back();
    }

//    ============= User Section ===========

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class adminController extends Controller
{
   public function index() {
       $content=view('dashboard');
       $menu=view('menu');
       return view('master')->with('main_content',$content)
                            ->with('menu_bar',$menu);
   }
}

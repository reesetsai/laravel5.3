<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index(){
    	return view('admin.index');
    }
    public function info(){
    	//dd($_SERVER);
    	return view('admin.info');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CommonController extends Controller
{
    //圖片上傳
    public function upload(Request $request){
    	$file = $request->file('Filedata');
    	if($file->isValid()){
    		$realPath = $file->getRealPath(); //tmp file
    		$entension = $file->getClientOriginalExtension(); //副檔名
    		$newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
    		$path = $file->move(base_path().'/public/uploads',$newName);
    		$file_path = 'uploads/'.$newName;
    		return $file_path;
    	}
    }
}

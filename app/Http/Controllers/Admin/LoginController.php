<?php
namespace App\Http\Controllers\Admin;

use Crypt;
use Illuminate\Http\Request;
use App\Classes\CodeClass;
use App\Http\Model\Members;
use Illuminate\Support\Facades\Validator;
//require_once 'app/Classes/TestClass.php';

class LoginController extends CommonController
{	

    public function login(Request $request){
		if($input=$request->all()){
			$code = new CodeClass;
	    	$check = $code->get();
	    	if($input['code'] != $check){
	    		return back()->with('msg','驗證碼錯誤');
	    	}
			$user = Members::first();
			if($user->name !== $input['username'] || Crypt::decrypt($user->password) !== $input['userpassword']){
				return back()->with('msg','帳號或密碼有誤');
			}
			session(['user'=>$user]);

			return redirect('admin/index');
		}else{
			session(['user'=>NULL]);
			return view('admin.login');
		}
    }
    public function code(){
    	$code = new CodeClass;
    	$code->make();
    }
    public function logout(){
		session(['user'=>NULL]);
		return view('admin.login');
    }
    public function changepassword(Request $request){

    	if($input=$request->all()){
    		$rules =[
    			'password'=>'required|between:6,20|confirmed',
    		];

    		$message =[
    			'password.required'=>'密碼不得為空',
    			'password.between'=>'新密碼必須6~20位',
    			'password.confirmed'=>'輸入的密碼不一致',
    		];
    		$validator = Validator::make($input,$rules,$message);
    		if($validator->passes()){
    			$user = Members::first();
    			$pswd = Crypt::decrypt($user->password);
    			if($input['password_o']==$pswd){
    				$user->password = Crypt::encrypt($input['password']);
    				$user->update();
    				return back()->with('success','修改成功');
    			}else{
    				return back()->with('success','原密碼錯誤');
    			}
    		}else{
    			return back()->withErrors($validator);
    		}
    	}else{
    		return view('admin.pass');
    	}
    }
}
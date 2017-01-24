<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Navs;
use Illuminate\Support\Facades\Validator;

class NavsController extends CommonController
{
	//get admin.Navs 外部連接列表
    public function index(){
    	$data =Navs::orderBy('nav_order','ASC')->get();
    	return view('admin.navs.index',compact('data'));
    }
    public function changeOrder(Request $request){
        $input = $request->all();
        $navs = Navs::find($input['nav_id']);
        $navs->nav_order = $input['nav_order'];
        $re =$navs->update();
        if($re){
            $data = [
                'status'=>'0',
                'msg'=>'分類排序更新成功'
            ];
        }else{
            $data = [
                'status'=>'1',
                'msg'=>'分類排序更新失敗'
            ];
        }
        return $data;
        
    }
    public function create(){
        $data=[];
        return view('admin.navs.add',compact('data'));
    }
    //post.admin/Navs 新增外部連接
    public function store(Request $request){
            $input=$request->except('_token');
         
                $rules =[
                    'nav_name'=>'required',
                    'nav_en'=>'required',
                    'nav_url'=>'required',
                ];
                $message =[
                    'nav_name.required'=>'導覽名稱不得為空',
                    'nav_en.required'=>'導覽名稱不得為空',
                    'nav_url.required'=>'導覽URL不得為空',
                ];
                $validator = Validator::make($input,$rules,$message);
                if($validator->passes()){
                    $re = Navs::create($input);
                    return redirect('admin/navs');
                }else{
                    return back()->withErrors($validator);
                }
    }
    //delete.admin/Navs/{Navs} 刪除選取的外部連接
    public function destroy($nav_id){
        $re = Navs::where('nav_id',$nav_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '刪除成功',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '刪除失敗',
            ];
        }
        return $data;
        
    }
    //get.admin/Navs/{Navs}/edit  編輯
    public function edit($nav_id){
        //搜尋選取的分類
        $data =Navs::find($nav_id);
        //把搜尋的結果回傳給編輯頁
        return view('admin.navs.edit',compact('data'));
    }
    public function update(Request $request,$nav_id){
        //除了token,method以外的數據全部取出
        $input=$request->except('_token','_method');
        //更新
        $re = Navs::where('nav_id',$nav_id)->update($input);
        if($re){
            //更新成功
            return redirect('admin/navs');
        }else{
            return back()->with('errors','數據新增失敗');
        }
    }
}

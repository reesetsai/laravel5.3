<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Links;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
	//get admin.links 外部連接列表
    public function index(){
    	$data =Links::orderBy('link_order','ASC')->get();
    	return view('admin.links.index',compact('data'));
    }
    public function changeOrder(Request $request){
        $input = $request->all();
        $link = Links::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $re =$link->update();
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
        return view('admin.links.add',compact('data'));
    }
    //post.admin/links 新增外部連接
    public function store(Request $request){
            $input=$request->except('_token');
         
                $rules =[
                    'link_name'=>'required',
                    'link_title'=>'required',
                    'link_url'=>'required',
                ];
                $message =[
                    'link_name.required'=>'外部連接不得為空',
                    'link_title.required'=>'外部連接不得為空',
                    'link_url.required'=>'URL不得為空',
                ];
                $validator = Validator::make($input,$rules,$message);
                if($validator->passes()){
                    $re = Links::create($input);
                    return redirect('admin/links');
                }else{
                    return back()->withErrors($validator);
                }
    }
    //delete.admin/links/{links} 刪除選取的外部連接
    public function destroy($link_id){
        $re = Links::where('link_id',$link_id)->delete();
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
    //get.admin/links/{links}/edit  編輯
    public function edit($link_id){
        //搜尋選取的分類
        $data =Links::find($link_id);
        //把搜尋的結果回傳給編輯頁
        return view('admin.links.edit',compact('data'));
    }
    public function update(Request $request,$link_id){
        //除了token,method以外的數據全部取出
        $input=$request->except('_token','_method');
        //更新
        $re = Links::where('link_id',$link_id)->update($input);
        if($re){
            //更新成功
            return redirect('admin/links');
        }else{
            return back()->with('errors','數據新增失敗');
        }
    }
}

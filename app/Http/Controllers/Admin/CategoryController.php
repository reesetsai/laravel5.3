<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Validator;
class CategoryController extends CommonController
{
    //get.admin/category  ->所有分類列表
    public function index(){
        $data = (new Category)->tree();
    	return view('admin.category.index')->with('data',$data);
    }
    public function changeOrder(Request $request){
        $input = $request->all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re =$cate->update();
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
    //post.admin/category 添加文章
    public function store(Request $request){
            $input=$request->except('_token');
         
                $rules =[
                    'cate_name'=>'required',
                    'cate_title'=>'required',
                    'cate_keywords'=>'required',
                    'cate_description'=>'required',
                     'cate_order'=>'numeric',
                ];
                $message =[
                    'cate_name.required'=>'名稱不得為空',
                    'cate_title.required'=>'標題不得為空',
                    'cate_keywords.required'=>'關鍵字不得為空',
                    'cate_description.required'=>'內容不得為空',
                    'cate_order.numeric'=>'排序欄位---只能填入數字',
                ];
                $validator = Validator::make($input,$rules,$message);
                if($validator->passes()){
                    $re = Category::create($input);
                    return redirect('admin/category');
                }else{
                    return back()->withErrors($validator);
                }
    }
    public function chkpost(Request $request){

    }
    //get.admin/category/create 添加分類文章
    public function create(){
    	$data = Category::where('cate_pid',0)->get();
       return view('admin.category.add',compact('data',$data));
    }
    //get.admin/category/{category}  顯示點選的文章
    public function show(){
    	
    }
    //delete.admin/category/{category} 刪除選取的文章
    public function destroy($cate_id){
        $re = Category::where('cate_id',$cate_id)->delete();
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
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
    //put.admin/category/{category}  更新分類
    public function update(Request $request,$cate_id){
        //除了token,method以外的數據全部取出
    	$input=$request->except('_token','_method');
        //更新
        $re = Category::where('cate_id',$cate_id)->update($input);
        if($re){
            //更新成功
            return redirect('admin/category');
        }else{
            return back()->with('errors','數據新增失敗');
        }
    }
    //get.admin/category/{category}/edit  編輯
    public function edit($cate_id){
        //搜尋選取的分類
    	$field =Category::find($cate_id);
        //將最高級分類取出
        $data = Category::where('cate_pid',0)->get();
        //把搜尋的結果回傳給編輯頁
        return view('admin.category.edit',compact('field','data'));
    }

}
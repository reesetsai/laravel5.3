<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use App\Http\Model\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //get.admin/article 全部文章列表
    public function index(){
    	$data =Article::orderBy('art_id','DSC')->paginate(2);
    	return view('admin.article.index',compact('data'));
    }
    //get.admin/article/create 添加分類文章
    public function create(){
    	$data = (new Category)->tree();
		return view('admin.article.add',compact('data'));
    }
    //post.admin/article 添加文章
    public function store(Request $request){
    	$input=$request->except('_token');
   
    	$input['art_time'] = time();
    	
    	$rules =[
                    'art_title'=>'required',
                    'art_editor'=>'required',
                    'art_tag'=>'required',
                    'art_description'=>'required',
                    'art_content'=>'required',
                ];
                $message =[
                    'art_title.required'=>'標題不得為空',
                    'art_editor.required'=>'請輸入作者',
                    'art_tag.required'=>'關鍵字不得為空',
                    'art_description.required'=>'描述不得為空',
                    'art_content.required'=>'內容不得為空',
                ];
                $validator = Validator::make($input,$rules,$message);
                if($validator->passes()){
                    $re = Article::create($input);
                    return redirect('admin/article');
                }else{
                    return back()->withErrors($validator);
                }
    }
    ////get.admin/articley/{article}/edit  編輯文章
    public function edit($art_id){
    	//搜尋選取的資料
    	$field =Article::find($art_id);
        $data = (new Category)->tree();
        return view('admin.article.edit',compact('field','data'));
    }
    //delete.admin/article/{article}   刪除選取的文章
    public function destroy($art_id){
        $re = Article::where('art_id',$art_id)->delete();
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

    public function update(Request $request,$art_id){
        //除了token,method以外的數據全部取出
    	$input=$request->except('_token','_method');
        //更新
        $re = Article::where('art_id',$art_id)->update($input);
        if($re){
            //更新成功
            return redirect('admin/article');
        }else{
            return back()->with('errors','數據新增失敗');
        }
    }

}


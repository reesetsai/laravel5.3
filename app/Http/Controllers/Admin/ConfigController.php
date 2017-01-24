<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Config;
use Illuminate\Support\Facades\Validator;

class ConfigController extends CommonController
{
	//get admin.Config 外部連接列表
    public function index(){
    	$data =Config::orderBy('conf_order','ASC')->get();
        foreach($data as $key=>$value){
            switch ($value->field_type) {
                case 'input':
                    $data[$key]->_html = '<input type="text" class="lg" name="conf_content[]" id="conf_content" value='.$value->conf_content.'>';
                    break;
                case 'textarea':
                    $data[$key]->_html = '<textarea type="text" name="conf_content[]" id="conf_tips" >'.$value->conf_content.'</textarea>';
                    break;
                case 'radio':
                    $arr = explode(';', $value->field_value);
                    $str ='';
                    foreach ($arr as $m => $n) {
                        $arr=explode('|', $n);
                        $con = ($value->conf_content==$arr[0])? ' checked ' : '';
                        $str .='<input type="radio" name="conf_content[]" id="conf_content" value="'.$arr[0].'"'.$con.'>'.$arr[1].'　';
                    }
                    $data[$key]->_html =$str;
                    break;
            }
        }
    	return view('admin.config.index',compact('data'));
    }
    public function changeOrder(Request $request){
        $input = $request->all();
        $config = Config::find($input['conf_id']);
        $config->conf_order = $input['conf_order'];
        $re =$config->update();
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
        return view('admin.config.add',compact('data'));
    }
    //post.admin/Config 新增外部連接
    public function store(Request $request){
            $input=$request->except('_token');
         
                $rules =[
                    'conf_name'=>'required',
                    'conf_title'=>'required',
              //      'conf_content'=>'required',
                    'conf_order'=>'numeric',
                    'field_type'=>'required',
                    //'field_value'=>'required',
                ];
                $message =[
                    'conf_name.required'=>'請填寫配置名稱',
                    'conf_title.required'=>'請填寫配置標題',
                   // 'conf_content.required'=>'請填寫配置內容',
                    'conf_order.numeric'=>'請填寫數字',
                    'field_type.required'=>'請填寫內容',
                    //'field_value.required'=>'請填寫內容',
                ];
                $validator = Validator::make($input,$rules,$message);
                if($validator->passes()){
                    $re = Config::create($input);
                    return redirect('admin/config');
                }else{
                    return back()->withErrors($validator);
                }
    }
    //delete.admin/Config/{Config} 刪除選取的外部連接
    public function destroy($conf_id){
        $re = Config::where('conf_id',$conf_id)->delete();
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
    //get.admin/Config/{Config}/edit  編輯
    public function edit($conf_id){
        //搜尋選取的分類
        $data =Config::find($conf_id);
        //把搜尋的結果回傳給編輯頁
        return view('admin.config.edit',compact('data'));
    }
    public function update(Request $request,$conf_id){
        //除了token,method以外的數據全部取出
        $input=$request->except('_token','_method');
        //更新
        $re = Config::where('conf_id',$conf_id)->update($input);
        if($re){
            $this->putFile();
            //更新成功
            return redirect('admin/config');
        }else{
            return back()->with('errors','數據新增失敗');
        }
    }
    public function changeContent(Request $request){    
        $input =$request->all();
        foreach ($input['conf_id'] as $key=>$value) {
            Config::where('conf_id',$value)->update(['conf_content'=>$input['conf_content'][$key]]);
        }
        $this->putFile();
        return back()->with('errors','配置更新成功');
    }
    public function putFile(){
        $config=Config::pluck('conf_content','conf_name')->all();
        var_export($config,true); //array transfor string
        $path = base_path().'/config/webtest.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path,$str);
    }
}

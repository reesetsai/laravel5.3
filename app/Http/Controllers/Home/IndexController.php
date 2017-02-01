<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Navs;
use App\Http\Model\Category;
use App\Http\Model\Article;
use App\Http\Model\Links;
use Illuminate\Http\Request;
class IndexController extends CommonController
{   
    //首頁
    public function index(){
    	$navs =Navs::all();  //導覽列表

    	$allcate = Category::all();  //所有文章

    	$hot =Article::orderBy('art_views','desc')->take(10)->get();//點擊量最高的10篇文章
    	
    	$tags=Article::all();      //tags

    	//取出所有tags並過濾重複的tag    	
    	$str_tags ="";
    	foreach($tags as $key=>$value){
    		$arr= explode('/', $value->art_tag);
    			for($i=0;$i<count($arr);$i++){
	    			$str_tags .=$arr[$i].'/';
	    		}
	    		$str=rtrim($str_tags, "/");
	    	$str_tag = array_unique(explode('/', $str));
      	}
    	
    	$data =Article::orderBy('art_time','desc')->paginate(4);   //圖文列表(分頁)

    	
    	$lastpost =Article::orderBy('art_time','desc')->take(4)->get();   //最新文章4篇
    	
    	$links=Links::orderBy('link_order','asc')->get();   //外部連接

    	return view('home.index',compact('navs','allcate','hot','str_tag','data','lastpost','links'));
    }

    //搜尋文章
    public function search(Request $request){
        $input = $request->except('_token');  

        $hot =Article::orderBy('art_views','desc')->take(10)->get(); //前10篇熱門文章

        $navs =Navs::all();     //導覽列表

        $search = Article::where('art_tag','like','%'.$input['keywords'].'%')
                         ->orWhere('art_content','like','%'.$input['keywords'].'%')
                         ->orWhere('art_title','like','%'.$input['keywords'].'%')
                         ->get();

        $lastpost =Article::orderBy('art_time','desc')->take(4)->get();   //最新文章4篇

        $allcate = Category::all(); //所有文章

        $tags=Article::all();       //tags

        //取出所有tags並過濾重複的tag     
        $str_tags ="";
        foreach($tags as $key=>$value){
            $arr= explode('/', $value->art_tag);
                for($i=0;$i<count($arr);$i++){
                    $str_tags .=$arr[$i].'/';
                }
                $str=rtrim($str_tags, "/");
            $str_tag = array_unique(explode('/', $str));
        }
        
        $data =Article::where('art_tag','like','%'.$input['keywords'].'%')->orderBy('art_time','desc')->paginate(4);   //圖文列表(分頁)
    	return view('home.category',compact('search','hot','navs','lastpost','allcate','str_tag','data'));
    }

    //進入文章
    public function article($art_id){

        $article = Article::where('art_id',$art_id)->get();  

        $navs =Navs::all(); //導覽列表
        
        $lastpost =Article::orderBy('art_time','desc')->take(4)->get(); //最新文章4篇
        $allcate = Category::all();
        $tags=Article::all();
        //取出所有tags並過濾重複的tag     
        $str_tags ="";
        foreach($tags as $key=>$value){
            $arr= explode('/', $value->art_tag);
                for($i=0;$i<count($arr);$i++){
                    $str_tags .=$arr[$i].'/';
                }
                $str=rtrim($str_tags, "/");
            $str_tag = array_unique(explode('/', $str));
        }
       
        $field['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();  //上篇文章

        $field['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();  //下篇文章
        
        $random = Article::where('art_id','!=',$art_id)->orderBy(\DB::raw('RAND()'))->take(3)->get();  //推薦隨機文章

    	return view('home.article',compact('navs','article','lastpost','allcate','str_tag','field','random'));
    }

    //tag標籤尋找相關文章
    public function category($keyword){
        $hot =Article::orderBy('art_views','desc')->take(10)->get(); //前10篇熱門文章

        $navs =Navs::all();     //導覽列表

        $search = Article::where('art_tag','like','%'.$keyword.'%')->get();  //搜尋標籤相關的文章

        $lastpost =Article::orderBy('art_time','desc')->take(4)->get(); //最新文章4篇

        $allcate = Category::all();  //所有分類

        $tags=Article::all();  
        //取出所有tags並過濾重複的tag     
        $str_tags ="";
        foreach($tags as $key=>$value){
            $arr= explode('/', $value->art_tag);
                for($i=0;$i<count($arr);$i++){
                    $str_tags .=$arr[$i].'/';
                }
                $str=rtrim($str_tags, "/");
            $str_tag = array_unique(explode('/', $str));
        }
        
        $data =Article::where('art_tag','like','%'.$keyword.'%')->orderBy('art_time','desc')->paginate(4);  //圖文列表(分頁)
        return view('home.category',compact('search','navs','lastpost','allcate','str_tag','hot','data'));
    }

    //關於作者
    public function about(){
        $navs =Navs::all();  //導覽列表
        $lastpost =Article::orderBy('art_time','desc')->take(4)->get(); //最後發表文章
        $allcate = Category::all(); //所有分類
        return view('home.about',compact('navs','lastpost','allcate'));
    }

    //導覽分類文章
    public function cate($type){
            $navs =Navs::all();     //導覽列表
            $hot =Article::orderBy('art_views','desc')->take(10)->get(); //前10篇熱門文章
            $lastpost =Article::orderBy('art_time','desc')->take(4)->get();
            
            $allcate = Category::all();
            $tags=Article::all();
            //取出所有tags並過濾重複的tag     
            $str_tags ="";
            foreach($tags as $key=>$value){
                $arr= explode('/', $value->art_tag);
                    for($i=0;$i<count($arr);$i++){
                        $str_tags .=$arr[$i].'/';
                    }
                    $str=rtrim($str_tags, "/");
                $str_tag = array_unique(explode('/', $str));
            }
            $cate = Category::where('cate_pid',$type)->get(); //找到底下子分類

            //將搜尋到的字串轉array
            $k ='';
            foreach($cate as $key=>$value){
                $k.= $value->cate_id.',';
            }
            $kp=rtrim($k, ",");
            $res = explode(",", $kp); 
            
            $search = Article::whereIn('cate_id',$res)->get(); //搜尋array
            
            $data =Article::whereIn('cate_id',$res)->orderBy('art_time','desc')->paginate(4);   //圖文列表(分頁)
            return view('home.category',compact('search','navs','lastpost','allcate','str_tag','hot','data'));
    }

}
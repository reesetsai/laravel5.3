<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $primaryKey="cate_id";
    public $timestamps=false;
    protected $guarded=[];

    public function tree(){
        //get all data orderby cate_order by ASC
    	$categorys = $this->orderBy('cate_order','asc')->get();
        //return $data to controller
        return $data = $this->getTree($categorys,'cate_name','cate_id','cate_pid');
    }

    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0){
        $arr = array();
        foreach($data as $key=>$value){
            if($value->$field_pid == $pid){
                $data[$key]['_'.$field_name] = $data[$key][$field_name];
                $arr[] = $data[$key];

                foreach ($data as $num => $val) {
                    if($val->$field_pid == $value->$field_id){
                        $data[$num]['_'.$field_name] = '-----'.$data[$num][$field_name];
                        $arr[]= $data[$num];
                    }
                }
            }
        }
        return $arr;
    }

}

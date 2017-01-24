@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>&raquo; 導覽列總覽
    </div>
        <div class="result_wrap">
            <div class="result_title">
                <h3>配置管理頁面</h3>
                @if(count($errors)>0)
                    <div class="mark">
                        @if(is_object($errors))
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @else
                            <p>{{$errors}}</p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                </div>
            </div>
        <div class="result_wrap">
            <div class="result_content">
                <form action="{{url('admin/config/changecontent')}}" method="post">
                {{csrf_field()}}
                    <table class="list_tab">
                        <tr>
                            <th class="tc">排序</th>
                            <th class="tc">ID</th>
                            <th>配置標題</th>
                            <th>配置名稱</th>
                            <th>配置內容</th>
                            <th>編輯</th>
                        </tr>
                        @foreach($data as $value)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$value->conf_id}})" value="{{$value->conf_order}}">
                            </td>
                            <td class="tc">{{$value->conf_id}}</td>
                            <td>
                                <a href="#">{{$value->conf_title}}</a>
                            </td>
                            <td>
                                {{$value->conf_name}}
                            </td>
                            <td>
                                <input type="hidden" name="conf_id[]" value="{{$value->conf_id}}">
                                {!!$value->_html!!}
                            </td>
                            <td>
                                <a href="{{url('admin/config/'.$value->conf_id.'/edit')}}">修改</a>
                                <a href="javascript:void(0)" onclick="return delcate({{$value->conf_id}});">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                        <div class="btn_group">
                            <input type="submit" value="送出">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回" >
                        </div>                   
                </form>
            </div>
        </div>
    </form>
<script>
    function changeOrder(obj,conf_id){
        var conf_order = $(obj).val();
        $.post("{{url('admin/config/changeorder')}}",{'_token':'{{csrf_token()}}','conf_id':conf_id,'conf_order':conf_order},function(data){
            layer.msg(data.msg, function(){
            });
        })
    }
    function delcate(conf_id){
        layer.confirm('您正要刪除文章', {
          btn: ['確定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/config/')}}/"+conf_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
                if(data.status==0){
                    location.href=location.href;
                    layer.msg(data.msg);
                }else{
                    layer.msg(data.msg);
                }
            })
        }, function(){

        });
    }
</script>
@endsection
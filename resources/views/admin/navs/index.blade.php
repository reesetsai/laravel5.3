@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a>&raquo; 導覽列總覽
    </div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>外部連接管理</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>新增導覽列</a>
            </div>
        </div>
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">排序</th>
                    <th class="tc">ID</th>
                    <th>名稱</th>
                    <th>標題</th>
                    <th>網址</th>
                    <th>編輯</th>
                </tr>
                @foreach($data as $value)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$value->nav_id}})" name="ord[]" value="{{$value->nav_order}}">
                    </td>
                    <td class="tc">{{$value->nav_id}}</td>
                    <td>
                        <a href="#">{{$value->nav_name}}</a>
                    </td>
                    <td>{{$value->nav_en}}</td>
                    <td>{{$value->nav_url}}</td>
                    <td>
                        <a href="{{url('admin/navs/'.$value->nav_id.'/edit')}}">修改</a>
                        <a href="javascript:void(0)" onclick="return delcate({{$value->nav_id}});">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
<script>
    function changeOrder(obj,nav_id){
        var nav_order = $(obj).val();
        $.post("{{url('admin/navs/changeorder')}}",{'_token':'{{csrf_token()}}','nav_id':nav_id,'nav_order':nav_order},function(data){
            layer.msg(data.msg, function(){
            });
        })
    }
    function delcate(nav_id){
        layer.confirm('您正要刪除文章', {
          btn: ['確定','取消']
        }, function(){
            $.post("{{url('admin/navs/')}}/"+nav_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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
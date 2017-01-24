@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a>&raquo; 全部分類
    </div>
        <div class="result_wrap">
            <div class="result_title">
                <h3>分類列表</h3>
            </div>
            <div class="short_wrap">
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增分類</a>
            </div>
        </div>
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">排序</th>
                    <th class="tc">ID</th>
                    <th>分類名稱</th>
                    <th>標題</th>
                    <th>瀏覽次數</th>
                    <th>發布者</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $value)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$value->cate_id}})" name="ord[]" value="{{$value->cate_order}}">
                    </td>
                    <td class="tc">{{$value->cate_id}}</td>
                    <td>
                        <a href="#">{{$value->_cate_name}}</a>
                    </td>
                    <td>0</td>
                    <td>{{$value->cate_view}}</td>
                    <td>admin</td>
                    <td>2014-03-15 21:11:01</td>
                    <td>
                        <a href="{{url('admin/category/'.$value->cate_id.'/edit')}}">修改</a>
                        <a href="javascript:void(0)" onclick="return delcate({{$value->cate_id}});">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
<script>
    function changeOrder(obj,cate_id){
        var cate_order = $(obj).val();
        $.post("{{url('admin/cate/changeorder')}}",{'_token':'{{csrf_token()}}','cate_id':cate_id,'cate_order':cate_order},function(data){
            layer.msg(data.msg, function(){
            });
        })
    }
    function delcate(cate_id){
        layer.confirm('您正要刪除文章', {
          btn: ['確定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/category/')}}/"+cate_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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
@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>&raquo; 全部分類
    </div>
    <form action="#" method="post">
        {{csrf_field()}}
        <div class="result_wrap">
            <div class="result_title">
                <h3>外部連接管理</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/links/create')}}"><i class="fa fa-plus"></i>新增外部連接網址</a>
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
                            <input type="text" onchange="changeOrder(this,{{$value->link_id}})" name="ord[]" value="{{$value->link_order}}">
                        </td>
                        <td class="tc">{{$value->link_id}}</td>
                        <td>
                            <a href="#">{{$value->link_name}}</a>
                        </td>
                        <td>{{$value->link_title}}</td>
                        <td>{{$value->link_url}}</td>
                        <td>
                            <a href="{{url('admin/links/'.$value->link_id.'/edit')}}">修改</a>
                            <a href="javascript:void(0)" onclick="return delcate({{$value->link_id}});">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
<script>
    function changeOrder(obj,link_id){
        var link_order = $(obj).val();
        $.post("{{url('admin/links/changeorder')}}",{'_token':'{{csrf_token()}}','link_id':link_id,'link_order':link_order},function(data){
            layer.msg(data.msg, function(){
            });
        })
    }
    function delcate(link_id){
        layer.confirm('您正要刪除文章', {
          btn: ['確定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/links/')}}/"+link_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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
@extends('layouts.admin')
@section('content')
<body>
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 文章管理
    </div>
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>文章列表</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                </div>
            </div>
        </div>
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">

                    <tr>
                        <th class="tc">ID</th>
                        <th>標題</th>
                        <th>點擊率</th>
                        <th>作者</th>
                        <th>更新時間</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $value)
                    <tr>
                        <td style="text-align: center;">{{$value->art_id}}</td>
                        <td>{{$value->art_title}}</td>
                        <td>{{$value->art_views}}</td>
                        <td>{{$value->art_editor}}</td>
                        <td>{{date('Y-m-d',$value->art_time)}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$value->art_id.'/edit')}}">編輯</a>
                            <a href="javascript:void(0)" onclick="return delart({{$value->art_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
<style>
    .result_content ul li span{
        font-size: 15px;
        padding: 6px 12px;
    }
</style>
<script type="text/javascript">
    function delart(art_id){
        layer.confirm('您正要刪除文章', {
          btn: ['確定','取消']
        }, function(){
            $.post("{{url('admin/article/')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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
@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 新增配置
    </div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>配置操作</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="result_wrap">
        <form action="{{url('admin/config')}}" method="post" id="commentForm">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>標題：</th>
                        <td>
                            <input type="text" name="conf_title" id="conf_title">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>名稱：</th>
                        <td>
                            <input type="text" name="conf_name" id="conf_name">
                            <span><i class="fa fa-exclamation-circle yellow"></i>導覽名稱(中文)
                        </td>
                    </tr>
                    <tr>
                        <th>類型：</th>
                        <td>
                            <input type="radio" name="field_type" value="input" onclick="showVal()" id="field_type" checked>input　
                            <input type="radio" name="field_type" value="textarea" onclick="showVal()" id="field_type">textarea　
                            <input type="radio" name="field_type" value="radio" onclick="showVal()" id="field_type">radio　
                        </td>
                    </tr>
                    <tr class="field_value">
                        <th>類型值：</th>
                        <td>
                            <input type="text" class="lg" name="field_value" id="field_value"><br>
                             <span><i class="fa fa-exclamation-circle yellow"></i>此值只有類型為redio才需要設置:1|啟用;0|關閉</span>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_order" id="conf_order">
                        </td>
                    </tr>
                    <tr>
                        <th>tip：</th>
                        <td>
                            <textarea name="conf_tips" id="" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="送出">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
<script type="text/javascript">
        showVal();
        function showVal(){
            var type =$("input[name=field_type]:checked").val()
            
            if(type =='radio'){
                $('.field_value').show();
            }else{
                $('.field_value').hide();
            }
        }
</script>
@endsection
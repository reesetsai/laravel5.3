@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 配置編輯
    </div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>配置編輯</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @foreach($errors->all() as $error)
                       
                    @endforeach <p>{{$error}}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="result_wrap">
        <form action="{{url('admin/config'.'/'.$data->conf_id)}}" method="post" id="commentForm">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>標題：</th>
                        <td>
                            <input type="text" name="conf_title" id="conf_title" value="{{$data->conf_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>名稱：</th>
                        <td>
                            <input type="text" name="conf_name" id="conf_name" value="{{$data->conf_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th>類型：</th>
                        <td>
                            <input type="radio" name="field_type" value="input" onclick="showVal()" id="field_type" @if($data->field_type=='input') checked @endif>input　
                            <input type="radio" name="field_type" value="textarea" onclick="showVal()" id="field_type" @if($data->field_type=='textarea') checked @endif>textarea　
                            <input type="radio" name="field_type" value="radio" onclick="showVal()" id="field_type" @if($data->field_type=='radio') checked @endif>radio　
                        </td>
                    </tr>
                    <tr class="field_value">
                        <th>類型值：</th>
                        <td>
                            <input type="text" class="lg" name="field_value" id="field_value" value="{{$data->field_value}}"><br>
                             <span><i class="fa fa-exclamation-circle yellow"></i>此值只有類型為redio才需要設置 : 1|啟用 ; 0|關閉</span>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_order" id="conf_order" value="{{$data->conf_order}}">
                        </td>
                    </tr>
                    <tr>
                        <th>tip：</th>
                        <td>
                            <textarea name="conf_tips" id="conf_tips" cols="30" rows="10"">{{$data->conf_tips}}</textarea>
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
        var type = $('input[name=field_type]:checked').val();
        if(type=='radio'){
            $('.field_value').show();
        }else{
            $('.field_value').hide();
        }
    }
</script>
@endsection
@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 外部連接管理
    </div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>外部連接</h3>
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
        <form action="{{url('admin/links')}}" method="post" id="commentForm">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>外部連接名稱：</th>
                        <td>
                            <input type="text" name="link_name" id="link_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>外部連接標題：</th>
                        <td>
                            <input type="text" class="lg" name="link_title" id="link_title">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>URL：</th>
                        <td>
                            <input type="text" class="lg" name="link_url" id="link_url" value="http://">
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="link_order" id="link_order">
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

</script>
@endsection
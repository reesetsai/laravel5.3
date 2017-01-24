@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 前端導覽列
    </div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
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
        <form action="{{url('admin/navs')}}" method="post" id="commentForm">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>導覽列名稱：</th>
                        <td>
                            <input type="text" name="nav_name" id="nav_name">
                            <span><i class="fa fa-exclamation-circle yellow"></i>導覽名稱(中文)
                            <input type="text" class="sm" name="nav_en" id="nav_en">
                            <span><i class="fa fa-exclamation-circle yellow"></i>導覽名稱(英文縮寫)</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>URL：</th>
                        <td>
                            <input type="text" class="lg" name="nav_url" id="nav_url" value="http://">
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="nav_order" id="nav_order">
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
@endsection
@extends('layouts.admin')
@section('content')

<div class="crumb_warp">
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 修改密碼
</div>
@if(session('success'))
    {{session('success')}}
@endif

@if(count($errors)>0)
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
@endif
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密碼</h3>
    </div>
</div>
<div class="result_wrap">
    <form method="post" action="">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>原密碼：</th>
                <td>
                    <input type="password" name="password_o"> </i>請輸入原密碼</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新密碼：</th>
                <td>
                    <input type="password" name="password"> </i>新密碼6-20位</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>確認密碼：</th>
                <td>
                    <input type="password" name="password_confirmation"> </i>再次輸入密碼</span>
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
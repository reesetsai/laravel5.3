@extends('layouts.admin')
@section('content')
	<div class="crumb_warp">
		<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 後台系統基本訊息
	</div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>系统基本信息</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>操作系統</label><span>{{PHP_OS}}</span>
                </li>
                <li>
                    <label>運行環境</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                </li>
                <li>
                    <label>最大上傳</label><span>{{get_cfg_var('upload_max_filesize')}}</span>
                </li>
                <li>
                    <label>時間</label><span>{{date('Y年m月d日 H時i分s秒')}}</span>
                </li>
                <li>
                    <label>伺服器名稱/IP</label><span>{{$_SERVER['REMOTE_ADDR']}}</span>
                </li>
                <li>
                    <label>Host</label><span>{{$_SERVER['HTTP_HOST']}}</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="result_wrap">
        <div class="result_title">
            <h3>相關介紹</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>前台網站：</label><span><a href="#">http://www.前台網址.com</a></span>
                </li>
                <li>
                    <label><img border="0" src="http://www.freeiconspng.com/uploads/facebook-logo-png-2-0.png" width="30" height="15">FB：</label><span><a href="http://www.facebook.com">www.facebook.com</a></span>
                </li>
                <li>
                    <label>相關作品</label><span><a href="#"></a></span>
                </li>
            </ul>
        </div>
    </div>
@endsection
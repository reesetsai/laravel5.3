@extends('layouts.admin')
@section('content')
	<div class="top_box">
		<div class="top_left">
			<div class="logo">後台管理介面</div>
			<ul>
				<li><a href="{{url('admin/info')}}" class="active" target="main">首頁</a></li>
				<li><a href="{{url('admin/category/create')}}" target="main">新增分類</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理員：admin</li>
				<li><a href="{{url('admin/password')}}" target="main">修改密碼</a></li>
				<li><a href="{{url('admin/logout')}}">登出</a></li>
			</ul>
		</div>
	</div>
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>全部分類</a></li>
                    <li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>所有文章</a></li>
                    <li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>前台導覽類</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系統設置</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>外部連接管理</a></li>
                    <li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-database"></i>網站配置</a></li>
                </ul>
            </li>
        </ul>
	</div>

	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe> 
	</div>

	<div class="bottom_box">
		&copy; Tsai practice
	</div>
@endsection

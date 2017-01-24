<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Laravel 練習</h1>
		<h2>Laravel 後台管理平台</h2>
		@if(session('msg'))
			<p style="text-align:center;color:red;">{{session('msg')}}</p>
		@endif
		<div class="form">
			<form action="" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="userpassword" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" name="code" class="code">
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}'">
					</li>
					<li>
						<input type="submit" value="進入作品"/>
					</li>
				</ul>
			</form>
			<p><a href="#">回到前頁</a> &copy; Tsai practice</a></p>
		</div>
	</div>
</body>
</html>
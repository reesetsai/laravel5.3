<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
	<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/ch-ui.admin.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/layer/layer.js')}}"></script>
	<script src="{{asset('/js/tinymce/tinymce.min.js')}}"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
</head>
<body>
@yield('content')
</body>
</html>
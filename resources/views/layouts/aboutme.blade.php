<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rubel Miah">
	
	<!-- favicon icon -->
	<link rel="shortcut icon" href="images/icon/favicon.png">

	<title>ReeseTsai---blog 作品</title>

	<!-- common css -->
	<link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('home/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('home/css/owl.theme.css')}}">
	<link rel="stylesheet" href="{{asset('home/css/slicknav.css')}}">
	<link rel="stylesheet" href="{{asset('home/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">

	<!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.js"></script>
    <![endif]-->

</head>
<body class="home blog">
	<!--preloader start-->
    <div id="st-preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>
	<!--/preloader end-->

	<!--header start-->
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="top-menu-are">
						<div id="navigation-wrapper">
							<ul class="top-menu text-center">
								@foreach($navs as $key=>$value)
								<li class=""><a href="{{$value->nav_url}}">{{$value->nav_name}}</a>
								@endforeach
							</ul>					
						</div>
					</div>
					<div class="menu-mobile"></div>
				</div>
			</div>
		</div>
	</header>
	<!--/header end-->
	
	<div class="main-logo text-center">
		<a href="#"><img src="http://codehow.io/content/images/2016/03/laravel_framework-1.jpg" alt="Rosy" style="height: 130px;"></a>
	</div>

@yield('content')
<!--sidebar start-->
			<div class="col-md-4">
	    		<div class="primary-sidebar widget-area" role="complementary">

					<aside class="widget widget_search">
						<form role="search" method="post" id="searchform" action="{{url('/search/')}}">
						{{csrf_field()}}
	    					<div> 
	    						<input type="text" placeholder="Search here..." name="keywords" id="s" />
								<button type="submit" class="submit"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</aside>

			        <aside class="widget">
			        	<h1 class="widget-title">最新文章</h1>
				        <div class="latest-posts latest">
				        	@foreach($lastpost as $key=>$value)
						        <div class="media">
							        <div class="latest-post-thumb">
							        	<a href="{{url('/article/'.$value->art_id)}}"><img src="{{asset("$value->art_thumb")}}" class="img-responsive" alt="" style="width: 300px;height: 350px;" /></a>
							        </div>
							        <div class="media-body">

								        <div class="entry-meta">
									        @foreach($allcate as $key=>$val)
									        	@if($value->cate_id==$val->cate_id)
									        		<a href="{{url('/article/'.$value->art_id)}}" rel="category tag">{{$val->cate_name}}</a>
									        	@endif
									        @endforeach
								        </div>
								        <h3 class="entry-title"><a href="{{url('/article/'.$value->art_id)}}">{{$value->art_title}}</a></h3>
							        </div>
						        </div>
					        @endforeach
				        </div>
			        </aside>

				</div>
			</div>
			<!--sidebar end-->

		</div>
	</div>
	<!--/blog end-->
	<!--instafeed carousel start-->
	<div class="instafeed-carousel">
		<h3 class="text-center instafeed-title">Follow Rosy @instagram</h3>
		<div id="instafeed" class="owl-carousel owl-theme">
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed1.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed2.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed3.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed4.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed5.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed6.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed7.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('images/instafeed8.jpg')}}">
				</a>
		    </div>
		    <div class="item">
		        <a class="animation" href="">
					<img class="img-responsive" src="{{asset('home/images/instafeed9.jpg')}}">
				</a>
		    </div>
	    </div>
	</div>
	<!--/instafeed carousel end-->
<!--footer start-->
<footer id="footer">
	<div class="footer-social text-center">
		<a class="facebook" href="#" target="_blank"><i class="fa fa-facebook-square"></i> <span class="hidden-sm hidden-xs">Facebook</span></a>
		<a class="twitter" href="#" target="_blank"><i class="fa fa-twitter"></i> <span class="hidden-sm hidden-xs">Twitter</span></a>
		<a class="google-plus" href="#" target="_blank"><i class="fa fa-google-plus"></i> <span class="hidden-sm hidden-xs">Google+</span></a>
		<a class="pinterest" href="#" target="_blank"><i class="fa fa-pinterest-p"></i> <span class="hidden-sm hidden-xs">Pinterest</span></a>
		<a class="instagram" href="#" target="_blank"><i class="fa fa-instagram"></i> <span class="hidden-sm hidden-xs">Instagram</span></a>
		<a class="bloglovin" href="#" target="_blank"><i class="fa fa-heart"></i> <span class="hidden-sm hidden-xs">Bloglovin</span></a>
	</div><!-- /Footer Social -->
	<div class="footer-copy-right">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copy-right-text pull-left">
						<p>蔡承達 - 作品前端版面bootstrap免費樣式 <a href="">ShapedTheme</a> in Dhaka, Bangladesh</p>
					</div><!-- /Copyright Text -->
					
					<div class="scroll-up pull-right">
				        <a href="#">Back to top</a>
				    </div>
					<!-- Scroll Up -->
				</div>
			</div>
		</div>
	</div><!-- Footer Copy Right -->
</footer>
<!--/footer end-->
</body>
	<!-- js files -->
	<script type="text/javascript" src="{{asset('home/js/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/jquery.fitvids.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/masonry.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/smoothscroll.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/jquery.slicknav.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/scripts.js')}}"></script>
</html>
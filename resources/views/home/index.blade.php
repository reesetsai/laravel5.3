@extends('layouts.home')
@section('content')
	<!--featured slider start-->
	<div id="featured-slider" class="owl-carousel slider-one">
		@foreach($hot as $key=>$value)
	    <div class="item">
	        <a href="#" title="Day Started with Coffe">
				<img src="{{asset("$value->art_thumb")}}" class="img-responsive" alt="" style="width: 253px;height: 187.4px;" />
			</a>
	    	<div class="slider-item-cap">
	    	@foreach($allcate as $key=>$val)
	    		@if($value->cate_id==$val->cate_id)
	    			<div class="s-cat"><a href="#" rel="category tag">{{$val->cate_name}}</a></div>
	    		@endif
	    	@endforeach
	    		<a class="s-title" href="{{url('/article/'.$value->art_id)}}">{{$value->art_title}}</a>
	    	</div>
	    </div>
	    @endforeach
	</div>
	<!--/featured slider end-->


	<!--blog start-->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!--post start-->
					@foreach($data as $key=>$value)
					<div class="col-md-12"> 
    					<article class="post hentry">
			                <div class="thumbnails">
			                    <a href="#" title=""><img src="{{asset("$value->art_thumb")}}" class="post-thumbnail img-responsive" alt="" style="" /></a>
			                </div>
							<div class="post-content-area">
								<header class="entry-header text-center">
									@foreach($allcate as $key=>$val)
										@if($value->cate_id==$val->cate_id)
	                                    	<div class="post-cat"><h4><a href="#" rel="category tag">{{$val->cate_name}}</a></h4></div>
	                                    @endif
	                                @endforeach
                                	<a href="#" rel="bookmark" class="entry-title">{{$value->art_title}}</a>   
								</header> <!--/.entry-header -->

								<div class="entry-content">
                					{!!$value->art_description!!}<a href="{{url('/article/'.$value->art_id)}}" class="more-link"><span class="read-more-button">繼續閱讀</span></a>
                            	</div><!-- .entry-content -->

                            	<div class="entry-meta text-center">
                                    <span class="posted-on">{{date('Y-m-d',$value->art_time)}}</span>
									<div class="post-social-button">
										<ul>
											<li>
												<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
											</li>

											<li>
												<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
											</li>

											<li>
												<a class="g-puls" href="#"><i class="fa fa-google-plus"></i></a>
											</li>

											<li>
												<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
											</li>

											<li>
												<a class="pinterest" href=""><i class="fa fa-pinterest"></i></a>
											</li>

											<li>
												<a class="envelope" href=""><i class="fa fa-envelope-o"></i></a>
											</li>
										</ul>
									</div>
                                    <span class="post-comment"><a href="#">5 Comments</a></span>
                                    <div class="tagcloud">
                                    <?php $arr=explode('/', $value->art_tag); ?>
                                    	@for($i=0;$i<count($arr);$i++)
		                                    <a href="{{url('/category/'.$arr[$i])}}" title="">{{$arr[$i]}}</a>
		                                @endfor
                                    </div>
                                </div><!-- .entry-meta -->
        					</div>
					    </article>
					</div>
					@endforeach
					<!--/post end-->
					
					<!--pagination start-->
					<div class="col-md-12">
						{{$data->links()}}				
					</div>
					<!--/pagination end-->

				</div>
			</div> <!-- /col -->
	
<style type="text/css">
	.post-thumbnail{
  		position: relative;
		margin-left: auto;
		margin-right: auto;
		width: 250px;
		height: 360px;
	}
</style>
@endsection
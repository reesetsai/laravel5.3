@extends('layouts.home')
@section('content')
<!--blog start-->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!--post start-->
					
					<div class="col-md-12">
						@foreach($article as $key=>$value)
    					<article class="post hentry">
			                <div class="thumbnails">
			                    <a href="#" title=""><img src="{{asset("$value->art_thumb")}}" class="post-thumbnail img-responsive" alt="" /></a>
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
                					<p>{!!$value->art_content!!}</p>
                            	</div><!-- .entry-content -->

                            	<div class="entry-meta text-center">
                            		<div class="share-this hidden-xs">Share this</div>
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
					    @endforeach

					    <nav class="next-previous-post clearfix media" role="navigation">
			                <div class="row">
			                    <!-- Previous Post -->
			                    @if($field['pre'])
			                    <div class="previous-post col-sm-6 pull-left">
			                        <div class="nav-previous"><i class="fa fa-angle-left"></i> <a href="{{url('/article/'.$field['pre']['art_id'])}}" rel="prev">{{$field['pre']['art_title']}}</a>
			                        </div>                    
			                    </div>
			                    @endif
			                    <!-- Next Post -->
			                    @if($field['next'])
			                    <div class="next-post col-sm-6 pull-right text-right">
			                        <div class="nav-next"><a href="{{url('/article/'.$field['next']['art_id'])}}" rel="next">{{$field['next']['art_title']}}</a> <i class="fa fa-angle-right"></i></div>                    
			                    </div>
			                    @endif
			                </div>
			            </nav><!-- /.navigation -->

			            <div class="user-profile text-center">
    						<div class="author-avater">
        						<img alt="" src="{{asset('uploads/485367_4078645059559_62536364_n.jpg')}}" class="img-responsive">    
        					</div>
						    <div class="profile-heading">
						        <p class="story">Article by</p>
						        <a href="#" title="Posts by Rosy" rel="author">About Me</a>    
						    </div>
						    <div class="author-description">
						        你好，我叫蔡承達，這個ＢＬＯＧ是我Ｌａｒａｖｅｌ的第一個成品
								是目前學ＰＨＰ半年已來作品中比較完整包含基本功能的前後台，
								後台可管理前台所有的文章內容項目，
								後台的版型是套用較為簡易好操作的基本的ＣＲＵＤ功能都有完善
								前台模板使用Ｂｏｏｔｓｒａｐ版型，在此謝謝您的來訪！！
						    </div>
						    <ul class="author-social-profile">
						        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
						        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
						        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
						        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						        <li><a href="http://#"><i class="fa fa-globe"></i></a></li>    
						    </ul>
						</div><!-- /.user-profile -->

						<div class="related-posts"> 
        					<h3 class="common-title">你也許會喜歡</h3>
        					<div class="row">
        						@foreach($random as $key=>$value)
                            	<div class="col-sm-4">
									<div class="single-related-posts">
                    					<a href="{{url('/article/.$value->art_id')}}" title="Standard Series on One morning">
                                            <img width="590" height="390" src="{{asset("$value->art_thumb")}}" class="img-responsive" alt="">
                                        </a>
                						<header>
                        					<h3><a href="#">Standard Series on…</a></h3>
                        					<p>{{date('Y-m-d',$value->art_time)}}</p>
                    					</header>
                					</div> 
                				</div>
                				@endforeach
                    		</div>
    					</div><!-- /.related-posts -->

    					<div id="comments" class="comments-area comments">
    						<div id="respond" class="comment-respond">
								<h3 id="reply-title" class="comment-reply-title">Leave a Reply</h3>
								<form action="" method="post" id="commentform" class="comment-form row">
									<div class="col-md-4">
										<input id="author" name="author" type="text" placeholder="Name *" value="" size="30" aria-required="true">
									</div>
									<div class="col-md-4">
										<input id="email" name="email" type="text" placeholder="Email *" value="" size="30" aria-required="true">
									</div>
									<div class="col-md-4">
										<input id="url" name="url" type="text" placeholder="Website" value="" size="30">
									</div>
									<div class="col-md-12">
										<textarea id="comment" placeholder="Write your comment..." name="comment" aria-required="true"></textarea>
									</div>						
									<p class="form-submit col-md-12">
										<input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
									</p>					
								</form>
							</div><!-- #respond -->
						</div>

					</div>
					<!--/post end-->

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
	.img-responsive{
		width: 250px;
		height: 320px;
	}
</style>
@endsection
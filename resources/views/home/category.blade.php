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
                    @foreach($search as $key=>$value)
                    <div class="col-md-12 list">  
                        <article class="media hentry">
                            <div class="thumbnails media-left">
                                <a href="#" title=""><img src="{{asset("$value->art_thumb")}}" class="list-thumbnail img-responsive" alt="" style="width: 320px;height: 250px;"></a>
                            </div>
                            <div class="media-body post-content-area">
                                <header class="entry-header">
                                    @foreach($allcate as $key=>$val)
                                        @if($value->cate_id==$val->cate_id)
                                            <div class="post-cat"><h4>{{$val->cate_name}}</h4></div>
                                        @endif
                                    @endforeach
                                    <a href="{{url('/article/'.$value->art_id)}}" rel="bookmark" class="entry-title">{{$value->art_title}}</a>            
                                </header> <!--/.entry-header -->
                                <div class="entry-content">
                                    <p>{!!$value->art_description!!}</p>
                                </div><!-- .entry-content -->
                                <div class="entry-meta">
                                    <span class="posted-on">{{date('Y-m-d',$value->art_time)}}</span>
                                    <span class="post-comment"><a href="#">5 Comments</a></span>
                                </div><!-- .entry-meta -->
                            </div>
                        </article>
                    </div>
                    @endforeach
                    <!--pagination start-->
                    <div class="col-md-12">
                        {{$data->links()}}              
                    </div>
                    <!--/pagination end-->
                </div>
            </div>
@endsection
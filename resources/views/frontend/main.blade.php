@extends('frontend.default')
@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($slider as $key => $items)
        <?php $title_slider = text_limit($items["title_baibao"],25); ?>
            @if($key ==0)
                <div class="item active">
                    <div class="thumb2" style="background-image: url({!! $items['url_image']!!});"></div>
                    <div class="carousel-caption">
                        <a class ="new-slider" href="{!! $items['url_baibao']!!}"><h4>{!!$title_slider!!}</h4></a>
                    </div>  
                </div>
            @endif
            @if($key !=0)
                <div class="item">
                    <div class="thumb2" style="background-image: url({!! $items['url_image']!!});"></div>
                    <div class="carousel-caption">
                        <a  class ="new-slider" href="{!! $items['url_baibao']!!}"><h4>{!!$title_slider!!}</h4></a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<hr>
<h2 class="title-head">{!! $title !!}</h2>

<div class="article" >
	@foreach($baibao as $items)
	    <div class="title">
		    <?php 
				//Xu ly title
				$title_baibao = text_limit($items["title_baibao"],25);
			?>
	        <h3>
	            <a href="{!! $items["url_baibao"] !!}" target="_blank">{!!$title_baibao!!}</a>
	        </h3>
	        <p class="lead">
	            by <a href="<?php echo url_xs($items["url_baibao"]); ?>"><?php echo url_r($items["url_baibao"]); ?></a>
	        </p>
	        <p><span class="glyphicon glyphicon-time"></span> Posted on {!! $items["created_at"] !!}</p>
	    </div>
	    <div class="content" >
	        <div class="row">
	            <div class="col-md-5">
	                <div class="thumb" style="background-image: url({!! $items["url_image"] !!});"></div>
	            </div>
	            <div class="col-md-7" >
	            <?php 
					//Xu ly content
					$content = text_limit($items["content"],100);
				?>
	                <p>{!! $content !!}</p>
	                
	                <a class="btn btn-primary" href="{!! $items["url_baibao"] !!}" target="_blank">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
	                
	            </div>
	        </div>
	    </div>
	    <hr>
	@endforeach
</div>
<hr>

<!-- Pager -->
<ul class="pager">
	@if($baibao->currentPage() != 1)
	    <li class="previous">
	        <a href="{!! $baibao->url($baibao->currentPage()-1) !!}">&larr; Newer</a>
	    </li>
    @endif
    @if($baibao->lastPage() <=10)
				@for ($i = 1; $i <= $baibao->lastPage(); $i =$i+1)
					<li class ="{!! ($baibao->currentPage() == $i) ? 'active' :'gradient' !!}">
						<a href="{!! $baibao->url($i) !!}" >{!! $i !!}</a>
					</li>
				@endfor
			@endif
			@if($baibao->lastPage() >10)
				@if(($baibao->lastPage() - $baibao->currentPage()) >=10)
				@for ($i = $baibao->currentPage(); $i <= $baibao->currentPage() + 9; $i =$i+1)
					<li class ="{!! ($baibao->currentPage() == $i) ? 'active' :'gradient' !!}">
						<a href="{!! $baibao->url($i) !!}" >{!! $i !!}</a>
					</li>
				@endfor
				@endif
				@if(($baibao->lastPage() - $baibao->currentPage())< 10)
				@for ($i = $baibao->lastPage() -10; $i <= $baibao->lastPage(); $i =$i+1)	
					<li class ="{!! ($baibao->currentPage() == $i) ? ' active' :'gradient' !!}">
						<a href="{!! $baibao->url($i) !!}" >{!! $i !!}</a>
					</li>
				@endfor
				@endif
			@endif
    @if($baibao->lastPage() !=0)
	    @if($baibao->currentPage() != $baibao->lastPage())
		    <li class="next">
		        <a href="{!! $baibao->url($baibao->currentPage()+1) !!}">Older &rarr;</a>
		    </li>
	    @endif
    @endif
</ul>
@stop
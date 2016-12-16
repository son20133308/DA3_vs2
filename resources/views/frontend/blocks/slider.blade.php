<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <?php 
        $slider = App\Models\baibao::latest()->take(3)->get();
        
    ?>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($slider as $key => $items)
        <?php $title_slider = text_limit($items["title_baibao"],25); ?>
            @if($key ==0)
                <div class="item active">
                    <div class="thumb2" style="background-image: url({!! $items['url_image']!!});"></div>
                    <div class="carousel-caption">
                        <a href="{!! $items['url_baibao']!!}"><p>{!!$title_slider!!}</p></a>
                    </div>  
                </div>
            @endif
            @if($key !=0)
                <div class="item">
                    <div class="thumb2" style="background-image: url({!! $items['url_image']!!});"></div>
                    <div class="carousel-caption">
                        <a href="{!! $items['url_baibao']!!}"><p>{!!$title_slider!!}</p></a>
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
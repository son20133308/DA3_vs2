<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Tech news</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php  
                $theloai = App\Models\theloai::select('id_theloai','ten','slug','parent_id')->get(); 
            ?>
            @foreach($theloai as $items)
                @if($items["parent_id"]==0)
                <?php 
                    $i=0;
                    $theloai = App\Models\theloai::select('id_theloai','ten','slug','parent_id')->get();
                    foreach ($theloai as $value) {   
                        if($value["parent_id"] == $items["id_theloai"]) $i++;
                    }
                    $dropdown = "";
                    if($i!=0) $dropdown = $dropdown."dropdown";
                ?>

                <li class="dropdown">
                    <a href="{!! url('the-loai/'.$items["id_theloai"].'/'.$items["slug"]) !!}" class="dropdown-toggle" data-toggle="{!!$dropdown!!}" role="button" aria-haspopup="true" aria-expanded="false">{!! $items["ten"] !!}</a>
                    <ul class="dropdown-menu"
                        <li><a href="#"><?php Menu($theloai , $items["id_theloai"]); ?></a></li>
                    </ul>
                </li>
                @endif
            @endforeach
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
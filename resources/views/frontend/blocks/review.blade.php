<div class="well">
    <h4>ĐÁNH GIÁ</h4> 
    <div class="row well2">

        <form action="/danhgia" method="POST" style=" display:inline-block;">
        @include('frontend.errors.errors')
        @include('frontend.errors.flash')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p>Email hoặc tên của bạn</p>
            <input class="form-control" type="text" name="email" style="width:100%;"/>
            <p id="email-error" style="color:red;"></p>
            <p>Đánh giá:</p>
            <textarea  class="form-control" type="text" rows="5" cols="44" name="content" style="display:block;"></textarea>
            <p id="request-error" style="color:red;"></p>
            <input type="submit" value="Gửi đánh giá" class="btn btn-default"/>
        </form> 
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>    

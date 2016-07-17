@extends('frontend.layouts.item')
@section('content-head')
 <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!!$item->title!!}
                    <small><span class="label label-danger">{!!$defaultCountry->symbol!!} {!!$item->price!!}</span></small>
                </h1>
               
            </div>
        </div>
@endsection

@section('content')
  <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">

                @if(count($item_images) >1)            

                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                     {{--*/ $i = 0 /*--}}
                     @foreach($item_images as $item_image)
                        <div class="item  @if($i==0){{'active'}} @endif ">
                            <img class="img-responsive" src="{!!asset('uploads/'.$item_image->image) !!}" alt=""  width="750"  height="500"> 
                        </div>
                        {{--*/ $i++ /*--}}
                      @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                @else

                    @if(empty($item->image))
                        <img alt="{!!$item->title!!}" src="http://placehold.it/750x500?text=I{!!$item->title!!}"class="img-responsive">
                    @else
                        @if(!empty($item->s3key))
                         <?php 
                          $s3 = AWS::get('s3');
                          $url=$s3->getObjectUrl(config('laralist.aws_s3_bucket'),date("h:i:s", time() + 30), array('Scheme'));
                        ?>
                        @else
                        <img class="img-responsive" src="{!!$url!!}" alt="">
                        <img class="img-responsive" src="{!!asset('uploads/'.$item->image) !!}" alt="">
                        @endif
                     @endif
                @endif

            </div>

            <div class="col-md-4">
                <h3>Description</h3>
                <p>{!!$item->description!!}</p>
                
                <ul class="" style="list-style: none;padding:0px">
                    <li><strong>Category</strong> {!!$item->category->title!!}</li>
                    <li><strong></i>Country</strong> {!!$item->country->name!!}</li>                            
                </ul>

                <address>
                 @if( $item->address1) 
                <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>  
                <strong>{!! $item->address1!!}</strong><br>
                @endif
                 @if( $item->address2) {!! $item->address2!!}<br>@endif
                 @if( $item->address3) {!! $item->address3!!}<br>@endif
                 @if( $item->zipcode) {!! $item->zipcode!!}<br>@endif               
                </address>


                <strong><i class="glyphicon glyphicon-eye-open"></i></strong> {!! $item->views !!}
                <strong><i class="glyphicon glyphicon-calendar"></i> </strong> {!! $item->created_at !!}
                <div>

                <a href="#"> <span class="label label-success" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>  Send Message</span></a>
                @if( $item->phone)<span class="label label-success"><i class="glyphicon glyphicon-phone-alt"></i> {!! $item->phone !!}</span>@endif
                </div>

            </div>


             <div class="col-md-4" style="margin-top: 20px;">
             <span class="label label-default"><i class="glyphicon glyphicon-tags" aria-hidden="true"></i> Tags</span> 
            <span class="label label-primary">Default</span>
            <span class="label label-primary">Default</span>
            <span class="label label-primary">Default</span>
            <span class="label label-primary">Default</span>
                                   
              </div>

        </div>
        <!-- /.row -->


         <!-- Related Projects Row -->
        <div class="row">
            @if(count($items)>4)
            <div class="col-lg-12">
             
                <h3 class="page-header">Related Ads</h3>            
            
                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
                
                    <div class="carousel-inner">
                       {{--*/ $i = 0 /*--}}
                        @foreach($items as $_item)
                      
                        <div class="item  @if($i==0){{'active'}} @endif ">
                            <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="{!!asset('uploads/'.$_item->image) !!}" class="img-responsive"></a></div>
                        </div>
                          {{--*/ $i++ /*--}}
                        @endforeach
                    </div>

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>

             </div>           
            @else
                <div class="col-lg-12">
                    <h3 class="page-header">Related Ads</h3>
                </div>
                @foreach($items as $_item)
                <div class="col-sm-3 col-xs-6">
                <a href="#"> 
                 @if(empty($_item->image))
                <img alt="{!!$_item->title!!}" src="http://placehold.it/500x300?text=I{!!$_item->title!!}" data-holder-rendered="true" class="img-responsive img-hover img-related">
                @else
                <img alt="{!!$_item->title!!}" src="{!!asset('uploads/'.$_item->image) !!}" data-holder-rendered="true" width="300">

                @endif
                </a>

                </div>
                 @endforeach                
            @endif
        </div>
        <!-- /.row -->



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          {!! Form::open() !!} 
            <input type="hidden" name="item_id" value="{!!$item->id!!}"></input>
            <textarea style="width:100%;height:175px;" cols="40" id="message"></textarea>
             {!! Form::close() !!}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn-send-message">Send</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

@endSection 

@section('footer-script')
<script type="text/javascript">
  jQuery(document).ready(function($){
      $('#btn-send-message').click(function(){
        var type= 'POST';
        var task_url = '/item/sendmessage';

        var formData ={
          message: $('#message').val(),
          id: $("input[name*='item_id']").attr('value'),
          '_token': $( "input[name*='_token']" ).attr('value')
        };

        $.ajax({
          type: type,
          data: formData,
          dataType: 'json',
          url: task_url,
          success:function(response){
          }

        });
      });
  });
</script>
@endsection       
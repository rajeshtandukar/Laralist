@extends('frontend.layouts.main')
@section('content')
  <div class="row">
  	  @foreach($items as $item)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
          @if(empty($item->image))
	      <img alt="{!!$item->title!!}" src="http://placehold.it/100X200?text=Image" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
	      @else
          <img alt="{!!$item->title!!}" src="{!!asset('uploads/'.$item->image) !!}" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
          @endif
          <div class="caption">
	        <h3>{!! $item->title!!}</h3>	        
	        <p>{!! str_limit($item->description, 100)!!}</p>
            <p>Category: {!! $item->category->title !!}    </p>
	        <p>           
    			{!! Html::linkRoute('frontend.item.show', 'View', array($item->id) ,['class' => "btn btn-primary"]) !!} 
                @if(Auth::user())
                    @if(Auth::user()->id == $item->user_id)
                        {!! Html::linkRoute('frontend.post.edit', 'Edit', array($item->id) ,['class' => "btn btn-default"]) !!}     	                        
                    @endif
                @endif
                 
            </p>
	      </div>
	    </div>
	   </div>

	   @endforeach

	    <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
               {!! $items->links() !!}      
            </div>
        </div>
  
  </div>

@endsection


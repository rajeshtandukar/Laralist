@extends('frontend.layouts.main')
@section('content-head')
<h1>My Items</h1>
  <hr>
@endsection

@section('content')
<div id="items">
@foreach($items as $item)
<div class="media item-box">
<div class="media-left" style="width: 21%;">
  <a href="#">
  	@if( $item->image)
    	<a href="{!!URL::route('frontend.item.show',$item->id)!!}"><img class="media-object" src="{{asset('uploads/'.$item->image)}}" alt="{!! $item->alias !!}" height="100"></a>
    @else
    	<img class="media-object" src="http://placehold.it/170x100?text=Image" alt="{!! $item->alias !!}" height="100">
   @endif 	
  </a>
</div>
<div class="media-body">
  <h4 class="media-heading"><a href="{!!URL::route('frontend.item.show',$item->id)!!}">{!! $item->title !!}</a></h4>
    {!!str_limit($item->description,100)!!}
    <p>  
    {!! Html::linkRoute('frontend.post.edit', 'Edit', array($item->id) ,['class' => "btn btn-primary"]) !!} 
    {!! Html::linkRoute('frontend.post.delete', 'Delete', array($item->id) ,['class' => "btn btn-danger"]) !!} 
    </p>
</div>
</div>
@endforeach 

   <!-- Pagination -->
      <div class="row text-center">
          <div class="col-lg-12">
          {!! $items->links() !!}               
          </div>
      </div>

</div>
@endsection

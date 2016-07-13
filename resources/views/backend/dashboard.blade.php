@extends('backend.layouts.main')

@section('content-header')
    <h1>
       Laralist
        <small>Dashboard</small>
    </h1>
@endsection


@section('content')
	<div class="row">
	</div>
	  <div class="row">
	   <div class="col-md-8">
		<div class="col-md-6">
	   	<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Items</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                   @foreach($recentItems as $item)
                    <li class="item">
                      <div class="product-img">
						@if( $item->image)
						<img src="{{asset('uploads/'.$item->image)}}" alt="{!! $item->alias !!}">
						@else
						<img class="media-object" src="http://placehold.it/170x100?text=Image" alt="{!! $item->alias !!}" >
						@endif 
                        
                      </div>
                      <div class="product-info">
                        <a href="{!! route('admin.items.edit', $item->id)!!}" class="product-title">{!! $item->title !!} <span class="label label-info pull-right">{!! $defaultCountry->symbol!!}{!! $item->price !!}</span></a>
                        <span class="product-description">
                          {!! str_limit($item->description,65) !!}
                        </span>
                      </div>
                    </li><!-- /.item -->
                    @endforeach
                   
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{!! route('admin.items')!!}" class="uppercase">View All Products</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

             </div>


              <div class="col-md-6">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                       
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        @foreach($recentUsers as $user)
                        <li>                        
                          <img src="{!!Gravatar::fallback('http://urlto.example.com/avatar.jpg')->get($user->email )!!}" alt="{!! $user->name!!}">
                          <a class="users-list-name" href="{!! route('admin.users.edit', $user->id)!!}">{!! $user->name!!}</a>
                         
                          <span class="users-list-date">{!!$user->created_at->toFormattedDateString() !!}</span>
                        </li>
                        @endforeach
                        
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="{!! route('admin.users')!!}" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->

	   </div><!-- /.row -->


	    <div class="col-md-4">

	   
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Items</span>
              <span class="info-box-number">{!! $totalItems !!}</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
       

     
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Members</span>
                  <span class="info-box-number">{!! $totalUsers !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
	   
	  </div>


	
@endsection
@extends('frontend.layouts.main')
@section('content-head')
<h1>Categories</h1>
  <hr>
@endsection

@section('content')
  <div class="menu catrow">
  				@foreach($allCategories as $category)
                            <div class="menu-category list-group ">
                                <div class="menu-category-name list-group-item active" style="height: 61px; ">
                                  <div style="background-color: #ffffff;width: 40px; height: 40px; border-radius: 50%;text-align: center; margin:0 18px 0 0;
                                   float:left; padding-top: 2px;">
                                  <img src="{{asset('frontend/images/'. $category->logo)}}" />
                                  </div>
                                  <a href="{!!route('frontend.list',array($category->id))!!}" style="color:#ffffff;">
                                  <span style="float: left;margin-top: 7px;"><strong>{!!$category->title!!}</strong> ({!! $category->itemCount!!})</span>
                                  </a>                                
                                   </div>
                                  @foreach($category->subCategory as $subcategory)                                  
                                	<a href="{!!route('frontend.list',array($subcategory->id))!!}" class="menu-item list-group-item">{!!$subcategory->title!!}<span class="badge">{!! $subcategory->itemCount !!}</span></a>
                                  @endforeach	                                
                            </div>
                 @endforeach           
  </div>
@endsection
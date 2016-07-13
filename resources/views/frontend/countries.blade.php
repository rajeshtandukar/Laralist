@extends('frontend.layouts.main')
@section('title','countries')
@section('content-head')
<h1>Countries</h1>
  <hr>
@endsection

@section('content')
  <div class="menu catrow">
  <?php 
  $count = count($countries) ; 
  $midCount = (int) $count /2;
  $i=0;
  ?>
    <div class="col-lg-6">
      <ul class="list-unstyled">
    @for($i=0; $i<$midCount; $i++)    
      <li><a href="{{route('frontend.countryitems', $countries[$i]->id)}}">{!! $countries[$i]->name !!}</a></li>
    @endfor
      </ul>
    </div>

    <div class="col-lg-6">
      <ul class="list-unstyled">
    @for($j=$i; $j < $count; $j++)    
      <li><a href="{{route('frontend.countryitems', $countries[$i]->id)}}">{!! $countries[$j]->name !!}</a></li>
    @endfor
      </ul>
    </div>          
  </div>
@endsection
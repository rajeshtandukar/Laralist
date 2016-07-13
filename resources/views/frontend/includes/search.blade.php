@section('footer-script')
<script src="https://maps.googleapis.com/maps/api/js?key={{config('laralist.google_map_api_key')}}&libraries=places"></script>
<script src="{{asset('frontend/js/googleapi.js')}}"></script>
@endsection

<div class="well">
    <h4>Search item</h4>

    <div class="row"> 
     <!-- {{ Form::open(array('method' =>'GET','url'=>action('Frontend\ItemController@search'))) }} -->
    {!! Form::open(['route' => 'frontend.item.search', 'method' =>'get',  'files' => true , 'class' =>'form-horizontal']) !!}             
       
   
        <div class="col-lg-6"> 
            <input type="text" class="form-control" placeholder="e.g. house" name="q" value="@if( isset($searchQuery) && !empty($searchQuery)) {{ $searchQuery}} @endif" > 
        </div>
        <div class="col-lg-4"> 
            <div class="input-group">     
                <span class="input-group-addon" id="sizing-addon1" style="background-color: #ffffff;">
                <i class="glyphicon glyphicon-map-marker"></i></span>
                <input type="text" class="form-control" placeholder="Enter your location" name="l" id="autocomplete" onfocus="geolocate()" value="@if( isset($seachLocation) && !empty($seachLocation)) {{ $seachLocation}} @endif"> 
            </div>
        </div>

         <div class="col-lg-2"> 
                <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"> Search</span>    
                </button>
         </div>
     {!! Form::close() !!}
    </div>
</div>
@extends('backend.layouts.main')

@section('content-header')
    <h1>
       Laralist
        <small>Settings</small>
    </h1>
@endsection

@section('partial-style')
{!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
{!! HTML::style('plugins/select2/select2.min.css') !!}
@endsection

@section ('partial-script')
{!! HTML::script('plugins/select2/select2.full.min.js') !!}
{!! HTML::script('js/laralist.js') !!}

@endsection

@section('content')
  <div class="row">
     <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Settings</h3>
              <div class="box-tools pull-right">
                 <div class="pull-right" style="margin-bottom:10px">                  
                  </div><!--pull right-->

                  <div class="clearfix"></div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="flash-message" style="display: none;">                
                <p class="alert alert-success"><span id="partial-msg">Settings saves</span><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                </div> 
            
                 {!! Form::open(['route' => 'admin.settings.update','files' => true , 'class' =>'form-horizontal']) !!}
                
                <form class="form-horizontal">
                  <div class="box-body">

                  <div class="form-group">
                     {!! Form::label('site_title', 'Site Name', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('site_title', config('laralist.site_title'), ['class'=>'form-control', 'placeholder'=>'Enter site name', 'id'=>'site_title']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                     {!! Form::label('item_per_page', 'Item Per page', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('item_per_page', config('laralist.item_per_page'), ['class'=>'form-control', 'placeholder'=>'Enter Title', 'id'=>'item_per_page']) !!}
                      </div>
                    </div>

                     <div class="form-group">
                      {!! Form::label('default_country', 'Defult Country', array('class'=> 'col-sm-2 control-label')) !!}                        
                          <div class="col-sm-10">
                            <select name="default_country" class="form-control select2" id="default_country">
                            @foreach($countires as $country)
                              <option value="{!!$country->id!!}" @if( config('laralist.default_country') == $country->id ) {!! 'selected' !!}@endif>{!!$country->name!!}</option>
                            @endforeach
                            </select>
                          </div>
                      </div> 
                    
                    <div class="form-group">              
                      {!! Form::label('max_image_post', 'Max image per item', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('max_image_post', config('laralist.max_image_post'), ['class'=>'form-control', 'placeholder'=>'Enter Alias', 'id'=>'max_image_post']) !!}
                      </div>
                    </div>         

                    <div class="form-group">
                     {!! Form::label('google_map_api_key', 'Google Map API Key', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('google_map_api_key', config('laralist.google_map_api_key'), ['class'=>'form-control', 'placeholder'=>'Enter api key', 'id'=>'google_map_api_key']) !!}          
                      </div>
                    </div>


                  <!-- /.box-body -->
                  <div class="box-footer">                    
                    {!! Form::submit( 'Save', ['class'=>'btn btn-info pull-right','id'=>'btn-save']) !!}
                  </div>
                  <!-- /.box-footer -->
                 {!! Form::close() !!}

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  </div>
@endsection
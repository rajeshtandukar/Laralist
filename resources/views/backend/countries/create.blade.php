@extends('backend.layouts.main')

@section('content-header')
    <h1>
       Laralist
        <small>Countries</small>
    </h1>
@endsection

@section('view-page-title')
New Country
@endsection

@section('content')
	<div class="row">
	   <div class="col-xs-12">
          <div class="box">
             @include('backend.countries.include')
            <div class="box-body">

               @if($errors->has())
                 <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>                  
                  @foreach ($errors->all() as $error)  
                       {{ $error }}</br>                      
                  @endforeach
                  </div>
                @endif  
            

                 {!! Form::open(['route' => 'admin.countries.store','files' => true , 'class' =>'form-horizontal']) !!}
                <form class="form-horizontal">
                  <div class="box-body">
                    
                    <div class="form-group">
                     {!! Form::label('name', 'Country Name', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Country Name', 'id'=>'name']) !!}
                      </div>
                    </div>
                    
                    <div class="form-group">
                     {!! Form::label('country_code', 'Country Code', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('country_code', null, ['class'=>'form-control', 'placeholder'=>'Enter Country Code', 'id'=>'country_code']) !!}
                      </div>
                    </div> 

                     <div class="form-group">
                     {!! Form::label('currency', 'Currency', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('currency', null, ['class'=>'form-control', 'placeholder'=>'Enter Currency', 'id'=>'currency']) !!}
                      </div>
                    </div>

                     <div class="form-group">
                     {!! Form::label('symbol', 'Currency Symbol', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('symbol', null, ['class'=>'form-control', 'placeholder'=>'Enter Currency Symbol', 'id'=>'symbol']) !!}
                      </div>
                    </div>                 

                      <div class="form-group">
                     {!! Form::label('published', 'Published', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                        <input type="radio" name="published" class="minimal"  value="1" checked> Yes 
                        <input type="radio" name="published" class="minimal" value="0"> No
                      </div>
                    </div>

                  <!-- /.box-body -->
                  <div class="box-footer">                    
                    {!! Form::submit( 'Submit', ['class'=>'btn btn-info pull-right']) !!}
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
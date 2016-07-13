@extends('backend.layouts.main')

@section('content-header')
    <h1>
       Laralist
        <small>Items</small>
    </h1>
@endsection

@section('partial-style')
{!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
{!! HTML::style('plugins/select2/select2.min.css') !!}
@endsection

@section ('partial-script')
<!-- DataTables -->
{!! HTML::script('plugins/datatables/jquery.dataTables.min.js') !!}
{!! HTML::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! HTML::script('plugins/select2/select2.full.min.js') !!}

<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
  $(function () {
    $(".select2").select2();
    CKEDITOR.replace('inputDescription');
  });
</script>
@endsection

@section('view-page-title')
New Item
@endsection

@section('content')
	<div class="row">
	   <div class="col-xs-12">
          <div class="box">
           @include('backend.items.include')
            
            <!-- /.box-header -->
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
            

                 {!! Form::open(['route' => 'admin.items.store','files' => true , 'class' =>'form-horizontal']) !!}              
                  <div class="box-body">
                    <div class="form-group">
                     {!! Form::label('inputTitle', 'Title', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter Title', 'id'=>'inputTitle']) !!}
                      </div>
                    </div>
                    <div class="form-group">              
                      {!! Form::label('inputAlias', 'Alias', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('alias', null, ['class'=>'form-control', 'placeholder'=>'Enter Alias', 'id'=>'inputAlias']) !!}
                      </div>
                    </div> 

                      <div class="form-group">
                     {!! Form::label('inputPublished', 'Published', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                        <input type="radio" name="published" class="minimal"  value="1" checked> Yes 
                        <input type="radio" name="published" class="minimal" value="0"> No
                      </div>
                    </div>
                   
                   
                  
                    <div class="form-group">
                     {!! Form::label('inputPrice', 'Price', array('class'=> 'col-sm-2 control-label')) !!}
                       <div class="col-sm-10">
                           <div class="input-group">
                              <span class="input-group-addon">{!!$defaultCountry->symbol!!}</span>                             
                              {!! Form::text('price', null, ['class'=>'form-control', 'placeholder'=>'Enter Price', 'id'=>'inputPrice']) !!}
                              <span class="input-group-addon">{!!$defaultCountry->currency!!}</span>                             
                            </div>
                          </div> 
                      </div>


                      <div class="form-group">
                      {!! Form::label('inputCategory', 'Category', array('class'=> 'col-sm-2 control-label')) !!}                        
                          <div class="col-sm-10">
                            <select name="category_id" class="form-control select2" id="inputCategory">
                            @foreach($categories as $category)
                              <option value="{!!$category->id!!}">{!!$category->title!!}</option>
                            @endforeach
                            </select>
                          </div>  
                      </div> 


                      <div class="form-group">
                      {!! Form::label('inputDescription', 'Description', array('class'=> 'col-sm-2 control-label')) !!}             
                          <div class="col-sm-10">
                          {!! Form::textarea('description',null,['id' => 'inputDescription' ,'size' => '80x10']) !!}                              
                          </div>
                      </div> 


                      <div class="form-group">
                      {!! Form::label('inputCountry', 'Country', array('class'=> 'col-sm-2 control-label')) !!}                        
                          <div class="col-sm-10">
                            <select name="country_id" class="form-control select2" id="inputCountry">
                            @foreach($countires as $country)
                              <option value="{!!$country->id!!}">{!!$country->name!!}</option>
                            @endforeach
                            </select>
                          </div>
                      </div> 

                      <div class="form-group">
                        {!! Form::label('inputAddress1', 'State', array('class'=> 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                        {!! Form::text('address1', null, ['class'=>'form-control', 'placeholder'=>'Enter State', 'id'=>'inputAddress1']) !!}                        
                        </div>
                      </div>

                      <div class="form-group">
                        {!! Form::label('inputAddress2', 'City', array('class'=> 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                          {!! Form::text('address2', null, ['class'=>'form-control', 'placeholder'=>'Enter City', 'id'=>'inputAddress2']) !!}                        
                        </div>
                      </div>

                      
                    <div class="form-group">
                     {!! Form::label('inputZipcode', 'Zip COde', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('zipcode', null, ['class'=>'form-control', 'placeholder'=>'Enter Zipcode', 'id'=>'inputZipcode']) !!}          
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('inputAddress3', 'Address', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('address3',null,['id' => 'inputAddress3' ,'size' => '75x5']) !!}                        
                      </div>
                    </div>

                     <div class="form-group">
                      {!! Form::label('inputUser', 'User', array('class'=> 'col-sm-2 control-label')) !!}                        
                          <div class="col-sm-10">
                            <select name="user_id" class="form-control select2" id="inputUser">
                            @foreach($users as $user)
                              <option value="{!!$user->id!!}">{!!$user->name!!}</option>
                            @endforeach
                            </select>
                          </div>
                      </div> 
                    </div> 


                    <div class="form-group">
                    {!! Form::label('inputImage', 'Image', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::file('image' ,null, ['class'=>'form-control', 'id'=>'inputImage']) !!}                      
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
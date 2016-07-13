@extends('backend.layouts.main')

@section('partial-style')
{!! Html::style('plugins/select2/select2.min.css') !!}
@endsection

@section ('partial-script')

{!! Html::script('plugins/select2/select2.full.min.js') !!}
<script>
  $(function () {
    $(".select2").select2();
  });
</script>
@endsection

@section('content-header')
<h1>
   Laralist
    <small>Categories</small>
</h1>
@endsection

@section('view-page-title')
New Category
@endsection


@section('content')
<div class="row">
     <div class="col-xs-12">
          <div class="box">
            
            @include('backend.categories.include')

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
            

                 {!! Form::open(['route' => 'admin.categories.store','files' => true , 'class' =>'form-horizontal']) !!}              
                  <div class="box-body">
                    <div class="form-group">
                     {!! Form::label('title', 'Title', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter Title', 'id'=>'title']) !!}
                      </div>
                    </div>
                    <div class="form-group">              
                      {!! Form::label('alias', 'Alias', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('alias', null, ['class'=>'form-control', 'placeholder'=>'Enter Alias', 'id'=>'alias']) !!}
                      </div>
                    </div> 

                      <div class="form-group">
                     {!! Form::label('published', 'Published', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                        <input type="radio" name="published" class="minimal"  value="1" checked> Yes 
                        <input type="radio" name="published" class="minimal" value="0"> No
                      </div>
                    </div>

                      <div class="form-group">
                      {!! Form::label('parent_id', 'Parent Category', array('class'=> 'col-sm-2 control-label')) !!}                        
                          <div class="col-sm-10">
                            <select name="parent_id" class="form-control select2" id="parent_id">
                            <option value="0">Root</option>
                            @foreach($rootCategories as $category)
                              <option value="{!!$category->id!!}">{!!$category->title!!}</option>
                            @endforeach
                            </select>
                          </div>  
                      </div> 

                    <div class="form-group">
                    {!! Form::label('logo', 'Image', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::file('logo' ,null, ['class'=>'form-control', 'id'=>'logo']) !!}                      
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

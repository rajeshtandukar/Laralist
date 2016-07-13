@extends('frontend.layouts.forms')
@section('content-head')
 Post Ad
@endsection

@section('footer-script')

@endsection

@section('header-style')
 {!! Html::style('angularjs/tags/ng-tags-input.min.css') !!} 
@endsection
 

@section('content')

    @if($errors->has())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>                  
          @foreach ($errors->all() as $error)  
          {{ $error }}</br>                      
          @endforeach
      </div>
    @endif  

    
    {!! Form::open(['route' => 'frontend.post.store','files' => true , 'class' =>'form-horizontal','id' =>'item-form']) !!}              
      <div class="box-body">

        <div class="form-group">
          {!! Form::label('inputTitle', 'Title', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter Title', 'id'=>'inputTitle']) !!}
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
              <span class="input-group-addon">$</span>                             
              {!! Form::text('price', null, ['class'=>'form-control', 'placeholder'=>'Enter Price', 'id'=>'inputPrice']) !!}
            </div>
          </div> 
        </div>

       

        <div class="form-group">
          {!! Form::label('inputCategory', 'Category', array('class'=> 'col-sm-2 control-label')) !!}                        
          <div class="col-sm-10">
            <select name="category_id" class="form-control select2" id="inputCategory">
            @foreach($categories as $category)
              <option value="{!!$category->id!!}">{!!$category->title!!}</option>
              if($category->subCategory)
                  @foreach($category->subCategory as $subcategory)
                      <option value="{!!$subcategory->id!!}">|--{!!$subcategory->title!!}</option>
                  @endforeach    
              @end if
            @endforeach
            </select>
          </div>  
        </div> 


        <div class="form-group">
          {!! Form::label('inputDescription', 'Description', array('class'=> 'col-sm-2 control-label')) !!}             
          <div class="col-sm-10">
            {!! Form::textarea('description',null,['id' => 'inputDescription' ,'size' => '75x10']) !!}                              
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
          {!! Form::label('inputZipcode', 'Zip Code', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::text('zipcode', null, ['class'=>'form-control', 'placeholder'=>'Enter Zip code', 'id'=>'inputZipcode']) !!}          
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('inputAddress3', 'Address', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::textarea('address3',null,['id' => 'inputAddress3' ,'size' => '75x5']) !!}                        
          </div>
        </div>


         <div class="form-group">
          {!! Form::label('inputTags', 'Tags', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
                @include('frontend.angular-tags')    
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('inputImage', 'Image', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10" >
            @include('frontend.angular-upload')           
          </div>
        </div>


        <div class="box-footer">
          {!! Form::submit( 'Save', ['class'=>'btn btn-info pull-right']) !!}
        </div>
    </div> 

    <!-- /.box-footer -->
    {!! Form::close() !!}

@endsection


@section('header-inline-script')
<script type="text/javascript">
  if( typeof(laralist) == 'undefined')
    var laralist={};

    laralist.queueLimit= "<?php echo config('laralist.max_image_post');?>";
</script>
@endsection


@section('footer-inline-script')
{!! JsValidator::formRequest('App\Http\Requests\ItemRequest',  '#item-form') !!}
@endsection
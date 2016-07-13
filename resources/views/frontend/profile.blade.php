@extends('frontend.layouts.forms')
@section('content-head')
Edit Profile
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

    
    {!! Form::open(['route' => 'frontend.user.update','files' => true , 'class' =>'form-horizontal','id' =>'profile-form']) !!}              
      <div class="box-body">

        <div class="form-group">
          {!! Form::label('inputName', 'Name', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::text('name', Auth::user()->name, ['class'=>'form-control', 'placeholder'=>'Enter Name', 'id'=>'inputName']) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('inputEmail', 'Email', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::text('email', Auth::user()->email, ['class'=>'form-control', 'placeholder'=>'Enter Name', 'id'=>'inputEmail']) !!}
          </div>
        </div>

         <div class="form-group">
          {!! Form::label('inputPhone', 'Phone', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::text('phone', Auth::user()->phone, ['class'=>'form-control', 'placeholder'=>'Enter Name', 'id'=>'inputPhone']) !!}
          </div>
        </div>

          <div class="form-group">
          {!! Form::label('inputPassword', 'Password', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::text('password', null, ['class'=>'form-control', 'placeholder'=>'Enter Name', 'id'=>'inputPassword']) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('inputRepassword', 'Re Password', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            {!! Form::text('password_confirmation', null, ['class'=>'form-control', 'placeholder'=>'Enter Name', 'id'=>'inputRepassword']) !!}
          </div>
        </div>



        <div class="form-group">
          {!! Form::label('inputImage', 'Image', array('class'=> 'col-sm-2 control-label')) !!}
          <div class="col-sm-10" >
           @if(Auth::user()->avatar)
           <img src="{!!asset('uploads/'.Auth::user()->avatar)!!}" class="user-image" alt="User Image">
           @else
           <img src="{!!Gravatar::fallback('http://urlto.example.com/avatar.jpg')->get(Auth::user()->email )!!}" class="user-image" alt="User Image">
           @endif
           <br /><br />
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

    laralist.queueLimit= 1;
</script>
@endsection

@section('footer-inline-script')
{!! JsValidator::formRequest('App\Http\Requests\UserRequest',  '#profile-form') !!}
@endsection
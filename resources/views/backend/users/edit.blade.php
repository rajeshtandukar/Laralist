@extends('backend.layouts.main')

@section('content-header')
    <h1>
       Laralist
        <small>Users</small>
    </h1>
@endsection

@section('content')
	<div class="row">
	   <div class="col-xs-12">
          <div class="box">
           @include('backend.users.include')
            
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
            

                 {!! Form::open(['route' => 'admin.users.update','files' => true , 'class' =>'form-horizontal']) !!} 
                  {!! Form::hidden('id', $user->id) !!}             
                  <div class="box-body">
                    <div class="form-group">
                     {!! Form::label('name', 'Name', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Enter Name', 'id'=>'name']) !!}
                      </div>
                    </div>
                    <div class="form-group">              
                      {!! Form::label('email', 'Email', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('email', $user->email, ['class'=>'form-control', 'placeholder'=>'Enter Email', 'id'=>'email']) !!}
                      </div>
                    </div> 

                    <div class="form-group">              
                      {!! Form::label('phone', 'Phone', array('class'=> 'col-sm-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('phone', $user->phone, ['class'=>'form-control', 'placeholder'=>'Enter Phone', 'id'=>'phone']) !!}
                      </div>
                    </div> 

                      <div class="form-group">
                     {!! Form::label('role', 'Role', array('class'=> 'col-sm-2 control-label')) !!}                    
                      <div class="col-sm-10">
                        <input type="radio" name="role" class="minimal"  value="admin" @if($user->role == 'admin') {{ 'checked' }} @endif > Administrator 
                        <input type="radio" name="role" class="minimal" value="user"  @if($user->role == 'user') {{ 'checked' }} @endif > User
                       
                      </div>
                    </div>
                   
                   
                      <div class="form-group">
                        {!! Form::label('password', 'Password', array('class'=> 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password"/>    
                         <small>Password must be minimun six character length.</small>                     
                        </div>

                      </div>

                      <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password', array('class'=> 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                         <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Re-enter Password"/>
                         
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
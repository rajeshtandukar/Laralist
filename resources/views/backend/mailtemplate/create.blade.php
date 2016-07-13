 @extends('backend.layouts.main')
@section('content-header')
    <h1>
       Laralist
        <small>Mail Templates</small>
    </h1>
@endsection
@section('partial-style')
{!! Html::style('plugins/select2/select2.min.css') !!}
@endsection

@section ('partial-script')
{!! Html::script('plugins/select2/select2.full.min.js') !!}
{!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}

<script>
  $(function () {
  
    $(".select2").select2();

    $("#compose-textarea").wysihtml5({
       toolbar: {     
        "image": false
      }
     });

    var wysihtml5Editor = $('#compose-textarea').data("wysihtml5").editor;    
   
    $('#placeholders >li').click(function(){
       wysihtml5Editor.composer.commands.exec("insertHTML", $(this).data('value'));
    })
  });
</script>
@endsection

@section('content')
 <div class="row">
    <div lass="col-xs-12">
        <div class="box">
            @include('backend.mailtemplate.include')
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

            <div class="col-md-3">
              <br> 
               <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Placeholders<small> (Click each below to insert)</small></h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked" id="placeholders">
                    <li data-value ="{site_url}" ><a href="#" data-value ="{site_url}">{site_url}</a></li>
                    <li data-value ="{Site_name}"><a href="#">{Site_name}</a></li>
                    <li data-value ="{item_name}"><a href="#">{item_name}</a></li>
                    <li data-value ="{item_id}"><a href="#">{item_id}</a></li>
                    <li data-value ="{user_name}"><a href="#">{user_name}</a></li>
                    <li data-value ="{user_full_name}"><a href="#">{user_full_name}</a></li>
                    <li data-value ="{user_id}"><a href="#">{user_id}</a></li>

                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              
            </div><!-- /.col -->
            {!! Form::open(['route' => 'admin.mailtemplates.store','files' => true , 'class' =>'form-horizontal']) !!}  
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Mail Template</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                  {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Subject', 'id'=>'inputTitle']) !!}                     
                  </div> 

                    <div class="form-group">
                    <select name="published" class="form-control" id="published">
                      <option value="1">Published</option>
                      <option value="0">Unublished</option>
                      </select>
                  </div>  
                     
                    


                  <div class="form-group">
                     <select name="event" class="form-control select2" id="inputCategory">
                            <option value=" ">{!!'Select Event'!!}</option>
                            @foreach($events as $key=>$event)
                              <option value="{!!$key!!}">{!!$event!!}</option>
                            @endforeach
                            </select>
                  </div>  

                                
                  <div class="form-group">
                   {!! Form::textarea('body', null, ['id' => 'compose-textarea' ,'class' => 'form-control' ,'style' => 'height: 300px']) !!}                   
                  </div>
                 
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                  {!! Form::submit( 'Save', ['class'=>'btn btn-primary']) !!} 
                  </div>
                  
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
             {!! Form::close() !!}
            </div><!-- /.row -->
             </div><!-- /.row -->
              </div><!-- /.row -->
          </div><!-- /.row -->
  @endsection
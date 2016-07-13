@extends('backend.layouts.main')

@section('content-header')
    <h1>
       Laralist
        <small>Users</small>
    </h1>
@endsection

@section('partial-style')
{!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
{!! Html::style('plugins/iCheck/all.css') !!}
@endsection

@section ('partial-script')
{!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
<script>
  $(function () {

   var table = $('#tbl-users').DataTable({
      "paging": true,
      "pageLength": <?php echo config('laralist.item_per_page')?>,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });

    // Handle click on "Select all" control
    $('#users-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      //$('input[type="checkbox"]', rows).prop('checked', this.checked);
      $('input[type="checkbox"]', $.contains(document, rows)).prop('checked', this.checked);


   });


    // Handle click on checkbox to set state of "Select all" control
   $('#tbl-users tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#users-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   $('.delete').on('click', function(e){
      e.preventDefault();
      var prompt = confirm('Are your sure your want to delete?');
      if(prompt){
        var form = $('#users-frm-delete');
        appendFields(form);
        form.submit();
      }
           
   });

   function appendFields(form){
   
      table.$('input[type="checkbox"]').each(function(){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element 
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         //} 
      });
   }
  });
</script>
@endsection

@section('content')
	<div class="row">
	   <div class="col-xs-12">
          <div class="box">
            @include('backend.users.include')

             {!! Form::open(['route' => 'admin.users.destroy','id'=> 'users-frm-delete']) !!}
             {!! Form::close() !!}
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tbl-users" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><input name="select_all" value="1" id="users-select-all" type="checkbox"></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Created Date</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)  
                <tr>
                  <td><input type="checkbox" name="id[]" value="{!! $user->id !!}" /></td>
                  <td>{!! Html::linkRoute('admin.users.edit', $user->name, array($user->id)) !!}              
                  </td>
                  <td>{!!$user->email!!}</td>
                  <td>{!!$user->phone!!}</td>                
                  <td>{!!$user->role!!}</td>
                  <td>{!!$user->created_at!!}</td>                                    
                </tr>
                @endforeach 
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Created Date</th>      
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	</div>
@endsection
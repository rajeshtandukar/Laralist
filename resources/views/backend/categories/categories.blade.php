@extends('backend.layouts.main')

@section('content-header')
    <h1>
       Laralist
        <small>Categories</small>
    </h1>
@endsection

@section('partial-style')
{!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
{!! Html::style('plugins/iCheck/all.css') !!}
@endsection

@section ('partial-script')
<!-- DataTables -->
{!! HTML::script('plugins/datatables/jquery.dataTables.min.js') !!}
{!! HTML::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
<script>
  $(function () {
   
    var table = $('#tbl-categories').DataTable({
      "paging": true,
      "pageLength": <?php echo config('laralist.item_per_page')?>,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });

    // Handle click on "Select all" control
    $('#categories-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      //$('input[type="checkbox"]', rows).prop('checked', this.checked);
      $('input[type="checkbox"]', $.contains(document, rows)).prop('checked', this.checked);


   });


    // Handle click on checkbox to set state of "Select all" control
   $('#tbl-categories tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   // Handle form submission event
   $('.publish').on('click', function(e){
      e.preventDefault();
      var form = $('#categories-frm-publish'); 
      appendFields(form);      
      form.submit();
     
   });

   $('.unpublish').on('click', function(e){
      e.preventDefault();
      var form = $('#categories-frm-unpublish');
      appendFields(form);     
      form.submit();
     
   });

   $('.delete').on('click', function(e){
      e.preventDefault();
      var prompt = confirm('Are your sure your want to delete?');
      if(prompt){
        var form = $('#categories-frm-delete');
        appendFields(form);
        form.submit();
      }
           
   });

   function appendFields(form){
     // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         //if(!$.contains(document, this)){
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
             @include('backend.categories.include')
            <!-- /.box-header -->

             {!! Form::open(['route' => 'admin.categories.publish','id'=> 'categories-frm-publish']) !!}
             {!! Form::close() !!}
             {!! Form::open(['route' => 'admin.categories.unpublish','id'=> 'categories-frm-unpublish']) !!}
             {!! Form::close() !!}
             {!! Form::open(['route' => 'admin.categories.destroy','id'=> 'categories-frm-delete']) !!}
             {!! Form::close() !!}

            <div class="box-body">
              <table id="tbl-categories" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input name="select_all" value="1" id="categories-select-all" type="checkbox"></th>
                  <th>Title</th>
                  <th>Created Date</th>
                  <th>Published</th>

                </tr>
                </thead>
                <tbody>
                @foreach($allCategories as $category)  
                  <tr>
                    <td><input type="checkbox" name="id[]" value="{!! $category->id !!}" /></td>
                    <td>{!! Html::linkRoute('admin.categories.edit', $category->title, array($category->id)) !!}              
                    </td>
                    <td>{!!$category->created_at!!}</td>
                    <td>{!!$category->published == 1? 'Yes':'No'!!}

                    </td>
                  </tr>

                   @if($category->subCategory)
                      @foreach($category->subCategory as $subcategory)
                          <tr>
                          <td><input type="checkbox" name="id[]" value="{!! $subcategory->id !!}" /></td>
                            <td>|--{!! Html::linkRoute('admin.items.edit', $subcategory->title, array($subcategory->id)) !!}              
                            </td>
                            <td>{!!$subcategory->created_at!!}</td>
                            <td>{!!$subcategory->published == 1? 'Yes':'No'!!}
                            </td>
                          </tr>
                      @endforeach    
                    @endif
                @endforeach 
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th>Title</th>
                  <th>Created Date</th>
                  <th>Pulished</th>
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
<div class="box-header">
<h3 class="box-title">@yield('view-page-title', 'Items')</h3>
  <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info','message'] as $msg)
                @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

                @endif
            @endforeach
            </div>
<div class="box-tools pull-right">
 <div class="pull-right" style="margin-bottom:10px">
    <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         Items <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{!! url('admin/items') !!}">All Items</a> </li>
        <li><a href="{!! url('admin/items/create')!!} ">Create</a></li>      
        <li class="divider"></li>
        <li><a href="#" class="publish">Publish</a></li>
        <li><a href="#" class="unpublish">Unpublish</a></li>
        <li><a href="#" class="delete">Delete</a></li>
      </ul>
    </div><!--btn group-->

  </div><!--pull right-->

  <div class="clearfix"></div>
</div>
</div>
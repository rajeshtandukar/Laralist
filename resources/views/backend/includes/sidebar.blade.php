<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{!! $current_route_name =='admin.dashboard'? 'active':'' !!} treeview">
          <a href="{!!route('admin.dashboard')!!}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li {!! strpos($current_route_name, 'admin.items')!== false? 'class="active"':'' !!} >
          <a href="{!! url('admin/items') !!}">
            <i class="fa fa-edit"></i> <span>Items</span>
          </a>
        </li>

         <li {!! strpos($current_route_name, 'admin.categories')!== false? 'class="active"':'' !!}> 
          <a href="{!! url('admin/categories') !!}">
            <i class="fa fa-files-o"></i> <span>Categories</span>
          </a>
        </li>

         <li {!! strpos($current_route_name, 'admin.countries')!== false? 'class="active"':'' !!}>
          <a href="{!! url('admin/countries') !!}">
            <i class="fa fa-th"></i> <span>Countries</span>
          </a>
        </li>
         <li {!! strpos($current_route_name, 'admin.mailtemplates')!== false? 'class="active"':'' !!}>
          <a href="{!! url('admin/mailtemplates') !!}">
            <i class="fa fa-envelope"></i> <span>Mail Templates</span>
          </a>
        </li>

        <li {!! strpos($current_route_name, 'admin.users')!== false? 'class="active"':'' !!}>
          <a href="{!! url('admin/users') !!}">
            <i class="fa fa-user"></i> <span>Users</span>
          </a>
        </li>

           <li {!! $current_route_name == 'admin.settings'? 'class="active"':'' !!}>
          <a href="{!! url('admin/settings') !!}">
            <i class="fa fa-cog"></i> <span>Settings</span>
          </a>
        </li>
      </ul>

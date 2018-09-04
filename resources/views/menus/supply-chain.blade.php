<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Supply Chain Management</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-stack-exchange"></i> <span>Supplier</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class=""><a href="{{route('suppliers.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
        <li class=""><a href="{{route('suppliers.create')}}"><i class="fa fa-circle-o"></i> New Supplier</a></li>
      </ul>
    </li>
    <li class="treeview">
            <a href="#">
              <i class="fa fa-truck"></i> <span>Product Request</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href="{{route('requests.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
              <li class=""><a href="{{route('requests.create')}}"><i class="fa fa-circle-o"></i> New Request</a></li>
            </ul>
    </li>
    <li class="treeview">
            <a href="#">
              <i class="fa fa-truck"></i> <span>Material</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href="{{route('materials.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
              <li class=""><a href="{{route('materials.create')}}"><i class="fa fa-circle-o"></i> New Material</a></li>
            </ul>
    </li>
  </ul>

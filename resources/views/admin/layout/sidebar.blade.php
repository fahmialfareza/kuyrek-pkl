<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/img/kitaolahraga-fav.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">{{trans('app.NAVIGATION')}}</li>
      <li class="<?php if (Request::is('admin/dashboard*')): ?>
        active
      <?php endif; ?>">
        <a href="/admin/dashboard">
        <i class="fa fa-dashboard"></i> <span>{{trans('app.Dashboard')}}</span>
      </a>
      </li>
      <li class="treeview <?php if (Request::is('admin/sportvenue*')): ?>
        active
      <?php endif; ?>">
        <a href="#">
          <i class="fa fa-reorder"></i>
          <span>{{trans('app.SportVenue')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/sportvenue/vendor"><i class="fa fa-circle-o"></i> {{trans('app.AllVendors')}}</a></li>
          <li><a href="/admin/sportvenue/category"><i class="fa fa-circle-o"></i> {{trans('app.AllSports')}}</a></li>
          <li><a href="/admin/sportvenue"><i class="fa fa-circle-o"></i> {{trans('app.AllSportVenues')}}</a></li>
          <li><a href="/admin/sportvenue/booking"><i class="fa fa-circle-o"></i> {{trans('app.Booking')}}</a></li>
        </ul>
      </li>
      <!-- <li>
        <a>
          <i class="fa fa-group"></i> <span>{{trans('app.UsersData')}}</span>
        </a>
      </li> -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>K</b>O</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>KuyRek</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <img src="/img/kitaolahraga-fav.png" class="user-image" alt="User Image">
                       <span class="hidden-xs">{{Auth::user()->name}}</span>
                       </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="/img/kitaolahraga-fav.png" class="img-circle" alt="User Image">
              <p>
                {{Auth::user()->name}} - Administrator
                <small>
                  <?php
                    setlocale(LC_TIME, 'Asia/Jakarta');
                    $dt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at);
                    echo $dt->formatLocalized('%d %B %Y');
                  ?>
                </small>
              </p>
            </li>
            <!--
                             <li class="user-body">
                               <div class="row">
                                 <div class="col-xs-4 text-center">
                                   <a href="#">Followers</a>
                                 </div>
                                 <div class="col-xs-4 text-center">
                                   <a href="#">Sales</a>
                                 </div>
                                 <div class="col-xs-4 text-center">
                                   <a href="#">Friends</a>
                                 </div>
                               </div>

                             </li>
                             -->
            <li class="user-footer">
              <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">{{trans('app.Logout')}}</a>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-flag"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

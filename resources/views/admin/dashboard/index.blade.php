<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{trans('app.Dashboard')}} | Admin | KuyRek</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="shortcut icon" href="/img/kitaolahraga-fav.png" />
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('admin.layout.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layout.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="col-lg-12 col-xs-12">
          <h1>
        {{trans('app.Dashboard')}}
      </h1>
        </div>
        </br>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">{{trans('app.Users')}}
              </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                      <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>

                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad">
                    <div class="col-md-12">
                      <div class="box box-solid">
                        <!-- /.box-header -->
                        <div class="box-body col-md-12">
                          <h4>{{trans('app.AllUsers')}} ({{$users->count()}})<span class="pull-right"></span></h4>
                          <div class="progress active">
                            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{$users->count()/App\User::all()->count()*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$users->count()/App\User::all()->count()*100}}%">
                              <span class="sr-only"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col-->
                </div>

                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">{{trans('app.AllData')}}
              </h3>


                    <!-- tools box -->
                    <div class="pull-right box-tools">
                      <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>

                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad">

                    <div class="col-md-12">
                      <div class="box box-solid">

                        <!-- /.box-header -->

                        <div class="box-body col-md-4">
                          <?php if ($bookings->count() > 0): ?>
                            <h3>{{trans('app.Booking')}}</h3>
                            <h4>{{trans('app.Waiting')}} ({{$bookings->where('payment', null)->count()}}/{{$bookings->count()}})<span class="pull-right">{{$bookings->where('payment', null)->count()/$bookings->count()*100}}%</span></h4>
                            <div class="progress active">
                              <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{$bookings->where('payment', null)->count()/$bookings->count()*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$bookings->where('payment', null)->count()/$bookings->count()*100}}%">
                                <span class="sr-only">{{$bookings->where('payment', null)->count()/$bookings->count()*100}}% Complete (success)</span>
                              </div>
                            </div>
                            <h4>{{trans('app.SentConfirmation')}} ({{$bookings->where('payment', '!=', null)->count()}}/{{$bookings->count()}})<span class="pull-right">{{$bookings->where('payment', '!=', null)->count()/$bookings->count()*100}}%</span></h4>
                            <div class="progress active">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$bookings->where('payment', '!=', null)->count()/$bookings->count()*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$bookings->where('payment', '!=', null)->count()/$bookings->count()*100}}%">
                                <span class="sr-only">{{$bookings->where('payment', '!=', null)->count()/$bookings->count()*100}}%</span>
                              </div>
                            </div>
                            <h4>{{trans('app.BookingCanceled')}} ({{$bookings->where('transfer', 0)->where('expired', '<=', \Carbon\Carbon::now())->count()}}/{{$bookings->count()}})<span class="pull-right">{{$bookings->where('transfer', 0)->where('expired', '<=', \Carbon\Carbon::now())->count()/$bookings->count()}}%</span></h4>
                            <div class="progress active">
                              <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="{{$bookings->where('transfer', 0)->where('expired', '<=', \Carbon\Carbon::now())->count()/$bookings->count()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$bookings->where('transfer', 0)->where('expired', '<=', \Carbon\Carbon::now())->count()/$bookings->count()}}%">
                                <span class="sr-only">{{$bookings->where('transfer', 0)->where('expired', '<=', \Carbon\Carbon::now())->count()/$bookings->count()}}%</span>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>

                        <div class="box-body col-md-4">
                          <?php if ($bookings->where('payment', '!=', null)->count() > 0): ?>
                            <h3>{{trans('app.Confirmation')}}</h3>
                            <h4>{{trans('app.Waiting')}} ({{$bookings->where('payment', '!=', null)->where('transfer', 0 )->count()}}/{{$bookings->where('payment', '!=', null)->count()}})<span class="pull-right">{{$bookings->where('payment', '!=', null)->where('transfer', 0 )->count()/$bookings->where('payment', '!=', null)->count()*100}}%</span></h4>
                            <div class="progress active">
                              <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{$bookings->where('payment', '!=', null)->where('transfer', 0 )->count()/$bookings->where('payment', '!=', null)->count()*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$bookings->where('payment', '!=', null)->where('transfer', 0 )->count()/$bookings->where('payment', '!=', null)->count()*100}}%">
                                <span class="sr-only">{{$bookings->where('payment', '!=', null)->where('transfer', 0 )->count()/$bookings->where('payment', '!=', null)->count()*100}}% Complete (success)</span>
                              </div>
                            </div>
                            <h4>{{trans('app.Accepted')}} ({{$bookings->where('payment', '!=', null)->where('transfer', 1)->count()}}/{{$bookings->where('payment', '!=', null)->count()}})<span class="pull-right">{{$bookings->where('payment', '!=', null)->where('transfer', 1)->count()/$bookings->where('payment', '!=', null)->count()*100}}%</span></h4>
                            <div class="progress active">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$bookings->where('payment', '!=', null)->where('transfer', 1)->count()/$bookings->where('payment', '!=', null)->count()*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$bookings->where('payment', '!=', null)->where('transfer', 1)->count()/$bookings->where('payment', '!=', null)->count()*100}}%">
                                <span class="sr-only">{{$bookings->where('payment', '!=', null)->where('transfer', 1)->count()/$bookings->where('payment', '!=', null)->count()*100}}%</span>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col-->
                </div>

      <!-- /.content-wrapper -->
      @include('admin.layout.footer')

      @include('admin.layout.language')

      </div>
      <!-- ./wrapper -->

      <!-- jQuery 3 -->
      <script src="../bower_components/jquery/dist/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Morris.js charts -->
      <script src="../bower_components/raphael/raphael.min.js"></script>
      <script src="../bower_components/morris.js/morris.min.js"></script>
      <!-- Sparkline -->
      <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="../bower_components/moment/min/moment.min.js"></script>
      <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <!-- Slimscroll -->
      <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="../bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="../dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../dist/js/demo.js"></script>
</body>

</html>

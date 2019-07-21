<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{trans('app.AddPriceType')}} | Admin | KuyRek</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

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
        {{trans('app.AddPriceType')}}
      </h1>
        </div>
        </br>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">{{trans('app.AddPriceType')}}</h3>
              </div>
              <!-- /.box-header -->
              <form action="/admin/sportvenue/price/{{$id}}" method="post">
                {{csrf_field()}}
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputName">{{trans('app.FromDay')}} <span>*</span></label>
                    <select name="from_day" id="from_day" class="form-control" required>
                      <option value="0" >{{trans('app.Sunday')}}</option>
                      <option value="1" >{{trans('app.Monday')}}</option>
                      <option value="2" >{{trans('app.Tuesday')}}</option>
                      <option value="3" >{{trans('app.Wednesday')}}</option>
                      <option value="4" >{{trans('app.Thursday')}}</option>
                      <option value="5" >{{trans('app.Friday')}}</option>
                      <option value="6" >{{trans('app.Saturday')}}</option>
                    </select>
                    @if ($errors->has('from_day'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(from_day)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.ToDay')}} <span>*</span></label>
                    <select name="to_day" id="to_day" class="form-control" required>
                      <option value="0" >{{trans('app.Sunday')}}</option>
                      <option value="1" >{{trans('app.Monday')}}</option>
                      <option value="2" >{{trans('app.Tuesday')}}</option>
                      <option value="3" >{{trans('app.Wednesday')}}</option>
                      <option value="4" >{{trans('app.Thursday')}}</option>
                      <option value="5" >{{trans('app.Friday')}}</option>
                      <option value="6" >{{trans('app.Saturday')}}</option>
                    </select>
                    @if ($errors->has('to_day'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(to_day)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.FromTime')}} <span>*</span></label>
                    <select name="start_time" id="start_time" class="form-control" required>
                      @for ($i = 0; $i < 24; $i++)
                        @if ($i < 10)
                          <option value="0{{$i}}:00" >0{{$i}}:00</option>
                        @else
                          <option value="{{$i}}:00" >{{$i}}:00</option>
                        @endif
                      @endfor
                      <option value="23:59" >23:59</option>
                    </select>
                    @if ($errors->has('start_time'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(start_time)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.ToTime')}} <span>*</span></label>
                    <select name="end_time" id="end_time" class="form-control" required>
                      @for ($i = 1; $i < 24; $i++)
                        @if ($i < 10)
                          <option value="0{{$i}}:00" >0{{$i}}:00</option>
                        @else
                          <option value="{{$i}}:00" >{{$i}}:00</option>
                        @endif
                      @endfor
                      <option value="23:59" >23:59</option>
                    </select>
                    @if ($errors->has('end_time'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(end_time)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.Price')}} (IDR) <span>*</span></label>
                    <div>
                      <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="{{trans('app.Price')}}" required>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{trans('app.Add')}}</button>
                  </div>
                  <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> {{trans('app.Cancel')}}</button>
                </div>
              </form>
              <!-- /.box-footer -->
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    @include('admin.layout.footer')

    @include('admin.layout.language')
  </div>
  <!-- ./wrapper -->

  <script>
  $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
   $('#from_day').on('click change', function(e){
     console.log(e);
     var i = e.target.value;

     $('#to_day').empty();

     if (parseInt(i) == 0) {
       $('#to_day').append('<option value ="'+ 0 +'">Minggu</option>');
       $('#to_day').append('<option value ="'+ 1 +'">Senin</option>');
       $('#to_day').append('<option value ="'+ 2 +'">Selasa</option>');
       $('#to_day').append('<option value ="'+ 3 +'">Rabu</option>');
       $('#to_day').append('<option value ="'+ 4 +'">Kamis</option>');
       $('#to_day').append('<option value ="'+ 5 +'">Jum' + "'" + 'at</option>');
       $('#to_day').append('<option value ="'+ 6 +'">Sabtu</option>');
     } else if (parseInt(i) == 1) {
       $('#to_day').append('<option value ="'+ 1 +'">Senin</option>');
       $('#to_day').append('<option value ="'+ 2 +'">Selasa</option>');
       $('#to_day').append('<option value ="'+ 3 +'">Rabu</option>');
       $('#to_day').append('<option value ="'+ 4 +'">Kamis</option>');
       $('#to_day').append('<option value ="'+ 5 +'">Jum' + "'" + 'at</option>');
       $('#to_day').append('<option value ="'+ 6 +'">Sabtu</option>');
     } else if (parseInt(i) == 2) {
       $('#to_day').append('<option value ="'+ 2 +'">Selasa</option>');
       $('#to_day').append('<option value ="'+ 3 +'">Rabu</option>');
       $('#to_day').append('<option value ="'+ 4 +'">Kamis</option>');
       $('#to_day').append('<option value ="'+ 5 +'">Jum' + "'" + 'at</option>');
       $('#to_day').append('<option value ="'+ 6 +'">Sabtu</option>');
     } else if (parseInt(i) == 3) {
       $('#to_day').append('<option value ="'+ 3 +'">Rabu</option>');
       $('#to_day').append('<option value ="'+ 4 +'">Kamis</option>');
       $('#to_day').append('<option value ="'+ 5 +'">Jum' + "'" + 'at</option>');
       $('#to_day').append('<option value ="'+ 6 +'">Sabtu</option>');
     } else if (parseInt(i) == 4) {
       $('#to_day').append('<option value ="'+ 4 +'">Kamis</option>');
       $('#to_day').append('<option value ="'+ 5 +'">Jum' + "'" + 'at</option>');
       $('#to_day').append('<option value ="'+ 6 +'">Sabtu</option>');
     } else if (parseInt(i) == 5) {
       $('#to_day').append('<option value ="'+ 5 +'">Jum' + "'" + 'at</option>');
       $('#to_day').append('<option value ="'+ 6 +'">Sabtu</option>');
     } else if (parseInt(i) == 6) {
       $('#to_day').append('<option value ="'+ 6 +'">Sabtu</option>');
     }
   });
   $('#start_time').on('click change', function(e){
     console.log(e);
     var i = e.target.value;

     $('#end_time').empty();

     var a = parseInt(i.substring(0, 2));

     var b;
     for (b = a + 1; b < 24; b++) {
       if (b < 10) {
         $('#end_time').append('<option value ="0'+ b +':00">0' + b + ':00</option>');
       } else {
         $('#end_time').append('<option value ="'+ b +':00">' + b + ':00</option>');
       }
     }
     $('#end_time').append('<option value ="23:59">23:59</option>');
   });
  </script>

  <!-- jQuery 3 -->
  <script src="/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="/bower_components/raphael/raphael.min.js"></script>
  <script src="/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="/bower_components/moment/min/moment.min.js"></script>
  <script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/dist/js/demo.js"></script>
  <script>
    $(function() {
      //Add text editor
      $("#compose-textarea").wysihtml5();
    });
  </script>
</body>

</html>

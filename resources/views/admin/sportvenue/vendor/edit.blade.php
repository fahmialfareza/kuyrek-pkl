<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{trans('app.EditSportVenueVendor')}} | Admin | KuyRek</title>
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
        {{trans('app.EditSportVenueVendor')}}
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
                <h3 class="box-title">{{trans('app.EditSportVenueVendor')}}</h3>
              </div>
              <!-- /.box-header -->
              <form action="/admin/sportvenue/vendor/{{$vendor->id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputName">{{trans('app.VendorName')}}</label>
                    <div>
                      <input type="text" class="form-control" id="name" name="name" value="{{$vendor->name}}" placeholder="{{trans('app.VendorName')}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.Country')}} <span>*</span></label>
                    <div>
                      <select name="country_id" id="country_id" required>
                        <?php foreach ($countries as $country): ?>
                          <option value="{{$country->id}}">{{$country->name}}</option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    @if ($errors->has('country_id'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(country_id)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.Province')}} <span>*</span></label>
                    <div>
                      <select name="province_id" id="province_id" required>
                        <?php foreach ($provinces as $province): ?>
                          <option value="{{$province->id}}"
                              @if ($province->id == $vendor->district->regency->province->id)
                                selected
                              @endif
                          >{{$province->name}}</option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    @if ($errors->has('province_id'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(province_id)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.Regency')}} / {{trans('app.City')}} <span>*</span></label>
                    <div>
                      <select name="regency_id" id="regency_id" required>
                        <?php foreach ($regencies as $regency): ?>
                          <option value="{{$regency->id}}"
                            @if ($regency->id == $vendor->district->regency->id)
                              selected
                            @endif
                          >{{$regency->name}}</option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    @if ($errors->has('regency_id'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(regency_id)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.District')}} <span>*</span></label>
                    <div>
                      <select name="district_id" id="district_id" required>
                        <?php foreach ($districts as $district): ?>
                          <option value="{{$district->id}}"
                            @if ($district->id == $vendor->district->id)
                              selected
                            @endif
                          >{{$district->name}}</option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    @if ($errors->has('district_id'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(district_id)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">{{trans('app.ProfilePhoto')}} <span>*</span></label></br>
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> {{trans('app.ProfilePhoto')}}
                      <input type="file" name="image1">
                    </div>
                    <p class="help-block">Format : .PNG, .JPG, .JPEG, Max : 1 MB</p>
                    @if ($errors->has('image1'))
                        <span class="help-block alert alert-danger">
                            <strong>{{$errors->first(image1)}}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputName">Whatsapp</label>
                    <div>
                      <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$vendor->whatsapp}}" placeholder="Whatsapp" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName">ID Line</label>
                    <div>
                      <input type="text" class="form-control" id="line" name="line" value="{{$vendor->line}}" placeholder="ID Line">
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
   $('#country_id').on('click change', function(e){
     console.log(e);
     var country = e.target.value;
     //ajax
     $.get('/provinces/' + country, function(data){
         console.log(data);
             $('#province_id').empty();
             $('#regency_id').empty();
             $('#district_id').empty();
         $.each(data, function(index, subcatObj){
             $('#province_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
         });
     });
   });
   $('#province_id').on('click change', function(e){
       console.log(e);
       var province = e.target.value;
       //ajax
       $.get('/regencies/' + province, function(data){
           console.log(data);
               $('#regency_id').empty();
               $('#district_id').empty();
           $.each(data, function(index, subcatObj){
               $('#regency_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
           });
       });
   });
   $('#regency_id').on('click change', function(e){
       console.log(e);
       var regency = e.target.value;
       //ajax
       $.get('/districts/' + regency, function(data){
           console.log(data);
               $('#district_id').empty();
           $.each(data, function(index, subcatObj){
               $('#district_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
           });
       });
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

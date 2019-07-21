<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->

  <!-- Tab panes -->
  <div class="tab-content">
    <form role="form" method="POST" action="{{ url('/language') }}">
      <input type="text" name="locale" id="locale" value="id" hidden>
      <button type="submit" class="btn btn-danger col-md-12">Bahasa Indonesia</button>
      {{ csrf_field() }}
    </form>
    </br>
    </br>
    <form role="form" method="POST" action="{{ url('/language') }}">
      <input type="text" name="locale" id="locale" value="en" hidden>
      <button type="submit" class="btn btn-primary col-md-12">English</button>
      {{ csrf_field() }}
    </form>
  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
 immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

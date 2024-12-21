<!DOCTYPE html>
<html>
<head>
   @include('layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layouts.navbar')

  <!-- Main Sidebar Container -->
 @include('layouts.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       @yield('content')

          <div class="modal fade" id="modal-hapus">
              <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                      <div class="modal-header">
                          <h4 class="modal-title"></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                          <center>
                              <h5>Apakah kamu ingin menghapus data ini?</h5>
                          </center>

                      </div>
                      <form action="" method="post">
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                          <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-outline-light">Yes</button>
                          </div>
                      </form>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>

          @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif

          @if(session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
          <b>&copy; 2024 Universitas Muhammadiyah Magelang</b>
      </div>
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layouts.script')
@yield('scripts')
<script>
    function deleteData(url) {
        $('#modal-hapus').modal('show');
        $('#form-delete').attr('action', url);
    }
</script>
</body>
</html>

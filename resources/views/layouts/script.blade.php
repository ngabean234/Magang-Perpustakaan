<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datatables.buttons.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/buttons.flash.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jszip.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/pdfmake.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/vfs_fonts.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/buttons.html5.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/buttons.print.min.js') }}"></script>


<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

        // Summernote
        $('.textarea').summernote()

        // Select2
        $('.select2').select2()

        $(document).ready( function () {
            // $('.sidebar').click(function(e){
            //   $('.preloader').fadeIn();
            // })

            var flash = "{{ Session::has('sukses') }}";
            if(flash){
                var pesan = "{{ Session::get('sukses') }}"
                swal("Berhasil", pesan, "success");
            }

            var gagal = "{{ Session::has('gagal') }}";
            if(gagal){
                var pesan = "{{ Session::get('gagal') }}"
                swal("Gagal", pesan, "error");
            }

            $('body').on('click','.menu-sidebar',function(e){
                $('.preloader').fadeIn();
            })

            $('body').on('click','.btn-refresh',function(e){
                e.preventDefault();
                $('.preloader').fadeIn();
                location.reload();
            })

            // btn hapus di klik
            $('body').on('click','.btn-hapus',function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                $('#modal-hapus').find('form').attr('action',url);
                $('#modal-hapus').modal();
            });
        });

    });
</script>



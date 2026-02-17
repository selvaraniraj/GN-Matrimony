<footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="#">Project Tracker</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        Powered by <a style="color:#0000cc !important" href="https://www.brokenglass.co.in/" target="_blank">Brokenglass Designs</a>
    </div>
</footer>

<aside class="control-sidebar control-sidebar-dark"></aside>
</div> <!-- /.wrapper -->

<!-- JS Files -->
<script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/Chart.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin_assets/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin_assets/datatable/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/sparkline.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/moment.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/daterangepicker.js') }}"></script>
<script src="{{ asset('admin_assets/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/adminlte.js') }}"></script>
<script src="{{ asset('admin_assets/js/demo.js') }}"></script>
<script src="{{ asset('admin_assets/js/dash-chart.js') }}"></script>

<script>
  $(function () {
    // Initialize Select2
    $('.select2').select2()
    $('.select2bs4').select2({ theme: 'bootstrap4' })

    // Initialize custom file input
    if (typeof bsCustomFileInput !== 'undefined') {
        bsCustomFileInput.init();
    }

    // Initialize DataTables
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  // Fix UI Button conflict with jQuery UI
  $.widget.bridge('uibutton', $.ui.button)
</script>
</body>
</html>

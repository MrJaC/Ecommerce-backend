
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset ('js/adminlte.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset ('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- OPTIONAL SCRIPTS
<script src="{{ asset ('plugins/chart.js/Chart.min.js') }}"></script>-->


<!-- page script -->
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
          //Initialize Select2 Elements
    $('.select2').select2()
    });
  </script>

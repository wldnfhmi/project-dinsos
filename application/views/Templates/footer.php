</div>
<!-- /.content-wrapper -->
<footer class="main-footer text-sm" style="padding: 15px 20px;">
  <div class="float-right d-none d-sm-block">
    Created With <i class="far fa-heart text-pink pr-1"></i>UBSI Team
  </div>
  <span>Copyright &copy; 2023 | <a href="<?= base_url('Menu'); ?>"><span style="font-family: 'Viga', sans-serif; color: #3d9970;">SILRA-PBI</span></a></span>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/select2/js/select2.min.js"></script>

<!-- Select2 -->
<script>
  $(document).ready(function() {
    $('#kelurahan').select2({
      placeholder: 'Pilih Kelurahan',
      allowClear: true
    });
  });

  $(document).ready(function() {
    $('#kecamatan').select2({
      placeholder: 'Pilih Kecamatan',
      allowClear: true
    });
  });

  $(document).ready(function() {
    $('#id_surat').select2({
      placeholder: 'Pilih Surat',
      allowClear: true
    });
  });

  $(document).ready(function() {
    $('#id_pengesah').select2({
      placeholder: 'Pilih Pengesah',
      allowClear: true
    });
  });

  $(document).ready(function() {
    $('#jenis_kelamin').select2({
      placeholder: 'Pilih Gender',
      allowClear: true
    });
  });

  $(document).ready(function() {
    $('#bulan').select2({
      placeholder: 'Pilih Bulan',
      allowClear: true
    });
  });

  $(document).ready(function() {
    $('#menu_id').select2({
      placeholder: 'Pilih Menu',
      allowClear: true
    });
  });

  function reset() {
    document.getElementById("formSurat").reset();
  }
</script>
<!-- End Select2 -->

<!-- Chart Dashboard -->
<script>
  var areaChartData = <?php echo json_encode($areaChartData); ?>;
  var areaChartCanvas = document.getElementById('salesChart').getContext('2d');
  var areaChart = new Chart(areaChartCanvas, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
      datasets: areaChartData
    },
    options: {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: true,
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            precision: 0,
          },
          gridLines: {
            display: true,
          },
        }]
      }
    }
  });
</script>
<!-- End Chart Dashboard -->

<!-- Tooltip -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<!-- End Tooltip -->

<!-- FlashData -->
<!-- Pop UP Flashadata -->
<script>
  const flashData = $('.flash-data').data('flashdata');
  <?php if ($this->session->flashdata('flash')) : ?>
    Swal.fire({
      icon: 'success',
      title: flashData,
      confirmButttonText: 'Ok',
      confirmButtonColor: '#3d9970',
    });
  <?php else : ?>
    const flashError = $('.flash-data-error').data('flashdataerror');
    <?php if ($this->session->flashdata('error')) : ?>
      Swal.fire({
        icon: 'error',
        title: flashError,
        confirmButtonText: 'Ok',
        confirmButtonColor: '#3d9970',
      });
    <?php endif; ?>
  <?php endif; ?>

  // Btn-Del
  $('.btn-del').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: "Apakah anda yakin ingin menghapus data tersebut ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3d9970",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Hapus"
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });
  })

  // Btn-stat
  $('.btn-stat').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Anda yakin ingin mengubah status?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#39cccc",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Update"
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });
  })
</script>
<!-- End Flash Data -->

<!-- Export Excel -->
<script>
  $(document).ready(function() {
    $('#exportExcelBtn').click(function(e) {
      e.preventDefault();
      var selectedMonth = $('#bulan').val();
      window.location.href = "<?= base_url('Laporan/exportExcel'); ?>/" + selectedMonth;
    });
  });

  $(document).ready(function() {
    $('#exportExcelBtnNDTKS').click(function(e) {
      e.preventDefault();
      var selectedMonth = $('#bulan').val();
      window.location.href = "<?= base_url('Laporan/exportExcelNDTKS'); ?>/" + selectedMonth;
    });
  });
</script>
<!-- End Export Excel -->
</body>

</html>
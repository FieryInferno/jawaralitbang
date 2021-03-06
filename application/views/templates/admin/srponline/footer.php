    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <p class="m-0 text-center">Copyright &copy; Litbang BP4D Subang</p>
        <a target="_blank" href="https://polsub.ac.id/" style="font-size: 8px"><p class="m-0 text-center">Politeknik Negeri Subang</p></a>
        <a target="_blank" href="https://www.instagram.com/ifathurrasyid/" style="font-size: 8px"><p class="m-0 text-center">Fathurrasyid Ibrahim</p></a>
      </div>
    </footer>
  </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Logout" untuk mengakhiri session.</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Batalkan</button>
        <a class="btn btn-danger" href="<?= base_url('Login/logout');?>">Logout</a>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sbadmin2/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/sbadmin2/vendor/chart.js/Chart.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url('assets/sbadmin2/js/demo/chart-area-demo.js') ?>"></script> -->
    <script src="<?= base_url('assets/sbadmin2/js/demo/chart-pie-demo.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('assets') ?>/ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '/browser/browse.php',
        filebrowserUploadUrl: '/uploader/upload.php'
      } );
    </script>
    <script>
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#858796';

      function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
          s = '',
          toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
          };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
          s[1] = s[1] || '';
          s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
      }

      var penelitian  = [];
      <?php
        if (isset($penelitian)) {
          for ($i=0; $i < count($penelitian); $i++) { ?> 
            penelitian.push('<?= $penelitian[$i]; ?>');
          <?php }
        }
      ?>

      // Area Chart Example
      var ctx = document.getElementById("myAreaChart");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Total Penelitian",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: penelitian,
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });

    </script>

</body>

</html>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <p class="m-0 text-center">Copyright &copy; Litbang BP4D Subang</p>
      <a target="_blank" href="https://polsub.ac.id/" style="font-size: 8px"><p class="m-0 text-center">Politeknik Negeri Subang</p></a>
      <a target="_blank" href="https://www.instagram.com/ifathurrasyid/" style="font-size: 8px"><p class="m-0 text-center">Fathurrasyid Ibrahim</p></a>
    </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script src="<?= base_url('assets/sbadmin2/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/js/demo/chart-pie-demo.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('assets/') ?>/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'editor1' );
</script>

</body>

</html>
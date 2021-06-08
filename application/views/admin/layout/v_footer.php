</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Web Pengaduan 2021</span>
                    </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('admin/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>template_admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>template_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>template_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>template_admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url()?>template_admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>template_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url()?>template_admin/js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url()?>template_admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>template_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url()?>template_admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url()?>template_admin/js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url()?>template_admin/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url()?>template_admin/js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo base_url()?>template_admin/js/demo/chart-bar-demo.js"></script>

    <!-- chart visitor section -->
    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                    label: "Keluhan Selesai",
                    data: [
                    <?php if($tittle == 'dashboard')
                        {
                            $data = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0",];
                            foreach ($dummy_keluhan_selesai as $key => $value)
                            {
                                $data[$value->bulan] = $value->jumlah;
                            }
                            foreach ($data as $key => $value) {
                                echo "\""."$value"."\",";
                            }
                        }
                        ?>

                    ],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                    label: "Keluhan Pending",
                    data: [
                        <?php if($tittle == 'dashboard')
                        {
                            $data = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0",];
                            foreach ($dummy_keluhan_pending as $key => $value)
                            {
                                $data[$value->bulan] = $value->jumlah;
                            }
                            foreach ($data as $key => $value) {
                                echo "\""."$value"."\",";
                            }
                        }
                        ?>
                    ],
                    backgroundColor: 'rgba(233, 30, 99, 0.8)'
                }]
        },
    });
    </script>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'ckeditor' );
    </script>

    <!-- note : tambahan js -->
    <script type="text/javascript" src="<?php echo base_url()?>template_admin/vendor/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

    <!--  note : tambahan js  -->
    <script type="text/javascript">
        $('#waktu_approval').clockpicker({
            donetext: 'Terapkan',
            placement: 'top'
        });
    </script>

</body>

</html>
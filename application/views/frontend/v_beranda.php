<!-- Page Content -->
<div class="container">
    <br>
        <!-- Features Section -->
        <div class="row">
        <div class="col-lg-6">
            <h2><?php echo $about->about_title ?></h2>
            
            <p><?php echo $about->about_desc ?></p>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded float-right" src="<?php echo base_url()?>template_frontend/images/banner.jpg" alt="" width="400">
        </div>
        </div>
        <!-- /.row -->
        <hr>

        <!-- Team Members -->
        <center><h2>Layanan Kami</h2></center>

        <div class="row">
        <?php $no=1; foreach ($service as $key => $value) { ?>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
            <img class="card-img-top" src="<?php echo base_url()?>assets/service/<?php echo $value->service_image ?>" alt="" height="200px">
            <div class="card-body">
                <h4 class="card-title"><?= $value->title ?></h4>
                <p class="card-text"><?= $value->caption ?></p>
            </div>
            </div>
        </div>
        <?php } ?>
        
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <section class="jumbotron text-center" style="background-image: url(images/jumbotron.jpg);">
        <div class="container">
        <h1 class="jumbotron-heading" style="color: white">Customer Service</h1>
        <p class="lead" style="color: white">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
            <a href="<?= base_url('act/pengaduan')?>" class="btn btn-primary my-2">Pengaduan Pelanggan</a>
            <a href="<?= base_url('act/kritik_saran')?>" class="btn btn-secondary my-2">Kritik & Saran</a>
        </p>
        </div>
    </section>

<div class="container">
    <center><h2>Grafik Keluhan</h2></center>
     <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-7">

                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Keluhan</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
        <center><h2>Berita Terkini</h2></center><br>
        <div class="row">
            <?php $no=1; foreach ($dummy as $key => $value) { ?>
                <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                <img src="<?php echo base_url()?>assets/banner_berita/<?php echo $value->banner ?>">
                    <div class="card-body">
                    <h4 class="card-title"><?= $value->judul ?></h4>
                    <p class="card-text"><?php echo character_limiter($value->deskripsi, 200) ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a href="<?= base_url('act/berita_detail/'.$value->slug)?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <small class="text-muted"><?= time_ago($value->tanggal_publish) ?></small>
                    </div>
                    </div>
                </div>
                </div>
            <?php } ?>             
        </div>
        </div>
    </div>

<!-- Footer -->
<footer class="py-3 bg-dark">
<div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; PLN Kepanjen 2021</p>
</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url()?>template_frontend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>template_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
                    <?php if($tittle == 'beranda')
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
                        <?php if($tittle == 'beranda')
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




</body>

</html>
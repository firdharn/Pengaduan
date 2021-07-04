    <!-- Page Content -->
    <div class="container">

        <br>

        <!-- Image Header -->
        <img class="img-fluid rounded mb-4" src="images/service-banner.jpg" alt="">

    <!-- Team Members -->
        <h2>Layanan Kami</h2>

        <div class="row">
        <?php $no=1; foreach ($service as $key => $value) { ?>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
            <a href="https://layanan.pln.co.id/">
            <img class="card-img-top" src="<?php echo base_url()?>assets/service/<?php echo $value->service_image ?>" alt="" height="200px">
             </a>
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

    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; PLN Kepanjen 2020</p>
        <data-bg="<?php echo base_url('assets/about/polinema.png')?>">
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h2 class="mt-4 mb-3">Tentang Kami</h2>

    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid rounded mb-4" src="<?php echo base_url()?>template_frontend/images/banner.jpg" alt="">
      </div>
      <div class="col-lg-6">
        <h2>PLN Kepanjen</h2>
        <p>Perusahaan Listrik Negara (disingkat PLN) atau nama resminya adalah PT PLN (Persero) adalah sebuah BUMN yang mengurusi semua aspek kelistrikan yang ada di Indonesia. Direktur Utamanya saat ini adalah Zulkifli Zaini.

        Ketenagalistrikan di Indonesia dimulai pada akhir abad ke-19, ketika beberapa perusahaan Belanda mendirikan pembangkitan tenaga listrik untuk keperluan sendiri. Pengusahaan tenaga listrik untuk kepentingan umum dimulai sejak perusahaan swasta Belanda N.V. NIGM memperluas usahanya di bidang tenaga listrik, yang semula hanya bergerak di bidang gas. Kemudian meluas dengan berdirinya perusahaan swasta lainnya.</p>
      </div>
    </div>
    <!-- /.row -->
    <br>
    <!-- Our Customers -->
    <center><h2>Galeri</h2></center>
    <div class="row">
    <?php $no=1; foreach ($dummy as $key => $value) { ?>
      <div class="col-lg-4 col-sm-4 mb-4">
        <img class="img-fluid" style="width:400px;height:230px;" src="<?php echo base_url()?>assets/galeri_gambar/<?php echo $value->gambar ?>" data-imagebox-src="<?php echo base_url()?>assets/galeri_gambar/<?php echo $value->gambar ?>" alt="Galeri <?php echo $no; ?>" data-imagebox-caption="<?= $value->caption ?>" data-imagebox="gallery">
      </div>
      <?php } ?> 
    </div>
    <!-- /.row -->
    <br><br>

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
  <script src="<?php echo base_url()?>template_frontend/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>template_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- library imagebox ligbox gallery -->
  <script src="<?php echo base_url()?>template_frontend/vendor/Imagebox/src/imagebox.js"></script>
  
  <script>
      
  </script>

</body>

</html>
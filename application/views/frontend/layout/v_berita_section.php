
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
        <h5 class="card-header">Pencarian</h5>
        <div class="card-body">
            <div class="input-group">
                <input type="text" id=cari class="form-control" placeholder="Cari sesuatu...">
                <span class="inpug-group-append">
                    <a class="btn btn-secondary" onclick="searching()" >Cari</a>
                </span>
            </div>
        </div>
        </div>
    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Kategori</h5>
        <div class="card-body">
            <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <?php foreach ($dummy_top_kategori as $key => $value) { ?>
                        <li>
                            <a href="<?php echo base_url();?>act/berita?kategori=<?php echo $value->nama_kategori;?>"><?= $value->nama_kategori ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <?php foreach ($dummy_lower_kategori as $key => $value) { ?>
                        <li>
                            <a href="<?php echo base_url();?>act/berita?kategori=<?php echo $value->nama_kategori;?>"><?= $value->nama_kategori ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            </div>
        </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
        <h5 class="card-header">Berita</h5>
        <div class="card-body">
            Berisi informasi dan berita wilayah kerja PLN Kepanjen dan sekitarnya.
        </div>
        </div>

    </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-3 bg-dark">
<div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; PLN Kepanjen 2020</p>
</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url()?>template_frontend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>template_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    function searching() {
        let search = document.getElementById("cari").value;
        window.location.href = '<?php echo base_url();?>act/berita?search='+search;
    }
</script>
</body>

</html>
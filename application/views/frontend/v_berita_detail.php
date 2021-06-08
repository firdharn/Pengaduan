<!-- Page Content -->
<div class="container">

<!-- Page Heading/Breadcrumbs -->
<h2 class="mt-4 mb-3">Post Title Detail</h2>

<div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="<?php echo base_url()?>assets/banner_berita/<?php echo $dummy_berita->banner ?>" alt="">

        <hr>

        <!-- Date/Time -->
        <p>Posted on <?php echo $dummy_berita->tanggal ?></p>

        <hr>

        <!-- Post Content -->
        <?php echo $dummy_berita->deskripsi ?>

        <hr>

    </div>

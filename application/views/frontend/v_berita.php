
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h2 class="mt-4 mb-3">Daftar Berita</h2>

        <div class="row">
        
        <!-- Blog Entries Column -->
        <div class="col-md-8">
        <?php if($dummy_page != 0) { ?>
            <?php foreach ($dummy_berita as $key => $value) { ?>
                <!-- Blog Post -->
                <div class="card mb-4">
                <img class="card-img-top" src="<?php echo base_url()?>assets/banner_berita/<?php echo $value->banner ?>" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title"><?= $value->judul ?></h2>
                    <p class="card-text"><?= character_limiter($value->deskripsi, 200) ?></p>
                    <a href="<?= base_url('act/berita_detail/'.$value->slug)?>" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?= $value->tanggal ?> by
                    <a>Administrator</a>
                </div>
            </div>
            <?php } ?> 
            
            <!-- Pagination -->
            <ul class="pagination justify-content-center">
            <?php 
                $prev = 1;
                $next = 1;
                if(isset($_REQUEST['halaman'])){
                    $halaman = $_REQUEST['halaman'];
                    if($halaman != 1) {
                        $prev = ((int)($halaman)-1);
                    }
                    if($halaman != $dummy_page) {
                        $next = ((int)($halaman)+1);
                    } else {
                        $next = $dummy_page;
                    }
                }
            ?>
            
            <!-- Pagination when based on kategori -->
            <?php if(isset($_REQUEST['kategori'])){ $kategori = $_REQUEST['kategori']; ?>
                <li class="page-item">
                    <a class="page-link" aria-label="Previous" href="<?php echo base_url();?>act/berita?kategori=<?php echo $kategori;?>&halaman=<?php echo $prev;?>">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                </li>
                <?php $page=1; while(!($dummy_page+1 == $page)) { ?>
                    <li class="page-item">            
                        <a class="page-link" href="<?php echo base_url();?>act/berita?kategori=<?php echo $kategori;?>&halaman=<?php echo $page;?>"><?= $page++ ?></a>
                    <?php } ?> 
                </li>
                <li class="page-item">             
                    <a class="page-link" aria-label="Next" href="<?php echo base_url();?>act/berita?kategori=<?php echo $kategori;?>&halaman=<?php echo $next;?>">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>

            <!-- Pagination when based on search -->
            <?php } else if (isset($_REQUEST['search'])) { $search_kategori = $_REQUEST['search']; ?>
                <li class="page-item">
                    <a class="page-link" aria-label="Previous" href="<?php echo base_url();?>act/berita?search=<?php echo $search_kategori;?>&halaman=<?php echo $prev;?>">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                </li>
                <?php $page=1; while(!($dummy_page+1 == $page)) { ?>
                    <li class="page-item">            
                        <a class="page-link" href="<?php echo base_url();?>act/berita?search=<?php echo $search_kategori;?>&halaman=<?php echo $page;?>"><?= $page++ ?></a>
                    <?php } ?> 
                </li>
                <li class="page-item">             
                    <a class="page-link" aria-label="Next" href="<?php echo base_url();?>act/berita?search=<?php echo $search_kategori;?>&halaman=<?php echo $next;?>">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>

            <!-- Pagination when based on default -->
            <?php } else { ?>
                <li class="page-item">
                <a class="page-link" aria-label="Previous" href="<?php echo base_url();?>act/berita?halaman=<?php echo $prev;?>">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                </li>
                <?php $page=1; while(!($dummy_page+1 == $page)) { ?>
                    <li class="page-item">            
                    <a class="page-link" href="<?php echo base_url();?>act/berita?halaman=<?php echo $page;?>"><?= $page++ ?></a>
                    <?php } ?> 
                </li>
                <li class="page-item">             
                <a class="page-link" aria-label="Next" href="<?php echo base_url();?>act/berita?halaman=<?php echo $next;?>">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php } ?>
            </ul>
        <?php } else { ?>
            <div class="pagination justify-content-center">
            <h2 style="color:gray;font-size:30px;margin-bottom:20px">Tidak ada berita</h2>
            </div>            
        <?php } ?>
        </div>
        
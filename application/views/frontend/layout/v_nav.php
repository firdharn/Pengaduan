<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('act/beranda')?>">PLN Kepanjen</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li <?=$tittle == 'beranda' ? 'class="nav-item active"':'class="nav-item"'?>>
                    <a class="nav-link" href="<?= base_url('act/beranda')?>">Beranda</a>
                </li>
                <li <?=$tittle == 'tentang' ? 'class="nav-item active"':'class="nav-item"'?>>
                    <a class="nav-link" href="<?= base_url('act/tentang')?>">Tentang</a>
                </li>
                <li <?=$tittle == 'layanan' ? 'class="nav-item active"':'class="nav-item"'?>>
                    <a class="nav-link" href="<?= base_url('act/layanan')?>">Layanan</a>
                </li>
                <li <?=$tittle == 'berita' ? 'class="nav-item active"':'class="nav-item"'?>>
                    <a class="nav-link" href="<?= base_url('act/berita')?>">Berita</a>
                </li>
                <li <?=$tittle == 'kontak' ? 'class="nav-item active"':'class="nav-item"'?>>
                    <a class="nav-link" href="<?= base_url('act/kontak')?>">Kontak</a>
                </li>
                <?php if(!$this->session->userdata('id_pelanggan_pengaduan')){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('act/login')?>"" style="font-weight: bold; color: white">Login</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('act/logout')?>"" style="font-weight: bold; color: white">Logout</a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
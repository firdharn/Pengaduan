<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Company Profile - PLN Kepanjen</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url()?>template_frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url()?>template_frontend/css/modern-business.css" rel="stylesheet">

<!-- note : tambahan library dropify -->
<link href="<?php echo base_url()?>template_frontend/vendor/dropify/css/dropify.css" rel="stylesheet">

<style type="text/css">
body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
    }
    .contact-form{
        background: #fff;
        margin-top: 2%;
        margin-bottom: 5%;
        width: 70%;
    }
    .contact-form .form-control{
        border-radius:1rem;
    }
    .contact-image{
        text-align: center;
    }
    .contact-image img{
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        /*transform: rotate(29deg);*/
    }
    .contact-form form{
        padding: 14%;
    }
    .contact-form form .row{
        margin-bottom: -7%;
    }
    .contact-form h3{
        margin-bottom: 8%;
        margin-top: -10%;
        text-align: center;
        color: #0062cc;
    }
    .contact-form .btnContact {
        width: 50%;
        border: none;
        border-radius: 1rem;
        padding: 1.5%;
        background: #dc3545;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
    }
    .btnContactSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        color: #fff;
        background-color: #0062cc;
        border: none;
        cursor: pointer;
    }
</style>

</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url()?>">PLN Kepanjen</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('act/beranda')?>">Beranda</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('act/tentang')?>">Tentang</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('act/layanan')?>">Layanan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('act/berita')?>">Berita</a>
                </li>
                <li class="nav-item active">
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
    <br>
<?php
    if($this->session->flashdata('pesan_pengaduan')){
        $message = $this->session->flashdata('pesan_pengaduan');
        echo "<script type='text/javascript'>alert('$message');</script>";
    }   
?>
<div class="container contact-form">
            <div class="contact-image">
                <img src="<?php echo base_url()?>template_frontend/images/icon-pengaduan.png" alt="icon-pengaduan"/>
            </div>
            <?php
                echo form_open_multipart('act/pengaduan');
            ?>
                <h3 id="tipe">Form Pengaduan</h3>
                <div class="row">
                    <div class="col-md-6">
                    <?php
                        $nama_pelanggan = "Nama Pelanggan";
                        if($this->session->userdata('nama_pelanggan_pengaduan')){
                            $nama_pelanggan = $this->session->userdata('nama_pelanggan_pengaduan');
                        }
                    ?>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $nama_pelanggan ?>" disabled />
                        </div>
                        <div class="form-group" hidden>
                            <input type="text" name="tanggal" class="form-control" placeholder="Tanggal" value="<?= date('d-m-Y'); ?>" readonly />
                        </div>
                        <div class="form-group">
                            <textarea name="form_isian" class="form-control" placeholder="Form Isian" style="width: 100%; height: 100px;" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Upload bukti pengaduan</label>
                            <input type="file" class="dropify" name="bukti_keluhan" data-height="100" accept="image/gif,image/png,image/jpg,image/jpeg" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Submit Pengaduan" />
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url()?>template_frontend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>template_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Contact form JavaScript -->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<script src="<?php echo base_url()?>template_frontend/js/jqBootstrapValidation.js"></script>
<script src="<?php echo base_url()?>template_frontend/js/contact_me.js"></script>
<!-- note : tambahan library dropify js -->
<script src="<?php echo base_url()?>template_frontend/vendor/dropify/js/dropify.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
       $('.dropify').dropify();
   });
</script>

</body>

</html>

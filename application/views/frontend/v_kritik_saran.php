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
        width: 60%;
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
        width: 60%;
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
<?php
    if($this->session->flashdata('pesan_kritik_saran')){
        $message = $this->session->flashdata('pesan_kritik_saran');
        echo "<script type='text/javascript'>alert('$message');</script>";
    }   
?>
<div class="container contact-form">
            <div class="contact-image">
                <img src="<?php echo base_url()?>template_frontend/images/icon-pengaduan.png" alt="icon-pengaduan"/>
            </div>
            <form method="post">
                <h3 id="tipe">Form Kritik & Saran</h3>
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
                        <div class="form-group">
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="form_isian" class="form-control" placeholder="Form Isian" style="width: 100%; height: 100px;"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Submit Kritik & Saran" />
                        </div>
                    </div>
                </div>
            </form>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url()?>template_frontend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>template_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Contact form JavaScript -->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<script src="<?php echo base_url()?>template_frontend/js/jqBootstrapValidation.js"></script>
<script src="<?php echo base_url()?>template_frontend/js/contact_me.js"></script>


</body>

</html>

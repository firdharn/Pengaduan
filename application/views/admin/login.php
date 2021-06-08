<?php
    if($this->session->userdata('id_admin_pengaduan')){
        redirect('admin/dashboard');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Login Admin - PLN Kepanjen</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url()?>template_frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url()?>template_frontend/css/modern-business.css" rel="stylesheet">

<style type="text/css">
    body {
    margin: 0;
    padding: 0;
    background-color: #17a2b8;
    height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>

</head>

<body>
<?php
    if($this->session->flashdata('pesan_login_admin')){
        $message = $this->session->flashdata('pesan_login_admin');
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo base_url('admin/login_process'); ?>" method="post">
                            <h3 class="text-center text-info">Login Admin</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required=>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>    
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                            </div>                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

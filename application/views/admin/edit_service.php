<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<!--   <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Keluhan</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
</div> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Service</h6>
    </div>
    <div class="card-body">
        <?php
            echo form_open_multipart('admin/edit_service/'.$dummy->id);
        ?>
            <div class="form-group col-4">
                <label for="exampleFormControlFile1">Layanan Image</label>
                </br>
                <div>
                    <img src="<?php echo base_url()?>assets/service/<?php echo $dummy->service_image ?>" width="250px">
                </div>                
                </br>
                <input type="file" name="service_image" accept="image/gif,image/png,image/jpg,image/jpeg">
            </div>

             <div class="form-group">
                <label for="exampleInputPassword1">Judul</label>
                <input type="text" class="form-control" name="title" value="<?= $dummy->title ?>" placeholder="Masukkan Judul" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Caption</label>
                <input type="text" class="form-control" name="caption" value="<?= $dummy->caption ?>" placeholder="Masukkan Caption" required>
            </div>
            
            <button type="submit" class="btn btn-warning">Ubah</button>
        <?php echo form_close();?>
    </div>
</div>


</div>
<!-- End of Main Content -->
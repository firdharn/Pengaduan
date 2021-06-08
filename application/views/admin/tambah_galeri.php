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
        <h6 class="m-0 font-weight-bold text-primary">Tambah Galeri</h6>
    </div>
    <div class="card-body">
        <?php
            echo form_open_multipart('admin/tambah_galeri');
        ?>
            <div class="form-group">
                <label for="exampleFormControlFile1">Gambar</label>
                <input type="file" class="form-control-file" name="gambar" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Caption</label>
                <input type="text" class="form-control" name="caption" placeholder="Masukkan Caption" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo form_close();?>
    </div>
</div>


</div>
<!-- /.container-fluid -->
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
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Berita</h6>
    </div>
    <div class="card-body">
        <?php
            echo form_open('admin/tambah_kategori_berita');
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Kategori Berita</label>
            <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori Berita" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo form_close();?>
    </div>
</div>


</div>
<!-- /.container-fluid -->
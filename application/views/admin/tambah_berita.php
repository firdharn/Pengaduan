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
        <h6 class="m-0 font-weight-bold text-primary">Tambah Berita</h6>
    </div>
    <div class="card-body">
      <?php
        date_default_timezone_set("Asia/Bangkok");
        echo form_open_multipart('admin/tambah_berita');
      ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Pilih Kategori</label>
          <select class="form-control" name="id_kategori" required>
              <option value="" disabled selected hidden>-- Pilih Kategori --</option>
              <?php foreach ($dummy as $key => $value) { ?>
                <option value = <?= $value->id ?>><?= $value->nama_kategori ?></option>
              <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlFile1">Banner</label>
          <input type="file" class="form-control-file" name="banner" accept="image/*" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Judul Berita</label>
          <input type="text" class="form-control" name="judul_berita" placeholder="Masukkan Judul Berita" required>
        </div>

        <div class="form-group">
          <label for="exampleFormControlFile1">Deskripsi</label>
          <textarea name="editor1" id="ckeditor" rows="10" cols="80" required></textarea>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Tanggal Publish</label>
          <input type="date" class="form-control" name="tanggal_publish" min="<?php echo date("Y-m-d"); ?>" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Status Publish</label>
          <select class="form-control" name="status_publish" required>
              <option value="Post">Post</option>
              <option value="Draft">Draft</option>
          </select>
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
      <?php echo form_close();?>
    </div>
</div>


</div>
<!-- /.container-fluid -->



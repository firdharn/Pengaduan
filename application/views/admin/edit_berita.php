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
        <h6 class="m-0 font-weight-bold text-primary">Edit Berita</h6>
    </div>
    <div class="card-body">
        <?php
          echo form_open_multipart('admin/edit_berita/'.$dummy_detail->id);
        ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Pilih Kategori</label>
            <select class="form-control" name="id_kategori" required>
                <option value="" disabled selected hidden>-- Pilih Kategori --</option>
                <?php foreach ($dummy_kategori as $key => $value) { ?>
                  <option value = <?= $value->id ?>
                  <?php
                    if($value->id == $dummy_detail->id_kategori){
                      echo "selected";
                    }
                  ?>
                  ><?= $value->nama_kategori ?></option>
                <?php } ?>
            </select>
          </div>
          <td><img src="<?php echo base_url()?>assets/banner_berita/<?php echo $dummy_detail->banner ?>" width="100px"></td>
          <div class="form-group">
            <label for="exampleFormControlFile1">Banner</label>
            <input type="file" class="form-control-file" name="banner" accept="image/*">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Judul Berita</label>
            <input type="text" 
              class="form-control" 
              value="<?= $dummy_detail->judul ?>"
              name="judul_berita" 
              placeholder="Masukkan Judul Berita" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Deskripsi</label>
            <textarea name="editor1" id="ckeditor" rows="10" cols="80" required><?= $dummy_detail->deskripsi ?></textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Publish</label>
            <input type="date" 
              class="form-control" 
              value="<?= substr($dummy_detail->tanggal_publish, 0, 10) ?>"
              name="tanggal_publish" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Status Publish</label>
            <select class="form-control" name="status_publish" required>
              <option value="Post"
              <?php
                if($dummy_detail->status_publish == "Post"){
                  echo "selected";
                }
              ?>
              >Post</option>
              <option value="Draft"
              <?php
                if($dummy_detail->status_publish == "Draft"){
                  echo "selected";
                }
              ?>
              >Draft</option>
            </select>
          </div>
        
          <button type="submit" class="btn btn-warning">Update</button>
        <?php echo form_close();?>
    </div>
</div>


</div>
<!-- /.container-fluid -->
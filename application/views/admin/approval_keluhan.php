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
        <h6 class="m-0 font-weight-bold text-primary">Approve Keluhan</h6>
    </div>
    <div class="card-body">
        <?php
            echo form_open_multipart('admin/edit_approval_keluhan/'.$dummy->id);
            $nama_approval = '';
            $bukti_approval = '';
            $tanggal_approval = '';
            if($dummy->nama_approval != '-'){
                $nama_approval = $dummy->nama_approval;
            }
            if($dummy->tanggal_approval != "0000-00-00"){
                $tanggal_approval = $dummy->tanggal_approval;
            }
            if($dummy->bukti_approval != '-'){
                $bukti_approval = $dummy->bukti_approval;
            }
        ?>
         <div class="form-group">
            <label for="exampleInputPassword1">Nama Approval</label>
            <input type="text" class="form-control" name="nama_approval" value = "<?= $nama_approval ?>" placeholder="Masukkan Nama Approval" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Approval</label>
            <input type="date" class="form-control" name="tanggal_approval" value="<?= substr($tanggal_approval, 0, 10) ?>" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" name="status" required>
              <option value="PENDING"
              <?php
                if($dummy->status == "PENDING"){
                  echo "selected";
                }
              ?>
              >Pending</option>
              <option value="DITOLAK"
              <?php
                if($dummy->status == "DITOLAK"){
                  echo "selected";
                }
              ?>
              >Ditolak</option>
              <option value="SELESAI"
              <?php
                if($dummy->status == "SELESAI"){
                  echo "selected";
                }
              ?>
              >Selesai</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Bukti Approval</label>
            <?php if($bukti_approval != '') { ?>
            <br>
            <img src="<?php echo base_url()?>assets/bukti_approval/<?php echo $dummy->bukti_approval ?>" width="250px">
            <br>
            <br>
            <input type="file" class="form-control-file" name="bukti_approval" accept="image/*">
            <?php } else { ?>
            <input type="file" class="form-control-file" name="bukti_approval" accept="image/*" required>
            <?php } ?>
          </div>

          <button type="submit" class="btn btn-warning">Update Approval</button>
        <?php echo form_close();?>
    </div>
</div>


</div>
<!-- /.container-fluid -->

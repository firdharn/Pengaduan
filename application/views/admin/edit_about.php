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
        <h6 class="m-0 font-weight-bold text-primary">Edit Banner</h6>
    </div>
    <div class="card-body">
        <?php           
            if($this->session->flashdata('success')){
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('success');
                echo '</div>';
            }   
            echo form_open_multipart('admin/edit_about');
        ?>
            <div class="form-group">
                <label for="exampleFormControlFile1">Banner Image</label>
                <br>
                <?php if($dummy != null) { ?>
                </br>
                    <div>                    
                        <img src="<?php echo base_url()?>assets/about/<?php echo $dummy->about_image ?>" width="250px">
                    </div> 
                </br>
                <?php } ?>                
                <input type="file" name="about_image" accept="image/gif,image/png,image/jpg,image/jpeg">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Judul</label>
                <input type="text" class="form-control" name="about_title" 
                    <?php
                        if($dummy != null){
                            echo "value=\"".$dummy->about_title."\"";                            
                        } else {
                            echo "value=\"\"";
                        }
                    ?>
                    placeholder="Masukkan Caption" required>
            </div>

             <div class="form-group">
                <label for="exampleFormControlFile1">Deskripsi</label>
                <textarea name="about_desc" id="ckeditor" rows="10" cols="80" required>
                    <?php
                        if($dummy != null){
                            echo $dummy->about_desc;                            
                        }
                    ?>
                </textarea>
            </div>
            
            <button type="submit" class="btn btn-warning">Update</button>
        <?php echo form_close();?>
    </div>
</div>


</div>
<!-- /.container-fluid -->

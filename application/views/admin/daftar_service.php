<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <!-- <h1 class="h3 mb-0 text-gray-800">Daftar Keluhan</h1> -->
    <a href="<?= base_url('admin/tambah_service')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Layanan</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Layanan</h6>
    </div>
    <div class="card-body">
        <?php             
            if($this->session->flashdata('success')){
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('success');
                echo '</div>';
            }   
            if($this->session->flashdata('warning')){
                echo '<div class="alert alert-warning">';
                echo $this->session->flashdata('warning');
                echo '</div>';
            }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image Layanan</th>
                        <th>Judul</th>
                        <th>Caption</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach ($dummy as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><img src="<?php echo base_url()?>assets/service/<?php echo $value->service_image ?>" width="100px"></td>
                            <td><?= $value->title ?></td>
                            <td><?= $value->caption ?></td>
                            <td>
                                <a class="btn btn-primary btn-circle" 
                                    data-toggle="modal" 
                                    data-target="#modal-detail<?php echo $value->id; ?>">
                                        <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('admin/edit_service/'.$value->id)?>" class="btn btn-warning btn-circle">
                                    <i class="fas fa-hand-paper"></i>
                                </a>
                                <a onclick="javascript: return confirm('Anda yakin menghapus data our team ?')"
                                    href="<?= base_url('admin/hapus_service/'.$value->id)?>" 
                                    class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->

<?php foreach ($dummy as $key => $value) { ?>
<!-- Modal -->
<div class="modal fade" id="modal-detail<?php echo $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Layanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="text-align:center;margin-bottom:16px">
                    <img src="<?php echo base_url()?>assets/service/<?php echo $value->service_image ?>" width="250px">
                </div>                
                <table class="table table-bordered no-margin">
                    <tbody>  
                         <tr>
                            <th>Judul</th>
                            <td><?= $value->title ?></td>
                        </tr>

                        <tr>
                            <th>Caption</th>
                            <td><?= $value->caption ?></td>
                        </tr>
                
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>                
            </div>
        </div>
    </div>
</div>
<?php } ?>
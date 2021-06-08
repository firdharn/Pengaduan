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
        <h6 class="m-0 font-weight-bold text-primary">Daftar Keluhan</h6>
    </div>
    <div class="card-body">
        <?php 
            if($this->session->flashdata('pesan hapus')){
                echo '<div class="alert alert-warning">';
                echo $this->session->flashdata('pesan hapus');
                echo '</div>';
            }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Keluhan Pelanggan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach ($dummy as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->tanggal ?></td>
                            <td><?= $value->keluhan_pelanggan ?></td>
                            <?php if($value->status == 'PENDING'){ ?>
                                <td>
                                    <span class="badge badge-pill badge-danger"><?= $value->status ?></span>
                                </td>
                                <!-- <td>
                                    <a class="btn badge-pill badge-danger" 
                                        href="<?php echo base_url();?>admin/update_status_keluhan?sid=<?php echo $value->id;?>&sval=<?php echo $value->status;?>">
                                            <?= $value->status ?>
                                    </a>
                                </td> -->
                            <?php } else { ?>
                                <td>
                                    <span class="badge badge-pill badge-success"><?= $value->status ?></span>
                                </td>
                                <!-- <td>
                                    <a class="btn badge-pill badge-success" 
                                        href="<?php echo base_url();?>admin/update_status_keluhan?sid=<?php echo $value->id;?>&sval=<?php echo $value->status;?>">
                                            <?= $value->status ?>
                                    </a>
                                </td> -->
                            <?php } ?>
                            
                            <td>
                                <a class="btn btn-primary btn-circle" 
                                    data-toggle="modal" 
                                    data-target="#modal-detail<?php echo $value->id; ?>">
                                        <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('admin/edit_approval_keluhan/'.$value->id)?>" class="btn btn-warning btn-circle">
                                    <i class="fas fa-hand-paper"></i>
                                </a>
                                <a onclick="javascript: return confirm('Anda yakin menghapus keluhan ?')"
                                    href="<?= base_url('admin/hapus_keluhan/'.$value->id)?>" 
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
<!-- /.container-fluid -->

<?php $no=1; foreach ($dummy as $key => $value) { ?>
<!-- Modal -->
<div class="modal fade" id="modal-detail<?php echo $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Keluhan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td><?= $value->nama ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= $value->tanggal ?></td>
                        </tr>
                        <tr>
                            <th>Keluhan</th>
                            <td><?= $value->keluhan_pelanggan ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= ucfirst(strtolower($value->status)) ?></td>
                        </tr>
                        <tr>
                            <th>Bukti Keluhan</th>
                            <td><img src="<?php echo base_url()?>assets/bukti_keluhan/<?php echo $value->bukti_keluhan ?>" width="200px"></td>
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
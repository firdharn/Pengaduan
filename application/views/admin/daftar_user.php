<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-gray-800">Daftar Keluhan</h1> -->
        <!-- <a href="tambah_user.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah User</a> -->
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pelanggan</h6>
        </div>
        <div class="card-body">
            <?php 
                if($this->session->flashdata('pesan hapus')){
                    echo '<div class="alert alert-success">';
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
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no=1; foreach ($dummy as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->no_telepon ?></td>
                                <td><?= $value->email ?></td>
                                <td>
                                    <!--<a class="btn btn-primary btn-circle" -->
                                    <!--    data-toggle="modal" data-target="#modal-detail<?php echo $value->id; ?>">-->
                                    <!--    <i class="fas fa-eye"></i>-->
                                    <!--</a>-->
                                    <!-- <a href="edit_user.html" class="btn btn-warning btn-circle">
                                        <i class="fas fa-hand-paper"></i>
                                    </a> -->
                                    <a onclick="javascript: return confirm('Anda yakin menghapus user ?')"
                                        href="<?= base_url('admin/hapus_user/'.$value->id)?>" 
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
                            <th>No. Telepon</th>
                            <td><?= $value->no_telepon ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $value->email ?></td>
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
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
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kritik dan Saran</h6>
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
                        <th>Tanggal</th>
                        <th>Status Pelanggan</th>
                        <th>Kritik Saran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach ($dummy as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->tanggal ?></td>
                            <td><?php
                                if($value->Status == 0)
                                echo 'Guest';
                                else
                                echo 'Pelanggan';
                            ?></td>
                            <td><?= $value->kritik_saran ?></td>
                            <td>
                        
                                <a onclick="javascript: return confirm('Anda yakin menghapus kritik&saran ?')"
                                    href="<?= base_url('admin/hapus_kritik_saran/'.$value->id)?>" 
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Kritik Dan Saran</h5>
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
                            <th>Kritik & Saran</th>
                            <td><?= $value->kritik_saran ?></td>
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
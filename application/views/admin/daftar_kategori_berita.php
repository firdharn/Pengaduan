<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <!-- <h1 class="h3 mb-0 text-gray-800">Daftar Keluhan</h1> -->
    <a href="<?= base_url('admin/tambah_kategori_berita')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori Berita</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori Berita</h6>
    </div>
    <div class="card-body">
        <?php 
            if($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            if($this->session->flashdata('error')){
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
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
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach ($dummy as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_kategori ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_kategori_berita/'.$value->id)?>" class="btn btn-warning btn-circle">
                                    <i class="fas fa-hand-paper"></i>
                                </a>
                                <a onclick="javascript: return confirm('Anda yakin menghapus kategori berita ?')"
                                    href="<?= base_url('admin/hapus_kategori_berita/'.$value->id)?>" 
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
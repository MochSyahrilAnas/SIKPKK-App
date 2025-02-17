<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        DataTables Kehamilan
        <a class="btn btn-primary float-right btn-sm" href="<?= base_url() ?>kehamilan/tambahKehamilan">
          <i class="fas fa-plus fa-sm fa-fw mr-2"></i>
          Tambah Data
        </a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if ($this->session->flashdata('alert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kehamilan <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama Ibu</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($kehamilan as $hml) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $hml['nik'] ?></td>
                <td><?= $hml['nama_lgkp'] ?></td>
                <td><?= $hml['status'] ?></td>
                <td class="text-center">
                  <a href="<?= base_url() ?>kehamilan/ubahKehamilan/<?= $hml['id_ibu'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title=EDIT>
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a href="<?= base_url() ?>kehamilan/hapusKehamilan/<?= $hml['id_ibu'] ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title=DELETE onclick="return confirm('Are you sure you want to delete this item?');">
                    <i class="fas fa-trash"></i>
                  </a>
                  <a href="<?= base_url() ?>kehamilan/detailKehamilan/<?= $hml['id_ibu'] ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" title=DETAIL>
                    <i class="fas fa-info-circle"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Member Kegiatan</h1>
  <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem ullam qui eius reiciendis laudantium vel fugiat! Magnam officia animi, natus quas voluptas distinctio voluptates assumenda et molestiae, dolores laboriosam eveniet nam voluptatem, corporis ea nesciunt? Quidem ea perspiciatis velit atque corporis dolorum, accusantium harum aspernatur reiciendis sed at perferendis quaerat.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Member Kegiatan
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if ($this->session->flashdata('alert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kegiatan <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>Nama Member</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($member as $mbr) : ?>
              <tr>
                <td><?= $no++  ?></td>
                <td><?= $mbr['nama_lgkp']  ?></td>
                <td><?= $mbr['keterangan']  ?></td>
                <td>
                  <a href="">Hapus</a>
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
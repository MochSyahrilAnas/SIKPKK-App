<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        DataTables Keluarga
        <a class="btn btn-primary float-right btn-sm" href="<?= base_url() ?>kondisirumah">
          <i class="fas fa-arrow-left fa-sm fa-fw mr-2"></i>
          Kembali
        </a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if ($this->session->flashdata('alert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kondisi Rumah <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Hubungan Keluarga</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Pendidikan</th>
              <th>Pekerjaan</th>
              <th>Kriteria</th>
              <th>Kebutuhan Khusus</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($keluarga as $klg) : ?>
              <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $klg['nama_lgkp'] ?></td>
                <td><?= $klg['hbkel'] ?></td>
                <td><?= $klg['jk'] ?></td>
                <td><?= $klg['tmp_lhr'] ?></td>
                <td><?= $klg['tgl_lhr'] ?></td>
                <td><?= $klg['pendidikan'] ?></td>
                <td><?= $klg['pekerjaan'] ?></td>
                <td><?= $klg['kriteria'] ?></td>
                <td><?= $klg['keb_khs'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="table-responsive">
        <caption><strong>List of Kondisi Rumah</strong></caption>
        <br>
        <div class="card w-50 bg-light mb-3">
          <div class="card-body">
            <?php if (!empty($kondisirumah)) {
              $row = array_shift($kondisirumah);
              echo "<strong>Makanan Pokok Sehari-hari</strong> :  " . $row['mkn_pokok'] . "<br>";
              echo "<strong>Jamban Keluarga</strong> : " . $row['jamban'] . "<br>";
              echo "<strong>Sumber Air</strong> : " . $row['sbr_air'] . "<br>";
              echo "<strong>Tempat Pembuangan Sampah</strong> : " . $row['tps'] . "<br>";
              echo "<strong>Saluran Air Pembuangan Limbah</strong> : " . $row['spal'] . "<br>";
              echo "<strong>Stiker P4K</strong> : " . $row['stiker_p4k'] . "<br>";
              echo "<strong>Kriteria Rumah</strong> : " . $row['krt_rmh'] . "<br>";
              echo "<strong>Aktifitas UP2K</strong> : " . $row['akf_up2k'] . "<br>";
              echo "<strong>Aktifitas KUKPL</strong> : " . $row['akf_kukpl'] . "<br>";
            } else {
              echo "Tidak ada data yang ditemukan";
            }
            ?>
          </div>
        </div>

      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
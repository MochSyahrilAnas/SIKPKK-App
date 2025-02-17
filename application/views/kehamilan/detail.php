<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <?php if ($kehamilan['status'] == 'Hamil') { ?>
    <div class="row nt-2">
      <div class="col-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Cek Kehamilan</h6>
          </div>
          <div class="card-body">
            <form action="<?= base_url('kehamilan/tambahCekKehamilan') ?>" method="post">
              <div class="form-group" hidden>
                <input type="text" class="form-control" name="id_ibu" id="" value="<?= $kehamilan['id_ibu'] ?>" hidden>
              </div>
              <div class="form-group">
                <label><strong>NIK - Nama Lengkap</strong></label>
                <input type="text" name="" class="form-control" value="<?= $kehamilan['nik'] ?> - <?= $kehamilan['nama_lgkp'] ?>" placeholder="" disabled>
              </div>
              <div class="form-group">
                <label for="tgl_cek"><strong>Tanggal Pemeriksaan</strong></label>
                <input type="date" class="form-control" name="tgl_cek" id="" value="<?= set_value('tgl_cek') ?>">
              </div>
              <div class="form-group">
                <label for="bb"><strong>Berat Badan</strong></label>
                <input type="text" class="form-control" name="bb" id="" value="<?= set_value('bb') ?>">
              </div>

              <div class="form-group">
                <label for="tb"><strong>Tinggi Badan</strong></label>
                <input type="text" class="form-control" name="tb" id="" value="<?= set_value('tb') ?>">
              </div>
              <div class="form-group">
                <label for="kondisi"><strong>Kondisi</strong></label>
                <textarea class="form-control" name="kondisi" id="" cols="5" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </form>
          </div>
        </div>
      </div>
      <!-- DataTales Example -->
      <div class="col-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Cek Kehamilan
            </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <?php if ($this->session->flashdata('alert')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data Cek Kehamilan <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>BB</th>
                    <th>TB</th>
                    <th>Kondisi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($hamil as $hml) : ?>
                    <?php if ($hml['id_ibu'] == $kehamilan['id_ibu']) { ?>
                      <tr>
                        <td><?= $no++  ?></td>
                        <td><?= $hml['tgl_cek']  ?></td>
                        <td><?= $hml['bb']  ?></td>
                        <td><?= $hml['tb'] ?></td>
                        <td><?= $hml['kondisi']  ?></td>
                        <td class="text-center">
                          <a href="<?= base_url() ?>kehamilan/hapusCekKehamilan/<?= $hml['id_cek'] ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title=DELETE onclick="return confirm('Are you sure you want to delete this item?');">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- View Status Melahirkan -->
  <?php } else { ?>
    <div class="row nt-2">
      <div class="col-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Melahirkan</h6>
          </div>
          <div class="card-body">
            <form action="<?= base_url('kehamilan/tambahBayi') ?>" method="post">
              <div class="form-group" hidden>
                <input type="text" class="form-control" name="id_ibu" id="" value="<?= $kehamilan['id_ibu'] ?>" hidden>
              </div>
              <div class="form-group">
                <label><strong>Nama Ibu</strong></label>
                <input type="text" name="" class="form-control" value="<?= $kehamilan['nik'] ?> - <?= $kehamilan['nama_lgkp'] ?>" placeholder="" disabled>
              </div>
              <div class="form-group">
                <label for="nama_bayi"><strong>Nama Bayi</strong></label>
                <input type="text" class="form-control" name="nama_bayi" id="" value="<?= set_value('nama_bayi') ?>">
              </div>
              <div class="form-group">
                <label for="tgl_lahir"><strong>Tanggal Melahirkan</strong></label>
                <input type="date" class="form-control" name="tgl_lahir" id="" value="<?= set_value('tgl_lahir') ?>">
              </div>
              <div class="form-group">
                <label for="jk"><strong>Jenis Kelamin</strong></label>
                <select class="form-control" name="jk" id="">
                  <option hidden>--Pilih--</option>
                  <?php foreach ($jenis_kelamin as $jk) : ?>
                    <?php if ($jk == $bayi['jk']) : ?>
                      <option value="<?= $jk ?>" selected><?= $jk ?></option>
                    <?php else : ?>
                      <option value="<?= $jk ?>"><?= $jk ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="akta"><strong>Akta Kelahiran</strong></label>
                <select class="form-control" name="akta" id="">
                  <option hidden>--Pilih--</option>
                  <?php foreach ($akta as $a) : ?>
                    <?php if ($a == $bayi['akta']) : ?>
                      <option value="<?= $a ?>" selected><?= $a ?></option>
                    <?php else : ?>
                      <option value="<?= $a ?>"><?= $a ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </form>
          </div>
        </div>
      </div>
      <!-- DataTales Example -->
      <div class="col-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelahiran
            </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <?php if ($this->session->flashdata('alert')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data Cek Kehamilan <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama Ibu</th>
                    <th>Nama Bayi</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Akta</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($bayi as $b) : ?>
                    <?php if ($b['id_ibu'] == $kehamilan['id_ibu']) { ?>
                      <tr>
                        <td><?= $no++  ?></td>
                        <td><?= $b['nama_ibu']  ?></td>
                        <td><?= $b['nama_bayi']  ?></td>
                        <td><?= $b['jk']  ?></td>
                        <td><?= $b['tgl_lahir']  ?></td>
                        <td><?= $b['akta']  ?></td>
                        <td class="text-center">
                          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $b['id_bayi'] ?>" ata-bs-toggle="tooltip" title=EDIT>
                            <i class="fas fa-fw fa-pencil-alt"></i>
                          </button>
                          <a href="<?= base_url() ?>kehamilan/hapusBayi/<?= $b['id_bayi'] ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title=DELETE onclick="return confirm('Are you sure you want to delete this item?');">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Edit Bayi -->
<?php $no = 0;
foreach ($bayi as $b) : $no++; ?>
  <div class="modal fade" id="editModal<?= $b['id_bayi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('kehamilan/ubahBayi') ?>
          <input type="hidden" name="id" value="<?= $b['id_bayi'] ?>">
          <div class="form-group">
            <label for="nama_bayi"><strong>Nama Bayi</strong></label>
            <input type="text" class="form-control" name="nama_bayi" id="" value="<?= $b['nama_bayi'] ?>">
          </div>
          <div class="form-group">
            <label for="tgl_lahir"><strong>Tanggal Melahirkan</strong></label>
            <input type="date" class="form-control" name="tgl_lahir" id="" value="<?= $b['tgl_lahir'] ?>">
          </div>
          <div class="form-group">
            <label for="jk"><strong>Jenis Kelamin</strong></label>
            <select class="form-control" name="jk" id="">
              <option hidden>--Pilih--</option>
              <?php foreach ($jenis_kelamin as $jk) : ?>
                <?php if ($jk == $b['jk']) : ?>
                  <option value="<?= $jk ?>" selected><?= $jk ?></option>
                <?php else : ?>
                  <option value="<?= $jk ?>"><?= $jk ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="akta"><strong>Akta Kelahiran</strong></label>
            <select class="form-control" name="akta" id="">
              <option hidden>--Pilih--</option>
              <?php foreach ($akta as $a) : ?>
                <?php if ($a == $b['akta']) : ?>
                  <option value="<?= $a ?>" selected><?= $a ?></option>
                <?php else : ?>
                  <option value="<?= $a ?>"><?= $a ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Add Modal -->
<!-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('kegiatan/tambahKegiatan') ?>
        <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Nama Kegiatan</strong></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_kegiatan">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
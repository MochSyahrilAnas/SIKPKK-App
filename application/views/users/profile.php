                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

                  <div class="row">
                    <div class="col-lg-8">
                      <?= $this->session->flashdata('msg') ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-8">
                      <!-- Dropdown Card Example -->
                      <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">User Card</h6>
                          <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                              <div class="dropdown-header">Action:</div>
                              <a class="dropdown-item" href="<?= base_url('users/edit') ?>">Edit Profile</a>
                              <a class="dropdown-item" href="<?= base_url('users/changePassword') ?>">Change Password</a>
                            </div>
                          </div>
                        </div>
                        <!-- Card Body -->
                        <div class="row no-gutters">
                          <div class="col-md-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img">
                          </div>
                          <div class="col-md-9">
                            <div class="card-body">
                              <h3 class="card-title"><strong><?= $user['fullname'] ?></strong></h3>
                              <p class="card-subtitle mb-4"><small class="text-muted"><?= $user['email'] ?></small></p>
                              <p class="card-text"><?= $user['address'] ?></p>
                              <div class="dropdown-divider"></div>
                              <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']) ?></small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url('uploads/' . $this->session->foto) ?>" class="avatar img-fluid rounded-circle me-1" alt="Charles Hall" /> <span><?= ucfirst($this->session->userdata('username')); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-bs-toggle="modal" data-bs-target="#updateProfil">Ubah Profil</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-bs-toggle="modal" data-bs-target="#ubahPassword">Ubah Password</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Log out</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="updateProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formUbahProfil" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input class="form-control" type="text" name="username" id="username" value="<?= $this->session->username ?>" required>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input class="form-control" type="text" name="nama" id="nama" value="<?= $this->session->nama ?>" required>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input class="form-control" type="text" name="alamat" id="alamat" value="<?= $this->session->alamat ?>" required>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input class="form-control" type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= $this->session->tanggal_lahir ?>" required>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <center>
                                                <img src="<?= base_url('uploads/' . $this->session->foto) ?>" alt="" width="100px">
                                            </center><br>
                                            <input class="form-control" type="file" name="foto" id="foto">
                                        </div><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formUbahPassword">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" name="password" id="password" required>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="">Konfirmasi Password</label>
                                            <input class="form-control" type="password" name="konfirmasi_password" id="konfirmasi_password" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Data Games</h1>
        <div class="row">
            <div class="col-12 col-xl-12 col-xxl-6 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="p-3">
                                    <a href="<?= base_url('pages/game/tambah') ?>" class="btn btn-success">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <table id="table" class="display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Cover</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($games as $g) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><img class="img-fluid w-25" src="<?= base_url('assets/img/covers/') . $g['gambar'] ?>" alt=""></td>
                                                    <td><?= $g['nama'] ?></td>
                                                    <td><?= $g['harga'] ?></td>
                                                    <td><?= $g['jumlah'] ?></td>
                                                    <td><?= $g['satuan'] ?></td>
                                                    <td>
                                                        <a class="btn btn-info" href="<?= base_url('pages/game/edit/') . $g['id'] ?>">Edit</a>
                                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $g['id'] ?>">Hapus</button>
                                                    </td>
                                                </tr>
                                                <!-- Modal Konfirmasi Hapus-->
                                                <div class="modal fade" id="hapus<?= $g['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Game</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus game <?= $g['nama'] ?>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a class="btn btn-danger" href="<?= base_url('pages/game/hapus/') . $g['id'] ?>">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php   }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
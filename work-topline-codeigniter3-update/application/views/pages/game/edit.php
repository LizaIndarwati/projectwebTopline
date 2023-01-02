<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Edit Data Games</h1>
        <div class="row">
            <div class="col-12 col-xl-12 col-xxl-6 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-content">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="nama" value="<?= $game['nama'] ?>" name="nama">
                                            <?= form_error('nama', '<small class="text-danger text-left">', '</small>') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="harga">Harga</label>
                                            <input type="number" min="0" class="form-control <?= form_error('harga') ? 'is-invalid' : '' ?>" id="harga" value="<?= $game['harga'] ?>" name="harga">
                                            <?= form_error('harga', '<small class="text-danger text-left">', '</small>') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="jumlah">Jumlah</label>
                                            <input type="number" min="0" class="form-control <?= form_error('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" value="<?= $game['jumlah'] ?>" name="jumlah">
                                            <?= form_error('jumlah', '<small class="text-danger text-left">', '</small>') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="satuan">Satuan</label>
                                            <input type="text" class="form-control <?= form_error('satuan') ? 'is-invalid' : '' ?>" id="satuan" value="<?= $game['satuan'] ?>" name="satuan">
                                            <?= form_error('satuan', '<small class="text-danger text-left">', '</small>') ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gambar</label>
                                            <input class="form-control" type="file" id="gambar" name="gambar">
                                        </div>
                                        <a href="<?= base_url('pages/game') ?>" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
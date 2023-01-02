<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Riwayat Pesanan</h1>
        <div class="row">
            <div class="col-12 col-xl-12 col-xxl-6 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-content">
                                <div class="card-body">
                                    <table id="table" class="display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Game</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Jumlah Uang Game</th>
                                                <th>Terkirim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($riwayat as $r) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $r['username'] ?></td>
                                                    <td><?= $r['game'] ?></td>
                                                    <td><?= date('d/m/Y', strtotime($r['tgl_pembelian'])) ?></td>
                                                    <td><?= $r['jumlah_uang'] ?> UC</td>
                                                    <td><?= $r['terkirim'] == 1 ? '<div class="status-indicator bg-success w-25 p-1 text-center rounded"><i class="text-white align-middle" data-feather="check"></i></div>' : '<div class="status-indicator bg-danger w-25 p-1 text-center rounded"><i class="text-white align-middle" data-feather="x"></i></div>' ?></td>
                                                </tr>
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
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">TOPLINE</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item <?= $nav_active == 'beranda' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url('pages/dashboard') ?>">
                    <i class="align-middle text-white" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?= $nav_active == 'game' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url('pages/game') ?>">
                    <i class="align-middle text-white" data-feather="list"></i> <span class="align-middle">Game</span>
                </a>
            </li>

            <li class="sidebar-item <?= $nav_active == 'riwayat' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url('pages/riwayat') ?>">
                    <i class="align-middle text-white" data-feather="clock"></i> <span class="align-middle">Riwayat Pesanan</span>
                </a>
            </li>

            <li class="sidebar-item <?= $nav_active == 'report' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url('pages/report') ?>">
                    <i class="align-middle text-white" data-feather="file-text"></i> <span class="align-middle">Report</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
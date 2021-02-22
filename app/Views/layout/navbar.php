<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
    <div class="container navbar-container">
        <a class="navbar-brand text-main-color" href="<?= base_url("/") ?>">Masjid Assalam</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggle-icon"><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse mt-2 mt-md-0" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url("/") ?>">Beranda</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url("berita") ?>">Berita</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Agenda
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url("pengajian") ?>">Pengajian</a>
                        <a class="dropdown-item" href="<?= base_url("kegiatan") ?>">Kegiatan</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Laporan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url("pages/keuangan") ?>">Keuangan</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lainnya
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url("pengumuman") ?>">Pengumuman</a>
                        <a class="dropdown-item" href="<?= base_url("/#jadwal-shalat-lengkap") ?>">Jadwal Shalat</a>
                        <!-- <a class="dropdown-item" href="<?= base_url("/hadits") ?>">Kumpulan Hadits</a> -->
                        <a class="dropdown-item" href="<?= base_url("/pages/profile") ?>">Profil & Kontak</a>
                        <a class="dropdown-item" href="<?= base_url("/pages/galeri") ?>">Galeri</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (!logged_in()) : ?>
                    <li class="nav-item active">
                        <a class="nav-link text-main-color " href="<?= base_url('login'); ?>">Log in</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= user()->username; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <?php if (in_groups(['dev', 'admin', 'superadmin'])) : ?>
                                <a class="dropdown-item" href="<?= base_url("admin/dashboard") ?>">Dashboard</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?= base_url("logout") ?>">Log out</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
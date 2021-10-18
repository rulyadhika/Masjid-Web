<?php


function getElapsedTime($datetime)
{
    $interval = date_diff(date_create($datetime), date_create('now'));
    $tahun = $interval->y;
    $bulan = $interval->m;
    $hari = $interval->d;
    $jam = $interval->h;
    $menit = $interval->i;
    $detik = $interval->s;

    if ($tahun > 0) {
        return $tahun . " Tahun " . $bulan . " Bulan";
    } elseif ($bulan > 0) {
        return $bulan . " Bulan " . $hari . " Hari";
    } elseif ($hari > 0) {
        return $hari . " Hari " . $jam . " Jam";
    } elseif ($jam > 0) {
        return $jam . " Jam " . $menit . " Menit";
    } elseif ($menit >= 0) {
        return $menit . " Menit " . $detik . " Detik";
    }
};

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="icon" href="<?= base_url('asset/images/logo-masjid.png'); ?>">

    <!-- ui css -->
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/asset/css/loading.css">
    <!-- site css -->
    <link rel="stylesheet" href="/asset/css/homepage.css">


    <title><?= $title; ?></title>
</head>

<body>
    <?php $database = \Config\Database::connect(); ?>
    <?= $this->include("layout/jadwalshalat"); ?>
    <?= $this->include("layout/navbar"); ?>
    <div class="banner-carousel">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($banners as $bannerNumber => $b) : ?>
                    <div class="carousel-item <?= $bannerNumber == 0 ? 'active' : ''; ?>">
                        <img src="<?= base_url("asset/images/banner/" . $b['gambar']); ?>" class="d-block w-100" alt="..." load='lazy'>
                        <div class="carousel-caption">
                            <h5><?= $b['judul']; ?></h5>
                            <p><?= $b['keterangan']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <?= $this->include("layout/breadcrumbs-search"); ?>

    <div class="main-container">
        <div class="pages-container">
            <div class="content-container">
                <section class="content-section" id="layanan">
                    <h3 class="font-weight-bold text-center section-title-center">Pelayanan</h3>
                    <p class="text-center">Beberapa pelayanan yang Masjid Assalam berikan
                        selain
                        menyelenggarakan ibadah sholat jumat,
                        dan sholat fardhu.</p>
                    <ul class="layanan-wrapper">
                        <li class="wide-x">
                            <span>Pemberdayaan Zakat, Infaq, Shodaqoh dan Wakaf</span>
                            <img src="https://source.unsplash.com/rbz1hVh7_LM/800x600" alt="">
                        </li>
                        <li>
                            <span>Kegiatan Pendidikan</span>
                            <img src="https://source.unsplash.com/svnLIZ6jgCQ/800x600" alt="">
                        </li>
                        <li>
                            <span>Dakwah Islam/Tabliq Akbar</span>
                            <img src="https://source.unsplash.com/XIdBO7BtZhY/800x600" alt="">
                        </li>
                        <li class="wide-x">
                            <span>Pengajian Rutin</span>
                            <img src="https://source.unsplash.com/kJ62-olTYHk/800x600" alt="">
                        </li>
                        <li class="wide-x">
                            <span>Kegiatan Hari Besar Islam</span>
                            <img src="https://source.unsplash.com/mamM4xYReBU/600x800" style="object-position: bottom !important;" alt="">
                        </li>
                    </ul>
                </section>

                <section class="content-section" id="jadwal-shalat-lengkap">
                    <h3 class="font-weight-bold">Waktu Shalat</h3>
                    <div class="jadwalShalatWrapper">
                        <div class="d-flex justify-content-between mb-2">
                            <h6>Waktu shalat di Banyumas</h6>
                            <small></small>
                        </div>
                        <div class="lazyload">
                            <ul class="o-vertical-spacing o-vertical-spacing--l">
                                <li class="blog-post o-media">
                                    <div class="o-media__figure">
                                        <span class="skeleton-box" style="width:100px;height:80px;"></span>
                                    </div>
                                    <div class="o-media__body">
                                        <div class="o-vertical-spacing">
                                            <h3 class="blog-post__headline">
                                                <span class="skeleton-box" style="width:55%;"></span>
                                            </h3>
                                            <p>
                                                <span class="skeleton-box" style="width:80%;"></span>
                                                <span class="skeleton-box" style="width:90%;"></span>
                                                <span class="skeleton-box" style="width:83%;"></span>
                                                <span class="skeleton-box" style="width:80%;"></span>
                                            </p>
                                            <div class="blog-post__meta">
                                                <span class="skeleton-box" style="width:70px;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <small class="mb-0">Data berdasarkan KEMENAG RI</small>
                        </div>
                        <div class="col-sm text-sm-right">
                            <small class=" font-italic">source : https://api.banghasan.com</small>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="content-widget-section">
                    <div class="postingan-section">
                        <h4 class="font-weight-bold section-regular-title mb-0">Postingan Terbaru</h4>
                        <small class="d-block mb-3 text-muted">Berita & Pengumuman Terbaru</small>
                        <div class="postingan-wrapper">
                            <?php foreach ($post_terbaru as $pt) : ?>
                                <a class="card shadow-sm" href="<?= base_url($pt['kategori'] . "/" . $pt['slug']); ?>">
                                    <img src="<?= base_url("asset/images/thumbnails/" . $pt['thumbnail']) ?>" class="card-img-top" alt="..." load="lazy">
                                    <div class="card-body">
                                        <small class="text-muted d-block time-info mb-2">
                                            <?= strftime("%A, %d %b %Y", strtotime($pt['updated_at'])); ?></small>
                                        <h6 class="card-title font-weight-bold mb-2" title="">
                                            <?= strlen($pt['judul']) > 50 ? substr($pt['judul'], 0, 50) . "..." : $pt['judul']; ?>
                                        </h6>
                                        <p class=" text-muted">
                                            <?= substr(strip_tags($pt['isi']), 0, 150) . " ..."; ?> </p>
                                        <small class="more-detail-btn">Selengkapnya <i class="fa fa-chevron-circle-right"></i></small>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="agenda-section">
                        <h4 class="font-weight-bold section-regular-title mb-0">Agenda</h4>
                        <small class="d-block mb-3 text-muted">Kegiatan & Pengajian</small>
                        <div class="agenda-wrapper d-flex row">
                            <?php foreach ($agenda_terbaru as $at) : ?>
                                <a href="<?= base_url($at['kategori'] . "/" . $at['slug']) ?>" class="kartu col-sm-6 col-lg-12 d-flex">
                                    <?php if ($at['thumbnail'] != "default.jpg") : ?>
                                        <img src="<?= base_url("asset/images/thumbnails/" . $at['thumbnail']) ?>" load="lazy" alt="...">
                                    <?php endif; ?>
                                    <div class="kartu-body <?= $at['thumbnail'] == "default.jpg" ? 'px-0' : ''; ?>">
                                        <h6 class="mb-0" title="<?= $at['judul']; ?>">
                                            <?= strlen($at['judul']) > 50 ? substr($at['judul'], 0, 50) . "..." : $at['judul']; ?></h6>
                                        <?php if ($at['created_at'] == $at['updated_at']) : ?>
                                            <small class="text-muted font-italic"><i class="fa fa-clock"></i> Diposting
                                                <?= getElapsedTime($at['created_at']) ?> yang lalu
                                            </small>
                                        <?php else : ?>
                                            <small class="text-muted font-italic"><i class="fa fa-clock"></i> Diupdate
                                                <?= getElapsedTime($at['updated_at']) ?> yang lalu
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?= $this->include("layout/footer") ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="/asset/js/clock.js"></script>

    <script>
        const applyJadwal = (response) => {
            const hari = ['hari ini', 'esok hari'];
            let result = '';

            // for main content
            response.forEach((data, count) => {
                result += `<div class="row mb-2">
                    <div class="col-sm"><h6 class="mb-0">Waktu shalat di Banyumas ${hari[count]}</h6></div>
                    <div class="col-sm text-sm-right"><small>${data.query.tanggal_masehi} | ${data.query.tanggal_hijriah}</small></div>
                </div>
                <ul>
                    <li>
                        <span>Imsyak</span>
                        <span>${data.jadwal.data.imsak} WIB</span>
                    </li>
                    <li>
                        <span>Subuh</span>
                        <span>${data.jadwal.data.subuh} WIB</span>
                    </li>
                    <li>
                        <span>Terbit</span>
                        <span>${data.jadwal.data.terbit} WIB</span>
                    </li>
                    <li>
                        <span>Dzuhur</span>
                        <span>${data.jadwal.data.dzuhur} WIB</span>
                    </li>
                    <li>
                        <span>Ashar</span>
                        <span>${data.jadwal.data.ashar} WIB</span>
                    </li>
                    <li>
                        <span>Maghrib</span>
                        <span>${data.jadwal.data.maghrib} WIB</span>
                    </li>
                    <li>
                        <span>Isya</span>
                        <span>${data.jadwal.data.isya} WIB</span>
                    </li>
                </ul>
                <hr class="my-4">
                `;
            })
            $(".jadwalShalatWrapper").html(result);
            $(".dateDisplay").text(response[0].jadwal.data.tanggal);

            // forheader
            $(".jadwal-shalat").html(`
                    <div class="d-flex">
                        <div class="waktu-shalat">
                            <small>Subuh</small>
                            <small>${response[0].jadwal.data.subuh}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Dzuhur</small>
                            <small>${response[0].jadwal.data.dzuhur}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Ashar</small>
                            <small>${response[0].jadwal.data.ashar}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Maghrib</small>
                            <small>${response[0].jadwal.data.maghrib}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Isya</small>
                            <small>${response[0].jadwal.data.isya}<span class="wib"> WIB</span></small>
                        </div>
                    </div>
            `);
        }

        const fetchJadwal = (today) => {
            $.ajax({
                type: "POST",
                url: "<?= base_url('jadwalshalat/getjadwalshalat/full') ?>",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                dataType: "JSON",
                success: function(response) {
                    applyJadwal(response);
                    localStorage.setItem(
                        "jadwalShalat",
                        JSON.stringify({
                            data: response,
                            dateWhenFetching: today,
                        })
                    );

                }
            });
        }

        setInterval(() => {
            let date = new Date();
            const today = date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear();
            const tommorow = date.getDate() + 1 + "/" + date.getMonth() + "/" + date.getFullYear();

            if (!localStorage.getItem("jadwalShalat")) {
                fetchJadwal(today);
            } else {
                if (
                    today > JSON.parse(localStorage.getItem("jadwalShalat")).dateWhenFetching
                ) {
                    fetchJadwal(today);
                } else {
                    applyJadwal(JSON.parse(localStorage.getItem("jadwalShalat")).data);
                }
            }
        }, 1000)
    </script>

</body>

</html>
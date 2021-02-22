<?php $this->extend("pages/layout/template") ?>

<?php $this->section("content") ?>
<div class="content-container">
    <h2 class="article-title">Galeri Masjid Assalam</h2>
    <div class="article-info border-bottom mb-0">
        <small class="mr-2">
            <span class="text-main-color">Masjid Assalam </span> |
            <span class="font-italic text-muted"><i class="fa fa-clock"></i> Diupdate pada :
                <?= date("d M Y , H:i", strtotime($last_update)); ?> WIB
            </span>
        </small>
        <small class="d-block">
            Kategori : <a class="text-main-color" href="javascript:void(0)"><?= $page; ?></a>
        </small>
    </div>
    <div class="gallery-box">
        <ul class="gallery-wrapper">
            <?php foreach ($data as $d) : ?>
                <li>
                    <a data-ilb2-caption="<?= $d['keterangan']; ?>" data-imagelightbox="a" href="<?= base_url("asset/images/gallery/" . $d['gambar']) ?>"><img src="<?= base_url("asset/images/gallery/small_thumbnail/" . $d['gambar']) ?>" alt="<?= $d['keterangan']; ?>" load="lazy">
                    </a>
                    <div class="image-info-bg"> </div>
                    <span class="image-info"><?= $d['keterangan']; ?> <small>Klik untuk
                            memperbesar</small></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?= $this->include("layout/content-footer") ?>
</div>
<?php $this->endSection(); ?>

<?php $this->section("pageScript") ?>
<script src="<?= base_url("asset/plugins/imagelightbox-1.1.0/dist/imagelightbox.min.js") ?>"></script>
<script>
    $(document).ready(function() {
        $('a[data-imagelightbox="a"]').imageLightbox({
            activity: true,
            arrows: true,
            button: true,
            caption: true,
            navigation: false,
            overlay: true,
            quitOnDocClick: false,
            fullscreen: true,
            selector: 'a[data-imagelightbox="a"]'
        });
    });
</script>
<?php $this->endSection(); ?>
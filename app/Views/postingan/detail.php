<?php $this->extend("postingan/layout/template") ?>

<?php $this->section("content") ?>
<div class="content-container">
    <h2 class="article-title"><?= $post['judul']; ?></h2>
    <div class="article-info border-bottom">
        <small class="mr-2">
            <span class="text-main-color">Masjid Assalam </span> |
            <span class=""><?= $post['penulis']; ?>
                | <?= date("d F Y | H:i", strtotime($post['updated_at'])); ?> WIB
            </span>
        </small>
        <small class="d-block">
            Kategori : <a class="text-main-color" href="<?= base_url($post['kategori']) ?>"><?= ucfirst($post['kategori']); ?></a>
        </small>
    </div>
    <?php if ($post['thumbnail'] != 'default.jpg') : ?>
        <div class="article-thumbnail">
            <img src="<?= base_url("asset/images/thumbnails/" . $post['thumbnail']) ?>" class="img-fluid" alt="">
        </div>
    <?php endif; ?>
    <div class="ck-content">
        <div class="detail-page">
            <?= str_replace('&nbsp;', ' ', $post['isi']); ?>
        </div>
    </div>
    <?= $this->include("layout/content-footer") ?>
</div>
<?php $this->endSection(); ?>
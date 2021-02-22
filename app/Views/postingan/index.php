<?php $this->extend("postingan/layout/template") ?>

<?php $this->section("content") ?>

<div class="content-container">
    <?php if (count($posts) > 0) : ?>
        <div class="ck-content">
            <?php foreach ($posts as $post) : ?>
                <a class="post" href="<?= base_url(strtolower($post['kategori']) . "/" . $post['slug']) ?>">
                    <div class="card mb-3 border-0">
                        <div class="row no-gutters">
                            <?php if ($post['thumbnail'] != 'default.jpg') : ?>
                                <div class="col-4">
                                    <img src="<?= base_url("asset/images/thumbnails/" . $post['thumbnail']); ?>" class="card-img" style="height: 100%; object-fit:cover;" alt="..." load="lazy">
                                </div>
                                <div class="col-8">
                                <?php else : ?>
                                    <div class="col-12">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h4 class="card-title post-title"><?= $post['judul']; ?></h4>
                                        <p class="card-text d-none d-sm-inline-block">
                                            <?= substr(strip_tags(str_replace('&nbsp;', ' ', $post['isi'])), 0, 150) . " ..."; ?></p>
                                        <div class="row justify-content-between">
                                            <div class="col-sm-7 mb-0">
                                                <small class="text-muted py-auto"><i class="fa fa-clock mr-2"></i><?= date("d M Y, H:i", strtotime($post['updated_at'])); ?>
                                                    WIB</small>
                                            </div>
                                            <div class="col-sm-5 d-none d-md-inline-block text-right">
                                                <button class="btn btn-sm btn-main-color w-100">Selengkapnya</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <small class="d-block text-center font-italic text-muted border-top border-bottom p-2">Mohon maaf, tidak ada data
            yang ditemukan. <a href="<?= base_url("/") ?>">Kembali ke beranda</a></small>
    <?php endif; ?>
    <div class="d-flex justify-content-end">
        <div>
            <?= $pager->links(strtolower($page), 'bootstrap_pager'); ?>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>
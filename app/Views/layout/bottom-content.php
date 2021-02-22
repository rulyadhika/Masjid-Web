<div class="bottom-content">
    <div class="title">
        <h5>Postingan lainnya</h5>
    </div>
    <div class="bottom-content-body">
        <?php
        $database = \Config\Database::connect();
        $semua_postingan = $database->table("tb_postingan")->select("kategori,isi,judul,slug,thumbnail,updated_at")->where('data_status', 'ditampilkan')->orderBy('created_at', 'DESC')->limit(5)->get()->getResultArray();
        ?>
        <?php foreach ($semua_postingan as $postingan) : ?>
            <a class="card shadow-sm" href="<?= base_url($postingan['kategori'] . "/" . $postingan['slug']); ?>">
                <img src="<?= base_url("asset/images/thumbnails/" . $postingan['thumbnail']) ?>" class="card-img-top" alt="..." load="lazy">
                <div class="card-body">
                    <h6 class="card-title font-weight-bold mb-2" title="<?= $postingan['judul']; ?>">
                        <?= strlen($postingan['judul']) > 50 ? substr($postingan['judul'], 0, 50) . "..." : $postingan['judul']; ?>
                    </h6>
                    <p class="pb-2 text-muted"><?= substr(strip_tags($postingan['isi']), 0, 150) . " ..."; ?> </p>
                    <small class="text-muted d-block time-info"> <i class="fa fa-clock"></i>
                        <?= strftime("%A, %d %b %Y", strtotime($postingan['updated_at'])); ?></small>
                </div>
            </a>
        <?php endforeach; ?>
        <!-- <div class="card">
            <img src="https://source.unsplash.com/random/600x400" class="card-img-top" alt="..." load="lazy">
            <div class="card-body">
                <h6 class="card-title font-weight-bold">Pengembangan serambi utara dimulai</h6>
                <small class="text-muted"> <i class="fa fa-clock"></i> 28 Desember 2020</small>
            </div>
        </div> -->
    </div>
</div>
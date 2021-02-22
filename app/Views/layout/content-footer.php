<div class="content-container-footer border-bottom border-top py-2 mt-4">
    <div class="share-links-section d-flex align-items-center mr-2 flex-wrap my-1">
        <h6 class=" font-weight-bold m-0 mr-2 my-1">Bagikan ke : </h6>
        <div class="my-1">
            <a title="Whatsapp" href="whatsapp://send?text=URL Artikel">
                <i class='bx bxl-whatsapp'></i>
            </a>
            <a title="Facebook" href="http://facebook.com/">
                <i class="bx bxl-facebook"></i>
            </a>
            <a title="Twitter" href="http://twitter.com/">
                <i class="bx bxl-twitter"></i>
            </a>
            <a title="Telegram" href="http://t.me/">
                <i class="bx bxl-telegram"></i>
            </a>
        </div>
    </div>
    <?php if(isset($suggested_post)) :?>
    <a title="<?= $suggested_post['judul']; ?>"
        href="<?= base_url($suggested_post['kategori']."/".$suggested_post['slug']) ?>"
        class="next-post-suggestion-section my-1 mt-3 mt-sm-auto">
        <?php if($suggested_post['status']=="next_post") :?>
        <h6 class="m-0 font-weight-bold text-main-color">Postingan selanjutnya
            <i class="fa fa-chevron-circle-right"></i>
        </h6>
        <?php else: ?>
        <h6 class="m-0 font-weight-bold text-main-color"><i class="fa fa-chevron-circle-left"></i> Postingan
            sebelumnya
        </h6>
        <?php endif; ?>
        <small><?=substr($suggested_post['judul'],0,40)."..."; ?></small>
    </a>
    <?php else: ?>
    <small class="d-inline-block my-auto text-muted font-italic">Tidak ada postingan terkait yang tersedia. Kembali ke
        <a href="<?= base_url("/") ?>">beranda.</a></small>
    <?php endif; ?>
</div>
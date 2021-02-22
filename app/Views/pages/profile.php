<?php $this->extend("pages/layout/template") ?>

<?php $this->section("content") ?>
<div class="content-container">
    <section class="profile-content-section">
        <h2 class="article-title">Profil Masjid Assalam</h2>
        <div class="article-info border-bottom mb-0">
            <small class="mr-2">
                <span class="text-main-color">Masjid Assalam </span> |
                <span class="font-italic text-muted"><i class="fa fa-clock"></i> Diupdate pada :
                    <?= date("d M Y , H:i", strtotime($last_update_profile)); ?> WIB
                </span>
            </small>
            <small class="d-block">
                Kategori : <a class="text-main-color" href="javascript:void(0)"><?= $page; ?></a>
            </small>
        </div>
        <div class="ck-content mt-4 container">
            <?= str_replace('&nbsp;', ' ', $profile['isi']); ?>
        </div>
    </section>

    <section class="profile-content-section">
        <h2 class="article-title">Pengurus Takmir</h2>
        <div class="article-info mb-0">
            <small class="mr-2">
                <span class="text-main-color">Masjid Assalam </span> |
                <span class="font-italic text-muted"><i class="fa fa-clock"></i> Diupdate pada :
                    <?= date("d M Y , H:i", strtotime($last_update_kepengurusan)); ?> WIB
                </span>
            </small>
        </div>
        <div class="content mt-2">
            <?php $i = 1; ?>
            <table class="table table-striped ">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kepengurusan as $k) : ?>
                        <tr class="text-center">
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['jabatan']; ?></td>
                            <td><?= $k['nama']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="profile-content-section mb-0">
        <h2 class="article-title">Lokasi & Kontak</h2>
        <div class="article-info mb-0">
            <small class="mr-2">
                <span class="text-main-color">Masjid Assalam </span> |
                <span class="font-italic text-muted"><i class="fa fa-clock"></i> Diupdate pada :
                    <?= date("d M Y , H:i", strtotime($last_update_kontak)); ?> WIB
                </span>
            </small>
        </div>
        <div class="content mt-2">
            <p>Lokasi Masjid Assalam berada di komplek Perumahan Griya Satria Mandalatama, Karanglewas Kidul, Kec.
                Karanglewas, Kabupaten Banyumas, Jawa Tengah 53161</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d722.3373507595759!2d109.209591970988!3d-7.428241428874593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655e129bf3f16f%3A0xcc4b1994d7d0a48e!2sMasjid%20Assalam%20Perum%20GSMT!5e1!3m2!1sid!2sid!4v1611167298441!5m2!1sid!2sid" width="100%" height="360" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
            </iframe>
            <div class="d-flex flex-column kontak-section mt-3">
                <h5 class="font-weight-bold mb-3">Hubungi kami di :</h5>
                <?php foreach ($kontak as $k) : ?>
                    <a href="<?= $k['link']; ?>" target="_blank" title="<?= $k['nama']; ?>"><i class="<?= $k['icon']; ?> mr-1"></i>
                        <span class="font-weight-bold"> <?= $k['nama']; ?></span> : <?= $k['isi']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?= $this->include("layout/content-footer") ?>
</div>
<?php $this->endSection(); ?>
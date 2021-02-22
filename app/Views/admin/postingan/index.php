<?php $this->extend("admin/layout/template") ?>

<?php $this->section("content") ?>

<div class="row">
    <div class="col-12">
        <div class="card card-success card-outline">
            <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                <h5 class="my-auto">List <?= $sub_menu; ?></h5>
                <a href="<?= base_url("admin/postingan/tambahpostingan") ?>" class="btn btn-sm btn-success">Tambah
                    <?= $sub_menu; ?></a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="text-muted d-block my-auto">Hasil pencarian untuk :
                            <?= isset($key) ? $key : $sub_menu; ?></span>
                    </div>
                    <div class="col-md-6 col-lg-5 ml-auto">
                        <form action="<?= base_url("admin/postingan/" . strtolower($sub_menu)) ?>" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari <?= $sub_menu; ?>" aria-label="Cari <?= $sub_menu; ?>" aria-describedby="button-addon2" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit" id="button-addon2">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="<?= base_url("admin/postingan/" . strtolower($sub_menu)); ?>" class="btn btn-danger" type="button" id="button-addon3">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if (count($posts) === 0) : ?>
                    <span class="d-block font-italic text-center mt-4 text-muted">Mohon Maaf, Data Tidak Ditemukan</span>
                <?php else : ?>
                    <?php foreach ($posts as $post) : ?>
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-lg-3">
                                    <img src="<?= base_url("asset/images/thumbnails/" . $post['thumbnail']) ?>" class="card-img" alt="..." load="lazy">
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <h4 class="d-inline-block"><?= $post['judul'] ?></h4>
                                        <h6 class="d-inline-block text-capitalize font-weight-bold <?= $post['data_status'] == 'ditampilkan' ? 'text-success' : 'text-danger' ?>">
                                            (<?= $post['data_status'] ?>)</h6>
                                        <p class="card-text"><?= substr(strip_tags($post['isi']), 0, 500) . " ..."; ?>
                                        </p>
                                        <div class="row justify-content-between">
                                            <div class="col-sm-8 mb-2 mb-lg-0">
                                                <small class="text-muted py-auto"> <i class="fa fa-clock mr-2"></i><?= date("d M Y, H:i", strtotime($post['updated_at'])); ?>
                                                    WIB</small>
                                            </div>
                                            <div class="col-sm-4 text-sm-right">
                                                <small class="text-muted py-auto">Penulis Terakhir : <?= $post['penulis'] ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 d-flex flex-column flex-md-row flex-lg-column justify-content-center align-items-center p-2">
                                    <a class="btn btn-success w-100 mb-2 mb-md-0 mx-md-1 mx-lg-0 mb-lg-2" href="<?= base_url("admin/postingan/editpost/" . $post['slug']) ?>">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-danger w-100 mx-md-1 mx-lg-0 del-post-btn" data-id="<?= $post['id']; ?>"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="d-flex justify-content-end">
                    <div>
                        <?= $pager->links(strtolower($sub_menu), 'bootstrap_pager') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section("pageScript"); ?>

<script>
    $(".content").on("click", ".del-post-btn", function() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/postingan/') ?>" + "/" + this.dataset.id,
                    data: {
                        "_method": "DELETE"
                    },
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    success: function(data) {
                        Swal.fire(
                            'Dihapus!',
                            'Data telah berhasil dihapuskan',
                            'success'
                        ).then((res) => window.location.reload());
                    },
                });
            }
        })
    })
</script>
<?php $this->endSection(); ?>
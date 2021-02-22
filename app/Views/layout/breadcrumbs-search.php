<div class="breadcrumbs-container">
    <div class="row mb-2">
        <div class="col-lg-8 d-flex flex-column justify-content-center">
            <?php if (isset($keySearch)) : ?>
                <!-- search page -->
                <div class="py-2">
                    <span> Hasil pencarian : "<?= htmlspecialchars($keySearch); ?>" ditemukan dalam
                        <?= $jmlHasilCari; ?> data</span>
                </div>
            <?php else : ?>
                <!-- post page -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent px-0 mb-0">
                        <li class="breadcrumb-item"><a class="text-main-color" href="<?= base_url(); ?>">Beranda</a></li>
                        <?php
                        $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
                        ?>
                        <?php for ($i = 1; $i < count($crumbs); $i++) : ?>
                            <!-- remove all string after '?' from url -->
                            <?php $crumbs[$i] = explode("?", $crumbs[$i])[0]; ?>
                            <?php if ($i == count($crumbs) - 1) : ?>
                                <!-- crumbs terakhir -->
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= ucwords(str_replace("-", " ", $crumbs[$i])); ?></li>
                            <?php else : ?>
                                <li class="breadcrumb-item">
                                    <?= ucfirst($crumbs[$i]); ?>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ol>
                </nav>
            <?php endif; ?>
        </div>
        <div class="col-lg-4">
            <form action="<?= base_url("search") ?>" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control py-auto" placeholder="Pencarian.." name="key">
                    <div class="input-group-append">
                        <button class="btn btn-main-color" type="submit" id="button-addon2"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    
    <link rel="icon" href="<?= base_url('asset/images/logo-masjid.png'); ?>">

    <!-- ui css -->
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/asset/plugins/ckeditor/src/content-styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title><?= $title; ?></title>
</head>

<body>

    <?= $this->include("layout/jadwalshalat"); ?>
    <?= $this->include("layout/navbar"); ?>
    <?= $this->include("layout/breadcrumbs-search"); ?>

    <div class="main-container">
        <div class="posts-page-container">
            <?php $this->renderSection("content"); ?>
            <?= $this->include("layout/sidebar") ?>
            <?= $this->include("layout/bottom-content") ?>
        </div>
    </div>


    <?= $this->include("layout/footer") ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <!-- datatables -->
    <script src="<?= base_url("asset/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
    <script src="<?= base_url("asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
    <script src="<?= base_url("asset/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>">
    </script>
    <script src="<?= base_url("asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>">
    </script>
    <script src="/asset/js/clock.js"></script>
    <script>
        const applyJadwal = (data) => {
            $(".jadwal-shalat").html(`
                    <div class="d-flex">
                        <div class="waktu-shalat">
                            <small>Subuh</small>
                            <small>${data[0].jadwal.data.subuh}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Dzuhur</small>
                            <small>${data[0].jadwal.data.dzuhur}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Ashar</small>
                            <small>${data[0].jadwal.data.ashar}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Maghrib</small>
                            <small>${data[0].jadwal.data.maghrib}<span class="wib"> WIB</span></small>
                        </div>
                        <div class="waktu-shalat">
                            <small>Isya</small>
                            <small>${data[0].jadwal.data.isya}<span class="wib"> WIB</span></small>
                        </div>
                    </div>
            `);

            $(".dateDisplay").text(data[0].jadwal.data.tanggal);
        };

        const fetchJadwal = (today) => {
            $.ajax({
                type: "POST",
                url: "<?= base_url('jadwalshalat/getjadwalshalat/full')?>",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
                dataType: "JSON",
                success: function (data) {
                    applyJadwal(data);

                    localStorage.setItem(
                        "jadwalShalat",
                        JSON.stringify({
                            data: data,
                            dateWhenFetching: today,
                        })
                    );
                },
            });
        };

        setInterval(() => {
            let date = new Date();
            let today = date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear();
            let tommorow =
                date.getDate() + 1 + "/" + date.getMonth() + "/" + date.getFullYear();

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
            };
        }, 1000)
    </script>

    <?php $this->renderSection("pageScript") ?>

</body>

</html>
<?php $this->extend("pages/layout/template") ?>

<?php $this->section("content") ?>
<div class="content-container">
    <h2 class="article-title">Laporan Keuangan Masjid As-Salam</h2>
    <div class="article-info border-bottom mb-0">
        <small class="mr-2">
            <span class="text-main-color">Masjid Assalam </span> |
            <span class="font-italic text-muted"><i class="fa fa-clock"></i> Diupdate pada :
                <?= date("d M Y , H:i", strtotime($last_update)); ?> WIB
            </span>
        </small>
        <small class="d-block">
            Kategori : <a class="text-main-color" href="javascript:void(0)">Laporan</a>
        </small>
    </div>
    <div class="content" style="overflow-x: hidden;">
        <div class="range-selector-area border-bottom my-3">
            <h6 class="font-weight-bold">Silahkan pilih range data</h6>
            <form action="<?= base_url("pages/keuangan"); ?>" method="get" onsubmit="return validate();">
                <div class="form-row">
                    <div class="form-group col-md-3 col-lg-2">
                        <small class="font-weight-normal">Tanggal Awal</small>
                        <input type="date" class="form-control" name="tgl_awal" id="date1" required>
                    </div>
                    <div class="form-group col-md-3 col-lg-2">
                        <small class="font-weight-normal">Tanggal Akhir</small>
                        <input type="date" class="form-control" name="tgl_akhir" id="date2" required>
                    </div>
                    <div class="form-group col-md-2 col-lg-1 ">
                        <small class="d-none d-md-inline font-weight-normal invisible">proses</small>
                        <button type="submit" class="btn btn-success form-control">Proses</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center mt-2 mb-3 mb-md-0">
            <h5 class=" font-weight-bold">LAPORAN KEUANGAN MASJID ASSALAM</h5>
            <?php if ($tanggal['tgl_awal'] && $tanggal['tgl_akhir'] !== null) : ?>
                <h6 class=" font-weight-bold">Tanggal <?= date("d-m-Y", strtotime($tanggal['tgl_awal'])); ?> s/d <?= date("d-m-Y", strtotime($tanggal['tgl_akhir'])); ?> </h6>
            <?php endif; ?>
        </div>
        <div class="px-1">
            <table id="tb_keuangan" class="table table-hover" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                        <th>Saldo Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $i = 0;
                    $temp_saldo = 0; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr class="text-center">
                            <td class="font-weight-bold"><?= $no++; ?>.</td>
                            <td><?= date("d-m-Y", strtotime($d['tanggal'])); ?></td>
                            <td class="text-left" style="width: 60%;"><?= $d['keterangan']; ?></td>
                            <td class="font-weight-bold text-<?= $d['status'] == 'pemasukan' ? 'success' : 'danger'; ?>">
                                <?= "Rp " . number_format($d['nominal'], 0, ",", "."); ?></td>

                            <?php
                            if ($i == 0) {
                                if ($data[0]['status'] == 'pemasukan') {
                                    $temp_saldo += $data[0]['nominal'];
                                } else {
                                    $temp_saldo -= $data[0]['nominal'];
                                }
                            } else {
                                if ($data[$i]['status'] == 'pemasukan') {
                                    $temp_saldo += $data[$i]['nominal'];
                                } else {
                                    $temp_saldo -= $data[$i]['nominal'];
                                }
                            }

                            $i++;
                            ?>

                            <td class="font-weight-bold text-<?= $temp_saldo >= 0 ? 'success' : 'danger'; ?>">
                                <?= "Rp " . number_format($temp_saldo, 0, ",", "."); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3 pt-4 pb-1 border-top font-weight-bold">Total pemasukan : <span class="text-success">Rp
                <?= number_format($total_pemasukan, 0, ",", "."); ?></span>
        </div>
        <div class="py-1 font-weight-bold">Total pengeluaran : <span class="text-danger">Rp
                <?= number_format($total_pengeluaran, 0, ",", "."); ?></span>
        </div>
        <div class="pt-1 pb-0 font-weight-bold">Saldo sisa : <span class="text-<?= $balance > 0 ? 'success' : 'danger'; ?>">Rp
                <?= number_format($balance, 0, ",", "."); ?></span>
        </div>
    </div>
    <?= $this->include("layout/content-footer") ?>
</div>
<?php $this->endSection(); ?>

<?php $this->section("pageScript"); ?>
<!-- datatables -->
<script src="<?= base_url("asset/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("asset/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>">
</script>
<script src="<?= base_url("asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>">
</script>

<script>
    $(document).ready(function() {
        $('#tb_keuangan').DataTable({
            // "columnDefs": [{
            //     "orderable": false,
            //     "targets": [0, 1, 2, 3, 4]
            // }],
            "ordering": false,
            "order": [
                [0, 'asc']
            ],
            "autoWidth": false,
            "responsive": false,
            "language": {
                "emptyTable": "Maaf data tidak tersedia...",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                "infoEmpty": "Maaf, Data tidak tersedia..",
                "infoFiltered": "",
                "search": '',
                "lengthMenu": "Menampilkan _MENU_ data",
                "zeroRecords": "Maaf, Data tidak tersedia.",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                },
                "searchPlaceholder": "Masukan kata kunci"
            }
        });
    });

    $(document).ready(function() {
        $("#tb_keuangan").parent().addClass("table-responsive");
    });
</script>

<?php $this->endSection(); ?>
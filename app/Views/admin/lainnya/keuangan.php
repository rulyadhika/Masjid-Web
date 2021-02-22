<?php $this->extend("admin/layout/template") ?>

<?php $this->section("content") ?>

<!-- set errors -->
<?php if ($errors = session()->getFlashdata('errors'));
$no = 1;
$i = 0;
$temp_saldo = 0;

?>

<div class="row">
    <div class="col-12">
        <div class="card card-success card-outline">
            <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                <h5 class="my-auto">Data <?= $sub_menu; ?></h5>
                <button class="btn btn-sm btn-success tambah-data-btn" data-toggle="modal" data-target="#keuanganModal">Tambah
                    Data</button>
            </div>
            <div class="card-body">
                <div class="range-selector-area border-bottom mb-3">
                    <h6 class="font-weight-bold">Silahkan pilih range data</h6>
                    <form action="<?= base_url("admin/keuangan"); ?>" method="get" onsubmit="return validate();">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label class=" font-weight-normal" for="date1">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tgl_awal" id="date1" required>
                            </div>
                            <div class="form-group col-md-5">
                                <label class="font-weight-normal" for="date2">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tgl_akhir" id="date2" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="d-none d-md-block invisible">proses</label>
                                <button type="submit" class="btn btn-success form-control my-auto">Proses Laporan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="text-center py-2 ">
                    <h5 class=" font-weight-bold">LAPORAN KEUANGAN MASJID ASSALAM</h5>
                    <?php if ($tanggal['tgl_awal'] && $tanggal['tgl_akhir'] !== null) : ?>
                        <h6 class=" font-weight-bold">Tanggal <?= date("d-m-Y", strtotime($tanggal['tgl_awal'])); ?> s/d <?= date("d-m-Y", strtotime($tanggal['tgl_akhir'])); ?> </h6>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-between border-bottom border-top mb-3 flex-wrap">
                    <div class="py-2 mx-1 font-weight-bold">Total pemasukan : <span class="text-success">Rp
                            <?= number_format($total_pemasukan, 0, ",", "."); ?></span>
                    </div>
                    <div class="py-2 mx-1 font-weight-bold">Total pengeluaran: <span class="text-danger">Rp
                            <?= number_format($total_pengeluaran, 0, ",", "."); ?></span>
                    </div>
                    <div class="py-2 mx-1  font-weight-bold">Saldo sisa : <span class="text-<?= $balance > 0 ? 'success' : 'danger'; ?>">Rp
                            <?= number_format($balance, 0, ",", "."); ?></span>
                    </div>
                </div>
                <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th style="width: 45%;">Keterangan</th>
                            <th>Nominal</th>
                            <th>Saldo Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= date("d-m-Y", strtotime($d['tanggal'])); ?></td>
                                <td><?= $d['keterangan']; ?></td>
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
                                <td>
                                    <span class="badge badge-success edit-btn" data-id="<?= $d['id']; ?>">Ubah</span>
                                    <span class="badge badge-danger del-btn" data-id="<?= $d['id']; ?>">Hapus</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="keuanganModal" data-backdrop="static" data-keyboard="false" aria-labelledby="keuanganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keuanganModalLabel">Tambah data keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("admin/keuangan/insertkeuangan"); ?>" method="POST" id="keuanganForm">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= old("id"); ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= isset($errors['keterangan']) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" value="<?= old("keterangan") ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= isset($errors['keterangan']) ? $errors['keterangan'] : ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control <?= isset($errors['status']) ? 'is-invalid' : ''; ?>" id="status" name="status" required>
                                <option value="" hidden>-- Pilih Status --</option>
                                <option value="pemasukan" <?= old('status') == 'pemasukan' ? 'selected' : '' ?>>Pemasukan
                                </option>
                                <option value="pengeluaran" <?= old('status') == 'pengeluaran' ? 'selected' : '' ?>>
                                    Pengeluaran</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= isset($errors['status']) ? $errors['status'] : ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nominal" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="number" class="form-control <?= isset($errors['nominal']) ? 'is-invalid' : ''; ?>" id="nominal" name="nominal" placeholder="Masukan Nominal" value="<?= old("nominal") ?>" required>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    <?= isset($errors['nominal']) ? $errors['nominal'] : ''; ?>
                                </div>
                            </div>
                            <small class="form-text text-muted">Masukan nominal tanpa menggunakan pemisah. Contoh :
                                1000000</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control <?= isset($errors['tanggal']) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old("tanggal") ?>" required>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= isset($errors['tanggal']) ? $errors['tanggal'] : ''; ?>
                            </div>
                            <small class="form-text text-muted">Format : bulan / hari / tahun</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section("pageScript"); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [2, 5]
            }],
            "order": [
                [0, 'asc']
            ],
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    let validate = () => {
        if ($("input[name=tgl_awal]").val() > $("input[name=tgl_akhir]").val()) {
            alert("Tanggal awal harus lebih kecil dari tanggal akhir!");
            return false;
        } else {
            return true;
        }
    };
</script>

<script>
    $(".tambah-data-btn").on("click", () => {
        $('.modal-title').text('Tambah data keuangan');
        $("input[name=keterangan]").val("");
        $("select[name=status]").val("").change();
        $("input[name=nominal]").val("");
        $("input[name=tanggal]").val("");
        $("input[name=id]").val("");

        $("#keuanganForm").attr("action", "<?= base_url('admin/keuangan/insertkeuangan') ?>");
        console.log($("#keuanganForm").attr("action"));
    });

    $(".edit-btn").on("click", function() {
        $('#keuanganModal').modal('show');
        $('.modal-title').text('Ubah data keuangan');
        $("input[name=id]").val(this.dataset.id);

        $("#keuanganForm").attr("action", "<?= base_url('admin/keuangan/updatekeuangan') ?>");

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/keuangan/getsingledata') ?>",
            data: {
                id: this.dataset.id
            },
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            dataType: "JSON",
            success: function(data) {
                $("input[name=keterangan]").val(data.keterangan);
                $("select[name=status]").val(data.status).change();
                $("input[name=nominal]").val(data.nominal);
                $("input[name=tanggal]").val(data.tanggal);
            },
        });
    })

    $(".content").on("click", ".del-btn", function() {
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
                    url: "<?= base_url('admin/keuangan') ?>",
                    data: {
                        "_method": "DELETE",
                        "id": this.dataset.id
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

<?php if ($errors) : ?>
    <script>
        $('#keuanganModal').modal('show')
    </script>
<?php endif ?>

<?php $this->endSection(); ?>
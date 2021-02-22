<?php $this->extend("admin/layout/template") ?>

<?php $this->section("content") ?>

<!-- declare errors to var -->
<?php if($errors = session()->getFlashdata('errors'));$no=1; ?>

<div class="row">
    <div class="col-12">
        <div class="card card-success card-outline">
            <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                <h5 class="my-auto">Data <?= $sub_menu; ?></h5>
                <button class="btn btn-sm btn-success tambah-data-btn" data-toggle="modal"
                    data-target="#kontakModal">Tambah
                    Data</button>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Icon</th>
                            <th>Isi</th>
                            <th style="width: 20%">Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td class="d-flex flex-wrap justify-content-between"><?= $d['icon']; ?> <i
                                    class="<?= $d['icon']; ?>"></i></td>
                            <td><?= $d['isi']; ?></td>
                            <td><?= $d['link']; ?></td>
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
<div class="modal fade" id="kontakModal" data-backdrop="static" data-keyboard="false" aria-labelledby="kontakModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kontakModalLabel">Tambah data kontak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("admin/kontak/insertkontak"); ?>" method="POST" id="kontakForm">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= old("id"); ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-info"></i></span>
                                </div>
                                <input type="text" class="form-control <?= isset($errors['nama'])?'is-invalid':''; ?>"
                                    id="nama" name="nama" placeholder="Masukan nama" value="<?= old("nama") ?>">
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    <?= isset($errors['nama'])?$errors['nama']:''; ?>
                                </div>
                            </div>
                            <small class="form-text text-muted">Contoh : Whatsapp/Email/Telegram</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-icons"></i></span>
                                </div>
                                <input type="text" class="form-control <?= isset($errors['icon'])?'is-invalid':''; ?>"
                                    id="icon" name="icon" placeholder="Masukan Icon" value="<?= old("icon") ?>"
                                    required>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    <?= isset($errors['icon'])?$errors['icon']:''; ?>
                                </div>
                            </div>
                            <small class="form-text text-muted">Contoh : fab fa-whatsapp. <a
                                    href="https://fontawesome.com/">Lebih lengkap</a></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa fa-align-left"></i></span>
                                </div>
                                <input type="text" class="form-control <?= isset($errors['isi'])?'is-invalid':''; ?>"
                                    id="isi" name="isi" placeholder="Masukan Isi" value="<?= old("isi") ?>">
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    <?= isset($errors['isi'])?$errors['isi']:''; ?>
                                </div>
                            </div>
                            <small class="form-text text-muted">Contoh : rulihanif@gmail.com</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="link" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-link"></i></span>
                                </div>
                                <input type="text" class="form-control <?= isset($errors['link'])?'is-invalid':''; ?>"
                                    id="link" name="link" placeholder="Masukan link" value="<?= old("link") ?>">
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    <?= isset($errors['link'])?$errors['link']:''; ?>
                                </div>
                            </div>
                            <small class="form-text text-muted">Contoh :
                                https://www.facebook.com/Masjid-Assalam-GSMT-Purwokerto-100928658043608/</small>
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
    $(document).ready(function () {
        $('#example').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [2, 4]
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
    $(".tambah-data-btn").on("click", () => {
        $('.modal-title').text('Tambah data kontak');
        $("input[name=nama]").val("");
        $("input[name=icon]").val("");
        $("input[name=isi]").val("");
        $("input[name=link]").val("");
        $("input[name=id]").val("");

        $("#kontakForm").attr("action", "<?= base_url('admin/kontak/insertkontak')?>");
    });

    $(".edit-btn").on("click", function () {
        $('#kontakModal').modal('show');
        $('.modal-title').text('Ubah data kontak');
        $("input[name=id]").val(this.dataset.id);

        $("#kontakForm").attr("action", "<?= base_url('admin/kontak/updatekontak')?>");

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/kontak/getsingledata')?>",
            data: {
                id: this.dataset.id
            },
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            dataType: "JSON",
            success: function (data) {
                $("input[name=nama]").val(data.nama);
                $("input[name=icon]").val(data.icon);
                $("input[name=isi]").val(data.isi);
                $("input[name=link]").val(data.link);
            },
        });
    })

    $(".content").on("click", ".del-btn", function () {
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
                    url: "<?= base_url('admin/kontak')?>",
                    data: {
                        "_method": "DELETE",
                        "id": this.dataset.id
                    },
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    success: function (data) {
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

<?php if($errors) : ?>
<script>
    $('#kontakModal').modal('show')
</script>
<?php endif ?>

<?php $this->endSection(); ?>
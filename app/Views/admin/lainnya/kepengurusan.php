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
                    data-target="#kepengurusanModal">Tambah
                    Data</button>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['jabatan']; ?></td>
                            <td><?= $d['nama']; ?></td>
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
<div class="modal fade" id="kepengurusanModal" data-backdrop="static" data-keyboard="false"
    aria-labelledby="kepengurusanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kepengurusanModalLabel">Tambah data kepengurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("admin/kepengurusan/insertkepengurusan"); ?>" method="POST"
                id="kepengurusanForm">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= old("id"); ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= isset($errors['nama'])?'is-invalid':''; ?>"
                                id="nama" name="nama" placeholder="Masukan Nama" value="<?= old("nama") ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= isset($errors['nama'])?$errors['nama']:''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa fa-user-tie"></i></span>
                                </div>
                                <input type="text"
                                    class="form-control <?= isset($errors['jabatan'])?'is-invalid':''; ?>" id="jabatan"
                                    name="jabatan" placeholder="Masukan Jabatan" value="<?= old("jabatan") ?>" required>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    <?= isset($errors['jabatan'])?$errors['jabatan']:''; ?>
                                </div>
                            </div>
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
                "targets": [3]
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
        $('.modal-title').text('Tambah data kepengurusan');
        $("input[name=nama]").val("");
        $("input[name=jabatan]").val("");
        $("input[name=id]").val("");

        $("#kepengurusanForm").attr("action", "<?= base_url('admin/kepengurusan/insertkepengurusan')?>");
    });

    $(".edit-btn").on("click", function () {
        $('#kepengurusanModal').modal('show');
        $('.modal-title').text('Ubah data kepengurusan');
        $("input[name=id]").val(this.dataset.id);

        $("#kepengurusanForm").attr("action", "<?= base_url('admin/kepengurusan/updatekepengurusan')?>");

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/kepengurusan/getsingledata')?>",
            data: {
                id: this.dataset.id
            },
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            dataType: "JSON",
            success: function (data) {
                $("input[name=nama]").val(data.nama);
                $("input[name=jabatan]").val(data.jabatan);
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
                    url: "<?= base_url('admin/kepengurusan')?>",
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
    $('#kepengurusanModal').modal('show')
</script>
<?php endif ?>

<?php $this->endSection(); ?>
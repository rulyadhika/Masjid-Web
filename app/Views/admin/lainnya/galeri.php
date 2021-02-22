<?php $this->extend("admin/layout/template") ?>

<?php $this->section("content") ?>

<!-- set errors -->
<?php if($errors = session()->getFlashdata('errors'));$no=1; ?>

<div class="row">
    <div class="col-12">
        <div class="card card-success card-outline">
            <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                <h5 class="my-auto">Data <?= $sub_menu; ?></h5>
                <button class="btn btn-sm btn-success tambah-data-btn" data-toggle="modal"
                    data-target="#galeriModal">Tambah
                    Data</button>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 25%;">Gambar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td> <a href="<?= base_url("asset/images/gallery/".$d['gambar']) ?>" class="d-inline-block"
                                    target="_blank" style="
      cursor: zoom-in;"><img style="max-height: 200px;object-fit:cover;width:100%;"
                                        src="<?= base_url("asset/images/gallery/small_thumbnail/".$d['gambar']) ; ?>"
                                        alt="" class="img-fluid"></a></td>
                            <td style="vertical-align: middle;"><?= $d['keterangan']; ?></td>
                            <td style="vertical-align: middle;">
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
<div class="modal fade" id="galeriModal" data-backdrop="static" data-keyboard="false" aria-labelledby="galeriModalLabel"
    aria-hidden="true">
    <form action="<?= base_url("admin/galeri/insertgaleri"); ?>" method="POST" id="galeriForm"
        enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galeriModalLabel">Tambah data galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= old("id"); ?>">
                <div class="modal-body">
                    <div class=" mb-2">
                        <h6 class="font-weight-bold">Preview gambar</h6>
                        <img class="img-fluid img-preview d-block mx-auto" src=""
                            alt="Silahkan upload gambar terlebih dahulu">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control <?= isset($errors['keterangan'])?'is-invalid':''; ?>"
                            id="keterangan" name="keterangan" placeholder="Masukan Keterangan"
                            value="<?= old("keterangan") ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= isset($errors['keterangan'])?$errors['keterangan']:''; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <div class="input-group mb-1">
                            <div class="custom-file">
                                <input type="file"
                                    class="custom-file-input <?= isset($errors['gambar'])?'is-invalid':''; ?>"
                                    id="gambar" name="gambar" aria-describedby="inputGroupFileAddon01"
                                    onchange="previewImg()">
                                <label class="custom-file-label custom-label" for="gambar">Choose file</label>
                            </div>
                        </div>
                        <div id="validationServer04Feedback" class="invalid-feedback d-block">
                            <?= isset($errors['gambar'])?$errors['gambar']:''; ?>
                        </div>
                        <small class="form-text text-muted">Ukuran gambar maksimal 1MB, format
                            jpg/jpeg</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>


<?php $this->endSection() ?>

<?php $this->section("pageScript"); ?>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [1, 3]
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
        $('.modal-title').text('Tambah data galeri');
        $("input[name=keterangan]").val("");
        $("input[name=id]").val("");
        $(".img-preview").attr("src", "");
        $(".custom-label").text("Choose file");

        $("#galeriForm").attr("action", "<?= base_url('admin/galeri/insertgaleri')?>");
        console.log($("#galeriForm").attr("action"));
    });

    $(".edit-btn").on("click", function () {
        $('#galeriModal').modal('show');
        $('.modal-title').text('Ubah data galeri');
        $("input[name=id]").val(this.dataset.id);

        $("#galeriForm").attr("action", "<?= base_url('admin/galeri/updategaleri')?>");

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/galeri/getsingledata')?>",
            data: {
                id: this.dataset.id
            },
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            dataType: "JSON",
            success: function (data) {
                $("input[name=keterangan]").val(data.keterangan);
                $(".custom-label").text(data.gambar);
                $(".img-preview").attr("src",
                    "<?= base_url('asset/images/gallery')?>/" + data.gambar);
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
                    url: "<?= base_url('admin/galeri')?>",
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
    $('#galeriModal').modal('show')
</script>
<?php endif ?>

<script>
    let previewImg = () => {
        const fileInput = document.querySelector("#gambar");
        const customLabel = document.querySelector(".custom-label");
        const imgPreview = document.querySelector(".img-preview");

        customLabel.innerText = fileInput.files[0].name;

        const fileCover = new FileReader();
        fileCover.readAsDataURL(fileInput.files[0]);

        fileCover.onload = (e) => {
            imgPreview.src = e.target.result;
        }
    }
</script>


<?php $this->endSection(); ?>
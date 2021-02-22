<?php $this->extend("admin/layout/template") ?>

<?php $this->section("content") ?>
<div class="row">
    <div class="col">
        <div class="card card-success card-outline">
            <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                <h5 class="my-auto">Edit Postingan</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url("admin/postingan/updatepost/" . $post['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $post['slug']; ?>">
                    <input type="hidden" name="thumbnailLama" value="<?= $post['thumbnail']; ?>">
                    <div class="row mb-2">
                        <div class="col-md-9">
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class=" col-sm-10">
                                    <select class="form-control <?= $validation->hasError("kategori") ? 'is-invalid' : '' ?>" id="kategori" name="kategori" required>
                                        <option value="" hidden>-- Pilih Kategori --</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k; ?>" <?= old('kategori') !== null ? (old("kategori") == $k ? 'selected' : '') : ($post['kategori'] == $k ? 'selected' : '') ?>>
                                                <?= ucfirst($k); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->hasError("kategori") ? $validation->getError("kategori") : ''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= $validation->hasError("judul") ? 'is-invalid' : '' ?>" id="judul" name="judul" placeholder="Masukan judul" value="<?= old("judul") !== null ? old('judul') : $post['judul'] ?>" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->hasError("judul") ? $validation->getError("judul") : ''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penulis" value="<?= $post['penulis']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= $validation->hasError("thumbnail") ? 'is-invalid' : '' ?>" id="thumbnail" name="thumbnail" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->hasError("thumbnail") ? $validation->getError("thumbnail") : ''; ?>
                                        </div>
                                        <label class="custom-file-label custom-label" for="thumbnail">Choose
                                            file</label>
                                    </div>
                                    <small class="form-text text-muted">Ukuran gambar maksimal 1MB, format
                                        jpg/jpeg/png</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control <?= $validation->hasError("status") ? 'is-invalid' : '' ?>" id="status" name="status" required>
                                        <option value="" hidden>-- Pilih status --</option>
                                        <option value="ditampilkan" <?= old("status") !== null ? (old("status") == 'ditampilkan' ? 'selected' : '') : ($post['data_status'] == 'ditampilkan' ? 'selected' : '') ?>>
                                            Ditampilkan
                                        </option>
                                        <option value="diarsipkan" <?= old("status") !== null ? (old("status") == 'diarsipkan' ? 'selected' : '') : ($post['data_status'] == 'diarsipkan' ? 'selected' : '') ?>>
                                            Diarsipkan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h6 class="font-weight-bold">Preview Thumbnail</h6>
                            <img src="<?= base_url("/asset/images/thumbnails/" . $post['thumbnail']) ?>" class="img-preview img-thumbnail" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editor" class=" mr-2">Isi Text</label><span class="text-muted">(Judul tidak perlu
                            dituliskan
                            kembali)</span>
                        <textarea name="content" id="editor" placeholder="Masukan isi text"><?= old("content") !== null ? old("content") : str_replace('&', '&amp;', $post['isi']); ?></textarea>
                        <div id="word-count"></div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-success" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<?php $this->endSection() ?>

<?php $this->section("pageScript") ?>
<script src="/asset/plugins/ckeditor/build/ckeditor.js"></script>
<script src="/asset/plugins/ckfinder/ckfinder.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '/asset/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'fontFamily',
                    'fontSize',
                    'fontColor',
                    'highlight',
                    '|',
                    'bold',
                    'underline',
                    'italic',
                    'strikethrough',
                    'subscript',
                    'superscript',
                    '|',
                    'alignment',
                    'indent',
                    'outdent',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'link',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    // 'horizontalLine',
                    'undo',
                    'redo'
                ]
            },
            language: 'id',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableCellProperties',
                    'tableProperties'
                ]
            },
            mediaEmbed: {
                'previewsInData': true,
            },
        })
        .then(editor => {
            console.log(editor);
            const wordCountPlugin = editor.plugins.get('WordCount');
            const wordCountWrapper = document.getElementById('word-count');

            wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
        })
        .catch(error => {
            console.error(error);
        });
</script>


<script>
    let previewImg = () => {
        const fileInput = document.querySelector("#thumbnail");
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

<?php $this->endSection() ?>
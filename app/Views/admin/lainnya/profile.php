<?php $this->extend("admin/layout/template") ?>

<?php $this->section("content") ?>

<!-- declare errors to var -->
<?php if($errors = session()->getFlashdata('errors')); ?>

<div class="row">
    <div class="col-12">
        <div class="card card-success card-outline">
            <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                <h5 class="my-auto">Data <?= $sub_menu; ?></h5>
                <button class="btn btn-sm btn-success ubah-data-btn" data-toggle="modal" data-target="#profilModal">Ubah
                    Data</button>
            </div>
            <div class="card-body">
                <div class="ck-content">
                    <?= $data['isi']; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="profilModal" data-backdrop="static" data-keyboard="false" aria-labelledby="profilModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profilModalLabel">Ubah data profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("admin/profile/updateProfile"); ?>" method="POST" id="profilForm">
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editor" class=" mr-2">Isi Text</label>
                        <textarea name="isi" id="editor"
                            placeholder="Masukan isi text"><?= old("isi")!==null?old("isi"):str_replace( '&', '&amp;', $data['isi'] ); ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="word-count" class="d-flex mr-auto my-0"></div>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section("pageScript"); ?>
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

            editor.editing.view.change(writer => {
                writer.setStyle('height', '55vh', editor.editing.view.document.getRoot());
            });

            const wordCountPlugin = editor.plugins.get('WordCount');
            const wordCountWrapper = document.getElementById('word-count');

            window.onload = () => {
                wordCountWrapper.children[0].style.marginLeft = "1em";
            }

            wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<?php if($errors) : ?>
<script>
    $('#profilModal').modal('show')
</script>
<?php endif ?>

<?php $this->endSection(); ?>
<?php $this->extend("admin/layout/template") ?>

<?php $this->section("content") ?>

<!-- set errors -->
<?php if ($errors = session()->getFlashdata('errors'));?>

<div class="row">
    <div class="col-12">
        <div class="card card-success card-outline">
            <div class="py-2 px-3 border-bottom">
                <h5 class="my-auto">Data <?= $sub_menu; ?></h5>
            </div>
            <div class="card-body">
                <table id="example" class="display table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $count => $user) : ?>
                            <tr>
                                <td><?= $count+1; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td>
                                    <?php if ($user['role'] == 'dev') : ?>
                                        <span class="badge badge-dark"><?= ucwords($user['role']); ?></span>
                                    <?php elseif ($user['role'] == 'superadmin') : ?>
                                        <span class="badge badge-success"><?= ucwords($user['role']); ?></span>
                                    <?php elseif ($user['role'] == 'admin') : ?>
                                        <span class="badge badge-info"><?= ucwords($user['role']); ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-warning"><?= ucwords($user['role']); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($user['role'] == 'dev' && (in_groups('dev') == false)) : ?>
                                        -
                                    <?php else : ?>
                                        <a href="javascript:void(0)" class="badge badge-primary edit-btn" data-id="<?= $user['user_id']; ?>">Ubah</a>
                                    <?php endif; ?>
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
<div class="modal fade" id="userModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <form action="<?= base_url("admin/user-management/") ?>" method="POST" id="form-kategori">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id">
                    <input type="hidden" name="old_role">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control  <?= isset($errors['role']) ? 'is-invalid' : '' ?>" id="role" name="role">
                            <?php foreach ($roles as $role) : ?>
                                <?php if ($role['name'] == 'dev' && (in_groups('dev') == false)) : ?>
                                <?php else : ?>
                                    <option value="<?= $role['name']; ?>"><?= ucwords($role['name']); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback d-block">
                            <?= isset($errors['role']) ? $errors['role'] : ''; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $this->endSection() ?>


<?= $this->section("pageScript"); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            columnDefs: [{
                orderable: false,
                targets: [4]
            }],
            responsive: true
        });
    });

    $(".edit-btn").on("click", function(e) {
        let id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "<?= base_url("admin/user-management"); ?>/"+id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: "JSON",
            success: function(data) {

                $('input[id="email"]').val(data.email);
                $('input[id="username"]').val(data.username);
                $('select[name="role"]').val(data.role);

                $('input[name="id"]').val(data.user_id);
                $('input[name="old_role"]').val(data.role);

                $('#userModal').modal('show');
            }
        });
    })
</script>

<?php if ($errors) : ?>
    <script>
        $('#userModal').modal('show');
    </script>
<?php endif; ?>
<?= $this->endSection(); ?>
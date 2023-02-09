<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/categories/new') ?>" class="btn btn-sm btn-primary">Add Categories</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 0;

        foreach ($categories as $cat) :
            $no++; ?>
            <tr>
                <td><?= $no ?></td>
                <td>
                    <strong><?= $cat['name'] ?></strong><br>
                    <small class="text-muted"><?= $cat['created_at'] ?></small>
                </td>
                <td>
                    <a href="<?= base_url('admin/categories/' . $cat['id'] . '/preview') ?>" class="btn btn-sm btn-outline-secondary" target="_blank">Preview</a>
                    <a href="<?= base_url('admin/categories/' . $cat['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <a href="#" data-href="<?= base_url('admin/categories/' . $cat['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="h2">Are you sure?</h2>
                <p>The data will be deleted and lost forever</p>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>


<?= $this->endSection() ?>
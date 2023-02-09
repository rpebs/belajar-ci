<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<form action="" method="post" id="text-editor">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= $categories['id']; ?>">
    <div class="form-group">
        <label class="form-label mb-2" for="title">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Categories Name" value="<?= $categories['name']; ?>" required>
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


<?= $this->endSection() ?>
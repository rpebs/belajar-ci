<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<form action="" method="post" id="text-editor">
    <?= csrf_field() ?>
    <div class="form-group mb-3">
        <label class="form-label" for="title">Title</label>
        <input type="text" name="title" class="form-control" placeholder="News title" required>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="title">Categories</label>
        <select name="categories_id" id="" class="form-select">
            <option value="">Pilih Kategori</option>
            <?php foreach ($categories as $cat) : ?>
                <option value="<?= $cat['id']; ?>"><?= $cat['id'] . ' ' . $cat['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Write a great news!"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" name="status" value="published" class="btn btn-primary">Publish</button>
        <button type="submit" name="status" value="draft" class="btn btn-secondary">Save to Draft</button>
    </div>
</form>


<?= $this->endSection() ?>
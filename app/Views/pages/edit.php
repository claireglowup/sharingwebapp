<?= $this->extend("layout/layout.php"); ?>

<?= $this->section("content"); ?>
<div class="container mt-5">
    <form action="/blog/fix?id=<?= $blog->id ?>" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?= $blog->title ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tell your story</label>
            <textarea class="form-control" id="myTextarea" rows="10" name="content"><?= $blog->content ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Fix</button>
        <button type="button" onclick="window.location.href='/inventori?page=1'" class="btn btn-danger">Cancel</button>
    </form>
</div>

<?= $this->endSection(); ?>
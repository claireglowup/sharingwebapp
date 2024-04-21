<?= $this->extend("layout/layout.php"); ?>

<?= $this->section("content"); ?>
<div class="container mt-5">
    <form action="/write" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tell your story</label>
            <textarea class="form-control" id="myTextarea" rows="10" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Publish</button>
    </form>
</div>

<?= $this->endSection(); ?>
<?= $this->extend("layout/layout.php"); ?>

<?= $this->section("content"); ?>


<?php if (session()->get('isLoggedIn') === true) {

?>
    <div class="container-fluid  p-5 border-bottom"> <!-- Menggunakan container-fluid dan menambahkan background dan padding -->
        <div class="container"> <!-- Container tambahan untuk mengatur lebar konten -->
            <div class="jumbotron text-center"> <!-- Menambahkan kelas jumbotron dan text-center -->
                <h1 class="fw-bold fs-1">Welcome Back <?= $user["username"] ?> ✨
                </h1>
            </div>
        </div>
    </div>
<?php
} else {

?>
    <div class="container-fluid  p-5 border-bottom"> <!-- Menggunakan container-fluid dan menambahkan background dan padding -->
        <div class="container"> <!-- Container tambahan untuk mengatur lebar konten -->
            <div class="jumbotron text-center"> <!-- Menambahkan kelas jumbotron dan text-center -->
                <h1 class="fw-bold fs-1">Sharing.</h1>
                <p>Discover stories, thinking, and expertise from writers on any topic.</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#start-modal">Sign up for free</button>

            </div>
        </div>
    </div>

<?php } ?>
<div class="container text-center">
    <h3 class="pt-4">Trending</h3>
    <div class="row g-2 gap-4 p-4">

        <?php foreach ($blogs as $blog) : ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body" style="text-align: left;">
                    <h5 class="card-title"><?= $blog->title ?></h5>
                    <p style="margin-top: -10px;">by. <?= $blog->username ?></p>
                    <p style="margin-top: -10px;"><?= $blog->created_at ?></p>
                    <p style="margin-top: -12px;width:max-content;color:#3467eb;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" class="fw-bold rounded p-1"><?= $blog->total_likes ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 2 16 16" style="color: #3467eb;">
                            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                        </svg></p>

                </div>

                <button class="btn btn-success m-3" onclick="window.location.href='/blog?id=<?= $blog->id ?>'">Read</button>



            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Vertically centered scrollable modal -->
<div class="modal fade" id="start-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4 text-center" id="exampleModalLabel" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Join Sharing.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center border p-3 rounded-pill" onclick="window.location.href='/signup'" style="cursor: pointer;">Sign up with email</p>
            </div>
            <div class="modal-footer">
                <p class="text-center m-3">Click “Sign up” to agree to Sharing’s Terms of Service and acknowledge that Sharing’s Privacy Policy applies to you.</p>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>
<?= $this->extend("layout/layout.php"); ?>

<?= $this->section("content"); ?>
<?php if (session()->get('isLoggedIn') !== false) { ?>
    <div class="container-fluid  p-5 border-bottom"> <!-- Menggunakan container-fluid dan menambahkan background dan padding -->
        <div class="container"> <!-- Container tambahan untuk mengatur lebar konten -->
            <div class="jumbotron text-center"> <!-- Menambahkan kelas jumbotron dan text-center -->
                <h1 class="fw-bold fs-1">Welcome Back <?= session()->get("userId") ?> </h1>
                <p>Discover stories, thinking, and expertise from writers on any topic.</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#start-modal">Sign up for free</button>

            </div>
        </div>
    </div>
<?php
}

?>



<?= $this->endSection(); ?>
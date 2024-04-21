<?= $this->extend("layout/layout.php"); ?>

<?= $this->section("content"); ?>
<div class="container-fluid  p-5 border-bottom"> <!-- Menggunakan container-fluid dan menambahkan background dan padding -->
    <div class="container"> <!-- Container tambahan untuk mengatur lebar konten -->
        <div class="jumbotron "> <!-- Menambahkan kelas jumbotron dan text-center -->
            <h1 class="fw-bold fs-1 text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Sign up</h1>
            <div class="signup border p-4 m-auto mt-3 rounded" style="width: 400px;">
                <form method="post" action="signup">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-left">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label text-left">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
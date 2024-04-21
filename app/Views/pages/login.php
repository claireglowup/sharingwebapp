<?= $this->extend("layout/layout.php"); ?>

<?= $this->section("content"); ?>



<div class="container-fluid  p-5 border-bottom"> <!-- Menggunakan container-fluid dan menambahkan background dan padding -->
    <div class="container"> <!-- Container tambahan untuk mengatur lebar konten -->
        <div class="jumbotron "> <!-- Menambahkan kelas jumbotron dan text-center -->
            <h1 class="fw-bold fs-1 text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Welcome back</h1>
            <div class="signup border p-4 m-auto mt-3 rounded" style="width: 400px;">
                <form method="post" action="/login">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-left">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required value="<?php if (session()->get('emailV')) :
                                                                                                                                                        echo session()->get('emailV');
                                                                                                                                                    endif; ?>">
                        <div id="emailHelp" class="form-text"> <?php if (session()->get('email')) : ?>
                                <p style="color: red;">Email tidak ditemukan</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required value="<?php if (session()->get('passwordV')) :
                                                                                                                                    echo session()->get('passwordV');
                                                                                                                                endif; ?>">
                        <div class="form-text"> <?php if (session()->get('password')) : ?>
                                <p style="color: red;">Password Salah</p>
                            <?php endif; ?>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Log in</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
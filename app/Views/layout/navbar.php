<div class="container-fluid p-3 border-bottom">
    <nav class="navbar navbar-expand-lg bg-body-light container">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">Sharing</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?= $this->section("content"); ?>
                    <?php if (session()->get('isLoggedIn') === true) { ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/blogs?page=1">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/inventori?page=1">Inventori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/write">Write</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-danger" onclick="window.location.href='/logout'">Logout</button>
                        </li>

                    <?php
                    } else {

                    ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/blogs?page=1">All Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Sign in</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#start-modal">Get Started</button>
                        </li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
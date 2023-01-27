<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="#"><?php echo session()->get('nama_admin') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= ($current_page == 'mahasiswa') ? 'active' : '' ?>">
                    <a class=" nav-link" href="/mahasiswa">Mahasiswa</a>
                </li>
                <li class="nav-item <?= ($current_page == 'prodi') ? 'active' : '' ?>">
                    <a class=" nav-link" href="/prodi">Prodi</a>
                </li>
                <li class="nav-item <?= ($current_page == 'kelas') ? 'active' : '' ?>">
                    <a class=" nav-link" href="/kelas">Kelas</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class=" nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($page === 'main') ? "active" : ''; ?>" aria-current="page" href="index.php">Laivu sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://ozolaivas.lv/">Laivu braucieni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page === 'used_inv') ? "active" : ''; ?>" href="used_inv.php">Lietots inventārs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page === 'aresanas_klubs') ? "active" : ''; ?>" href="klubs.php">Airēšanas klubs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://laivusports.wordpress.com/">Arhīvs</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
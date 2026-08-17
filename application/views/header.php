<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Termas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

            <img class="navbar-brand" src="<?= base_url("assets/logo/logo.png") ?>" alt="Logo" height="45">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#naff">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="naff">
            <ul class="navbar-nav me-auto">
            
                <li class="nav-item">
                    <a href="<?= base_url(); ?>" class="nav-link">
                        Home
                    </a>
                </li>
            
                <li class="nav-item">
                    <a href="<?= base_url('#visi'); ?>" class="nav-link">
                        Visi & Misi
                    </a>
                </li>
            
                <li class="nav-item">
                    <a href="<?= base_url('#pengumuman'); ?>" class="nav-link">
                        Pengumuman
                    </a>
                </li>
            
                <li class="nav-item">
                    <a href="<?= base_url('#statistik'); ?>" class="nav-link">
                        Statistik
                    </a>
                </li>
            
                <li class="nav-item">
                    <a href="<?= base_url('#lokasi'); ?>" class="nav-link">
                        Lokasi
                    </a>
                </li>
            
                <li class="nav-item">
                    <a href="<?= base_url('#perangkat'); ?>" class="nav-link">
                        Perangkat Desa
                    </a>
                </li>
            
            </ul>
            <!-- Menu Kanan -->
            <ul class="navbar-nav ms-auto">

                <?php if ($this->session->userdata("id_warga")): ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Surat
                        </a>

                       <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="<?= base_url("surat_keterangan") ?>">
                                    Surat Keterangan
                                </a>
                            </li>
                                        
                            <li>
                                <a class="dropdown-item" href="<?= base_url("skd") ?>">
                                    Surat Keterangan Domisili
                                </a>
                            </li>
                                        
                            <li>
                                <a class="dropdown-item" href="<?= base_url("sktm") ?>">
                                    Surat Keterangan Tidak Mampu
                                </a>
                            </li>
                                        
                            <li>
                                <a class="dropdown-item" href="<?= base_url("sku") ?>">
                                    Surat Keterangan Usaha
                                </a>
                            </li>
                                        
                            <li>
                                <a class="dropdown-item" href="<?= base_url("surat_pengantar") ?>">
                                    Surat Pengantar
                                </a>
                            </li>
                                        
                            <li>
                                <a class="dropdown-item" href="<?= base_url("spik") ?>">
                                    Surat Pengantar Ijin Keramaian
                                </a>
                            </li>
                                        
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url("akun") ?>" class="nav-link">
                            <?= $this->session->userdata("nama_lengkap") ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url("logout") ?>" class="nav-link">
                            Logout
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a href="#" class="nav-link"
                           data-bs-toggle="modal"
                           data-bs-target="#login">
                            Login
                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>
</nav>
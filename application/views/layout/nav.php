<body>
    <nav class="navbar navbar-expand-lg flex-column flex-md-row fixed-top white scrolling-navbar">
        <h1><a class="navbar-brand text-info" href="#">CodeJam</a></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav justify-content-end ml-auto">
            <?php if (isset($nav_active) && $nav_active == 'Home'): ?>
                <li class="nav-item active_nav">
                    <h6><a class="nav-link text-white" href="<?php echo base_url()?>">Beranda</a></h6>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <h6><a class="nav-link text-danger" href="<?php echo base_url()?>">Beranda</a></h6>
                </li>
            <?php endif ?>
            <li class="nav-item">
                <h6><a class="nav-link text-danger" href="">Jadwal</a></h6>
            </li>
            <?php if (isset($_SESSION['codelevel'])): ?>
                <li class="nav-item">
                    <h6><a class="nav-link text-danger disabled" disabled><i class="fa fa-trophy" data-toggle="tooltip" data-placement="bottom" title="Mulai Lomba"></i></a></h6>
                </li>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link text-danger dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Masuk
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if (isset($nav_active) && $nav_active == 'Masuk'): ?>
                            <a class="dropdown-item text-danger disabled" href="home/login">Masuk</a>
                        <?php else: ?>
                            <a class="dropdown-item text-danger" href="home/login">Masuk</a>
                        <?php endif; ?>
                        <a class="dropdown-item text-danger" href="home/register">Daftar</a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <br>
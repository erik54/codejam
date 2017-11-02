<body>
        <nav class="navbar navbar-expand-lg navbar-light flex-column flex-md-row fixed-top scrolling-navbar bg-light">
            <h1><a class="navbar-brand text-info" href="#">CodeJam</a></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="nav justify-content-end ml-auto">
                <li class="nav-item">
                    <h6><a class="nav-link text-danger active" href="<?php echo base_url()?>">Beranda</a></h6>
                </li>
                <li class="nav-item">
                    <h6><a class="nav-link text-danger active" href="">Jadwal</a></h6>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-danger dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Masuk
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item text-danger" href="login">Masuk</a>
                      <a class="dropdown-item text-danger" href="home/register">Daftar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <h6><a class="nav-link text-danger disabled" disabled><i class="fa fa-trophy" data-toggle="tooltip" data-placement="bottom" title="Mulai Lomba"></i></a></h6>
                </li>
            </ul>
        </nav>
        <br>
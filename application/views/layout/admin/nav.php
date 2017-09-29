 <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav sn-bg-1 custom-scrollbar">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="#"><img src="//placehold.it/300" class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->
            <!--Social-->
            <li>
                <ul class="social">
                    <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                    <li><a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                    <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                    <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                </ul>
            </li>
            <!--/Social-->
            <!--Search Form-->
            <li>
                <form class="search-form" role="search">
                    <div class="form-group waves-light">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
            </li>
            <!--/.Search Form-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url("beranda"); ?>"><i class="fa fa-home"></i>Beranda</a>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url("beranda/tentang_karamel"); ?>"><i class="fa fa-info"></i>Tentang Karamel</a>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i>Pendaftaran</a>
                    </li>
                    <?php
                    if(!isset($_SESSION["username"])){
                        echo "
                        <li>
                            <a class='collapsible-header waves-effect arrow-r' data-toggle='modal' data-target='#login''><i class='fa fa-sign-in'></i>Masuk</a>
                        </li>";
                    }else{
                        echo "
                        <li>
                            <a href='".site_url("beranda/#")."' class='collapsible-header waves-effect arrow-r'><i class='fa fa-rocket'></i>My Karamel</a> 
                        </li>

                        <li>
                            <a href='".site_url("beranda/logout")."' class='collapsible-header waves-effect arrow-r'><i class='fa fa-sign-out'></i>Logout</a> 
                        </li>";
                    }
                ?>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg navbar-dark scrolling-navbar double-nav blue lighten-1">
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn navbar-brand mr-auto">
                <p><b>Karamel Education</b></p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                
                <?php
                    if ($nav_active == "jadwal"){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>"; 
                    }
                ?>
                    <a class="nav-link" href="<?php echo base_url("admin"); ?>"><i class="fa fa-calendar"></i> <span class="clearfix d-none d-sm-inline-block">Jadwal</span></a>
                </li>

                <?php
                    if ($nav_active == "pengumuman"){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>"; 
                    }
                ?>
                    <a class="nav-link" href="<?php echo base_url("admin/pengumuman"); ?>"><i class="fa fa-newspaper-o"></i> <span class="clearfix d-none d-sm-inline-block">Pengumuman</span></a>
                </li>
                <?php
                    if ($nav_active == "pendaftar"){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>"; 
                    }
                ?>
                    <a class="nav-link" href="<?php echo base_url("admin/pendaftar"); ?>"><i class="fa fa-users"></i> <span class="clearfix d-none d-sm-inline-block">Pendaftar</span></a>
                </li>
                <?php
                    if ($nav_active == "keuangan"){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>"; 
                    }
                ?>
                    <a class="nav-link" href="<?php echo base_url("admin"); ?>"><i class="fa fa-money"></i> <span class="clearfix d-none d-sm-inline-block">Keuangan</span></a>
                </li>
                <?php
                    if ($nav_active == "akun"){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>"; 
                    }
                ?>
                    <a class="nav-link" href="<?php echo base_url("admin/akun"); ?>"><i class="fa fa-user-plus"></i> <span class="clearfix d-none d-sm-inline-block">Akun</span></a>
                </li>
                <?php
                    if(!isset($_SESSION["username"])){
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' data-toggle='modal' data-target='#login''><i class='fa fa-sign-in'></i><span class='clearfix d-none d-sm-inline-block'>Login</span></a>
                        </li>";
                    }else{
                        echo "
                        <li class='nav-item'>
                            <a href='".site_url("beranda/logout")."' class='nav-link'><i class='fa fa-sign-out'></i><span class='clearfix d-none d-sm-inline-block'>Logout</span></a> 
                        </li>";
                    }
                ?>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
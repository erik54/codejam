 <!--Double navigation-->
    <header>
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
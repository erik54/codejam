<div id="mdb-preloader" class="flex-center">
    <div id="preloader-admin">
    </div>
</div>
<main class="mt-5 pt-5">
	<div class="container">
		<section class="section pb-4">
			<!--Card-->
			<div class="card card-cascade wider reverse my-4">
			    <!--Card content-->
			    <div class="card-body">
			        <!--Title-->
			        <h4 class="indigo-text"><strong>Registrasi</strong></h4>

			        <p class="card-text">Registrasi akun untuk mendaftar perlombaan CodeJam.
			        </p>
                    <br>

			        <form id="regForm" action="<?php echo site_url("registrasi/daftar") ?>">
                        <div class="md-form form-sm">
                            <i class="fa fa-edit prefix"></i>

                            <input type="text" id="usernameReg" name="username" value="<?php if(isset($_SESSION['reg_err_username'])){ echo $_SESSION['reg_err_username']; } ?>" class="form-control">
                            <label id="usernameRegLabel" for="usernameReg">Username</label>
                        </div>
                        
                        <div class="md-form form-sm">
                            <i class="fa fa-envelope-o prefix"></i>

                            <input type="text" id="email" name="email" value="<?php if(isset($_SESSION['reg_err_email'])){ echo $_SESSION['reg_err_email']; } ?>" class="form-control">
                            <label for="email">Email</label>
                        </div>
                        
                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input  type="password" id="passwordReg" name="password" data-toggle="password">
                            <label for="passwordReg">Password</label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa prefix"></i>
                            <input  type="password" id="passwordv" name="passwordv" data-toggle="passwordv">
                            <label class="text-nowrap" for="passwordv">Masukan Password sekali lagi</label>
                        </div>
                        
                        <hr>
                        
                        <div class="md-form form-sm">
                            <i class="fa fa-edit prefix"></i>

                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name">Nama</label>
                        </div>
                        
                        <div class="md-form form-sm">
                            <i class="fa fa-graduation-cap prefix"></i>

                            <input type="text" id="college" name="college" class="form-control">
                            <label for="telp">Universitas/Sekolah</label>
                        </div>
                        
                        <select name="tingkat" class="mdb-select colorful-select dropdown-primary">
                            <option value="" disabled selected>Tingkat: </option>
                            <option value="SMA">SMA</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                        </select>


                        <div class="form-group">
                            <?php if (isset($captcha)){
                                echo $captcha; // tampilkan recaptcha 
                            } ?>
                            
                        </div>

                        <center>
                            <div id="loader"></div>
                        </center>

                        <div class="text-center mt-2">
                            <button class="btn btn-info" id="btnReg">Daftar<i class="fa fa-sign-up ml-1"></i></button>
                        </div>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                    </div>
                    </form>

			    </div>
			    <!--/.Card content-->

			</div>
			<!--/.Card-->
		</section>
	</div>
</main>
<script>
    $(document).ready(function () {
        $("#usernameReg").focus();
        setInterval(function () {
            $("#usernameRegLabel").addClass("active");
        },200);
    });

    $(document).ready(function(){
        $("#preloader-admin").load("<?php echo base_url('assets/mdb-addons/')?>preloader.html",
            function(){
                $("#mdb-preloader").fadeOut("slow")
            });
    });

</script>
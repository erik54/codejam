<!--Footer-->
<footer class="page-footer bg-danger center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="title">Biner 3.0</h5>
                <p>GALAXY : Grow and Accelerate for Xtraordinary of Technology</p>
            </div>
            <!--/.First column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © <?php echo date('Y');?> Copyright: <a href="https://defaultunj.com" target="_blank"> Default UNJ </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/mdb.min.js')?>"></script>

	<script>
        // SideNav Initialization
        $(".button-collapse").sideNav();

        //Animation init
        new WOW().init();  

        // Data Picker Initialization
        

        $(document).ready(function() {
            var dateText;

            $('input').on('change', function(){
                var current = $(this).val();
                dateText = current;
            });

            $("#bulan").change(function () {
              console.log(this.value);
              month = this.value;
              window.location.href = '<?php echo base_url("Admin/search_month/") ?>' + month;
            });

            $('#search').pickadate({
                monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                labelMonthNext: 'Bulan Berikutnya',
                labelMonthPrev: 'Bulan sebelumnya',
                labelMonthSelect: 'Silahkan pilih bulan',
                labelYearSelect: 'Silahkan pilih tahun',
                today: 'Tanggal Hari Ini',
                clear: 'Reset',
                close: 'Tutup',
                selectMonths: true,
                selectYears: true,
                formatSubmit: 'yyyy/mm/dd',
                onClose: function(){
                        $(document.activeElement).blur();
                    },
                onSet: function(context) {
                    window.location.href = '<?php echo base_url("Admin/search_jadwal/") ?>' + dateText;
                  }
            });

            

            $('#tanggal').pickadate({
                monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                labelMonthNext: 'Bulan Berikutnya',
                labelMonthPrev: 'Bulan sebelumnya',
                labelMonthSelect: 'Silahkan pilih bulan',
                labelYearSelect: 'Silahkan pilih tahun',
                today: 'Tanggal Hari Ini',
                clear: 'Reset',
                close: 'Tutup',
                selectMonths: true,
                selectYears: true,
                formatSubmit: 'yyyy/mm/dd',
                onClose: function(){
                        $(document.activeElement).blur();
                    }
            });

            return false;

        });
        

        // Time Picker Initialization
        $('#waktu').pickatime({
            twelvehour: false
        });

        //pass toggle
        $(document).ready(function() {
          $("#showHide").click(function() {
            if ($(".password").attr("type") == "password") {
              $(".password").attr("type", "text");

            } else {
              $(".password").attr("type", "password");
            }
          });
        });

        // Material Select Initialization
         $(document).ready(function() {
            $('.mdb-select').material_select();
          });

    </script>
    <?php

        if(isset($err_massages)){
            if(isset($_SESSION['login_err']) && $_SESSION['login_err'] === true){
                echo "
                <script> 

                    document.getElementById('login').classList.remove('fade');
                    $(document).ready(function() {
                        $('#login').modal('show');
                        toastr['error']('".$err_massages."');
                        document.getElementById('login').classList.add('fade');
                    });

                </script>";
                unset(
                    $_SESSION['login_err'],
                    $_SESSION['user_err'],
                    $_SESSION['pass_err']
                ); 


            }else if(isset($_SESSION['jadwal_err']) && $_SESSION['jadwal_err'] == true){
                echo "
                <script> 

                    document.getElementById('tambahJadwal').classList.remove('fade');
                    $(document).ready(function() {
                        $('#tambahJadwal').modal('show');
                        toastr['error']('".$err_massages."');
                        document.getElementById('tambahJadwal').classList.add('fade');
                    });

                </script>";
                unset(
                   $_SESSION['jadwal_err_tanggal'],
                    $_SESSION['jadwal_err_waktu'],
                    $_SESSION['jadwal_err_IDruangan'],
                    $_SESSION['jadwal_err_IDmapel'],
                    $_SESSION['jadwal_err_IDpengajar'],
                    $_SESSION['jadwal_err_IDkelas']
                ); 

            }else{
                echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['error']('".$err_massages."');
                    });
                    
                </script>
                ";
                unset(
                    $_SESSION['reg_err_username'],
                    $_SESSION['reg_err_email'],
                    $_SESSION['reg_err_name'],
                    $_SESSION['reg_err_telp'],
                    $_SESSION['reg_err_alamat']
                );
            }

        }else if(isset($_SESSION['succ_massages'])){
            echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['success']('".$_SESSION['succ_massages']."');
                    });
                    
                </script>
                ";

                 unset(
                    $_SESSION['succ_massages']
                );
        }

        if(isset($_SESSION['deletef'])){
             echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['success']('".$_SESSION['deletef']."');
                    });
                    
                </script>
                ";
                unset(
                    $_SESSION['deletef'],
                    $_SESSION['deskripsi'],
                    $_SESSION['judul']
                );
        }elseif(isset($_SESSION['deletex'])){
            echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['error']('".$_SESSION['deletex']."');
                    });
                    
                </script>
                ";
                unset(
                    $_SESSION['deletex']
                );
        }
    ?>

</body>
</html>
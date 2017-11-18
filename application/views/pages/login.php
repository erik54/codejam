<div class="container mt-5">
	<div class="row pt-2 pb-5">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-md-offset-2">
			<div class="card">
				<h3 class="card-header">Login</h3>
				<div class="card-body">
					<form id="loginFrm" action="<?php echo base_url() ?>home/masuk">
					  <div class="row">
					  	<div class="col-1"></div>
					    <label for="text" class="col-sm-2 col-form-label">Email</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="Username" name="username">
					    </div>
					  </div>
					  <div class="row">
					  	<div class="col-1"></div>
					    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="Password" name="password">
					    </div>
					  </div>
					  <div class="row">
					  	<div class="col-5"></div>
					  	<div class="col-2">
					  		<button id="loginBtn" class="btn btn-primary">Login</button>
					  	</div>
					  </div>
					</form>
					<hr>
					<p class="text-center">Belum pernah daftar sebelumnya? silahkan <a href="">daftar di sini</a>!</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	//submit login
     $('#loginFrm').submit(function(e) {
         e.preventDefault();

         $('#loginBtn').hide();
         $('#loader').css('display', 'block');

         $.ajax({
             type: 'post',
             url: $(this).attr("action"),
             data: $(this).find('input, textarea').serialize(),
             dataType: 'json',
             success: function(data) {
                 console.log(data);
                 if(data.status ==  'fail'){
                     toastr["error"](data.msg);
                     $('#loader').css('display', 'none');
                     $('#loginBtn').show();
                 }else{
                     setTimeout(function() {
                         $('#loader').fadeOut("slow").hide();
                         window.location.href = "<?php echo base_url()?>compete";
                         $('#loginBtn').show();
                     }, 1000);

                 }
             }
         });
     });
</script>
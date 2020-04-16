<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>PAPCUAP | Login</title>

	<!-- include bootstrap css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body style="height: 100vh;">

	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="offset-md-4 col-md-4">
				<div class="card">

				<!-- tampilkan flashdata (jika ada) -->
				<?php if($this->session->flashdata('success')) { ?>
				<div class="alert alert-success" role="alert">
				    <?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php } ?>
				
					<div class="card-body">
						<h5 class="card-title">PAPCUAP | Login</h5>
						<!-- tempatnya form -->
						<form action="<?php echo base_url('index.php/autentikasi/Login')?>" method="POST">
  					<div class="form-group">
    				<label for="exampleInputEmail1">Username</label>
    				<input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username">
  					</div>
  						<div class="form-group">
    					<label for="exampleInputPassword1">Password</label>
    					<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
  						</div>
  					<button type="submit" class="btn btn-primary">Login</button>
						</form>
						<!-- end form -->
						
						<!-- tampilkan flashdata (jika ada) -->

						<?php if(!empty($error)) { ?>
						<hr>
						<div class="alert alert-danger" role="alert">
							<?php echo $error; ?>
						</div>
						<?php } ?>

						<p>
							Belum punya akun?, Daftar Baru <a href="<?php echo base_url('index.php/autentikasi/new') ?>">di sini</a>
						</p>
						<p class="mt-5 mb-3 text-muted">papcuap.@copy; 2018-2019	
						</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>

<!-- include jquery -->
<script type="text/javascript" src="<?php echo base_url ('assets/js/jquery-3.3.1.min.js'); ?>" />

<!-- include bootstrap js -->
<script type="text/javascript" src="<?php echo base_url ('assets/js/bootstrap.min.js'); ?>" />
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>PAPCUAP | Registrasi Akun Baru</title>

	<!-- include bootstrap css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body style="height: 100vh;">

	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="offset-md-3 col-md-6">
				<div class="card">
					<div class="card-header">
							<?php if(validation_errors()) { ?>
						  <div class="alert alert-danger" role="alert">
						      <?php echo validation_errors(); ?>
						  </div>
						  <?php } ?>
					</div>
					<div class="card-body">
						<h5 class="card-title">PAPCUAP | Regitrasi Akun Baru</h5>
						<!-- tempatnya form -->
						<form action="<?php echo base_url('index.php/autentikasi/registrasi')?>" method="POST" enctype="multipart/form-data">

						<div class="form-group">
		    				<label for="nama">Nama</label>
		    				<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
	  				</div>

	  				<div class="form-group">
	    				<label for="jenis_kelamin">Jenis Kelamin</label>
	    				<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
	    					<option value="L">Laki-Laki</option>
	    					<option value="P">Perempuan</option>
	    					<option value="">Tidak Menyebutkan</option>
	    				</select>
	  				</div>

	  				<div class="form-group">
	    				<label for="kelas">Kelas</label>
	    				<select class="form-control" name="kelas" id="kelas">
	    					<option value="A">Kelas A</option>
	    					<option value="B">Kelas B</option>
	    					<option value="C">Kelas C</option>
	    					<option value="">Alumni</option>
	    				</select>
	  				</div>

	  				<div class="form-group">
	  					<label for="foto">Foto Profil</label>
	  					<input type="file" class="form-control" name="foto" id="foto">
	  				</div>
						
  					<div class="form-group">
    				<label for="username">Username</label>
    				<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
  					</div>
  						<div class="form-group">
    					<label for="password">Password</label>
    					<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
  						</div>
  					<button type="submit" class="btn btn-primary">Daftar</button>
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
							Kembali ke <a href="<?php echo base_url('index.php') ?>">Login</a>
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
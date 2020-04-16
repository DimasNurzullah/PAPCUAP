<div class="container-fluid">

  <?php if(validation_errors()) { ?>
  <div class="alert alert-danger" role="alert">
      <?php echo validation_errors(); ?>
  </div>
  <?php } ?>

	<h1>Tambah Data Anggota</h1>

	<form action="<?php echo base_url('index.php/anggota/store'); ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama Anggota</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">

    <?php if(form_error('nama')) { ?>
    <small class="text-danger"><?php echo form_error('nama') ?></small>
    <?php } ?>
  </div>
  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
    	<option value="L">Laki-Laki</option>
    	<option value="P">Perempuan</option>
    	<option value="">Tidak Menyebutkan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="kelas">Kelas</label>
    <select class="form-control" id="kelas" name="kelas">
    	<option value="A">Kelas A</option>
    	<option value="B">Kelas B</option>
    	<option value="C">Kelas C</option>
    	<option value="">Tidak Menyebutkan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="foto">Foto(Jika Ada)</label>
    <input type="file" class="form-control" id="foto" name="foto">
  	
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>
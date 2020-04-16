<div class="container-fluid">
	<h1>Tambah Data</h1>

	<form action="<?php echo base_url('index.php/masukan/store'); ?>" method="post">
  <div class="form-group">
    <label for="nrp">NRP</label>
    <input type="text" class="form-control" id="nrp" name="nrp" aria-describedby="emailHelp" placeholder="Masukkan NRP">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama Mahasiswa">
  </div>
  <div class="form-group">
    <label for="penilaian">Penilaian</label>
    <select class="form-control" id="penilaian" name="penilaian">
    	<option value="P">Puas</option>
    	<option value="TP">Tidak Puas</option>
    </select>
  </div>
  <div class="form-group">
    <label for="kesan">Kesan</label>
    <input type="text" class="form-control" id="kesan" name="kesan" aria-describedby="emailHelp" placeholder="">
  	
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>
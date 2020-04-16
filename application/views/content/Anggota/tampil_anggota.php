<div class="container-fluid">
	<h1>Tampil Data Anggota</h1>

  <div class="form-group">
    <label for="nama">Nama Anggota</label>
    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Masukkan nama" value="<?php echo $anggota->nama_anggota; ?>" readonly>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly>
    	<option value="L" <?php echo ($anggota->jenis_kelamin == 'L') ? 'selected' : ''; ?>>Laki-Laki</option>
    	<option value="P" <?php echo ($anggota->jenis_kelamin == 'P') ? 'selected' : ''; ?>>Perempuan</option>
    	<option value="" <?php echo ($anggota->jenis_kelamin == '') ? 'selected' : ''; ?>>Tidak Menyebutkan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="kelas">Kelas</label>
    <select class="form-control" id="kelas" name="kelas" readonly>
    	<option value="A" <?php echo ($anggota->kelas == 'A') ? 'selected' : ''; ?>>Kelas A</option>
    	<option value="B" <?php echo ($anggota->kelas == 'B') ? 'selected' : ''; ?>>Kelas B</option>
    	<option value="C" <?php echo ($anggota->kelas == 'C') ? 'selected' : ''; ?>>Kelas C</option>
    	<option value="" <?php echo ($anggota->kelas == '') ? 'selected' : ''; ?>>Tidak Menyebutkan</option>
    </select>
  </div>

  <a href="<?php echo base_url('index.php/anggota') ?>" class="btn btn-primary">Kembali</a>

</div>
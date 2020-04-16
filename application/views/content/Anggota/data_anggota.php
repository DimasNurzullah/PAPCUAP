      <div class="container-fluid">
        <h1>Data Anggota</h1>

    <!-- tampilkan flashdata (jika ada) -->
    <?php if($this->session->flashdata('success')) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php } ?>
    
        <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/anggota/create'); ?>">Tambah Anggota</a>
        <table class="table table-hover">
        	<thead>
        		<tr>
                    <td scope="col">Nomer</td>
        			<td scope="col">Nama</td>
        			<td scope="col">Jenis Kelamin</td>
        			<td scope="col">Kelas</td>
        			<td scope="col">Foto Profil</td>
                    <td>Aksi</td>
        		</tr>
        	</thead>
        	<tbody>
                <?php
                $no = 0;
                    foreach ($anggota as $item) {
                        $no++;
                ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $item->nama_anggota; ?></td>
                <td><?php echo $item->jenis_kelamin; ?></td>
                <td><?php echo $item->kelas; ?></td>
                <td>
                    <?php if($item->foto_profil) { ?>
                    <img src="<?php echo base_url($item->foto_profil); ?>" class="img-thumbnail">
                    <?php } else { ?>
                    -
                    <?php } ?>
                </td>
                <td>
                    <a href="<?php echo base_url('index.php/anggota/show/'.$item->id_anggota); ?>" class="btn btn-xs btn-info">Tampil</a>
                    <a href="<?php echo base_url('index.php/anggota/edit/'.$item->id_anggota); ?>" class="btn btn-xs btn-warning">Edit</a>
                    <a href="<?php echo base_url('index.php/anggota/delete/'.$item->id_anggota); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda yakin menghapus <?php echo $item->nama_anggota; ?>?')">Hapus</a>
                </td>
            </tr>
                <?php
            }
        ?>
        	</tbody>
        </table>
      </div>
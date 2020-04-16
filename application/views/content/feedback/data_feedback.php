      <div class="container-fluid">
        <h1>Data Feedback</h1>

    <!-- tampilkan flashdata (jika ada) -->
    <?php if(!empty($message)) { ?>
    <hr>
    <div class="alert alert-danger" role="alert">
        <?php echo $message; ?>
    </div>
    <?php } ?>
    
        <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/feedback/create'); ?>">Tambah Data</a>
        <table class="table table-hover">
        	<thead>
        		<tr>
                    <td scope="col">No</td>
        			<td scope="col">NRP</td>
        			<td scope="col">Nama</td>
        			<td scope="col">Penilaian</td>
        			<td scope="col">Kesan</td>
                    <td>Aksi</td>
        		</tr>
        	</thead>
        	<tbody>
                <?php
                $no = 0;
                    foreach ($feedback as $item) {
                        $no++;
                ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $item->nrp; ?></td>
                <td><?php echo $item->nama; ?></td>
                <td><?php echo $item->penilaian; ?></td>
                <td><?php echo $item->kesan; ?></td>
                <td>-</td>
                <td>
                    <a href="<?php echo base_url('index.php/feedback/edit/'.$item->id); ?>" class="btn btn-xs btn-warning">Edit</a>
                    <a href="<?php echo base_url('index.php/feedback/delete/'.$item->id); ?>" class="btn btn-xs btn-danger">Hapus</a>
                </td>
            </tr>
                <?php
            }
        ?>
        	</tbody>
        </table>
      </div>
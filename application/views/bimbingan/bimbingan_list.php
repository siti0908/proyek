<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">KELOLA BIMBINGAN</h2>
        <div class="row" style="margin-bottom: 10px">
        <?php if ($_SESSION['hak_akses'] == 'M' or $_SESSION['hak_akses'] == 'D'){
        ?>  
            <div class="col-md-4">
                <?php echo anchor(site_url('bimbingan/create'),' <i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
            </div>
             <?php
                }
                ?>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('bimbingan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('bimbingan'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- Data Bimbingan-->
<div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
                <th>No</th>
        		<th>Nama Dosen</th>
        		<th>Nama Mahasiswa</th>
        		<th>Npm</th>
        		<th>Tanggal Bimbingan</th>
        		<th>Materi</th>
        		<th>Upload File</th>
            </tr></thead><?php
            foreach ($bimbingan_data as $bimbingan)
            {
                ?>
            <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $bimbingan->nama_dosen ?></td>
			<td><?php echo $bimbingan->nama_mahasiswa ?></td>
			<td><?php echo $bimbingan->npm ?></td>
			<td><?php echo $bimbingan->tanggal_bimbingan ?></td>
			<td><?php echo $bimbingan->materi ?></td>
			<td><a target="_blank" href="<?=base_url('assets/file/bimbingan/'.$bimbingan->upload_file)?>"><?php echo $bimbingan->upload_file ?></a></td>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-danger">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('bimbingan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
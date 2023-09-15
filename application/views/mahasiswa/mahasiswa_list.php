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
        <h2 style="margin-top:0px">Kelola Data Mahasiswa</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('mahasiswa/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
            </div>
            
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('mahasiswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mahasiswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
          <div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
            <tr>
                <th>No</th>
		<th>Npm</th>
		<th>Nama Mahasiswa</th>
		<th><center>Tingkat</center></th>
		<th><center>Jenis Kelamin</center></th>
		<th><center>Action</center></th>
            </tr></thead><?php
            foreach ($mahasiswa_data as $mahasiswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mahasiswa->npm ?></td>
			<td><?php echo $mahasiswa->nama_mahasiswa ?></td>
			<td><center><?php echo $mahasiswa->tingkat ?></center></td>
			<td><center><?php echo $mahasiswa->Jenis_Kelamin ?></center></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mahasiswa/read/'.$mahasiswa->id_mahasiswa),'Read'); 
				echo ' | '; 
				echo anchor(site_url('mahasiswa/update/'.$mahasiswa->id_mahasiswa),'Update'); 
				echo ' | '; 
				echo anchor(site_url('mahasiswa/delete/'.$mahasiswa->id_mahasiswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
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
		<?php echo anchor(site_url('mahasiswa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
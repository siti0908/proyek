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
        <h2 style="margin-top:0px">Kelola Data Dosen</h2>
        <div class="row" style="margin-bottom: 10px">
            <?php if ($_SESSION['hak_akses'] == 'K'){
            ?>
            <div class="col-md-4">
            <?php echo anchor(site_url('dosen/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
                <form action="<?php echo site_url('dosen/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dosen'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

<!-- Data Dosen-->
    <div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
                <th>No</th>
        		<th>Nik Dosen</th>
        		<th>Nama Dosen</th>
        		<th><center>Action</center></th>
                </tr></thead>
            <?php
            foreach ($dosen_data as $dosen)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dosen->nik_dosen ?></td>
			<td><?php echo $dosen->nama_dosen ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dosen/update/'.$dosen->id_dosen),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dosen/delete/'.$dosen->id_dosen),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    		<?php echo anchor(site_url('dosen/excel'), 'Excel', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
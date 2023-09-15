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
        <h2 style="margin-top:0px">Plotting pembimbing</h2>
        <div class="row" style="margin-bottom: 10px">
             <?php if ($_SESSION['hak_akses'] == 'K'){
                ?>
            <div class="col-md-4">
                <?php echo anchor(site_url('plotting_pembimbing/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
            </div>
             
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('plotting_pembimbing/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('plotting_pembimbing'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
         <?php
             }
             ?>
            <!--  HAK AKSES MAHS DAN DOSEN -->
             <?php if ($_SESSION['hak_akses'] == 'M' or $_SESSION['hak_akses'] == 'D'){
            ?>
             <div class="col-md-6 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <form action="<?php echo site_url('plotting_pembimbing/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('plotting_pembimbing'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
             <?php
             }
             ?>
              <!-- Data Pembekalan-->
    <div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>

                <th>No</th>
        		<th><center>Nik Dosen</center></th>
        		<th>Nama Dosen</th>
        		<th>Nama Mahasiswa</th>
        		<th>NPM</th>
        		<th><center>Tingkat</center></th>
                <?php if ($_SESSION['hak_akses'] == 'K'){
                ?>
        		<th><center>Action</center></th>
                   <?php
             }
             ?>
            </tr></thead>
            <?php
            foreach ($plotting_pembimbing_data as $plotting_pembimbing)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><center><?php echo $plotting_pembimbing->nik_dosen ?></center></td>
            <td><?php echo $plotting_pembimbing->nama_dosen ?></td>
            <td><?php echo $plotting_pembimbing->nama_mahasiswa ?></td>
            <td><?php echo $plotting_pembimbing->npm ?></td>
			<td><center><?php echo $plotting_pembimbing->tingkat ?></center></td>
            <?php if ($_SESSION['hak_akses'] == 'K'){
                ?>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('plotting_pembimbing/update/'.$plotting_pembimbing->id_plotting_pembimbing),'Update'); 

				?>
                 <?php
             }
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
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('plotting_pembimbing/excel'), 'Excel', 'class="btn btn-danger"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
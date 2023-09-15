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
        <h2 style="margin-top:0px">Data Plotting Pembimbing</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            <?php echo anchor(site_url('pembimbing/create'),'Create', 'class="btn btn-warning"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pembimbing/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pembimbing'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-warning" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
<!-- Data Pembimbing-->
    <div class="row">
    <div class="col-md-12">
    <div class="box box-warning">
    <div class="box-header">
    <!--tools box-->
    <div class="pull-right box-tools">
    <button type="button" class="btn btn-warning btn-sm" data-widget="collapse" data-toggle="tooltip" title="collapse">
    <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="collapse">
    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body pad">
                <table class="table">
                  <thead>
            <tr>
                <th>No</th>
        		<th>Nik Penguji</th>
        		<th>Nama Pembimbing</th>
        		<th>Jenis Kelamin</th>
        		<th><center>Action</center></th>
                </tr></thead><?php
                foreach ($pembimbing_data as $pembimbing)
                {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pembimbing->nik_penguji ?></td>
			<td><?php echo $pembimbing->nama_pembimbing ?></td>
			<td><?php echo $pembimbing->jenis_kelamin ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pembimbing/read/'.$pembimbing->id_pembimbing),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pembimbing/update/'.$pembimbing->id_pembimbing),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pembimbing/delete/'.$pembimbing->id_pembimbing),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table><br>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-warning">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pembimbing/excel'), 'Excel', 'class="btn btn-success"'); ?>
	    </div>
        </div>
    </body>
</html>
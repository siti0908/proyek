<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">KELOLA TIMELINE</h2>
        <div class="row" style="margin-bottom: 10px">
             <?php if ($_SESSION['hak_akses'] == 'K'){
              ?>
        <div class="col-md-4">
        <?php echo anchor(site_url('timeline/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
                <form action="<?php echo site_url('timeline/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('timeline'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
<!-- Data Timeline-->
<div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
                <th>No</th>
		        <th>Kegiatan</th>
		        <th>Waktu</th>
		        <?php if ($_SESSION['hak_akses'] == 'K'){
                ?>
                <th><center>Action</center></th>
                <?php
                 }
                 ?>
            </tr></thead>
            <?php foreach ($timeline_data as $timeline)
            {
            ?>
            <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $timeline->kegiatan ?></td>
		    <td><?php echo $timeline->waktu ?></td> 
<!--         <td><?php echo tgl_ind(date('Y-m-d')); ?></td>  -->
  

            <?php if ($_SESSION['hak_akses'] == 'K'){
                ?>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('timeline/update/'.$timeline->id),'Update'); 
				echo ' | ';
				echo anchor(site_url('timeline/delete/'.$timeline->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
                <?php
                 }
                 ?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table><br>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-danger">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('timeline/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>

                    <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
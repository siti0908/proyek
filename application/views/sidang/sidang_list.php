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
        <h2 style="margin-top:0px">Data Sidang</h2>
        <div class="row" style="margin-bottom: 10px">
            <?php if ($_SESSION['hak_akses'] == 'K' or $_SESSION['hak_akses'] == 'D'){
            ?>
            <div class="col-md-4">
                <?php echo anchor(site_url('sidang/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('sidang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sidang'); ?>" class="btn btn-danger">Reset</a>
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
             <?php if ($_SESSION['hak_akses'] == 'M'){
            ?>
             <div class="col-md-6 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <form action="<?php echo site_url('sidang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sidang'); ?>" class="btn btn-danger">Reset</a>
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
   <!-- Data Sidang-->
    <div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
                <th>No</th>
		<th>Tanggal Sidang</th>
		<th>Nama Mahasiswa</th>
		<th>Nama Pembimbing</th>
		<th>Nama Penguji</th>
		<th>Hasil Keputusan Sidang</th>
		<th>Catatan</th>
		<?php if ($_SESSION['hak_akses'] == 'K' or $_SESSION['hak_akses'] == 'D'){
        ?>
        <th><center>Action</center></th>
        <?php
        }
        ?> 
            </tr></thead><?php
            foreach ($sidang_data as $sidang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sidang->tanggal_sidang ?></td>
			<td><?php echo $sidang->nama_mahasiswa ?></td>
			<td><?php echo $sidang->nama_dosen ?></td>
			<td><?php echo $sidang->nama_penguji ?></td>
			<td><?php echo $sidang->hasil_keputusan_sidang ?></td>
			<td><?php echo $sidang->catatan ?></td>
           <?php if ($_SESSION['hak_akses'] == 'K' or $_SESSION['hak_akses'] == 'D'){
            ?>
			<td style="text-align:center" width="40px">
				<?php  
				echo anchor(site_url('sidang/update/'.$sidang->id_sidang),'Update'); 
	
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
                <a href="#" class="btn btn-danger">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('sidang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
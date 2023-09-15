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
        <h2 style="margin-top:0px">Dokumen Akhir</h2>
         <?php if ($_SESSION['hak_akses'] == 'M'):?>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dokumen_akhir/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('dokumen_akhir/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dokumen_akhir'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    <!-- Data Dokumen Akhir-->
    <div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
                <th>No</th>
        		<th>NPM Mahasiswa</th>
        		<th>Nama Mahasiswa</th>
        		<th>Tanggal Kumpul</th>
        		<th>Upload File</th>
            </tr><?php
            foreach ($dokumen_akhir_data as $dokumen_akhir)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dokumen_akhir->npm ?></td>
			<td><?php echo $dokumen_akhir->nama_mahasiswa ?></td>
			<td><?php echo $dokumen_akhir->tanggal_kumpul ?></td>
		    <td><a target="_blank" href="<?=base_url('assets/file/dokumen_akhir/'.$dokumen_akhir->upload_file)?>"><?php echo $dokumen_akhir->upload_file ?></a></td>
                
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
		<?php echo anchor(site_url('dokumen_akhir/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
   <!--      hak akases -->

  <?php elseif ($_SESSION['hak_akses'] == 'K'or $_SESSION['hak_akses'] == 'D' or $_SESSION['hak_akses'] == 'S' or $_SESSION['hak_akses'] == 'P'):?>
        <div class="row" style="margin-bottom: 10px">
            
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-12 text-right">
                <form action="<?php echo site_url('dokumen_akhir/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dokumen_akhir'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    <!-- Data Dokumen Akhir-->
    <div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
                <th>No</th>
                <th>NPM Mahasiswa</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Kumpul</th>
                <th>Upload File</th>
            </tr><?php
            foreach ($dokumen_akhir_data as $dokumen_akhir)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $dokumen_akhir->npm ?></td>
            <td><?php echo $dokumen_akhir->nama_mahasiswa ?></td>
            <td><?php echo $dokumen_akhir->tanggal_kumpul ?></td>
             <td><a target="_blank" href="<?=base_url('assets/file/dokumen_akhir/'.$dokumen_akhir->upload_file)?>"><?php echo $dokumen_akhir->upload_file ?></a></td>
        
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
        <?php echo anchor(site_url('dokumen_akhir/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
            <?php endif?>
    </body>
</html>
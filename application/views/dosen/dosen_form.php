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
   <!-- Create Dosen -->
    <form action="<?php echo $action; ?>" method="post">
    <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Data Dosen</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">
    <div class="form-group">
        <label for="int">Nik Dosen <?php echo form_error('nik_dosen') ?></label>
        <input type="text" class="form-control" name="nik_dosen" id="nik_dosen" placeholder="Nik Dosen" value="<?php echo $nik_dosen; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Dosen <?php echo form_error('nama_dosen') ?></label>
        <input type="text" class="form-control" name="nama_dosen" id="nama_dosen"  placeholder="Nama Dosen" value="<?php echo $nama_dosen; ?>" />
    </div>
               
	    <input type="hidden" name="id_dosen" value="<?php echo $id_dosen; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dosen') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
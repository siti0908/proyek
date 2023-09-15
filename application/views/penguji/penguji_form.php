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
        <!-- Create Penguji -->
    <form action="<?php echo $action; ?>" method="post">
    <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Data Penguji</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">
	    <div class="form-group">
            <label for="int">Nik Penguji <?php echo form_error('nik_penguji') ?></label>
            <input type="text" class="form-control" name="nik_penguji" id="nik_penguji" placeholder="Nik Penguji" value="<?php echo $nik_penguji; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Penguji <?php echo form_error('nama_penguji') ?></label>
            <input type="text" class="form-control" name="nama_penguji" id="nama_penguji" placeholder="Nama Penguji" value="<?php echo $nama_penguji; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <input type="hidden" name="id_penguji" value="<?php echo $id_penguji; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penguji') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
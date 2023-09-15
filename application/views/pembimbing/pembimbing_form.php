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
<!-- Create Pembimbing -->
    <form action="<?php echo $action; ?>" method="post">
    <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Create Data Pembimbing</h3>
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
            <label for="varchar">Nama Pembimbing <?php echo form_error('nama_pembimbing') ?></label>
            <input type="text" class="form-control" name="nama_pembimbing" id="nama_pembimbing" placeholder="Nama Pembimbing" value="<?php echo $nama_pembimbing; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
	    <input type="hidden" name="id_pembimbing" value="<?php echo $id_pembimbing; ?>" /> 
	    <button type="submit" class="btn btn-warning"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembimbing') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
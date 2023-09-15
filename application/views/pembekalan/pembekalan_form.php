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
   <!-- Create Pembekalan-->
    <form action="<?php echo $action; ?>" method="post">
    <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Create Data Pembekalan</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">
	    <div class="form-group">
            <label for="varchar">Daftar Hadir <?php echo form_error('daftar_hadir') ?></label>
            <input type="text" class="form-control" name="daftar_hadir" id="daftar_hadir" placeholder="Daftar Hadir" value="<?php echo $daftar_hadir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Materi <?php echo form_error('Materi') ?></label>
            <input type="text" class="form-control" name="Materi" id="Materi" placeholder="Materi" value="<?php echo $Materi; ?>" />
        </div><br>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembekalan') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
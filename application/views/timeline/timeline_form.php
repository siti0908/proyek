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
    <h3 class="box-title">Create Data Timeline</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">
        <div class="form-group">
            <label for="varchar">Kegiatan <?php echo form_error('kegiatan') ?></label>
            <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan" value="<?php echo $kegiatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Waktu <?php echo form_error('waktu') ?></label>
            <input type="date" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />

        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('timeline') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
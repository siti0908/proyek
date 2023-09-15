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
        <!-- Data pembekalan-->
    <div class="row">
    <div class="col-md-6">
    <div class="box box-warning">
            <div class="box-header">
                <!--tools box-->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-warning btn-sm" data-widget="collapse" data-toggle="tooltip"
                           title="collapse">
                           <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip"
                           title="collapse">
                           <i class="fa fa-times"></i></button>
                </div>
                <!-- /. tools-->
            </div>
            <!-- /. box-header-->
            <div class="box-body pad">
        <h2 style="margin-top:0px">Pembekalan Read</h2>
        <table class="table">
	    <tr><td>Tanggal Pembekalan</td><td><?php echo $tanggal_pembekalan; ?></td></tr>
	    <tr><td>Daftar Hadir</td><td><?php echo $daftar_hadir; ?></td></tr>
	    <tr><td>Materi</td><td><?php echo $Materi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembekalan') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
        </body>
</html>
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
    <!-- Data Pembimbing-->
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
        <h2 style="margin-top:0px">Pembimbing Read</h2>
        <table class="table">
	    <tr><td>Nik Penguji</td><td><?php echo $nik_penguji; ?></td></tr>
	    <tr><td>Nama Pembimbing</td><td><?php echo $nama_pembimbing; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembimbing') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
        </body>
</html>
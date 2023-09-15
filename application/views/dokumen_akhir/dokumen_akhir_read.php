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
    <!-- Data Dokumen Akhir-->
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
        <table class="table">
	    <tr><td>Npm</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Id Mahasiswa</td><td><?php echo $id_mahasiswa; ?></td></tr>
	    <tr><td>Tanggal Kumpul</td><td><?php echo $tanggal_kumpul; ?></td></tr>
	    <tr><td>Upload File</td><td><?php echo $upload_file; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dokumen_akhir') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
        </body>
</html>
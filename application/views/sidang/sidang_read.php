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
        <!-- Data Sidang-->
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
        <h2 style="margin-top:0px">Sidang Read</h2>
        <table class="table">
	    <tr><td>Tanggal Sidang</td><td><?php echo $tanggal_sidang; ?></td></tr>
	    <tr><td>Id Mahasiswa</td><td><?php echo $id_mahasiswa; ?></td></tr>
	    <tr><td>Id Dosen</td><td><?php echo $id_dosen; ?></td></tr>
	    <tr><td>Nama Penguji</td><td><?php echo $id_penguji; ?></td></tr>
	    <tr><td>Hasil Keputusan Sidang</td><td><?php echo $hasil_keputusan_sidang; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sidang') ?>" class="btn btn-danger bv">Cancel</a></td></tr>
	</table>
        </body>
</html>
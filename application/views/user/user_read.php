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
        <!-- Data user-->
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
            <thead>
            <h2 style="margin-top:0px">View User</h2>
            <table class="table">
    	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
    	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
    	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
            <tr><td>NPM</td><td><?php echo $npm; ?></td></tr>
    	    <tr><td>Hak Akses</td><td><?php echo $hak_akses; ?></td></tr>
    	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
        </body>
</html>
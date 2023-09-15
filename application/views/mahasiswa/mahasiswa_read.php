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
        <h2 style="margin-top:0px">Mahasiswa Read</h2>
        <table class="table">
	    <tr><td>Npm</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Nama Mahasiswa</td><td><?php echo $nama_mahasiswa; ?></td></tr>
	    <tr><td>Tingkat</td><td><?php echo $tingkat; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $Jenis_Kelamin; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
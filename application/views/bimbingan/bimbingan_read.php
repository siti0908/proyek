<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Bimbingan Read</h2>
        <table class="table">
	    <tr><td>Id Dosen</td><td><?php echo $id_dosen; ?></td></tr>
	    <tr><td>Id Mahasiswa</td><td><?php echo $id_mahasiswa; ?></td></tr>
	    <tr><td>Npm</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Tanggal Bimbingan</td><td><?php echo $tanggal_bimbingan; ?></td></tr>
	    <tr><td>Materi</td><td><?php echo $materi; ?></td></tr>
	    <tr><td>Upload File</td><td><?php echo $upload_file; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bimbingan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
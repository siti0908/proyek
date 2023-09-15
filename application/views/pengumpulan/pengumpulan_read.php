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
        <h2 style="margin-top:0px">Pengumpulan Read</h2>
        <table class="table">
        <tr><td>NPM Mahasiswa</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Nama Mahasiswa</td><td><?php echo $id_mahasiswa; ?></td></tr>
	    <tr><td>Tanggal Kumpul</td><td><?php echo $tanggal_kumpul; ?></td></tr>
	    <tr><td>Proposal</td><td><?php echo $proposal; ?></td></tr>
	    <tr><td>Laporan</td><td><?php echo $laporan; ?></td></tr>
	    <tr><td>Dpl</td><td><?php echo $dpl; ?></td></tr>
	    <tr><td>Buku Bimbingan</td><td><?php echo $buku_bimbingan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengumpulan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
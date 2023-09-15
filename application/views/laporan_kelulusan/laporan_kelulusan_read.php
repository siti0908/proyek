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
        <h2 style="margin-top:0px">Laporan_kelulusan Read</h2>
        <table class="table">
	    <tr><td>Tanggal Sidang</td><td><?php echo $tanggal_sidang; ?></td></tr>
	    <tr><td>Id Mahasiswa</td><td><?php echo $id_mahasiswa; ?></td></tr>
	    <tr><td>Id Dosen</td><td><?php echo $id_dosen; ?></td></tr>
	    <tr><td>Id Penguji</td><td><?php echo $id_penguji; ?></td></tr>
	    <tr><td>Hasil Keputusan Sidang</td><td><?php echo $hasil_keputusan_sidang; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('laporan_kelulusan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
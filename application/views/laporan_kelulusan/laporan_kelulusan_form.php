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
        <h2 style="margin-top:0px">Laporan_kelulusan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tanggal Sidang <?php echo form_error('tanggal_sidang') ?></label>
            <input type="text" class="form-control" name="tanggal_sidang" id="tanggal_sidang" placeholder="Tanggal Sidang" value="<?php echo $tanggal_sidang; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Mahasiswa <?php echo form_error('id_mahasiswa') ?></label>
            <input type="text" class="form-control" name="id_mahasiswa" id="id_mahasiswa" placeholder="Id Mahasiswa" value="<?php echo $id_mahasiswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Dosen <?php echo form_error('id_dosen') ?></label>
            <input type="text" class="form-control" name="id_dosen" id="id_dosen" placeholder="Id Dosen" value="<?php echo $id_dosen; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Penguji <?php echo form_error('id_penguji') ?></label>
            <input type="text" class="form-control" name="id_penguji" id="id_penguji" placeholder="Id Penguji" value="<?php echo $id_penguji; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Hasil Keputusan Sidang <?php echo form_error('hasil_keputusan_sidang') ?></label>
            <input type="text" class="form-control" name="hasil_keputusan_sidang" id="hasil_keputusan_sidang" placeholder="Hasil Keputusan Sidang" value="<?php echo $hasil_keputusan_sidang; ?>" />
        </div>
	    <div class="form-group">
            <label for="catatan">Catatan <?php echo form_error('catatan') ?></label>
            <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea>
        </div>
	    <input type="hidden" name="id_laporan_kelulusan" value="<?php echo $id_laporan_kelulusan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('laporan_kelulusan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
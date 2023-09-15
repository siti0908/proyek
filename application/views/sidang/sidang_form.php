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
         <!-- Create Sidang -->
    <form action="<?php echo $action; ?>" method="post">
    <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Create Data Sidang</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="datetime">Tanggal Sidang <?php echo form_error('tanggal_sidang') ?></label>
            <input type="date" class="form-control" name="tanggal_sidang" id="tanggal_sidang" placeholder="Tanggal Sidang" value="<?php echo $tanggal_sidang; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nama Mahasiswa <?php echo form_error('id_mahasiswa') ?></label>
            <select name="id_mahasiswa" class="form-control">
            <option value="" >Nama Mahasiswa </option>
                <?php if ($list_mahasiswa):?>
                <?php foreach ($list_mahasiswa as $lm):?>
                <option value="<?php echo $lm->id_mahasiswa?>" <?php if($lm->id_mahasiswa==$id_mahasiswa){echo "selected";}?>><?php echo $lm->nama_mahasiswa?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="int">Dosen Pembimbing <?php echo form_error('id_dosen') ?></label>
            <select name="id_dosen" class="form-control">
            <option value="" >Nama Dosen Pembimbing</option>
                <?php if ($list_dosen):?>
                <?php foreach ($list_dosen as $ld):?>
                <option value="<?php echo $ld->id_dosen?>"<?php if($ld->id_dosen==$id_dosen){echo "selected";}?>><?php echo $ld->nama_dosen?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Penguji <?php echo form_error('id_penguji') ?></label>
           <select name="id_penguji" class="form-control">
            <option value="" >Nama Penguji</option>
                <?php if ($list_penguji):?>
                <?php foreach ($list_penguji as $lp):?>
                <option value="<?php echo $lp->id_penguji?>"<?php if($lp->id_penguji==$id_penguji){echo "selected";}?>><?php echo $lp->nama_penguji?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="enum">Hasil Keputusan Sidang <?php echo form_error('hasil_keputusan_sidang') ?></label>
            <div class="radio">
                    <label>
                      <input type="radio" name="hasil_keputusan_sidang" id="hasil_keputusan_sidang" value="" checked>
                      Menunggu Keputusan Sidang
                    </label>
                  </div>
             <div class="radio">
                    <label>
                      <input type="radio" name="hasil_keputusan_sidang" id="hasil_keputusan_sidang" value="Lulus Tanpa Revisi">
                      Lulus Tanpa Revisi
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil_keputusan_sidang" id="hasil_keputusan_sidang" value="Lulus Dengan Revisi">
                      Lulus Dengan Revisi
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil_keputusan_sidang" id="hasil_keputusan_sidang" value="Tidak Lulus">
                     Tidak Lulus
                    </label>
                  </div>
                </div>
        </div>
	    <div class="form-group">
            <label for="catatan">Catatan <?php echo form_error('catatan') ?></label>
            <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea>
        </div>
	    <input type="hidden" name="id_sidang" value="<?php echo $id_sidang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sidang') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
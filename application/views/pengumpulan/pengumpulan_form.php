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
        <!-- Create Dokumen Akhir -->
    <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Create Pengumpulan</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <div class="box-body">
    <?php echo form_open_multipart($action);?>
	   <!-- <div class="form-group">
            <label for="int">Npm <?php echo form_error('npm') ?></label>
            <select name="id_mahasiswa" class="form-control">
                <option value="" >NPM Mahasiswa </option>
                <?php if ($list_mahasiswa):?>
                    <?php foreach ($list_mahasiswa as $lm):?>
                        <option value="<?php echo $lm->id_mahasiswa?>"><?php echo $lm->npm?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div> -->
        <!-- <div class="form-group">
            <label for="varchar">Nama Mahasiswa <?php echo form_error('id_mahasiswa') ?></label>
             <select name="id_mahasiswa" class="form-control">
            <option value="" >Nama Mahasiswa </option>
                <?php if ($list_mahasiswa):?>
                <?php foreach ($list_mahasiswa as $lm):?>
                <option value="<?php echo $lm->id_mahasiswa?>" <?php if($lm->id_mahasiswa==$id_mahasiswa){echo "selected";}?>><?php echo $lm->nama_mahasiswa?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div> -->
        <div class="form-group">
            <label for="varchar">judul <?php echo form_error('judul') ?></label>
            <input type="varchar" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
          <div class="form-group">
            <label for="varchar">Pembimbing <?php echo form_error('pembimbing') ?></label>
            <input type="varchar" class="form-control" name="pembimbing" id="pembimbing" placeholder="pembimbing" value="<?php echo $pembimbing; ?>" />
        </div>
	    <div class="form-group">
            <label for="mediumblob">Proposal <?php echo form_error('proposal') ?></label>
            <input type="file" class="form-control" name="proposal" id="proposal" placeholder="Proposal" value="<?php echo $proposal; ?>" />
        </div>
	    <div class="form-group">
            <label for="mediumblob">Laporan <?php echo form_error('laporan') ?></label>
            <input type="file" class="form-control" name="laporan" id="laporan" placeholder="Laporan" value="<?php echo $laporan; ?>" />
        </div>
	    <div class="form-group">
            <label for="mediumblob">Dpl <?php echo form_error('dpl') ?></label>
            <input type="file" class="form-control" name="dpl" id="dpl" placeholder="Dpl" value="<?php echo $dpl; ?>" />
        </div>
	    <div class="form-group">
            <label for="mediumblob">Buku Bimbingan <?php echo form_error('buku_bimbingan') ?></label>
            <input type="file" class="form-control" name="buku_bimbingan" id="buku_bimbingan" placeholder="Buku Bimbingan" value="<?php echo $buku_bimbingan; ?>" />
        </div>
	    <input type="hidden" name="id_pengumpulan" value="<?php echo $id_pengumpulan; ?>" /> 
         <input type="hidden" name="npm" value="<?php echo $npm; ?>" /> 
         <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengumpulan') ?>" class="btn btn-danger">Cancel</a>
	<?php echo form_close();?>
    </body>
</html>
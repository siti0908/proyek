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
    <h3 class="box-title">Create Dokumen Akhir</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <div class="box-body">
         <?php echo form_open_multipart('dokumen_akhir/create_action');?>
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
	    <div class="form-group">
            <label for="int">Id Mahasiswa <?php echo form_error('id_mahasiswa') ?></label>
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
            <label for="mediumblob">Upload File <?php echo form_error('upload_file') ?></label>
            <input type="file" class="form-control" name="upload_file" id="upload_file" placeholder="Upload File" value="<?php echo $upload_file; ?>" />
        </div>
	    <input type="hidden" name="id_dokumen_akhir" value="<?php echo $id_dokumen_akhir; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dokumen_akhir') ?>" class="btn btn-danger">Cancel</a>
	<?php echo form_close();?>
    </body>
</html>
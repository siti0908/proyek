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
         <!-- Create PLotting-->
    <form action="<?php echo $action; ?>" method="post">
    <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Create Plotting Pembimbing</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
            <!--
	    <div class="form-group">
            <label for="int">Id Dosen <?php echo form_error('id_dosen') ?></label>
            <select name="id_dosen" class="form-control">
            <option value="" >NIK Dosen </option>
                <?php if ($list_dosen):?>
                    <?php foreach ($list_dosen as $ld):?>
                        <option value="<?php echo $ld->id_dosen?>"><?php echo $ld->nik_dosen?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
    -->
	    <div class="form-group">
            <label for="varchar">Nama Dosen <?php echo form_error('nama_dosen') ?></label>
           <select name="id_dosen" class="form-control">
          <option value="" >NIK Dosen </option>
                <?php if ($list_dosen):?>
                    <?php foreach ($list_dosen as $ld):?>
                        <option value="<?php echo $ld->id_dosen?>" <?php if($ld->id_dosen==$id_dosen){echo "selected";}?>> <?php echo $ld->nama_dosen?>
                            <?php echo $id_dosen?>
                        </option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Mahasiswa <?php echo form_error('nama_mahasiswa') ?></label>
             <select name="id_mahasiswa" class="form-control">
            <option value="" >Nama Mahasiswa </option>
                <?php if ($list_mahasiswa):?>
                <?php foreach ($list_mahasiswa as $lm):?>
                <option value="<?php echo $lm->id_mahasiswa?>" <?php if($lm->id_mahasiswa==$id_mahasiswa){echo "selected";}?>><?php echo $lm->nama_mahasiswa?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <!--
       <div class="form-group">
            <label for="int">Id Mahasiswa <?php echo form_error('id_mahasiswa') ?></label>
            <select name="id_mahasiswa" class="form-control">
                <option value="" >NPM Mahasiswa </option>
                <?php if ($list_mahasiswa):?>
                    <?php foreach ($list_mahasiswa as $lm):?>
                        <option value="<?php echo $lm->id_mahasiswa?>"><?php echo $lm->npm?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
    -->
    <!--
	    <div class="form-group">
            <label for="enum">Tingkat <?php echo form_error('tingkat') ?></label>
            <select name="id_mahasiswa" class="form-control">
                <option value="" >Tingkat </option>
                <?php if ($list_mahasiswa):?>
                    <?php foreach ($list_mahasiswa as $lm):?>
                        <option value="<?php echo $lm->id_mahasiswa?>"><?php echo $lm->tingkat?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
    -->
 <input type="hidden" name="id_plotting_pembimbing" value="<?php echo $id_plotting_pembimbing; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('plotting_pembimbing') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
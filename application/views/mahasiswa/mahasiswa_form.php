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
    <h3 class="box-title">Create Data Mahasiswa</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">

        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Npm <?php echo form_error('npm') ?></label>
            <input type="text" class="form-control" name="npm" id="npm" placeholder="Npm" value="<?php echo $npm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Mahasiswa <?php echo form_error('nama_mahasiswa') ?></label>
            <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahasiswa" value="<?php echo $nama_mahasiswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum"> Tingkat <?php echo form_error('tingkat') ?></label>
            <div class="radio">
                    <label>
                      <input type="radio" name="tingkat" id="tingkat" value="1"   class="flat-red"checked> 1</label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tingkat" id="tingkat" value="2"   class="flat-red"checked> 2</label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tingkat" id="tingkat" value="3"   class="flat-red"checked> 3</label>
                  </div>
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('Jenis_Kelamin') ?></label>
            <div class="radio">
                    <label>
                      <input type="radio" name="Jenis_Kelamin" id="Jenis_Kelamin" value="L"   class="flat-red"checked>
                     Laki-Laki
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="Jenis_Kelamin" id="Jenis_Kelamin" value="P">
                    Perempuan
                    </label>
                  </div>
        </div>
	    <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
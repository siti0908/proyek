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
    <!-- Create Dosen -->
    <form action="<?php echo $action; ?>" method="post">
  <div class="box box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Create Data User</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">
    <div class="form-group">
        <label for="int">Username <?php echo form_error('username') ?></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Password <?php echo form_error('password') ?></label>
        <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
    </div>
	<div class="form-group">
        <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">NPM (isi jika Mahasiswa)<?php echo form_error('npm') ?></label>
        <input type="text" class="form-control" name="npm" id="npm" placeholder="NPM" value="<?php echo $npm; ?>" />
    </div>
	<div class="form-group">
            <label for="enum">Hak Akses <?php echo form_error('hak_akses') ?></label>
            <div class="radio">
                    <label>
                      <input type="radio" name="hak_akses" id="hak_akses" value="K"   class="flat-red"checked>
                      Koordinator
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hak_akses" id="hak_akses" value="P">
                     Ka. Prodi
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hak_akses" id="hak_akses" value="M">
                     Mahasiswa
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hak_akses" id="hak_akses" value="D">
                    Dosen
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hak_akses" id="hak_akses" value="S">
                     Staf Prodi
                    </label>
                  </div>
                </div>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>
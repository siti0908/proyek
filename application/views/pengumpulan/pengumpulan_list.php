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
        <h2 style="margin-top:0px">Pengumpulan Dokumen Sidang</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pengumpulan/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('pengumpulan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pengumpulan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
      <!-- Data pengumpulan-->
    <div class="box">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped  table-sm" cellspacing="0" width="100%">
<thead>
<tr>
                <th>No</th>
                <th>NPM Mahasiswa</th>
                <th>Nama Mahasiswa</th>
                
                <th>Tanggal Kumpul</th>
                 <th>Judul</th>
                  <th>Pembimbing</th>
                <th>Proposal</th>
                <th>Laporan</th>
                <th>Dpl</th>
                <th>Buku Bimbingan</th>
                <th><center>Action</center></th>
            </tr></thead><?php
            foreach ($pengumpulan_data as $pengumpulan)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td ><?php echo $pengumpulan->npm ?></td>
            <td><?php echo $pengumpulan->nama_mahasiswa ?></td>
            <td><?php echo $pengumpulan->tanggal_kumpul ?></td>
            <td><?php echo $pengumpulan->judul ?></td>
            <td><?php echo $pengumpulan->pembimbing ?></td>

            <td><a target="_blank" href="<?=base_url('assets/file/proposal/'.$pengumpulan->proposal)?>"><?php echo $pengumpulan->proposal ?></a></td>

            <td> <a target="_blank" href="<?=base_url('assets/file/proposal/'.$pengumpulan->laporan)?>"><?php echo $pengumpulan->laporan?></a></td>

            <td> <a target="_blank" href="<?=base_url('assets/file/proposal/'.$pengumpulan->dpl)?>"><?php echo $pengumpulan->dpl?></a></td>

            <td><a target="_blank" href="<?=base_url('assets/file/proposal/'.$pengumpulan->buku_bimbingan)?>"><?php echo $pengumpulan->buku_bimbingan ?></a></td>


           
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('pengumpulan/update/'.$pengumpulan->id_pengumpulan),'Update'); 
                echo ' | ';
                echo anchor(site_url('pengumpulan/delete/'.$pengumpulan->id_pengumpulan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
</div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-danger">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

    </body>
</html>
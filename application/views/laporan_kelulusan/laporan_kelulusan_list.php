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
    <?php
$SqlPeriode ="";
$awalTgl="";
$akhirTgl="";
$tglAwal="";
$tglAkhir="";
if(isset($_POST['btnTampil'])) {
    $tglAwal = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-".date('m-Y');
    $tglAkhir = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
    $SqlPeriode = "where A.tgl_pembayaran BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
}
else {
    $awalTgl = "01-".date('m-Y');
    $akhirTgl = date('d-m-Y');

    $SqlPeriode = "where A.tgl_pembayaran BETWEEN '".$awalTgl."' AND '".$akhirTgl."'";
}
?>
<body>
        <h2 style="margin-top:0px">Laporan List</h2>
        <div class="container-fluid">
            <h4>Periode Tanggal <b><?php echo ($tglAwal); ?></b> s/d  <b><?php echo ($tglAkhir); ?></b></h4>
            <div class="card shadow">
                <div class="card-header py-3">
</div>
<div class="card-body">
    <form action="<?php echo site_url('Laporan_kelulusan/tampillaporan'); ?>" method="post" name="form10" target="_self">
    <div class="row">
        <div class="col-lg-3">
            <input name="txtTglAwal" type="date" class="form-control" value="<?php echo $awalTgl; ?>" size="10"/>
</div>
<div class="col-lg-3">
            <input name="txtTglAkhir" type="date" class="form-control" value="<?php echo $akhirTgl; ?>" size="10"/>
</div>
<div class="col-lg-3">
            <input name="Tampil" class="btn btn-success" type="submit" value="Tampilkan"/>
</div>
</div>
<br>
</form>
    <body>

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
		<th>Tanggal Sidang</th>
		<th>Id Mahasiswa</th>
		<th>Id Dosen</th>
		<th>Id Penguji</th>
		<th>Hasil Keputusan Sidang</th>
		<th>Catatan</th>
            </tr><?php
            foreach ($laporan_kelulusan_data as $laporan_kelulusan)
            {
                ?>
                <tr>
			
			<td><?php echo $laporan_kelulusan->tanggal_sidang ?></td>
			<td><?php echo $laporan_kelulusan->id_mahasiswa ?></td>
			<td><?php echo $laporan_kelulusan->id_dosen ?></td>
			<td><?php echo $laporan_kelulusan->id_penguji ?></td>
			<td><?php echo $laporan_kelulusan->hasil_keputusan_sidang ?></td>
			<td><?php echo $laporan_kelulusan->catatan ?></td>
		</tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
<?php include "views/header.php" ?>
  <body>
    <nav class="navbar navbar-rachmi navbar-fixed-top">
      <div class="col-lg-12">
        <div class="navbar-header">
          <a class="navbar-brand">RSKIA RACHMI</a>
        </div>
    </div>
  </nav>
    <nav>
    <div id="wrapper">
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Jadwal <small>Dokter</small></h1>
            <ol class="breadcrumb">
              <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li class="active"><i class="fa fa-list"></i> Jadwal</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-xs-12"><h4 class="bluetext"><b>Dokter Spesialis Anak</b></h4>
		        <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Dokter</th>
                    <th><center>Senin</th>
                    <th><center>Selasa</th>
                    <th><center>Rabu</th>
                    <th><center>Kamis</th>
                    <th><center>Jumat</th>
                    <th><center>Sabtu</th>
                    <th><center>Minggu</th>
                   </tr>
                </thead>
                <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,
                      "SELECT *, dokter.nama_dokter
                      FROM jadwal, dokter
                      WHERE jadwal.id_dokter=dokter.id_dokter
                      AND jadwal.sp=2 ORDER BY jadwal.id_dokter ASC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                <tbody>
                  <tr>
                  	<td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nama_dokter']; ?></td>
                    <td><center><?php echo $d['sen']; ?></td>
                    <td><center><?php echo $d['sel']; ?></td>
                    <td><center><?php echo $d['rab']; ?></td>
                    <td><center><?php echo $d['kam']; ?></td>
                    <td><center><?php echo $d['jum']; ?></td>
                    <td><center><?php echo $d['sab']; ?></td>
                    <td><center><?php echo $d['min']; ?></td>
                  </tr>
                </tbody>
            <?php }?>
                  </table>
             </div>
             <div class="col-xs-12"><h4 class="bluetext"><b>Dokter Spesialis Kebidanan dan Kandungan</b></h4>
		        <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Dokter</th>
                    <th><center>Senin</th>
                    <th><center>Selasa</th>
                    <th><center>Rabu</th>
                    <th><center>Kamis</th>
                    <th><center>Jumat</th>
                    <th><center>Sabtu</th>
                    <th><center>Minggu</th>
                   </tr>
                </thead>
                <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,
                      "SELECT *, dokter.nama_dokter
                      FROM jadwal, dokter
                      WHERE jadwal.id_dokter=dokter.id_dokter
                      AND jadwal.sp=1 ORDER BY jadwal.id_dokter ASC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                <tbody>
                  <tr>
                  	<td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nama_dokter']; ?></td>
                    <td><center><?php echo $d['sen']; ?></td>
                    <td><center><?php echo $d['sel']; ?></td>
                    <td><center><?php echo $d['rab']; ?></td>
                    <td><center><?php echo $d['kam']; ?></td>
                    <td><center><?php echo $d['jum']; ?></td>
                    <td><center><?php echo $d['sab']; ?></td>
                    <td><center><?php echo $d['min']; ?></td>
                  </tr>
                </tbody>
            <?php }?>
                  </table>
             </div>
             <div class="col-xs-12"><h4 class="bluetext"><b>Dokter Spesialis Bedah</b></h4>
		        <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Dokter</th>
                    <th><center>Senin</th>
                    <th><center>Selasa</th>
                    <th><center>Rabu</th>
                    <th><center>Kamis</th>
                    <th><center>Jumat</th>
                    <th><center>Sabtu</th>
                    <th><center>Minggu</th>
                   </tr>
                </thead>
                <tbody>
                  <tr>
                  	<td><center>1</td>
                    <td><center>Tri Sudaryono., Sp.B .dr></td>
                    <td><center>09.00 - 12.00</td>
                    <td><center></td>
                    <td><center>09.00 - 12.00</td>
                    <td><center></td>
                    <td><center>09.00 - 12.00</td>
                    <td><center></td>
                    <td><center></td>
                  </tr>
                </tbody>
                  </table>
                  <br><div align="right"><p>Diperbarui Januari 2020</p></div>
             </div>
            </div>
           </div>
		   </div></div></div></div>
        </div>
      </div>
    <?php include "../copyright.php";?>
    </div><!-- /.row -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php" ?>
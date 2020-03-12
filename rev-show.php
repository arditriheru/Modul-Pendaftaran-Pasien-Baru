<?php include "views/header.php" ?>
  <body>
    <nav class="navbar navbar-rachmi navbar-fixed-top">
      <div class="col-lg-12">
        <div class="navbar-header">
          <a class="navbar-brand">RSKIA RACHMI</a>
        </div>
    </div>
  </nav>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Detail <small>Reservasi</small></h1>
            <ol class="breadcrumb">
              <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li class="active"><i class="fa fa-flash"></i> Detail</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
              <tbody>
            <?php 
              include '../koneksi.php';
              $id_catatan_medik = $_POST['id_catatan_medik'];
              $booking_tanggal = $_POST['booking_tanggal'];
              
              $pesan=array();
              if(isset($_POST['submit'])){
              include '../koneksi.php';
              $a = mysqli_query($koneksi,
                  "SELECT COUNT(*) AS cek
                  FROM booking
                  WHERE id_catatan_medik='$id_catatan_medik'
                  AND booking_tanggal='$booking_tanggal';");
              while($b = mysqli_fetch_array($a)){
                $cek = $b['cek'];
              }if($cek==0){
                echo "<script>alert('Data Tidak Ditemukan!!');document.location='rev-show'</script>";
              }else{
                $data = mysqli_query($koneksi,
                  "SELECT *, dokter.nama_dokter, sesi.nama_sesi
                  FROM booking, dokter, sesi
                  WHERE booking.id_dokter=dokter.id_dokter
                  AND booking.id_sesi=sesi.id_sesi
                  AND booking.id_catatan_medik=$id_catatan_medik
                  AND booking.booking_tanggal='$booking_tanggal'
                  ORDER BY id_booking ASC");
                include "date-format.php";
              while($d = mysqli_fetch_array($data)){
            ?>
              <tr>
                  <td><h5 class="bluetext"><b>Kode</h5></td>
                  <td><h5 class="bluetext"><b><?php echo $d['id_booking']; ?></h5></td>
              </tr>
              <tr>
                  <td>Nomor RM</td>
                  <td><?php echo $d['id_catatan_medik']; ?></td>
              </tr>
              <tr>
                  <td>Nama</td>
                  <td><?php echo $d['nama']; ?></td>
              </tr>
              <!--<tr>
                  <td>Alamat</td>
                  <td><?php echo $d['alamat']; ?></td>
              </tr>
              <tr>
                  <td>Kontak</td>
                  <td><?php echo $d['kontak']; ?></td>
              </tr>-->
              <tr>
                  <td>Dokter</td>
                  <td><?php echo $d['nama_dokter']; ?></td>
              </tr>
              <tr>
                  <td>Jadwal</td>
                  <td><?php echo format_indo($d['booking_tanggal']); ?></td>
              </tr>
              <tr>
                  <td>Sesi</td>
                  <td><?php echo $d['nama_sesi']; ?></td>
              </tr>
              <tr>
                  <td>Reservasi</td>
                  <td><?php echo format_indo($d['tanggal']); ?> / <?php echo $d['jam']; ?></td>
              </tr>
              <!--<tr>
                  <td>Keterangan</td>
                  <td><?php echo $d['keterangan']; ?></td>
              </tr>-->
              <?php 
                }}}
              ?>
            </tbody>
            </table>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
      <br><br><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php" ?>
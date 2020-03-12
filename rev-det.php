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
            <h1>Detail <small>Booking</small></h1>
            <ol class="breadcrumb">
              <li><a href="index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-search"></i> Riwayat</li>
              <li class="active"><i class="fa fa-flash"></i> Detail</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="table-responsive">
            <?php 
              include '../koneksi.php';
              $id_booking = $_GET['id'];
              $data = mysqli_query($koneksi,
                  "SELECT *, dokter.nama_dokter, sesi.nama_sesi,
                  IF (booking.status='1', 'Datang', 'Belum Datang') AS status
                  FROM booking, dokter, sesi
                  WHERE booking.id_dokter=dokter.id_dokter
                  AND booking.id_sesi=sesi.id_sesi
                  AND booking.id_booking=$id_booking;");
                include "date-format.php";
              while($d = mysqli_fetch_array($data)){
            ?>
            <table class="table table-bordered table-hover table-striped tablesorter">
              <tbody>
              <tr>
                  <td>Nomor RM</td>
                  <td><?php echo $d['id_catatan_medik']; ?></td>
              </tr>
              <tr>
                  <td>Nama</td>
                  <td><?php echo $d['nama']; ?></td>
              </tr>
              <tr>
                  <td>Alamat</td>
                  <td><?php echo $d['alamat']; ?></td>
              </tr>
              <tr>
                  <td>Kontak</td>
                  <td><?php echo $d['kontak']; ?></td>
              </tr>
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
              <tr>
                  <td>Keterangan</td>
                  <td><?php echo $d['keterangan']; ?></td>
              </tr>
              <?php 
                }
              ?>
            </tbody>
            </table>
            </div>
          </div>
        </div><!-- /.row -->
      </div><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php" ?>
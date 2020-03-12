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
          <div class="col-lg-6">
            <h1>Form <small>Pendaftaran</small></h1>
            <ol class="breadcrumb">
              <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li><a href="reservasi"><i class="fa fa-list"></i> Data Pasien</a></li>
              <li class="active"><i class="fa fa-edit"></i> Reservasi</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <?php
              session_start();
              include '../koneksi.php';
              $id_catatan_medik = $_GET['rm'];
              $data = mysqli_query($koneksi,
                  "SELECT * FROM mr_pasien WHERE id_catatan_medik=$id_catatan_medik;");
              while($d = mysqli_fetch_array($data)){
            ?>
            <?php
              if(isset($_POST['submit'])){
                include '../koneksi.php';
                date_default_timezone_set("Asia/Jakarta");
                $tanggal=date('Y-m-d');
                $jam=date("h:i:sa");
                // menangkap data yang di kirim dari form
                $id_catatan_medik = $_POST['id_catatan_medik'];
                $nama             = $_POST['nama'];
                $alamat           = $_POST['alamat'];
                $kontak           = $_POST['kontak'];
                $id_dokter        = $_POST['id_dokter'];
                $booking_tanggal  = $_POST['booking_tanggal'];
                $id_sesi          = $_POST['id_sesi'];
                $tanggal          = $tanggal;
                $jam              = $jam;
                $status           = '2';
                $keterangan       = $_POST['keterangan'];

                 $a = mysqli_query($koneksi,
                  "SELECT COUNT(*) AS antrian
                  FROM booking
                  WHERE id_dokter='$id_dokter'
                  AND booking_tanggal='$booking_tanggal'
                  AND id_sesi='$id_sesi';");
                  while($b = mysqli_fetch_array($a)){

                $antrian       =  $b['antrian']+1;

                $error=array();
                if (empty($id_catatan_medik)){
                  $error['id_catatan_medik']='Nomor RM Harus Diisi!!!';
                }if (empty($nama)){
                  $error['nama']='Nama Harus Diisi!!!';
                }if (empty($alamat)){
                  $error['alamat']='Alamat Harus Diisi!!!';
                }if (empty($kontak)){
                  $error['kontak']='Kontak Harus Diisi!!!';
                }if (empty($id_dokter)){
                  $error['id_dokter']='Dokter Harus Diisi!!!';
                }if (empty($booking_tanggal)){
                  $error['booking_tanggal']='Tanggal Harus Diisi!!!';
                }if (empty($id_sesi)){
                  $error['id_sesi']='Sesi Harus Diisi!!!';
                }if(empty($error)){
                  $c = mysqli_query($koneksi,
                  "SELECT COUNT(*) AS cek
                  FROM booking
                  WHERE id_catatan_medik = $id_catatan_medik
                  AND id_dokter = $id_dokter
                  AND id_sesi = $id_sesi
                  AND booking_tanggal = '$booking_tanggal';");
                  while($d = mysqli_fetch_array($c)){
                  $cek       =  $d['cek'];
                }if($cek>0){
                  echo "<script>alert('Hanya Boleh Sekali!!!');document.location='rev-add?rm=$id_catatan_medik'</script>";
                }else{
                  $simpan=mysqli_query($koneksi,"INSERT INTO booking (id_booking, nama, alamat, kontak, id_catatan_medik, booking_tanggal, tanggal, jam, status, keterangan, id_dokter, id_sesi)
                    VALUES('','$nama','$alamat',
                  '$kontak','$id_catatan_medik','$booking_tanggal','$tanggal','$jam','$status','$keterangan',
                  '$id_dokter','$id_sesi')");
                }
                if($simpan){
                echo "<script>alert('Mendaftar Antrian Nomor : $antrian');document.location='index'</script>";
                }else{
                echo "<script>alert('Gagal Mendaftar! Hilangkan Tanda Petik Pada Nama Pasien!');document.location='index'</script>";
                  }
                }
              }
            }
          ?><?php echo $cetak ?>
            <form method="post" action="" role="form">
              <div class="form-group">
                <label>No.Rekam Medik</label>
                <input class="form-control" type="text" name="id_catatan_medik"
                value="<?php echo $d['id_catatan_medik']; ?>" readonly>
                <p style="color:red;"><?php echo ($error['id_catatan_medik']) ? $error['id_catatan_medik'] : ''; ?></p>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input class="form-control" type="text" name="nama"
                value="<?php echo $d['nama']; ?>" readonly>
                <p style="color:red;"><?php echo ($error['nama']) ? $error['nama'] : ''; ?></p>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" type="text" name="alamat"
                value="<?php echo $d['alamat']; ?>" required="">
                <p style="color:red;"><?php echo ($error['alamat']) ? $error['alamat'] : ''; ?></p>
              </div>
              <div class="form-group">
                <label>Kontak</label>
                <input class="form-control" type="text" name="kontak"
                value="<?php echo $d['telp']; ?>" required="">
                <p style="color:red;"><?php echo ($error['kontak']) ? $error['kontak'] : ''; ?></p>
              </div>
              <div class="form-group">
                <label>Dokter</label>
                <select class="form-control" type="text" name="id_dokter"
                value="<?php echo $d['id_dokter']; ?>" required="">
                <p style="color:red;"><?php echo ($error['id_dokter']) ? $error['id_dokter'] : ''; ?></p>
                  <option disabled selected>Pilih</option>
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,
                      "SELECT * FROM dokter;");
                    while($d = mysqli_fetch_array($data)){
                    echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']."</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Untuk Tanggal</label>
                <input class="form-control" type="date" name="booking_tanggal"
                value="<?php echo $d['booking_tanggal']; ?>" required="">
                <p style="color:red;"><?php echo ($error['booking_tanggal']) ? $error['booking_tanggal'] : ''; ?></p>
              </div>
              <div class="form-group">
                <label>Sesi</label>
                <select class="form-control" type="text" name="id_sesi"
                value="<?php echo $d['id_sesi']; ?>" required="">
                <p style="color:red;"><?php echo ($error['id_sesi']) ? $error['id_sesi'] : ''; ?></p>
                  <option disabled selected>Pilih</option>
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,
                      "SELECT * FROM sesi;");
                    while($d = mysqli_fetch_array($data)){
                    echo "<option value='".$d['id_sesi']."'>".$d['nama_sesi']."</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="keterangan" placeholder="Masukkan..">
              </div>
              <button type="submit" name="submit" class="btn btn-success">Daftar</button>
              <button type="reset" class="btn btn-warning">Reset</button>  
            </form>
          </div>
        </div><!-- /.row -->
      <?php } ?>
      </div><br><br><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php" ?>
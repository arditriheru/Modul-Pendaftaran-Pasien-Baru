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
            <h1>Data <small>Pasien</small></h1>
            <ol class="breadcrumb">
              <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li class="active"><i class="fa fa-list"></i> Data Pasien</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <?php
              if(isset($_POST['submit'])){
                include '../koneksi.php';
                // menangkap data yang di kirim dari form
                $id_catatan_medik = $_POST['id_catatan_medik'];
                $tgl_lahir        = $_POST['tgl_lahir'];

                $error=array();
                if (empty($id_catatan_medik)){
                  $error['id_catatan_medik']='Nomor RM Harus Diisi!!!';
                }if (empty($tgl_lahir)){
                  $error['tgl_lahir']='Tanggal Lahir Harus Diisi!!!';
                }if(empty($error)){
                  $id_catatan_medik = $_POST['id_catatan_medik'];
                  $tgl_lahir        = $_POST['tgl_lahir'];
                  // menyeleksi data admin dengan username dan password yang sesuai
                  $data = mysqli_query($koneksi,"SELECT * FROM mr_pasien 
                    WHERE id_catatan_medik='$id_catatan_medik' AND tgl_lahir='$tgl_lahir'");
                  // menghitung jumlah data yang ditemukan
                  $cek = mysqli_num_rows($data);
                if($cek > 0){
                  $_SESSION['id_catatan_medik'] = $id_catatan_medik;
                  $_SESSION['status'] = "login";
                header("location:rev-add?id=$id_catatan_medik");
                }else{
                echo "<script>alert('Verifikasi Gagal!!!');document.location='index'</script>";
                  }
                }
              }
            ?>
            <form method="post" action="" role="form">
              <div class="form-group">
                <label>No. Rekam Medik</label>
                <input class="form-control" type="text" name="id_catatan_medik"
                placeholder="Masukkan Nomor Rekam Medik Anda" required="">
                <p style="color:red;"><?php echo ($error['id_catatan_medik']) ? $error['id_catatan_medik'] : ''; ?></p>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" required="">
                <p style="color:red;"><?php echo ($error['tgl_lahir']) ? $error['tgl_lahir'] : ''; ?></p>
              </div>
              <button type="submit" name="submit" class="btn btn-success">Lanjut</button>
            </form>
          </div>
        </div><!-- /.row -->
      </div><br><br><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php" ?>
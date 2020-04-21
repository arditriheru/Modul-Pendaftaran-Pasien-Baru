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
            <div class="row">
              <div class="col-xs-12"><h4 class="bluetext"><b>Ketentuan Umum Pendaftaran Online</b></h4>
		        <div class="row tac">
				  <div class="col-lg-12">
				    <ol>
				      <li>Pendaftaran Online sementara ini hanya berlaku bagi Pasien yang telah memiliki No RM RSKIA Rachmi yang akan berobat Rawat Jalan.</li>
				      <li>Bagi pasien baru yang belum pernah mendaftar di RSKIA Rachmi harap datang langsung ke bagian pendaftaran.</li>
				      <li>Pendaftaran Online dapat dilakukan untuk kontrol Poli dengan Jadwal H+1 s.d H+30 dari hari mendaftar dengan memasukkan : Nomor RM , Tanggal Lahir, Pilihan Hari Kontrol dan Dokter untuk poli reguler. Dokter yang ditunjuk adalah dokter DPJP (Dokter Penanggung Jawab Pelayanan).</li>
				      <li>Pendaftaran untuk H-1 Maksimal dapat dilakukan sebelum jam 14.00, setelah jam tersebut pasien mendaftar di hari berikutnya. Untuk pendaftaran pemeriksaan hari senin minimal dilakukan pada hari jumat sebelum jam 14:00 WIB.</li>
				      <li>Pasien di hari yang sama hanya dapat mendaftar 1 kali dengan 1 dokter.</li>
				      <li>Jadwal Dokter dapat berubah sewaktu waktu.</li>
				      <li>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan Bukti pendaftaran yang dapat di (screenshot) dan ditunjukkan pada Hari Berobat.</li>
				      <li>Apabila Anda ingin melihat kembali Bukti Pendaftaran Online setelah mendaftar Cetak Ulang Reservasi pada form di halaman ini.</li>
				      <li>No Antrian Periksa dokter adalah sesuai dengan urutan ketika melakukan reservasi ulang.</li>
				      <li>Untuk kasus Gawat Darurat silakan datang ke IGD RRSKIA Rachmi.</li>
				      <li>Bukti Pendaftaran Online dibawa di loket Pendaftaran RSKIA Rachmi.</li>
				      <li>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu (Minimal 1 jam sebelum jadwal Poli Dokter).</li>
				      <li>Pasien yang tidak datang dan tidak melakukan registrasi ulang minimal 1 jam sebelum jadwal dokter akan otomatis terhapus sistem pendaftarannya dan antrian dapat digantikan pasien lain.</li>
				    </ol>
				  </div>
				</div>
             </div>
            </div>
           </div>
              <div class="col-xs-12"><br><br><br>
					<div class="col-md-12 visible-md visible-lg">
						<div class="well text-center">
							<a href="schedule" class="btn btn-warning">Lihat Jadwal Dokter</a>
							Atau
							<a href="reservasi" class="btn btn-success">Lanjutkan Proses Pendaftaran</a>
						</div>
					</div>
					<div class="col-xs-12 hidden-md hidden-lg">
						<div class="well text-center">
				      <p><a href="schedule" class="btn btn-warning">Lihat Jadwal Dokter</a></p>
				      <p>Atau</p>
				      <p><a href="reservasi" class="btn btn-success">Lanjutkan Proses Pendaftaran</a></p>
				    </div>
					</div>
              </div><br>
              <div class="col-xs-12">
              <div class="col-md-12">
          <div class="well text-center">
            <form method="post" action="rev-show?id=<?php echo $id;?>" role="form">
            	<div class="col-lg-6">
              		<div class="form-group">
		                <label>Nomor Rekam Medik</label>
		                <input class="form-control" type="text" name="id_catatan_medik" required="" placeholder="Masukkan Nomor Rekam Medik Anda">
              		</div>
              	</div>
              	<div class="col-lg-6">
              		<div class="form-group">
		                <label>Jadwal Poli</label>
		                <input class="form-control" type="date" name="booking_tanggal" required="" placeholder="Tanggal">
		            </div>
		            </div>
          <button width="100%" type="submit" name="submit" class="btn btn-primary">Cetak Ulang Reservasi</button>
      		</form>
             </div>
           </div>
         </div>
           </div>
         </div>
        </div>
      </div>
    <br><br><br><?php include "../arditriheru/copyright.php";?>
    </div><!-- /.row -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php" ?>
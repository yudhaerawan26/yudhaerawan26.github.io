<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$module = isset($_GET['module']) ? $_GET['module'] : '';
if($module=="home") {
	$qberanda = mysqli_query($colok, "SELECT judul, isi_halaman FROM halamanstatis WHERE id_halaman=1");
	$b = mysqli_fetch_array($qberanda);
	echo "<h2 class=\"page-header\">$b[judul]</h2>";
	echo "$b[isi_halaman]";
}

elseif($module=="pendaftaran") {
	$tanggal_saiki = date("Y-m-d H:i:s");
	$qset = mysqli_query($colok, "SELECT pendaftaran FROM setting WHERE id_setting=1");
	$st = mysqli_fetch_array($qset);
	$tp = explode(" - ",$st['pendaftaran']);
	//--pendaftaran awal
	$tpb = explode(" ",$tp[0]); // memisahkan menjadi tanggal dan jam
	$ttpb = explode("/",$tpb[0]); // mecah tanggal
	$jpb = explode(":",$tpb[1]); // mecah jam

	//$jamb="";
	if ($tpb[2] == "PM" AND $jpb[0] < 12) {
		$jam = $jpb[0] + 12;
	}
	elseif ($tpb[2] == 'AM') {
		$jam = $jpb[0];
		
	}
	else {
		$jam = $jpb[0];
	}
	$jamb = $ttpb[2]."-".$ttpb[1]."-".$ttpb[0]." ".$jam.":".$jpb[1].":00";

	//--pendaftaran akhir
	$tpe = explode(" ",$tp[1]); // memisahkan menjadi tanggal dan jam
	$ttpe = explode("/",$tpe[0]); // mecah tanggal
	$jpe = explode(":",$tpe[1]);
	//$jame="";
	if ($tpe[2] == "PM" AND $jpe[0] < 12) {
		$jams = $jpe[0] + 12;
	}
	elseif ($tpe[2] == 'AM') {
		$jams = $jpe[0];
	}
	else {
		$jams = $jpe[0];
	}
	$jame = $ttpe[2]."-".$ttpb[1]."-".$ttpe[0]." ".$jams.":".$jpe[1].":00";

	if($tanggal_saiki < $jamb) {
?>
		<div class="callout callout-info">
			<h4>PENDAFTARAN BELUM DIBUKA</h4>
			<p>Pendaftaran Peserta Didik Baru Dibuka mulai tanggal <?php echo $tp[0]; ?></p>
		</div>
<?php
	}
	elseif($tanggal_saiki>$jame){
?>
		<div class="callout callout-danger">
			<h4>PENDAFTARAN SUDAH TUTUP</h4>
			<p>Pendaftaran Peserta Didik Baru sudah diTUTUP tanggal <?php echo $tp[1]; ?></p>
		</div>
<?php
	}
	elseif(($tanggal_saiki >= $jamb) AND ($tanggal_saiki<=$jame)) {
?>

	<center><h2 class="page-header">FORMULIR PENDAFTARAN PESERTA MAGANG 2021</h2></center>
	<form method="post" action="<?php echo $d['alamat_website']; ?>/aksipendaftaran.html" class="form-horizontal">
		<div class="nav-tabs-custom">
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<h3 class="page-header">A. Data Mahasiswa</h3>
					<center><h5>(Kolom bertanda (*) Wajib Diisi)</h5></center><br>
					<div class="form-group">
						<label for="namalengkap" class="col-sm-3 control-label">Nama Lengkap *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="namalengkap" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" name="namalengkap" placeholder="Nama Lengkap" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="jk" class="col-sm-3 control-label">Jenis Kelamin *</label>
						<div class="col-sm-9">
							<input type="radio" name="jk" class="minimal" value="L" checked> &nbsp;Laki-laki &nbsp;
							<input type="radio" name="jk" class="minimal" value="P"> &nbsp;Perempuan
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="ttl" class="col-sm-3 control-label">Tempat, Tanggal Lahir *</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="tempatlahir" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" name="tempatlahir" placeholder="Tempat Lahir" required />
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="tgllahir" autocomplete="off" name="tgllahir" placeholder="Tanggal Lahir" required /> Ex: 20-08-2001
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="agama" class="col-sm-3 control-label">Agama *</label>
						<div class="col-sm-4">
							<select class="form-control" id="agama" name="agama" placeholder="Agama" required>
								<?php
								$qa = mysqli_query($colok, "SELECT * FROM agama");
								while($a=mysqli_fetch_array($qa)) {
									echo "<option value=\"$a[id_agama]\">$a[nm_agama]</option>";
								}
								?>
							</select>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="anakke" class="col-sm-3 control-label">Anak Ke *</label>
						<label class="col-sm-2">
							<input type="number" class="form-control" autocomplete="off" value="0" id="anakke" name="anakke" required />
						</label>
						<label for="jmlsdr" class="col-sm-1 control-label">Dari</label>
						<label class="col-sm-2">
							<input type="number" class="form-control" value="0" autocomplete="off" id="jmlsdr" name="jmlsdr">
						</label>
						<label for="jmlsdr" class="col-sm-2 control-label">Bersaudara</label>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="alamatlengkap" class="col-sm-3 control-label">Alamat Lengkap *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="alamatlengkap" onkeyup="this.value = this.value.toUpperCase()" name="alamatlengkap" placeholder="Kampung / Jalan" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="rt" class="col-sm-offset-3 col-sm-1 control-label">RT *</label>
						<label class="col-sm-2">
							<input type="number" class="form-control" value="0" autocomplete="off" id="rt" name="rt" required />
						</label>
						<label for="rw" class="col-sm-1 control-label">RW *</label>
						<label class="col-sm-2">
							<input type="number" class="form-control" value="0" autocomplete=" off" id="rw" name="rw" required />
						</label>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="kelurahan" class="col-sm-3 control-label">Kelurahan / Desa *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="kelurahan" onkeyup="this.value = this.value.toUpperCase()" name="kelurahan" placeholder="Kelurahan / Desa" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="kecamatan" class="col-sm-3 control-label">Kecamatan *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="kecamatan" onkeyup="this.value = this.value.toUpperCase()" name="kecamatan" placeholder="Kecamatan" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="kabupaten" class="col-sm-3 control-label">Kota / Kabupaten *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="kabupaten" onkeyup="this.value = this.value.toUpperCase()" name="kabupaten" placeholder="Kota / Kabupaten" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="kodepos" class="col-sm-3 control-label">Kodepos </label>
						<div class="col-sm-2">
							<input type="number" class="form-control" value="0" autocomplete="off" id="kodepos" onkeypress="return hanyaAngka(event)" name="kodepos" placeholder="Kode"/>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="nohp" class="col-sm-3 control-label">No HP *</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" value="0" autocomplete="off" onkeypress="return hanyaAngka(event)" id="nohp" name="nohp" placeholder="Min. 11 Max. 12 (Angka)" required />
							<script>
			function hanyaAngka(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode
				 if (charCode > 31 && (charCode < 48 || charCode > 57))

					return false;
				return true;
			}
		</script>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email *</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" autocomplete="off" id="email"  name="email" placeholder="Email">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="tempattinggal" class="col-sm-3 control-label">Bertempat Tinggal di *</label>
						<div class="col-sm-9">
							<input type="radio" name="tempattinggal" class="minimal" value="Orang Tua" checked> &nbsp;Orang Tua &nbsp;
							<input type="radio" name="tempattinggal" class="minimal" value="Wali"> &nbsp;Wali / Saudara &nbsp;
							<input type="radio" name="tempattinggal" class="minimal" value="Asrama"> &nbsp;Asrama
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="#tab_2" data-toggle="tab" class="btn btn-primary">SELANJUTNYA</a> <br /><small><i>Kolom bertanda (*) Wajib Diisi</i></small>
						</div>
					</div> <!-- /.form-group -->
				</div><!-- /.tab-pane -->

				<!-- DATA SEKOLAH -->
				<div class="tab-pane" id="tab_2">
					<h3 class="page-header">B. Riwayat Pendidikan</h3>
					<center><h5>(Kolom bertanda (*) Wajib Diisi)</h5></center><br>
					<div class="form-group">
						<label for="namasekolah" class="col-sm-3 control-label">Nama Perguruan Tinggi*</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="namasekolah" onkeyup="this.value = this.value.toUpperCase()" name="namasekolah" placeholder="Nama Perguruan Tinggi" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="alamatsekolah" class="col-sm-3 control-label">Fakultas *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="alamatsekolah" onkeyup="this.value = this.value.toUpperCase()" name="alamatsekolah" placeholder="Fakultas" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="nisn" class="col-sm-3 control-label">Jurusan *</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" autocomplete="off" id="nisn" onkeyup="this.value = this.value.toUpperCase()" name="nisn" placeholder="Jurusan">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="#tab_1" data-toggle="tab" class="btn btn-success">SEBELUMNYA</a>
							<a href="#tab_3" data-toggle="tab" class="btn btn-primary">SELANJUTNYA</a> <br /><small><i>Kolom bertanda (*) Wajib Diisi</i></small>
						</div>
					</div> <!-- /.form-group -->
				</div><!-- /.tab-pane -->

				<!-- DATA PRIBADI ORTU AYAH -->
				<div class="tab-pane" id="tab_3">
					<h3 class="page-header">C. Data Orang Tua ( AYAH )</h3>
					<center><h5>(Kolom bertanda (*) Wajib Diisi)</h5></center><br>
					<div class="form-group">
						<label for="namaayah" class="col-sm-3 control-label">Nama Ayah *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="namaayah" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" name="namaayah" placeholder="Nama Ayah" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="ttlayah" class="col-sm-3 control-label">Tempat, Tanggal Lahir *</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="tempatlahirayah" onkeyup="this.value = this.value.toUpperCase()" name="tempatlahirayah" placeholder="Tempat Lahir Ayah" required />
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="tgllahirayah" name="tgllahirayah" placeholder="Tanggal Lahir" required /> Ex: 20-08-2001
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="alamatayah" class="col-sm-3 control-label">Alamat Lengkap *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="alamatayah" onkeyup="this.value = this.value.toUpperCase()" name="alamatayah" placeholder="ALamat Lengkap - Min. Kampung / Jalan" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="pekerjaanayah" class="col-sm-3 control-label">Pekerjaan *</label>
						<div class="col-sm-9">
							<?php
							ambildata("pekerjaan", "pekerjaanayah", "required");
							?>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="instansiayah" class="col-sm-3 control-label">Instansi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="instansiayah" onkeyup="this.value = this.value.toUpperCase()" name="instansiayah" placeholder="Instansi Tempat Bekerja (Boleh di Kosongkan)">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="penghasilanayah" class="col-sm-3 control-label">Penghasilan / Bulan *</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" value="0" id="penghasilanayah" name="penghasilanayah">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="pendidikanayah" class="col-sm-3 control-label">Pendidikan Terakhir *</label>
						<div class="col-sm-9">
							<select class="form-control" id="pendidikanayah" name="pendidikanayah" required>
								<?php
								$qpend = mysqli_query($colok, "SELECT * FROM pendidikan ORDER BY id_pendidikan DESC");
								while($p=mysqli_fetch_array($qpend)) {
									echo "<option value=\"$p[id_pendidikan]\">$p[nm_pendidikan]</option>";
								}
								?>
							</select>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="organisasiayah" class="col-sm-3 control-label">Pengalaman Berorganisasi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="organisasiayah" onkeyup="this.value = this.value.toUpperCase()" name="organisasiayah" placeholder="Nama Organisasi (Boleh di Kosongkan)">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="jabatanayah" class="col-sm-3 control-label">Jabatan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jabatanayah" onkeyup="this.value = this.value.toUpperCase()" name="jabatanayah" placeholder="Jabatan dalam Organisasi (Boleh di Kosongkan)">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="nohpayah" class="col-sm-3 control-label">No HP *</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" value="0" onkeypress="return hanyaAngka(event)" id="nohpayah" name="nohpayah">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="emailayah" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" id="emailayah" placeholder="Boleh di Kosongkan" name="emailayah">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="#tab_2" data-toggle="tab" class="btn btn-success">SEBELUMNYA</a>
							<a href="#tab_4" data-toggle="tab" class="btn btn-primary">SELANJUTNYA</a> <br /><small><i>Kolom bertanda (*) Wajib Diisi</i></small>
						</div>
					</div> <!-- /.form-group -->
				</div><!-- /.tab-pane -->

				<!-- DATA PRIBADI ORTU IBU -->
				<div class="tab-pane" id="tab_4">
					<h3 class="page-header">C. Data Orang Tua ( IBU )</h3>
					<center><h5>(Kolom bertanda (*) Wajib Diisi)</h5></center><br>
					<div class="form-group">
						<label for="namaibu" class="col-sm-3 control-label">Nama Ibu *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="namaibu" name="namaibu" placeholder="Nama Ibu" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="ttlibu" class="col-sm-3 control-label">Tempat, Tanggal Lahir *</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="tempatlahiribu" name="tempatlahiribu" placeholder="Tempat Lahir Ibu" required />
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="tgllahiribu" onkeyup="this.value = this.value.toUpperCase()" name="tgllahiribu" placeholder="Tanggal Lahir" required /> Ex: 20-08-2001
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="alamatibu" class="col-sm-3 control-label">Alamat Lengkap *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="alamatibu" onkeyup="this.value = this.value.toUpperCase()" name="alamatibu" placeholder="ALamat Lengkap - Min. Kampung / Jalan" required />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="pekerjaanibu" class="col-sm-3 control-label">Pekerjaan *</label>
						<div class="col-sm-9">
							<?php
							ambildata("pekerjaan", "pekerjaanibu", "required");
							?>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="instansiibu" class="col-sm-3 control-label">Instansi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="instansiibu" name="instansiibu" placeholder="Instansi Tempat Bekerja (Boleh di Kosongkan)">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="penghasilanibu" class="col-sm-3 control-label">Penghasilan / Bulan</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" value="0" id="penghasilanibu" name="penghasilanibu">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="pendidikanibu" class="col-sm-3 control-label">Pendidikan Terakhir *</label>
						<div class="col-sm-9">
							<select class="form-control" id="pendidikanibu" name="pendidikanibu" required>
								<?php
								$qpend = mysqli_query($colok, "SELECT * FROM pendidikan ORDER BY id_pendidikan DESC");
								while($p=mysqli_fetch_array($qpend)) {
									echo "<option value=\"$p[id_pendidikan]\">$p[nm_pendidikan]</option>";
								}
								?>
							</select>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="organisasiibu" class="col-sm-3 control-label">Pengalaman Berorganisasi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="organisasiibu" name="organisasiibu" placeholder="Nama Organisasi (Boleh di Kosongkan)">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="jabatanibu" class="col-sm-3 control-label">Jabatan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jabatanibu" onkeyup="this.value = this.value.toUpperCase()" name="jabatanibu" placeholder="Jabatan dalam Organisasi (Boleh di Kosongkan)">
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="nohpibu" class="col-sm-3 control-label">No HP *</label>
						<div class="col-sm-5">
							<input type="number" class="form-control"  value="0" onkeypress="return hanyaAngka(event)" id="nohpibu" name="nohpibu" placeholder="Boleh sama dengan Ayah" required/>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="emailibu" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" id="emailibu" placeholder="Boleh di Kosongkan" name="emailibu" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="#tab_3" data-toggle="tab" class="btn btn-success">SEBELUMNYA</a>
							<a href="#tab_5" data-toggle="tab" class="btn btn-primary">SELANJUTNYA</a> <br /><small><i>Kolom bertanda (*) Wajib Diisi</i></small>
						</div>
					</div> <!-- /.form-group -->
				</div><!-- /.tab-pane -->

				<!-- DATA PRIBADI ORTU WALI -->
				<div class="tab-pane" id="tab_5">
					<h3 class="page-header">C. Data Wali Siswa</h3>
					<center><h4>(KOSONGKAN JIKA ORANTUA (AYAH) MASIH DIDUP)</h4></center><br>
					<div class="form-group">
						<label for="namawali" class="col-sm-3 control-label">Nama Wali</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="namawali" onkeyup="this.value = this.value.toUpperCase()" name="namawali" placeholder="Nama Wali" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="ttlwali" class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="tempatlahirwali" onkeyup="this.value = this.value.toUpperCase()" name="tempatlahirwali" placeholder="Tempat Lahir Wali" />
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="tgllahirwali" onkeyup="this.value = this.value.toUpperCase()" name="tgllahirwali" placeholder="Tanggal Lahir" /> Ex: 20-08-2001
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="alamatwali" class="col-sm-3 control-label">Alamat Lengkap</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="alamatwali" onkeyup="this.value = this.value.toUpperCase()" name="alamatwali" placeholder="Alamat Lengkap" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="pekerjaanwali" class="col-sm-3 control-label">Pekerjaan</label>
						<div class="col-sm-9">
							<?php
							ambildata("pekerjaan", "pekerjaanwali", "required");
							?>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="instansiwali" class="col-sm-3 control-label">Instansi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="instansiwali" onkeyup="this.value = this.value.toUpperCase()" name="instansiwali" placeholder="Instansi Tempat Bekerja" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="penghasilanwali" class="col-sm-3 control-label">Penghasilan / Bulan</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" value="0" id="penghasilanwali" name="penghasilanwali" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="pendidikanwali" class="col-sm-3 control-label">Pendidikan Terakhir</label>
						<div class="col-sm-9">
							<select class="form-control" id="pendidikanwali" name="pendidikanwali">
								<?php
								$qpend = mysqli_query($colok, "SELECT * FROM pendidikan ORDER BY id_pendidikan DESC");
								while($p=mysqli_fetch_array($qpend)) {
									echo "<option value=\"$p[id_pendidikan]\">$p[nm_pendidikan]</option>";
								}
								?>
							</select>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="organisasiwali" class="col-sm-3 control-label">Pengalaman Berorganisasi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="organisasiwali" onkeyup="this.value = this.value.toUpperCase()" name="organisasiwali" placeholder="Nama Organisasi" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="jabatanwali" class="col-sm-3 control-label">Jabatan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jabatanwali" onkeyup="this.value = this.value.toUpperCase()" name="jabatanwali" placeholder="Jabatan dalam Organisasi" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="nohpwali" class="col-sm-3 control-label">No HP</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" onkeypress="return hanyaAngka(event)" id="nohpwali" name="nohpwali" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<label for="emailwali" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" id="emailwali" name="emailwali" />
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<a href="#tab_4" data-toggle="tab" class="btn btn-success">SEBELUMNYA</a>
							<input type="submit" class="btn btn-warning" id="daftar" name="daftar" value="DAFTAR SEKARANG" /> <br /><small><i>* Sebelum DAFTAR Pastikan data bertanda (*) diisi semua</i></small>
						</div>
					</div> <!-- /.form-group -->
				</div><!-- /.tab-pane -->
			</div><!-- /.tab-content -->
		</div><!-- nav-tabs-custom -->
	</form>
<?php
	}
}

elseif($module=="pendaftaran-sukses") {
?>
				<h2 class="page-header">FORMULIR PENDAFTARAN SISWA BARU YASHIKA 2018</h2>
				<div class="callout callout-info">
					<h4>PENDAFTARAN ONLINE ANDA BERHASIL</h4>
					<p>SILAHKAN DOWNLOAD DAN CETAK FORMULIR PENDAFTARAN INI. <br />FORMULIR DITUNJUKAN KETIKA VERIFIKASI KE SEKOLAH BERSAMAAN DENGAN SYARAT-SYARAT LAINNYA.</p>
					<p><a href="#" class="btn btn-success" target="_blank">Download Formulir Pendaftaran</a></p>
				</div>
<?php
}

//input data pendaftaran
elseif($module=="input-pendaftaran") {
	if(isset($_POST['daftar'])) {
	    
		$file = $_POST['alamatsekolah']."-".date("YmdHis");
		$files = $file.".pdf";
		$tgl_daftar = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$tgllahir = tgl_inggris($_POST['tgllahir']);
		$tgllahirayah = tgl_inggris($_POST['tgllahirayah']);
		$tgllahiribu = tgl_inggris($_POST['tgllahiribu']);
		if($_POST['tgllahirwali']=="") {
			$tgllahirwali = "0000-00-00";
		} else {
			$tgllahirwali = tgl_inggris($_POST['tgllahirwali']);
		}
		
		$query = "INSERT INTO siswa SET nm_siswa = '".addslashes($_POST['namalengkap'])."',
										jk = '$_POST[jk]',
										tmp_lahir = '$_POST[tempatlahir]',
										tgl_lahir = '$tgllahir',
										agama = '$_POST[agama]',
										anak_ke = '$_POST[anakke]',
										jml_sdr = '$_POST[jmlsdr]',
										alamat = '$_POST[alamatlengkap]',
										rt = '$_POST[rt]',
										rw = '$_POST[rw]',
										kelurahan = '$_POST[kelurahan]',
										kecamatan = '$_POST[kecamatan]',
										kabupaten = '$_POST[kabupaten]',
										kodepos = '$_POST[kodepos]',
										hp = '$_POST[nohp]',
										email = '$_POST[email]',
										tmp_tinggal = '$_POST[tempattinggal]',
										nm_sekolah = '".addslashes($_POST['namasekolah'])."',
										alamat_sekolah = '$_POST[alamatsekolah]',
										nisn = '$_POST[nisn]',
										nm_ayah = '$_POST[namaayah]',
										tmp_lahir_ayah = '$_POST[tempatlahirayah]',
										tgl_lahir_ayah = '$tgllahirayah',
										alamat_ayah = '$_POST[alamatayah]',
										pekerjaan_ayah = '$_POST[pekerjaanayah]',
										instansi_ayah = '$_POST[instansiayah]',
										penghasilan_ayah = '$_POST[penghasilanayah]',
										pendidikan_ayah = '$_POST[pendidikanayah]',
										org_ayah = '$_POST[organisasiayah]',
										jbt_ayah = '$_POST[jabatanayah]',
										hp_ayah = '$_POST[nohpayah]',
										email_ayah = '$_POST[emailayah]',
										nm_ibu = '$_POST[namaibu]',
										tmp_lahir_ibu = '$_POST[tempatlahiribu]',
										tgl_lahir_ibu = '$tgllahiribu',
										alamat_ibu = '$_POST[alamatibu]',
										pekerjaan_ibu = '$_POST[pekerjaanibu]',
										instansi_ibu = '$_POST[instansiibu]',
										penghasilan_ibu = '$_POST[penghasilanibu]',
										pendidikan_ibu = '$_POST[pendidikanibu]',
										org_ibu = '$_POST[organisasiibu]',
										jbt_ibu = '$_POST[jabatanibu]',
										hp_ibu = '$_POST[nohpibu]',
										email_ibu = '$_POST[emailibu]',
										nm_wali = '$_POST[namawali]',
										tmp_lahir_wali = '$_POST[tempatlahirwali]',
										tgl_lahir_wali = '$tgllahirwali',
										alamat_wali = '$_POST[alamatwali]',
										pekerjaan_wali = '$_POST[pekerjaanwali]',
										instansi_wali = '$_POST[instansiwali]',
										penghasilan_wali = '$_POST[penghasilanwali]',
										pendidikan_wali = '$_POST[pendidikanwali]',
										org_wali = '$_POST[organisasiwali]',
										jbt_wali = '$_POST[jabatanwali]',
										hp_wali = '$_POST[nohpwali]',
										email_wali = '$_POST[emailwali]',
										status = 'DAFTAR',
										tgl_daftar = '$tgl_daftar',
										ip = '$ip',
										file = '$files'";
		$input = mysqli_query($colok, $query);
		if($input) {

define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');

$qsekolah = mysqli_query($colok,"SELECT * FROM sekolah where id_sekolah=1");
$qsiswa = mysqli_query($colok,"SELECT * FROM siswa, agama WHERE siswa.agama=agama.id_agama and siswa.file='$files'");

$s=mysqli_fetch_array($qsekolah);
$r=mysqli_fetch_array($qsiswa);

$lahir   = tgl_indo($r['tgl_lahir']);
$tgl_lahir_ayah   = tgl_indo($r['tgl_lahir_ayah']);
$tgl_lahir_ibu    = tgl_indo($r['tgl_lahir_ibu']);
$tgl_lahir_wali   = tgl_indo($r['tgl_lahir_wali']);

$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
//ambil Gambar logo dan judul
$pdf->Image("images/$s[logo]", 10, 12, 15);
//Judul Laporan PDF
$pdf->SetFont('Arial','B','12');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,'FORMULIR PENDAFTARAN ONLINE',0,1,'L');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,'PENERIMAAN PESERTA MAHASISWA MAGANG TAHUN '.$s['tahun_ajaran'],0,1,'L');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,$s['nama_sekolah'],0,1,'L');

$pdf->Ln(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,8,'No Pendaftaran',1,0,'L');
$pdf->Cell(50,8,'',1,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(70,8,'Diisi oleh Panitia',0,1,'L');

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'A.   DATA MAHASISWA',0,1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama Lengkap',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_siswa'],0,1,'L');

$pdf->Cell(60,6,'3.   Jenis Kelamin',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
if($r['jk']=="L") $jk="Laki-laki"; elseif($r['jk']=="P") $jk="Perempuan";
$pdf->Cell(100,6,$jk,0,1,'L');

$pdf->Cell(60,6,'4.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir'].', '.$lahir ,0,1,'L');

$pdf->Cell(60,6,'5.   Agama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_agama'],0,1,'L');

$pdf->Cell(60,6,'6.   Anak ke',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['anak_ke'].'  dari  '.$r['jml_sdr'].'  Bersaudara',0,1,'L');

$pdf->Cell(60,6,'7.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat'].'  RT : '.$r['rt'].'  /  RW : '.$r['rw'],0,1,'L');

$pdf->Cell(60,6,'     a.   Kelurahan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kelurahan'],0,1,'L');

$pdf->Cell(60,6,'     b.   Kecamatan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kecamatan'],0,1,'L');

$pdf->Cell(60,6,'     c.   Kabupaten / Kota',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kabupaten'],0,1,'L');

$pdf->Cell(60,6,'     d.   Kode POS',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kodepos'],0,1,'L');

$pdf->Cell(60,6,'     e.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp'],0,1,'L');

$pdf->Cell(60,6,'     e.   Email',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['email'],0,1,'L');

$pdf->Cell(60,6,'     f.   Bertempat tinggal dengan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_tinggal'],0,1,'L');

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'B.   RIWAYAT PENDIDIKAN',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'8.   RIWAYAT PENDIDIKAN MAHASISWA',0,1,'L');

$pdf->Cell(60,6,'     a.   Nama Perguruan Tinggi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_sekolah'],0,1,'L');

$pdf->Cell(60,6,'     b.   Jurusan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_sekolah'],0,1,'L');

$pdf->Cell(60,6,'     c.   Fakultas',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nisn'],0,1,'L');

//--- DATA AYAH -------
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'DATA PRIBADI ORANG TUA MAHASISWA',0,1,'L');
$pdf->Cell(70,6,'A.   AYAH',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_ayah'],0,1,'L');

$pdf->Cell(60,6,'2.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir_ayah'].', '.$tgl_lahir_ayah,0,1,'L');

$pdf->Cell(60,6,'3.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_ayah'],0,1,'L');

$pdf->Cell(60,6,'4.   Pekerjaan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qp_ayah = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan=$r[pekerjaan_ayah]");
$qpa = mysqli_fetch_array($qp_ayah);
$pdf->Cell(100,6,$qpa['nm_pekerjaan'],0,1,'L');

$pdf->Cell(60,6,'5.   Instansi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['instansi_ayah'],0,1,'L');

$pdf->Cell(60,6,'6.   Penghasilan/bulan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,'Rp. '.rupiah($r['penghasilan_ayah']).',-',0,1,'L');

$pdf->Cell(60,6,'7.   Pendidikan Terakhir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qpd_ayah = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan=$r[pendidikan_ayah]");
$qpda = mysqli_fetch_array($qpd_ayah);
$pdf->Cell(100,6,$qpda['nm_pendidikan'],0,1,'L');

$pdf->Cell(60,6,'8.   Pengalaman Berorganisasi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
if($r['org_ayah']=="" or $r['org_ayah']=="-") {
	$org = $r['org_ayah'];
} else {
	$org = $r['org_ayah']."       Jabatan : ".$r['jbt_ayah'];
}
$pdf->Cell(100,6,$org,0,1,'L');

$pdf->Cell(60,6,'9.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp_ayah'],0,1,'L');

$pdf->Cell(60,6,'10. Email',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['email_ayah'],0,1,'L');

//--- DATA IBU -------
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'B.   IBU',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_ibu'],0,1,'L');

$pdf->Cell(60,6,'2.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir_ibu'].', '.$tgl_lahir_ibu,0,1,'L');

$pdf->Cell(60,6,'3.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_ibu'],0,1,'L');

$pdf->Cell(60,6,'4.   Pekerjaan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qp_ibu = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan=$r[pekerjaan_ibu]");
$qpi = mysqli_fetch_array($qp_ibu);
$pdf->Cell(100,6,$qpi['nm_pekerjaan'],0,1,'L');

$pdf->Cell(60,6,'5.   Instansi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['instansi_ibu'],0,1,'L');

$pdf->Cell(60,6,'6.   Penghasilan/bulan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,'Rp. '.rupiah($r['penghasilan_ibu']).',-',0,1,'L');

$pdf->Cell(60,6,'7.   Pendidikan Terakhir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qpd_ibu = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan=$r[pendidikan_ibu]");
$qpdi = mysqli_fetch_array($qpd_ibu);
$pdf->Cell(100,6,$qpdi['nm_pendidikan'],0,1,'L');

$pdf->Cell(60,6,'8.   Pengalaman Berorganisasi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
if($r['org_ibu']=="" or $r['org_ibu']=="-") {
	$org = $r['org_ibu'];
} else {
	$org = $r['org_ibu']."       Jabatan : ".$r['jbt_ibu'];
}
$pdf->Cell(100,6,$org,0,1,'L');

$pdf->Cell(60,6,'9.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp_ibu'],0,1,'L');

$pdf->Cell(60,6,'10. Email',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['email_ibu'],0,1,'L');

//--- DATA WALI -------
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'C.   WALI',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_wali'],0,1,'L');

$pdf->Cell(60,6,'2.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir_wali'].', '.$tgl_lahir_wali,0,1,'L');

$pdf->Cell(60,6,'3.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_wali'],0,1,'L');

$pdf->Cell(60,6,'4.   Pekerjaan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qp_wali = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan=$r[pekerjaan_wali]");
$qpa = mysqli_fetch_array($qp_wali);
$pdf->Cell(100,6,$qpa['nm_pekerjaan'],0,1,'L');

$pdf->Cell(60,6,'5.   Instansi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['instansi_wali'],0,1,'L');

$pdf->Cell(60,6,'6.   Penghasilan/bulan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,'Rp. '.rupiah($r['penghasilan_wali']).',-',0,1,'L');

$pdf->Cell(60,6,'7.   Pendidikan Terakhir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qpd_wali = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan=$r[pendidikan_wali]");
$qpda = mysqli_fetch_array($qpd_wali);
$pdf->Cell(100,6,$qpda['nm_pendidikan'],0,1,'L');

$pdf->Cell(60,6,'8.   Pengalaman Berorganisasi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
if($r['org_wali']=="" or $r['org_wali']=="-") {
	$org = $r['org_wali'];
} else {
	$org = $r['org_wali']."       Jabatan : ".$r['jbt_wali'];
}
$pdf->Cell(100,6,$org,0,1,'L');

$pdf->Cell(60,6,'9.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp_wali'],0,1,'L');

$pdf->Cell(60,6,'10. Email',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['email_wali'],0,1,'L');

$tgl_daftar = tgl_indo($r['tgl_daftar']);
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(60,6,$s['kabupaten'].', '.$tgl_daftar,0,1,'C');
$pdf->Cell(130);
$pdf->Cell(60,6,'Orang Tua/Wali',0,1,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(60,6,'(.....................................)',0,1,'C');

$pdf->Output('bukti-pendaftaran/'.$files,'F');

?>
			<h2 class="page-header">FORMULIR PENDAFTARAN SISWA BARU</h2>
			<div class="callout callout-info">
				<h4>PENDAFTARAN ONLINE TELAH BERHASIL</h4>
				<p>SILAHKAN DOWNLOAD DAN CETAK FORMULIR PENDAFTARAN INI. <br />FORMULIR DITUNJUKAN KETIKA VERIFIKASI KE INSTANSI</p>
				<p><a href="<?php echo $d['alamat_website']; ?>/bukti-pendaftaran/<?php echo $files; ?>" class="btn btn-success" target="_blank">DOWNLOAD FORMULIR PENDAFTARAN</a></p>
			</div>
<?php
		}
		else {
?>
			<h2 class="page-header">FORMULIR PENDAFTARAN PESERTA MAGANG</h2>
			<div class="callout callout-danger">
				<h4>GAGAL..... <a href="<?php echo $d['alamat_website']; ?>/pendaftaran.html">Silahkan coba lagi</a></h4>
			</div>
<?php
		}
	}
	else {
?>
			<h2 class="page-header">FORMULIR PENDAFTARAN PESERTA MAGANG</h2>
			<div class="callout callout-danger">
				<h4>Anda Tidak Berhak Mengakses Halaman Ini</h4>
			</div>
<?php
	}
}

// Modul halaman statis
elseif ($module=='halamanstatis'){
	$detail=mysqli_query($colok, "SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
	$dt   = mysqli_fetch_array($detail);
	$tgl_posting   = tgl_indo($dt['tgl_posting']);
?>
	<h2 class="page-header"><?php echo $dt['judul']; ?></h2>
<?php
	echo "$dt[isi_halaman] <br />";
}

// Modul halaman Pengumuman
elseif ($module=='pengumuman'){
	$qset = mysqli_query($colok, "SELECT pengumuman FROM setting WHERE id_setting=1");
	$st = mysqli_fetch_array($qset);
	$tp = explode(" - ",$st['pengumuman']);
	//--pendaftaran awal
	$tpb = explode(" ",$tp[0]); // memisahkan menjadi tanggal dan jam
	$ttpb = explode("/",$tpb[0]); // mecah tanggal
	$jpb = explode(":",$tpb[1]); // mecah jam

	//$jamb="";
	if ($tpb[2] == "PM" AND $jpb[0] < 12) {
		$jam = $jpb[0] + 12;
	}
	elseif ($tpb[2] == 'AM') {
		$jam = $jpb[0];
	}
	else {
		$jam = $jpb[0];
	}
	$jamb = $ttpb[2]."-".$ttpb[1]."-".$ttpb[0]." ".$jam.":".$jpb[1].":00";

	//--pendaftaran akhir
	$tpe = explode(" ",$tp[1]); // memisahkan menjadi tanggal dan jam
	$ttpe = explode("/",$tpe[0]); // mecah tanggal
	$jpe = explode(":",$tpe[1]);
	//$jame="";
	if ($tpe[2] == "PM" AND $jpe[0] < 12) {
		$jams = $jpe[0] + 12;
	}
	elseif ($tpe[2] == 'AM') {
		$jams = $jpe[0];
	}
	else {
		$jams = $jpe[0];
	}
	$jame = $ttpe[2]."-".$ttpb[1]."-".$ttpe[0]." ".$jams.":".$jpe[1].":00";

	if($tgl_saiki < $jamb) {
?>
		<div class="callout callout-info">
			<h4>HASIL SELEKSI BELUM BISA DIUMUMKAN</h4>
			<p>Pengumuman Hasil Seleksi diBUKA mulai tanggal <?php echo $tp[0]; ?></p>
		</div>
<?php
	}
	elseif($tgl_saiki>$jame){
?>
		<div class="callout callout-danger">
			<h4>PENGUMUMAN SUDAH TUTUP</h4>
			<p>Pengumuman Hasil Seleksi sudah diTUTUP tanggal <?php echo $tp[1]; ?></p>
		</div>
<?php
	}
	elseif(($tgl_saiki >= $jamb) AND ($tgl_saiki<=$jame)) {
?>
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title"><b>PESERTA DITERIMA</b></h3>
			<div class="pull-right box-tools">
				<a href="<?php echo $d['alamat_website']; ?>/page/5/prosedur-daftar-ulang.html" class="btn btn-sm btn-warning" target="_blank">PROSEDUR DAFTAR ULANG</a>
			</div>
		</div>
		<div class="box-body">
			<table id="pengumumanditerima" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>NAMA LENGKAP</th>
						<th>NAMA PERGURUAN TINGGI</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
<?php
	$terima=mysqli_query($colok, "SELECT * FROM siswa WHERE status='DITERIMA' ORDER BY id_siswa");
	while($t   = mysqli_fetch_array($terima)) {
?>
		<tr>
			<td><?php echo $t['id_siswa']; ?></td>
			<td><?php echo $t['nm_siswa']; ?></td>
			<td><?php echo $t['nm_sekolah']; ?></td>
			<td><?php echo $t['status']; ?></td>
		</tr>
<?php
	}
?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->

	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><b>PESERTA CADANGAN</b></h3>
		</div>
		<div class="box-body">
			<table id="pengumumancadangan" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>NAMA LENGKAP</th>
						<th>NAMA PERGURUAN TINGGI</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
<?php
	$cadangan=mysqli_query($colok, "SELECT * FROM siswa WHERE status='CADANGAN' ORDER BY id_siswa");
	while($c   = mysqli_fetch_array($cadangan)) {
?>
		<tr>
			<td><?php echo $c['id_siswa']; ?></td>
			<td><?php echo $c['nm_siswa']; ?></td>
			<td><?php echo $c['nm_sekolah']; ?></td>
			<td><?php echo $c['status']; ?></td>
		</tr>
<?php
	}
?>
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
<?php
	}
}

else {
	//header('location: main.php?module=home');
}
?>
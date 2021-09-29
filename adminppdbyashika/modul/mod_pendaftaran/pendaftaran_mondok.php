<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = 'index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
	$aksi = "modul/mod_pendaftaran/aksi_pendaftaran.php";
?>
	<section class="content-header">
		<div class="row">
			<div class="col-xs-6">
				<span style="font-size:24px;">DATA SEMUA PENDAFTAR SAMBIL MONDOK</span>
			</div>
			<div class="col-xs-2 pull-right"><a href="<?php echo $aksi; ?>?module=pendaftaran&act=export-excel" class="btn btn-block btn-primary"><i class="fa fa-file-excel-o"></i> &nbsp; DOWNLOAD EXCEL</a></div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-xs-12">
			<!-- menampilkan data pendaftaran statis -->
			<div class="box">
				<div class="box-body">
				  <form method="post" action="<?php echo $aksi; ?>?module=pendaftaran&act=ubahstatus">
					<table id="pendaftarandata" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th><input type="checkbox" class="minimal" id="checkAll"></th>
								<th>NO</th>
								<th>ID DAFTAR</th>
								<th>NAMA</th>
								<th>TTL</th>
								<th>NO TELP</th>
								<th>TANGGAL DAFTAR</th>
								<th>STATUS</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$mySql 	= "SELECT * FROM siswa, agama WHERE siswa.agama=agama.id_agama AND status='DITERIMA' AND stat_mondok='Mondok' ORDER BY id_siswa DESC";
							$myQry 	= mysqli_query($colok, $mySql);
							$nomor  = 0;
							while($myData = mysqli_fetch_array($myQry)) {
								$nomor++;
							?>
								<tr>
									<td class="text-center"><input type="checkbox" class="minimal" id="cek[]" name="cek[]" value="<?php echo $myData['id_siswa']; ?>" /></td>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $myData['id_siswa']; ?></td>
									<td><?php echo $myData['nm_siswa']; ?></td>
									<td><?php echo $myData['tmp_lahir'].", ".tgl_indo($myData['tgl_lahir']); ?></td>
									<td><?php echo $myData['hp']; ?></td>
									<td><?php echo tgl_indo($myData['tgl_daftar']); ?></td>
									<td><?php echo $myData['status']; ?></td>
									<td class="text-center">
										<a class="btn btn-warning btn-xs" alt="Lihat Data" title="Lihat Data" data-toggle="modal" data-target="#myModal<?php echo $myData['id_siswa']; ?>"><i class="fa fa-search"></i></a> &nbsp;
										<a href="../bukti-pendaftaran/<?php echo $myData['file']; ?>" class="btn btn-success btn-xs" target="_blank" alt="PDF File" title="PDF File"><i class="fa fa-file-pdf-o"></i></a>
									</td>
								</tr>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $myData['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $myData['id_siswa']; ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $myData['id_siswa']; ?>">Detail Data</h4>
			</div> <!-- /.modal-header -->
			<div class="modal-body">
				<h3 class="page-header">A. DATA SISWA</h3>
				<dl class="dl-horizontal">
					<dt>ID Pendaftaran</dt> <dd><?php echo $myData['id_siswa']; ?></dd>
					<dt>Nama Lengkap</dt> <dd><?php echo $myData['nm_siswa']; ?></dd>
					<dt>Jenis Kelamin</dt> <dd><?php if($myData['jk']=="L") echo "Laki-laki"; else echo "Perempuan"; ?></dd>
					<dt>Tempat, Tanggal Lahir</dt> <dd><?php echo $myData['tmp_lahir'].", ".tgl_indo($myData['tgl_lahir']); ?></dd>
					<dt>Agama</dt> <dd><?php echo $myData['nm_agama']; ?></dd>
					<dt>Anak ke</dt> <dd><?php echo $myData['anak_ke']."  dari  ".$myData['jml_sdr']."  Bersaudara"; ?></dd>
					<dt>Alamat</dt> <dd><?php echo $myData['alamat']." RT: ".$myData['rt']." RW: ".$myData['rw'].", ".$myData['kelurahan'].", ".$myData['kecamatan'].", ".$myData['kabupaten'].". <br />Kodepos ".$myData['kodepos']; ?></dd>
					<dt>No. Telp/HP</dt> <dd><?php echo $myData['hp']; ?></dd>
					<dt>Email</dt> <dd><?php echo $myData['email']; ?></dd>
					<dt>Tempat Tinggal</dt> <dd><?php echo $myData['tmp_tinggal']; ?></dd>
				</dl>

				<h3 class="page-header">B. RIWAYAT PENDIDIKAN DAN BEASISWA</h3>
				<dl class="dl-horizontal">
					<dt>Nama Perguruan Tinggi</dt> <dd><?php echo $myData['nm_sekolah']; ?></dd>
					<dt>Fakultas</dt> <dd><?php echo $myData['alamat_sekolah']; ?></dd>
					<dt>Jurusan</dt> <dd><?php echo $myData['nisn']; ?></dd>
				</dl>

				<h3 class="page-header">C. DATA AYAH</h3>
				<dl class="dl-horizontal">
					<dt>Nama Lengkap</dt> <dd><?php echo $myData['nm_ayah']; ?></dd>
					<dt>Tempat, Tanggal Lahir</dt> <dd><?php echo $myData['tmp_lahir_ayah'].", ".tgl_indo($myData['tgl_lahir_ayah']); ?></dd>
					<dt>Alamat</dt> <dd><?php echo $myData['alamat_ayah']; ?></dd>
					<?php
					$qpka = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan='".$myData['pekerjaan_ayah']."'");
					$pka = mysqli_fetch_array($qpka);
					?>
					<dt>Pekerjaan</dt> <dd><?php echo $pka['nm_pekerjaan']; ?></dd>
					<dt>Instansi</dt> <dd><?php echo $myData['instansi_ayah']; ?></dd>
					<dt>Penghasilan/bulan</dt> <dd><?php echo "Rp. ".rupiah($myData['penghasilan_ayah']).",-"; ?></dd>
					<?php
					$qpa = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan='".$myData['pendidikan_ayah']."'");
					$pa = mysqli_fetch_array($qpa);
					?>
					<dt>Pendidikan Terakhir</dt> <dd><?php echo $pa['nm_pendidikan']; ?></dd>
					<dt>Organisasi</dt> <dd><?php echo $myData['org_ayah']; ?></dd>
					<dt>No. Telp/HP</dt> <dd><?php echo $myData['hp_ayah']; ?></dd>
					<dt>Email</dt> <dd><?php echo $myData['email_ayah']; ?></dd>
				</dl>

				<h3 class="page-header">D. DATA IBU</h3>
				<dl class="dl-horizontal">
					<dt>Nama Lengkap</dt> <dd><?php echo $myData['nm_ibu']; ?></dd>
					<dt>Tempat, Tanggal Lahir</dt> <dd><?php echo $myData['tmp_lahir_ibu'].", ".tgl_indo($myData['tgl_lahir_ibu']); ?></dd>
					<dt>Alamat</dt> <dd><?php echo $myData['alamat_ibu']; ?></dd>
					<?php
					$qpkibu = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan='".$myData['pekerjaan_ibu']."'");
					$pkibu = mysqli_fetch_array($qpkibu);
					?>
					<dt>Pekerjaan</dt> <dd><?php echo $pkibu['nm_pekerjaan']; ?></dd>
					<dt>Instansi</dt> <dd><?php echo $myData['instansi_ibu']; ?></dd>
					<dt>Penghasilan/bulan</dt> <dd><?php echo "Rp. ".rupiah($myData['penghasilan_ibu']).",-"; ?></dd>
					<?php
					$qpi = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan='".$myData['pendidikan_ibu']."'");
					$pi = mysqli_fetch_array($qpi);
					?>
					<dt>Pendidikan Terakhir</dt> <dd><?php echo $pi['nm_pendidikan']; ?></dd>
					<dt>Organisasi</dt> <dd><?php echo $myData['org_ibu']; ?></dd>
					<dt>No. Telp/HP</dt> <dd><?php echo $myData['hp_ibu']; ?></dd>
					<dt>Email</dt> <dd><?php echo $myData['email_ibu']; ?></dd>
				</dl>

				<h3 class="page-header">D. DATA WALI</h3>
				<dl class="dl-horizontal">
					<dt>Nama Lengkap</dt> <dd><?php echo $myData['nm_wali']; ?></dd>
					<dt>Tempat, Tanggal Lahir</dt> <dd><?php echo $myData['tmp_lahir_wali'].", ".tgl_indo($myData['tgl_lahir_wali']); ?></dd>
					<dt>Alamat</dt> <dd><?php echo $myData['alamat_wali']; ?></dd>
					<?php
					$qpkw = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan='".$myData['pekerjaan_wali']."'");
					$pkw = mysqli_fetch_array($qpkw);
					?>
					<dt>Pekerjaan</dt> <dd><?php echo $pkw['nm_pekerjaan']; ?></dd>
					<dt>Instansi</dt> <dd><?php echo $myData['instansi_wali']; ?></dd>
					<dt>Penghasilan/bulan</dt> <dd><?php echo "Rp. ".rupiah($myData['penghasilan_wali']).",-"; ?></dd>
					<?php
					$qpw = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan='".$myData['pendidikan_wali']."'");
					$pw = mysqli_fetch_array($qpw);
					?>
					<dt>Pendidikan Terakhir</dt> <dd><?php echo $pw['nm_pendidikan']; ?></dd>
					<dt>Organisasi</dt> <dd><?php echo $myData['org_wali']; ?></dd>
					<dt>No. Telp/HP</dt> <dd><?php echo $myData['hp_wali']; ?></dd>
					<dt>Email</dt> <dd><?php echo $myData['email_wali']; ?></dd>
				</dl>
			</div> <!-- /.modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div> <!-- /.modal-footer -->
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
							<?php
							}
							?>
						</tbody>
					</table>
				</div> <!-- .box-body -->
				<div class="box-footer">
					<div class="col-sm-3">
						<select name="statuspendaftaran" id="statuspendaftaran" class="form-control">
							<option>-- Pilih Hasil Akhir --</option>
							<option value="DITERIMA">DITERIMA</option>
							<option value="CADANGAN">CADANGAN</option>
							<option value="DITOLAK">DITOLAK</option>
						</select>
					</div> <!-- /.col-sm-3 -->
					<div class="col-sm-1">
						<input name="applystatuspendaftaran" id="applystatuspendaftaran" type="submit" class="btn btn-primary" value="APPLY" />
					</div> <!-- /.col-sm-1 -->
				</div> <!-- /.box-footer -->
			  </form>
			</div> <!-- .box -->
		</div> <!-- col-xs-12 -->
		</div> <!-- row -->
	</section> <!-- content -->
<?php
}
?>

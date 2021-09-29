<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	header('location:access-denied.php');
}
else{
	include "../../../config/colokan.php";
	include "../../../config/library.php";
	$module = $_GET['module'];
	$act = $_GET['act'];
	
	  // Hapus data siswa
  if ($module=='pendaftaran' AND $act=='hapus'){
    $query = "DELETE FROM siswa WHERE id_siswa='$_GET[id]'";
    $hapus = mysqli_query($colok, $query);
    $r     = mysqli_fetch_array($hapus);
    
    header("location:../../main.php?module=".$module);
  }

	if ($module=='pendaftaran' AND $act=='ubahstatus'){
		$cek = $_POST['cek'];
		$jumlah = count($cek);
		for($i=0; $i<$jumlah; $i++) {	//--- dokumen legalisir sudah jadi -----
			mysqli_query($colok, "UPDATE siswa SET status='$_POST[statuspendaftaran]' WHERE id_siswa='$cek[$i]'");
		}
		header('location:../../main.php?module='.$module);
	}

	elseif ($module=='pendaftaran' AND $act=='export-excel'){
		$tgl =date('d-m-Y-His');
		// Fungsi header dengan mengirimkan raw data excel
		header("Content-type: application/vnd-ms-excel");
		// Mendefinisikan nama file ekspor "JurnalGuru-bulan-tahun.xls"
		header("Content-Disposition: attachment; filename=DataPendaftar-".$tgl.".xls");
?>
		<table border="1">
			<thead>
				<tr style="background: #cccccc;">
					<td align="center" valign="middle" rowspan="2"><b>NO</b></td>
					<td align="center" colspan="19"><b>DATA MAHASISWA</b></td>
					<td align="center" colspan="3"><b>DATA SEKOLAH</b></td>
					<td align="center" colspan="12"><b>DATA AYAH</b></td>
					<td align="center" colspan="12"><b>DATA IBU</b></td>
					<td align="center" colspan="12"><b>DATA WALI</b></td>
				</tr>
				<tr style="background: #cccccc;"><b>
					<td align="center"><b>ID</b></td>
					<td align="center"><b>TGL DAFTAR</b></td>
					<td align="center" valign="middle"><b>NAMA LENGKAP</b></td>
					<td align="center"><b>JENIS KELAMIN</b></td>
					<td align="center"><b>TEMPAT</b></td>
					<td align="center"><b>TANGGAL LAHIR</b></td>
					<td align="center"><b>AGAMA</b></td>
					<td align="center"><b>ANAK KE</b></td>
					<td align="center"><b>JML SDR</b></td>
					<td align="center"><b>ALAMAT</b></td>
					<td align="center"><b>RT</b></td>
					<td align="center"><b>RW</b></td>
					<td align="center"><b>KELURAHAN</b></td>
					<td align="center"><b>KECAMATAN</b></td>
					<td align="center"><b>KABUPATEN</b></td>
					<td align="center"><b>KODEPOS</b></td>
					<td align="center"><b>NO HP</b></td>
					<td align="center"><b>EMAIL</b></td>
					<td align="center"><b>TEMPAT TINGGAL</b></td>
					<td align="center"><b>NAMA PERGURUAN TINGGI</b></td>
					<td align="center"><b>FAKULTAS</b></td>
					<td align="center"><b>JURUSAN</b></td>
					<td align="center"><b>NAMA</b></td>
					<td align="center"><b>TEMPAT</b></td>
					<td align="center"><b>TANGGAL LAHIR</b></td>
					<td align="center"><b>ALAMAT</b></td>
					<td align="center"><b>PEKERJAAN</b></td>
					<td align="center"><b>INSTANSI</b></td>
					<td align="center"><b>PENGHASILAN</b></td>
					<td align="center"><b>PENDIDIKAN</b></td>
					<td align="center"><b>ORGANISASI</b></td>
					<td align="center"><b>JABATAN</b></td>
					<td align="center"><b>NO HP</b></td>
					<td align="center"><b>EMAIL</b></td>
					<td align="center"><b>NAMA</b></td>
					<td align="center"><b>TEMPAT</b></td>
					<td align="center"><b>TANGGAL LAHIR</b></td>
					<td align="center"><b>ALAMAT</b></td>
					<td align="center"><b>PEKERJAAN</b></td>
					<td align="center"><b>INSTANSI</b></td>
					<td align="center"><b>PENGHASILAN</b></td>
					<td align="center"><b>PENDIDIKAN</b></td>
					<td align="center"><b>ORGANISASI</b></td>
					<td align="center"><b>JABATAN</b></td>
					<td align="center"><b>NO HP</b></td>
					<td align="center"><b>EMAIL</b></td>
					<td align="center"><b>NAMA</b></td>
					<td align="center"><b>TEMPAT</b></td>
					<td align="center"><b>TANGGAL LAHIR</b></td>
					<td align="center"><b>ALAMAT</b></td>
					<td align="center"><b>PEKERJAAN</b></td>
					<td align="center"><b>INSTANSI</b></td>
					<td align="center"><b>PENGHASILAN</b></td>
					<td align="center"><b>PENDIDIKAN</b></td>
					<td align="center"><b>ORGANISASI</b></td>
					<td align="center"><b>JABATAN</b></td>
					<td align="center"><b>NO HP</b></td>
					<td align="center"><b>EMAIL</b></td>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				$qsiswa = mysqli_query($colok, "SELECT * from siswa,agama WHERE siswa.agama=agama.id_agama");
				while($a = mysqli_fetch_array($qsiswa)) {
?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $a['id_siswa']; ?></td>
						<td><?php echo tgl_indo($a['tgl_daftar']); ?></td>
						<td><?php echo $a['nm_siswa']; ?></td>
						<td><?php echo $a['jk']; ?></td>
						<td><?php echo $a['tmp_lahir']; ?></td>
						<td><?php echo tgl_indo($a['tgl_lahir']); ?></td>
						<td><?php echo $a['nm_agama']; ?></td>
						<td><?php echo $a['anak_ke']; ?></td>
						<td><?php echo $a['jml_sdr']; ?></td>
						<td><?php echo $a['alamat']; ?></td>
						<td><?php echo $a['rt']; ?></td>
						<td><?php echo $a['rw']; ?></td>
						<td><?php echo $a['kelurahan']; ?></td>
						<td><?php echo $a['kecamatan']; ?></td>
						<td><?php echo $a['kabupaten']; ?></td>
						<td><?php echo $a['kodepos']; ?></td>
						<td><?php echo $a['hp']; ?></td>
						<td><?php echo $a['email']; ?></td>
						<td><?php echo $a['tmp_tinggal']; ?></td>
						<td><?php echo $a['nm_sekolah']; ?></td>
						<td><?php echo $a['alamat_sekolah']; ?></td>
						<td><?php echo $a['nisn']; ?></td>
						<td><?php echo $a['nm_ayah']; ?></td>
						<td><?php echo $a['tmp_lahir_ayah']; ?></td>
						<td><?php echo $a['tgl_lahir_ayah']; ?></td>
						<td><?php echo $a['alamat_ayah']; ?></td>
						<td>
							<?php
							$qpka = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan='".$a['pekerjaan_ayah']."'");
							$pka = mysqli_fetch_array($qpka);
							echo $pka['nm_pekerjaan'];
							?>
						</td>
						<td><?php echo $a['instansi_ayah']; ?></td>
						<td><?php echo $a['penghasilan_ayah']; ?></td>
						<td>
						<?php
						$qpa = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan='".$a['pendidikan_ayah']."'");
						$pa = mysqli_fetch_array($qpa);
						echo $pa['nm_pendidikan'];
						?>
						</td>
						<td><?php echo $a['org_ayah']; ?></td>
						<td><?php echo $a['jbt_ayah']; ?></td>
						<td><?php echo $a['hp_ayah']; ?></td>
						<td><?php echo $a['email_ayah']; ?></td>
						<td><?php echo $a['nm_ibu']; ?></td>
						<td><?php echo $a['tmp_lahir_ibu']; ?></td>
						<td><?php echo $a['tgl_lahir_ibu']; ?></td>
						<td><?php echo $a['alamat_ibu']; ?></td>
						<td>
							<?php
							$qpkibu = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan='".$a['pekerjaan_ibu']."'");
							$pkibu = mysqli_fetch_array($qpkibu);
							echo $pkibu['nm_pekerjaan'];
							?>
						</td>
						<td><?php echo $a['instansi_ibu']; ?></td>
						<td><?php echo $a['penghasilan_ibu']; ?></td>
						<td>
						<?php
						$qpi = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan='".$a['pendidikan_ibu']."'");
						$pi = mysqli_fetch_array($qpi);
						echo $pi['nm_pendidikan'];
						?>
						</td>
						<td><?php echo $a['org_ibu']; ?></td>
						<td><?php echo $a['jbt_ibu']; ?></td>
						<td><?php echo $a['hp_ibu']; ?></td>
						<td><?php echo $a['email_ibu']; ?></td>
						<td><?php echo $a['nm_wali']; ?></td>
						<td><?php echo $a['tmp_lahir_wali']; ?></td>
						<td><?php echo $a['tgl_lahir_wali']; ?></td>
						<td><?php echo $a['alamat_wali']; ?></td>
						<td>
							<?php
							$qpkw = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan='".$a['pekerjaan_wali']."'");
							$pkw = mysqli_fetch_array($qpkw);
							echo $pkw['nm_pekerjaan'];
							?>
						</td>
						<td><?php echo $a['instansi_wali']; ?></td>
						<td><?php echo $a['penghasilan_wali']; ?></td>
						<td>
						<?php
						$qpw = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan='".$a['pendidikan_wali']."'");
						$pw = mysqli_fetch_array($qpw);
						echo $pw['nm_pendidikan'];
						?>
						</td>
						<td><?php echo $a['org_wali']; ?></td>
						<td><?php echo $a['jbt_wali']; ?></td>
						<td><?php echo $a['hp_wali']; ?></td>
						<td><?php echo $a['email_wali']; ?></td>
					</tr>
<?php
					$no++;
				}
				?>
			</tbody>
		</table>
<?php
	}
}
?>


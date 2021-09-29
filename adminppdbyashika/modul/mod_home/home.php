
<section class="content-header">
	<h1>
		<i class="fa fa-laptop text-green"></i> Dashboard
		<small>Control panel</small>
	</h1>
</section>

<section class="content">
	
		<center>
			<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>


	<center>
		<h2>REKAPITULASI DATA PESERTA PENDAFTARAN MASUK<brh2>
	</center>
		<div class="row">
		<div class="col-md-4" style="width: 0px auto;margin: 10px auto;">
		    <h4 align="center">Berdasar Jenis Kelamin</h4>
		<center><canvas id="myChart"></canvas></center>
	</div>
	
		<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Laki-laki", "Perempuan"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_laki = mysqli_query($colok,"select * from siswa where jk='L'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($colok,"select * from siswa where jk='P'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	
	<div class="col-md-4" style="width: 0px auto;margin: 10px auto;">
		    <h4 align="center">Berdasar Status Penerimaan</h4>
		<center><canvas id="myChart3"></canvas></center>
	</div>
	
		<script>
		var ctx = document.getElementById("myChart3").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Diterima", "Ditolak"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_laki = mysqli_query($colok,"select * from siswa where status='DITERIMA'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($colok,"select * from siswa where status='DITOLAK'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>
					<?php
					$q = mysqli_query($colok, "SELECT COUNT(*) AS jml_pendaftar FROM siswa");
					$r = mysqli_fetch_array($q);
					echo $r['jml_pendaftar'];
					?>
					</h3>
					<p>SEMUA PENDAFTAR</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="main.php?module=pendaftaran" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!-- ./col -->

		<div class="col-md-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>
					<?php
					$qt = mysqli_query($colok, "SELECT COUNT(*) AS jml_diterima FROM siswa WHERE status='DITERIMA'");
					$rt = mysqli_fetch_array($qt);
					echo $rt['jml_diterima'];
					?>
					</h3>
					<p>DITERIMA</p>
				</div>
				<div class="icon">
					<i class="fa fa-user-plus"></i>
				</div>
				<a href="main.php?module=pendaftarditerima" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!-- ./col -->

		<div class="col-md-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>
					<?php
					$qc = mysqli_query($colok, "SELECT COUNT(*) AS jml_cadangan FROM siswa WHERE status='CADANGAN'");
					$rc = mysqli_fetch_array($qc);
					echo $rc['jml_cadangan'];
					?>
					</h3>
					<p>CADANGAN</p>
				</div>
				<div class="icon">
					<i class="fa fa-user-secret"></i>
				</div>
				<a href="main.php?module=pendaftarcadangan" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!-- ./col -->

		<div class="col-md-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>
					<?php
					$qtd = mysqli_query($colok, "SELECT COUNT(*) AS jml_tolak FROM siswa WHERE status='DITOLAK'");
					$rtd = mysqli_fetch_array($qtd);
					echo $rtd['jml_tolak'];
					?>
					</h3>
					<p>TIDAK DITERIMA</p>
				</div>
				<div class="icon">
					<i class="fa fa-user-times"></i>
				</div>
				<a href="main.php?module=pendaftarditolak" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!-- ./col -->
		
	</div></div><!-- ./row -->
</section><!-- ./content -->

<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = 'index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
	include "../config/library.php";
	include "../config/fungsi_combobox.php";

	// Home
	if ($_GET['module']=='home'){
		if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
			include "modul/mod_home/home.php";
		}
	}

	// Identitas
	elseif ($_GET['module']=='identitas'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_identitas/identitas.php";
		}
	}

	// Halaman Statis
	elseif ($_GET['module']=='halaman'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_halaman/halaman.php";
		}
	}

	// Sidebar
	elseif ($_GET['module']=='sidebar'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_sidebar/sidebar.php";
		}
	}

	// Data pendaftaran
	elseif ($_GET['module']=='pendaftaran'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran.php";
		}
	}

	// Data pendaftar diterima
	elseif ($_GET['module']=='pendaftarditerima'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran_diterima.php";
		}
	}

	// Data pendaftar ditolak
	elseif ($_GET['module']=='pendaftarditolak'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran_ditolak.php";
		}
	}

	// Data pendaftar cadangan
	elseif ($_GET['module']=='pendaftarcadangan'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran_cadangan.php";
		}
	}
	
	// Data pendaftar MA
	elseif ($_GET['module']=='pendaftar-ma'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran_ma.php";
		}
	}
	
	// Data pendaftar SMK
	elseif ($_GET['module']=='pendaftar-smk'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran_smk.php";
		}
	}
	
	// Data pendaftar mondok
	elseif ($_GET['module']=='pendaftar-mondok'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran_mondok.php";
		}
	}

    // Data pendaftar mondok
	elseif ($_GET['module']=='pendaftar-tidak-mondok'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_pendaftaran/pendaftaran_tidak_mondok.php";
		}
	}

	// Setting
	elseif ($_GET['module']=='setting'){
		if ($_SESSION['leveluser']=='admin'){
			include "modul/mod_setting/setting.php";
		}
	}

	// Data user
	elseif ($_GET['module']=='user'){
		if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
			include "modul/mod_user/user.php";
		}
	}

	//jika tidak ada
	else {
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Modul tidak ada.
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              Start creating your amazing application!
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->

<?php
	}
}
?>

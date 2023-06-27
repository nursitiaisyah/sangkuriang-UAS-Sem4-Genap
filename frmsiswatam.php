<?php
	session_start();
	include "koneksi.php";

	if(!isset($_SESSION['namaUser']))
	{
		echo "<script>window.location.replace(\"index.php\"); </script>";
		exit();
	}

	$idMenu = 310;
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" content="notranslate">
	<meta name="robots" content="nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit-no">
	<meta name="description" content="Sangkuriang">
	<meta name="author" content="Aisyah">
	<link rel="icon" href="alat2/scifi_superman_icon_157468.ico">

	<title>Sangkuriang</title>
    
    <link rel="stylesheet" href="alat2/styles.css">
    <link rel="stylesheet" href="alat2/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="alat2/all.min.css">
    <style>
        select, input, span {
            margin-bottom: 0.2rem;
        }
        .input-group-append {
            cursor: pointer;
        }
    </style>
    <script src="alat2/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
	<?php include "ss_mnuatas.php";?>

	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<?php include "ss_mnukiri.php"; ?>
		</div>

		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h4 class="mt-4">Pendaftaran Siswa Baru</h4>

                    <?php if (isset($_SESSION['salah']) && $_SESSION['salah'] > 0) : ?>
                        <div class="alert alert-danger my-4">
                            Harap diisi dengan lengkap dan benar.
                        </div>
                        <?php unset($_SESSION['salah']) ; ?>
                        <?php endif;?>

                        <form method="post" action="siswatamin.php">
                            <?php
                                // ambil tanggal hari ini
                                $tggl = $_SESSION['harini'];
                                $thMasuk = date_format($tggl, "y");
                                
                                $st= "SELECT MAX(SUBSTR(ID, 3, 4)) AS Nomor
                                    FROM t_siswa
                                    WHERE LEFT (ID, 2) = '$thMasuk'";

                                $qrySS = mysqli_query($conSS,$st);
                                $data  = mysqli_fetch_array($qrySS);

                                $ID = $thMasuk . str_pad($data['Nomor']+1, 4, "0", 0);
                                ?>
                                <div class="form-group row">
                                    <label for="txtID" class="col-2 col-form-label">Nomor Registrasi</label>
                                    <div class="col-2">
                                        <input class="form-control" name="txtID" type="text"
                                            value="<?=$ID;?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="txtNama" class="col-2 col-form-label">Nama Siswa</label>
                                    <div class="col-4">
                                        <input class="form-control" name="txtNama" type="text" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cbbJK" class="col-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-2">
                                        <select class="form-control" name="cbbJK">
                                        <option value="P">Pria</option>
                                        <option value="W">Wanita</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="txtTpLahir" class="col-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-3">
                                        <input class="form-control" name="txtTpLahir" type="text">
                                    </div>
                                </div>

                        <div class="form-group row">
                            <label for="txtTgLahir" class="col-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-2">
                                <div class="input-group date" id="dtpTgLahir">
                                    <input class="form-control bg-white" name="txtTgLahir" type="text"
                                        value="<?=date_format($_SESSION['harini'], "d-m-Y")?>" readonly>
                                    <span class="input-group-text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar"></i>
                                            </span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="txtAlamat" class="col-2 col-form-label">Alamat</label>
                                <div class="col-4">
                                    <input class="form-control" name="txtAlamat" type="text">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtNoHP" class="col-2 col-form-label">Nomor HP</label>
                                <div class="col-2">
                                    <input class="form-control" name="txtNoHP" type="text">
                                </div>
                            </div>
                            
                            <div class="form-group row mt-2">
                                <div class="col-2"></div>
                                <div class="col">
                                    <button class="btn btn-sm btn-primary" name="btnSimpan" type="submit">
                                        <i class="fas fa-save"></i> Simpan</button>
                                    <a href="frmsiswa.php" class="btn btn-sm btn-secondary ms-2">
                                        <i class="fas fa-ban"></i> Batalkan</a>
                                </div>
                            </div>
                        </form>
                    </div>
            </main>

			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">&copy; 2023 Nur Siti Aisyah</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>
    <script>
        $(function() {
            $('#dtpTgLahir').datepicker({
                format: "dd-mm-yyyy",
                language: "id",
                orientation: "bottom left",
                autoclose: true,
                todayHighlight: true,
                immediateUpdates: true,
                disableTouchKeyboard: true
            });
        });
    </script>
</body>
</html>

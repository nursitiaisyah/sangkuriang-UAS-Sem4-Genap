<?php
session_start();
include "koneksi.php";
include "modul.php";

if (!isset($_SESSION['namaUser'])) {
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
    <meta name="google" value="notranslate">
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
    </style>
    <script src="alat2/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include "ss_mnuatas.php"; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "ss_mnukiri.php"; ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h4 class="mt-4">Biodata Siswa</h4>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="txtID" class="col-4 col-form-label">Nomor Registrasi</label>
                                <div class="col-4">
                                    <input class="form-control" name="txtID" type="text" value="<?=$_SESSION['pilSiswa'];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtNama" class="col-4 col-form-label">Nama Siswa</label>
                                <div class="col-8">
                                    <input class="form-control" name="txtNama" type="text" value="<?=$_SESSION['nmSiswa'];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtJK" class="col-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-4">
                                    <input class="form-control" name="txtJK" type="text" value="<?php
                                    switch ($_SESSION['JK']) {
                                        case "P":
                                            echo "Pria";
                                            break;
                                        case "W":
                                            echo "Wanita";
                                    } ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtTpLahir" class="col-4 col-form-label">Tempat Lahir</label>
                                <div class="col-6">
                                    <input class="form-control" name="txtTpLahir" type="text" value="<?=$_SESSION['tpLahir'];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtTgLahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-4">
                                    <input class="form-control" name="txtTgLahir" type="text" value="<?=$_SESSION['tgLahir'];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtAlamat" class="col-4 col-form-label">Alamat</label>
                                <div class="col-8">
                                    <input class="form-control" name="txtAlamat" type="text" value="<?=$_SESSION['alamat'];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtNoHP" class="col-4 col-form-label">Nomor HP</label>
                                <div class="col-4">
                                    <input class="form-control" name="txtNoHP" type="text" value="<?=$_SESSION['noHP'];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="txtTgMasuk" class="col-4 col-form-label">Tanggal Masuk</label>
                                <div class="col-4">
                                    <input class="form-control" name="txtTgMasuk" type="text" value="<?=$_SESSION['tgMasuk'];?>" readonly>
                                </div>
                            </div>

                            <br/>
                            <a href="frmsiswa.php" class="btn btn-sm btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>

                        <div class="col">
                            Latihan yang pernah diikuti

                            <?php
                            $st = "SELECT periode, nama, metode, kelas
                                    FROM t_sista
                                    INNER JOIN t_tari ON t_sista.idTari = t_tari.kode
                                    WHERE idSiswa = '" . $_SESSION['pilSiswa'] . "'";

                            $qrySS = mysqli_query($conSS, $st);
                            if ($qrySS && mysqli_num_rows($qrySS) > 0) {
                                ?>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <td colspan="4" class="text-end">
                                                <a href="frmsista.php" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-plus"></i> Latihan Baru</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Periode</th>
                                            <th>Tarian</th>
                                            <th class="text-center">Metode</th>
                                            <th class="text-center">Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($data = mysqli_fetch_array($qrySS)) : ?>
                                            <tr>
                                                <td><?= getPeriode($data['periode']); ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td class="text-center"><?php
                                                switch ($data['metode']) {
                                                    case "K":
                                                        echo "Kelompok";
                                                        break;
                                                    case "P":
                                                        echo "Privat";
                                                } ?>
                                                </td>
                                                <td class="text-center"><?= $data['kelas']; ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "Belum ada data latihan yang diikuti.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

   
    <script src="alat2/bootstrap.bundle.min.js"></script>
    <script src="alat2/scripts.js"></script>
</body>
</html>

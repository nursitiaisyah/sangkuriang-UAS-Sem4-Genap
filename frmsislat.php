<?php
session_start();
include "koneksi.php";
include "modul.php";

if (!isset($_SESSION['namaUser'])) {
    echo "<script>window.location.replace(\"index.php\"); </script>";
    exit();
}

$idMenu = 32;

if (!isset($_SESSION['Prd'])) {
    $_SESSION['Prd'] = $_SESSION['Periode'];
}

if (isset($_POST['pilPrd'])) {
    $_SESSION['Prd'] = $_POST['pilPrd'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" value="notranslate">
    <meta name="robots" content="nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sangkuriang">
    <meta name="author" content="Aisyah">
    <link rel="icon" href="alat2/scifi_superman_icon_157468.ico">

    <title>Sangkuriang</title>
    <!-- Tambahkan tautan Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Tambahkan tautan Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <link rel="stylesheet" href="alat2/styles.css">
    <link rel="stylesheet" href="alat2/bootstap-datepicker.standalone.min.css">
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
                    <h4 class="mt-4">Daftar Peserta Latihan</h4>

                    <?php
                    $st = "SELECT DISTINCT periode FROM t_sista
                            ORDER BY periode DESC";

                    $qrySS = mysqli_query($conSS, $st);
                    $rows  = mysqli_fetch_all($qrySS, MYSQLI_ASSOC);
                    $ada   = mysqli_num_rows($qrySS);
                    ?>
                    <?php if ($ada > 0) : ?>
                        <form method="post" action="">
                            <div class="form-group row">
                                <div class="col-1">
                                    <label for="pilPrd" class="col-form-label">Periode</label>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <select class="form-control" name="pilPrd">
                                            <?php foreach ($rows as $data) : ?>
                                                <?php
                                                $prd = $data['periode'];
                                                $blnthn = getPeriode($prd)
                                                ?>
                                                <option <?php
                                                        if ($prd == $_SESSION['Prd']) echo "selected = 'selected'";
                                                        ?> value="<?= $prd; ?>"><?= $blnthn; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button class="btn btn-primary" id="btnOK">OK</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br />

                        <?php
                        $st = "SELECT t_tari.nama AS Tarian, ID, t_siswa.nama, metode, kelas
                                FROM t_sista INNER JOIN t_tari ON t_sista.idTari = t_tari. kode
                                    INNER JOIN t_siswa ON t_sista.idSiswa = t_siswa.ID
                                WHERE periode = " . $_SESSION['Prd'] . "
                                ORDER BY Tarian, kelas DESC, ID";

                        $qrySS = mysqli_query($conSS, $st);
                        $rows = mysqli_fetch_all($qrySS, MYSQLI_ASSOC);

                        $Tarian = "";
                        $brs    = 0;
                        ?>
                        <table class="table table-sm">
                            <?php foreach ($rows as $data) : ?>
                                <?php if ($data['Tarian'] != $Tarian) : ?>
                                    <?php
                                    $Tarian = $data['Tarian'];
                                    $nmr = 0;
                                    if ($brs > 0) echo "</tbody>";
                                    ?>
                                    <thead>
                                        <tr>
                                            <th><br /><?= $Tarian; ?></th>
                                            <th class="text-center">Nomor</th>
                                            <th class="text-center">No.Reg.</th>
                                            <th>Nama Siswa</th>
                                            <th class="text-center">Metode</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php endif; ?>
                                <tr>
                                    <?php
                                    $brs++;
                                    $nmr++;
                                    ?>
                                    <td></td>
                                    <td class="text-center"><?= $nmr; ?></td>
                                    <td class="text-center"><?= $data['ID']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td class="text-center"><?php
                                                                switch ($data['metode']) {
                                                                    case "K":
                                                                        echo "Kelompok";
                                                                        break;
                                                                    case "p":
                                                                        echo "Privat";
                                                                } ?>
                                    </td>
                                    <td class="text-center"><?= $data['kelas']; ?></td>
                                    <td class="text-center">
                                        <?php if ($data['kelas'] == "_") : ?>
                                            <button class="btn py-0" name="btnSiswaU" value="<?= $data['ID']; ?>">
                                                <i class="fas fa-share-square "></i> Pindah periode
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        Belum ada peserta latihan
                    <?php endif; ?>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="alat2/bootstrap.bundle.min.js"></script>
    <script src="alat2/scripts.js"></script>
</body>

</html>

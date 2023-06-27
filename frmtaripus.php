<?php
    session_start();
    include "koneksi.php";

    if (!isset($_SESSION['namaUser']))
    {
        echo"<script>window.location.replace(\"index.php\"); </script>";
        exit();
    }

    $idMenu = 110;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" value="notranslate">
    <meta name="robots" content="nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sangkuriang">
    <meta name="author" content="Aisyah, Fasya">
    <link rel="icon" href="alat2/scifi_superman_icon_157468.ico">

    <title>Sangkuriang</title>

    <link rel="stylesheet" href="alat2/styles.css">
    <link rel="stylesheet" href="alat2/all.min.css">
    <style>
        select,
        input,
        span {
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
                    <h4 class="mt-4">Tarian</h4>

                    <div class="form-group row">
                        <label for="txtNama" class="col-2 col-form-label">Nama Tarian</label>
                        <div class="col-3">
                            <input class="form-control" name="txtNama" type="text"
                                value="<?=$_SESSION['nama'];?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="txtJenis" class="col-2 col-form-label">Jenis</label>
                        <div class="col-2">
                            <input class="form-control" name="txtJenis" type="text" value="<?php
                                switch ($_SESSION['jenis'])
                                {
                                    case "D" : echo "Daerah"; break;
                                    case "M" : echo "Modern";
                                }?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="txtNama" class="col-2 col-form-label">Lama Latihan</label>
                        <div class="col-1">
                            <input class="form-control" name="txtNama" type="text"
                                value="<?=$_SESSION['lama'];?>" readonly>
                        </div>
                        <div class="col-1 mt-2">
                            <span>Minggu</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="txtGuru" class="col-2 col-form-label">Pengajar</label>
                        <div class="col-2">
                            <input class="form-control" name="txtGuru" type="text" value="<?php
                                if ($_SESSION['nGuru'] < 1) echo "Tidak ada";
                                else echo "Ada";
                                ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="txtAktif" class="col-2 col-form-label">Aktif</label>
                        <div class="col-2">
                            <input class="form-control" name="txtAktif" type="text" value="<?php
                                if ($_SESSION['aktif'] == "Y") echo "Ya";
                                else echo "Tidak";
                                ?>" readonly>
                        </div>
                    </div>

                    <?php
                        $st     = "SELECT 1 FROM t_guri WHERE idTari = '" . $_SESSION['pilTari'] . "'";
                        $qrySS  = mysqli_query($conSS, $st);
                        $ada    = mysqli_num_rows($qrySS);
                    ?>
                    <form method="post" action="taripusin.php">
                        <?php if ($ada > 0) : ?>
                            <br/>
                            <div class="alert alert-danger">
                                Data tidak boleh dihapus
                                <button class="btn btn-sm-btn-primary ms-4" name="btnNA" type="submit">
                                    <i class="fas fa-minus-circle"></i> Ubah Non-Aktif</button>
                                <a href="frmtari.php" class="btn btn-sm btn-secondary ms-2">
                                    <i class="fas fa-ban"></i> Batalkan</a>
                            </div>
                        <?php else : ?>
                            <div class="form-group row mt-2">
                                <div class="col-2"></div>
                                <div class="col">
                                    <button class="btn btn-sm btn-primary" name="btnHapus" type="submit">
                                        <i class="fas fa-trash-alt"></i> Hapus</button>
                                        <a href="frmtari.php" class="btn btn-sm btn-secondary ms-2">
                                            <i class="fas fa-ban"></i> Batalkan</a>
                                </div>
                            </div>
                            <?php endif; ?>
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


    <script src="alat2/bootstrap.bundle.min.js"></script>
    <script src="alat2/scripts.js"></script>
</body>
</html>

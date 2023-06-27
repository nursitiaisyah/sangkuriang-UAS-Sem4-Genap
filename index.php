<?php
    session_start();
    include "koneksi.php";

    $idMenu = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" value="notranslate">
    <meta name="robots" content="nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sangkuriang">
    <meta name="author" content="Aisyah">
    <link rel="icon" href="alat2/scifi_superman_icon_157468.ico">

    <title>Sangkuriang</title>
    
    <link rel="stylesheet" href="alat2/styles.css">
    <link rel="stylesheet" href="alat2/all.min.css">
    <script src="alat2/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include "ss_mnuatas.php"; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "ss_mnukiri.php"; ?>
        </div>

        <div id="layoutSidenav_content">
            <main class="mt-4">
                <div class="container-fluid px-4">
                    <div class="col 4">
                        <div class="card alert-info">
                            <div class="card-header">
                                <b>Sanggar Tari Sangkuriang</b>
                            </div>
                            <div class="card-body">
                                Silakan Masuk.<br/><br />

                                <form method="post" action="masuk.php">
                                    <div class="form-group row">
                                        <label for="txtNama" class="col-3 col-form-label">Nama</label>
                                        <div class="col-9">
                                            <input class="form-control bg-white" name="txtNama" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <button class="btn btn-sm btn-primary" name="btnOK" type="submit">
                                                <i class="fas fa-sign-in-alt"></i> Masuk</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
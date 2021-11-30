<?php
d($event);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- My CSS  -->
    <link rel="stylesheet" href="<?= base_url('style/global.css') ?>" />
</head>
<body class="bg-kuning">
        <!-- Deskripsi Event -->
        <div class="row mt-5 justify-content-center">
            <div class="col-8 shadow" style="background-color: white">
                <div class="row">
                    <h2 class="mt-5 text-center text-coklat fw-bolder mb-4"><?= $event['nama'] ?></h2>
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <img class="img-fluid" src="<?= base_url('img/poster webinar/'.$event['poster']); ?>" alt="" width="500" />
                        </div>
                    </div>
                    <div class="fs-5 my-5 ms-2">
                        <p>
                            <?= $event['deskripsi']?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Deskripsi Event -->

        <!-- Detail Event -->
        <div class="row mt-5 justify-content-center">
            <div class="col-8 shadow" style="background-color: white">
                <div class="row">
                    <h2 class="mt-5 text-coklat fw-bolder mb-4 mx-md-5">DETAIL EVENT</h2>
                </div>
                <div class="row fs-5 mx-md-5 my-2">
                    <div class="col-md-4 mb-4">
                        <p class="fw-bold"><i class="bi bi-building"></i> Partner Event</p>
                        <p>Konseling Bersama</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <p class="fw-bold"><i class="bi bi-calendar"></i> Mulai</p>
                        <p>Senin, 23 Februari 2022</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <p class="fw-bold"><i class="bi bi-people-fill"></i> Kuota Tersisa</p>
                        <p>280 Orang</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <p class="fw-bold"><i class="bi bi-person-fill"></i> Peserta</p>
                        <p>78 Orang</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <p class="fw-bold"><i class="bi bi-info-circle-fill"></i> Status</p>
                        <span class="badge bg-primary">Belum Mulai</span>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center mb-4">
                        <div class="col">
                            <a class="btn btn-success container-fluid fs-5 fw-bold py-3">Setujui</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger container-fluid fs-5 fw-bold py-3">Tolak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Detail Event -->
</body>
</html>
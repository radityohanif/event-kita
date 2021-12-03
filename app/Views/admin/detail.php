<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul ?></title>

  <!-- My CSS  -->
  <link rel="stylesheet" href="<?= base_url('style/global.css') ?>" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

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
  <div class="row mt-5 justify-content-center mb-5">
    <div class="col-8 shadow" style="background-color: white">
      <div class="row">
        <h2 class="mt-5 text-coklat fw-bolder mb-4 mx-md-5">DETAIL EVENT</h2>
      </div>
      <div class="row fs-5 mx-md-5 my-2">
        <div class="col-md-4 mb-4">
          <p class="fw-bold"><i class="bi bi-building"></i> Penyelenggara</p>
          <p>
            <a href="#">
              <?= $event['username_penyelenggara']; ?>
            </a>
          </p>
        </div>
        <div class="col-md-4 mb-4">
          <p class="fw-bold"><i class="bi bi-calendar"></i> Mulai</p>
          <p><?= $jadwalEvent; ?></p>
        </div>
        <div class="col-md-4 mb-4">
          <p class="fw-bold"><i class="bi bi-people-fill"></i> Kuota Peserta</p>
          <p><?= $event['kuota']; ?> Orang</p>
        </div>
      </div>
      <form class="container" method="POST" action="<?= base_url('admin/process'); ?>">
        <div class="row justify-content-center mb-4">
          <div class="col">
            <button type="submit" class="btn btn-success container-fluid fs-5 fw-bold py-3" name="status" value="setuju">Setuju</a>
          </div>
          <div class="col">
            <button type="submit" class="btn btn-danger container-fluid fs-5 fw-bold py-3" name="status" value="tolak">Tolak</a>
          </div>
        </div>
        <input type="hidden" name="id" value="<?= $event['id']; ?>">
      </form>
    </div>
  </div>
  <!-- Akhir Detail Event -->
</body>

</html>
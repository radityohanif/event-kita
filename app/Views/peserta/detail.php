<?= $this->extend('layout/peserta/template'); ?>
<?= $this->section('content'); ?>

<style>
.my-link {
  color: blue;
}
</style>

<body class="bg-kuning">
  <!-- Deskripsi Event -->
  <div class="row mt-150 justify-content-center">
    <div class="col-8 shadow" style="background-color: white">
      <div class="row">
        <h2 class="mt-5 text-center text-coklat fw-bolder mb-4"><?= $event['nama']; ?></h2>
        <div class="row justify-content-center">
          <div class="col text-center">
            <img class="img-fluid" src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" alt="" width="500" />
          </div>
        </div>
        <div class="fs-5 my-5 ms-2">
          <p>
            <?= $event['deskripsi']; ?>
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
          <a href="#" class="my-link">
            <u>
              <?= $event['username_penyelenggara']; ?>
            </u>
          </a>
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
            <button class="btn btn-primary container-fluid fs-5 fw-bold py-3">Daftar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Detail Event -->

  <?= $this->endSection(); ?>
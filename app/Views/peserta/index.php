<?= $this->extend('layout/peserta/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">
  <style>
    .card-body {
      flex: 1 1 auto;
      padding: 1rem 1rem;
      height: 200px;
    }
  </style>
  <!-- Jumbotron -->
  <div class="container mt-150">
    <div class="row justify-content-center">
      <div class="col-4">
        <img src="img/Education Illustration.svg" alt="Education Illustration" width="350" />
      </div>
      <div class="col-5">
        <h1 class="text-coklat fw-bolder mt-5">SELAMAT DATANG DI EVENT KITA</h1>
        <p class="text-coklat fw-light fs-4">Platform event management gratis untuk siapa saja</p>
      </div>
    </div>
  </div>

  <!-- Event Popular-->
  <div class="container mt-150">
    <div class="row">
      <h2 class="text-coklat text-center fw-bolder">EVENT POPULAR</h2>
    </div>
    <div class="row mt-5 justify-content-center">
      <?php foreach($event_populer as $event): ?>
      <div class="col-md-4 my-3">
        <a href="<?= base_url('peserta/detail/' . $event['id']); ?>">
          <div class="card shadow">
            <img width="214" height="380" src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $event['nama']; ?></h5>
              <span class="badge bg-primary">Belum Mulai</span>
              <p class="card-text mt-3">
                <i class="bi bi-calendar-date-fill"></i>
                Jum’at, 15 Oktober 2021 08.00
                <br />
                <i class="bi bi-person-fill"></i>
                <?= $event['jumlah_pendaftar']; ?> Peserta
              </p>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="row mt-5 justify-content-center">
      <div class="col-4">
        <a href="<?= base_url('peserta/daftarEvent'); ?>" class="btn btn-coklat container-fluid fw-bold py-3"> LIHAT SEMUA EVENT </a>
      </div>
    </div>
  </div>

  <!-- Statistik -->
  <div class="container mt-150">
    <div class="row">
      <h2 class="text-coklat text-center fw-bolder">STATISTIK</h2>
    </div>
    <div class="row justify-content-evenly mt-3">
      <div class="col-3 bg-coklat-rounded text-light text-center py-2">
        <p class="fs-5">
          <span class="fw-bolder fs-2"><?= $jumlah_peserta ?></span>
          <br />
          Peserta Aktif
        </p>
      </div>
      <div class="col-3 bg-coklat-rounded text-light text-center py-2">
        <p class="fs-5">
          <span class="fw-bolder fs-2"><?= $jumlah_penyelenggara ?></span>
          <br />
          Penyelenggara Aktif
        </p>
      </div>
      <div class="col-3 bg-coklat-rounded text-light text-center py-2">
        <p class="fs-5">
          <span class="fw-bolder fs-2"><?= $jumlah_event ?></span>
          <br />
          Event Terdaftar
        </p>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>
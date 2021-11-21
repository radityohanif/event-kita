<?= $this->extend('layout/penyelenggara/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">

  <!-- Jumbotron -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <!-- Flasher message-->
        <div class="mb-3">
          <?php if (session()->getFlashdata('success')): ?>
          <div class="row mt-100">
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('success'); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <!-- Akhir Flasher messag e-->
      </div>
    </div>
    <div class="row justify-content-center mt-150">
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
      <div class="col-md-4 my-3">
        <a href="detailEvent.html">
          <div class="card shadow">
            <img src="img/poster webinar/1.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Dasar Pemrograman Python</h5>
              <span class="badge bg-primary">Belum Mulai</span>
              <p class="card-text mt-3">
                <i class="bi bi-calendar-date-fill"></i>
                Jum’at, 15 Oktober 2021 08.00
                <br />
                <i class="bi bi-person-fill"></i>
                208 Pendaftar
              </p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 my-3">
        <a href="detailEvent.html">
          <div class="card shadow">
            <img src="img/poster webinar/2.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Wireframe UI/UX Aplikasi</h5>
              <span class="badge bg-primary">Belum Mulai</span>
              <p class="card-text mt-3">
                <i class="bi bi-calendar-date-fill"></i>
                Minggu, 17 Oktober 2021 09.00
                <br />
                <i class="bi bi-person-fill"></i>
                150 Pendaftar
              </p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 my-3">
        <a href="detailEvent.html">
          <div class="card shadow">
            <img src="img/poster webinar/3.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Cloud Computing</h5>
              <span class="badge bg-primary">Belum Mulai</span>
              <p class="card-text mt-3">
                <i class="bi bi-calendar-date-fill"></i>
                Senin, 20 Oktober 2021 20.00
                <br />
                <i class="bi bi-person-fill"></i>
                550 Pendaftar
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="row mt-5 justify-content-center">
      <div class="col-4">
        <a href="cariEvent.html" class="btn btn-coklat container-fluid fw-bold py-3"> LIHAT SEMUA EVENT </a>
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
          <span class="fw-bolder fs-2">156</span>
          <br />
          Peserta Aktif
        </p>
      </div>
      <div class="col-3 bg-coklat-rounded text-light text-center py-2">
        <p class="fs-5">
          <span class="fw-bolder fs-2">50</span>
          <br />
          Penyelenggara Aktif
        </p>
      </div>
      <div class="col-3 bg-coklat-rounded text-light text-center py-2">
        <p class="fs-5">
          <span class="fw-bolder fs-2">399</span>
          <br />
          Event Terdaftar
        </p>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>
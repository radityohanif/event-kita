<?= 
  /**
   * Pilih Template View !!
   */
  // $this->extend('layout/template'); 
  $this->extend('layout/peserta/template'); 
  // $this->extend('layout/peyelenggara/template'); 
?>

<?= $this->section('content'); ?>

<body class="bg-kuning">
  <!-- Search -->
  <h2 class="mt-150 text-center text-coklat fw-bolder mb-4">DAFTAR EVENT</h2>
  <div class="row justify-content-center">
    <div class="col-md-9 col-10">
      <form class="d-flex shadow">
        <input class="form-control fs-md-4 p-md-3" type="text" placeholder="Cari event yang mau kamu ikuti.." aria-label="Search" />
        <button class="btn btn-primary" type="submit" style="width: 100px;">
          <i class="bi bi-search fs-3"></i>
        </button>
      </form>
    </div>
  </div>
  <!-- Search Akhir -->

  <!-- Daftar Event -->
  <div class="container mt-5">
    <div class="row mt-5 justify-content-center">
      <?php foreach($daftar_event as $event): ?>
      <div class="col-md-4 my-3">
        <a href="#">
          <div class="card shadow">
            <img src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $event['nama']; ?></h5>
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
      <?php endforeach; ?>
    </div>
  </div>
  <!-- Akhir Daftar Event -->

  <!-- Pagination -->
  <nav aria-label="Page navigation example">
    <ul class="pagination pagination-lg justify-content-center mt-5">
      <li class="page-item disabled">
        <a class="page-link">Previous</a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
  <!-- Akhir Pagination -->
  <?= $this->endSection(); ?>
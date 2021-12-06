<?= $this->extend('layout/peserta/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="mt-150 text-center text-coklat fw-bolder mb-4">DAFTAR EVENT SAYA</h1>
      </div>
    </div>
  </div>

  <!-- Daftar Event -->
  <div class="container mt-5">
    <div class="row mt-5 justify-content-start">
      <?php 
        $index = 0;
        foreach($daftar_event as $event): 
        $status = $statusMulai[$index];
      ?>
      <div class="col-md-4 my-3">
        <a href="<?= base_url('peserta/detail/' . $event['id']) ?>">
          <div class="card shadow">
            <img src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" class="card-img-top" width="400" height="400" />
            <div class="card-body">
              <h5 class="card-title"><?= $event['nama']; ?></h5>
              <?php if($status == 'Sudah Mulai')
                {
                  echo '<span class="badge bg-danger">Sudah Mulai</span>';
                }else
                {
                  echo '<span class="badge bg-primary">Belum Mulai</span>';
                }
              ?>
              <p class="card-text mt-3">
                <i class="bi bi-calendar-date-fill"></i>
                <?= $jadwal_event[$index]; ?>
                <br />
                <i class="bi bi-person-fill"></i>
                <?= $event['jumlah_pendaftar']; ?> Peserta
              </p>
            </div>
          </div>
        </a>
      </div>
      <?php 
      $index++;
      endforeach; ?>
    </div>
  </div>
  <!-- Akhir Daftar Event -->
  <?= $this->endSection(); ?>
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
          <p class="fw-bold"><i class="bi bi-building"></i> Penyelenggara Event</p>
          <a href="<?= base_url('peserta/dashboard/'.$event['username_penyelenggara']) ?>" class="my-link">
            <u>
              <?= $event['username_penyelenggara']; ?>
            </u>
          </a>
        </div>
        <div class="col-md-4 mb-4">
          <p class="fw-bold"><i class="bi bi-calendar"></i> Mulai</p>
          <p><?= $jadwalEvent; ?></p>
        </div>
        <div class="col-md-4 mb-4">
          <?php $kuotaSisa = $event['kuota'] - $event['jumlah_pendaftar']; ?>
          <p class="fw-bold"><i class="bi bi-people-fill"></i> Kuota tersisa</p>
          <p><?= $kuotaSisa ?> Orang</p>
        </div>
        <div class="col-md-4 mb-4">
          <p class="fw-bold"><i class="bi bi-person-fill"></i> Mengikuti</p>
          <p><?= $event['jumlah_pendaftar']; ?> Orang</p>
        </div>
        <div class="col-md-4 mb-4">
          <p class="fw-bold"><i class="bi bi-info-circle-fill"></i> Status</p>
          <?php 
            if($statusMulai == 'Sudah Mulai')
            {
              echo '<span class="badge bg-danger">Sudah Mulai</span>';
            } 
            else 
            {
              echo '<span class="badge bg-primary">Belum Mulai</span>';
            }
          ?>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center mb-4">
          <div class="col">
            <?php  
              if(in_array($event['id'], $eventSaya)) 
              {
                echo '<a target="blank" href="https://'.$event['link_meet'].'" class="btn btn-success container-fluid fs-5 fw-bold py-3">Enter Meeting</a>';
              }
            ?>
            <form action="<?= base_url('peserta/daftar'); ?>" method="POST">
              <input type="hidden" value="<?= $event['id']; ?>" name="id">
              <?php 
                if(!in_array($event['id'], $eventSaya)) 
                {
                  if($statusMulai == 'Sudah Mulai' || $kuotaSisa == 0) 
                  {
                    echo '<button type="submit" class="btn btn-secondary container-fluid fs-5 fw-bold py-3 disabled">Daftar</button>';
                  } 
                  else 
                  {
                    echo '<button type="submit" class="btn btn-primary container-fluid fs-5 fw-bold py-3">Daftar</button>';
                  }
                }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Detail Event -->

  <?= $this->endSection(); ?>
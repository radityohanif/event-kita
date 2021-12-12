<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url('style/dashboard.css'); ?>" />
  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url('style/global.css'); ?>" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url('eventkita.ico'); ?>">

  <title><?= $title; ?></title>

  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

</head>

<style>
/* Fix Card Body Gak Rata */
.card-body {
  flex: 1 1 auto;
  padding: 1rem 1rem;
  height: 200px;
}
</style>


<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-coklat fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bolder fs-4" href="<?= base_url(); ?>"><span class="text-kuning">Event</span>Kita</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url('peserta/daftarEvent'); ?>">Daftar Event</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person-fill"></i>
                <?= $_SESSION['user']['username']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= base_url('peserta/profil'); ?>">Lihat Profil</a></li>
                <li><a class="dropdown-item" href="<?= base_url('peserta/eventSaya'); ?>">Event Saya</a></li>
                <li>
                <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Profil -->
  <div class="background mt-5" style="background: url('img/background/<?= $profil['background'] ?>'); background-size: cover;"></div>
  <div class="container profil">
    <div class="row">
      <div class="col-1 foto" style="background: url('img/foto profil/<?= $profil['gambar_profil'] ?>'); background-size: cover;"></div>
      <div class="col-3">
        <div class="row">
          <div class="col">
            <h2><?= strtoupper($profil['username']); ?></h2>
            <p class="fs-5 fw-bolder"><?= $profil['nama']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Profil -->

  <!-- Statistik -->
  <div class="container statistik">
    <div class="row justify-content-center text-center">
      <div class="col-3">
        <p>Event Terdaftar</p>
        <p><?= count($event_terdaftar); ?></p>
      </div>
      <div class="col-3">
        <p>Popularitas</p>
        <p><?= implode("", $pengikut[0]); ?></p>
      </div>
    </div>
  </div>
  <!-- Akhir Statistik -->

  <!-- List Event -->
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h2>Daftar Event</h2>
      </div>
    </div>
    <div class="row mt-5 justify-content-start">
      <?php 
        $index = 0;
        foreach($daftar_event as $event): 
        $s = $status[$index];
      ?>
      <div class="col-md-4 my-3">
        <a href="<?= base_url('peserta/detail/' . $event['id']) ?>">
          <div class="card shadow">
            <img width="214" height="380" src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" class="card-img-top" width="400" height="400" />
            <div class="card-body">
              <h5 class="card-title"><?= $event['nama']; ?></h5>
              <?php if($s == 'Diterima')
                {
                  echo '<span class="badge bg-primary">Diterima</span>';
                }
                else if($s == 'Ditolak')
                {
                  echo '<span class="badge bg-danger">Ditolak</span>';
                }
                else
                {
                  echo '<span class="badge bg-success">Sedang diverifikasi</span>';
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
  <!-- Akhir Event -->

  <!-- Footer -->
  <footer class="mt-150 bg-coklat text-light pt-5 pb-3">
    <div class="row">
      <div class="col-md-5 mx-4">
        <h2 class="fw-bolder"><span class="text-kuning">Event</span>Kita</h2>
        <p class="lead">
          PT. Kita Maju <br />
          Jl. Buaya Raya Blok B-14 Garden City, Jakarta <br />
          0886-2020-1119
        </p>
      </div>
      <div class="col-md-5 mx-4">
        <h2 class="fw-bolder"><span class="text-kuning">Follow us</span></h2>
        <div class="row fs-2">
          <div class="col-1">
            <a href="#"><i class="bi bi-youtube"></i></a>
          </div>
          <div class="col-1">
            <a href="#"><i class="bi bi-twitter"></i></a>
          </div>
          <div class="col-1">
            <a href="#"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5 mb-3 fw-normal">
      <div class="col text-center">©️Copyright 2021</div>
    </div>nama_penyelenggara
  </footer>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
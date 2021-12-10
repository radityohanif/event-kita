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
      <a class="navbar-brand fw-bolder fs-4" href="<?= base_url(); ?>"> <span style="color: #ffe600;">Event</span>Kita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url('logout'); ?>">Logout</a>
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
            <h2><?= strtoupper($_SESSION['user']['username']); ?></h2>
            <p class="fs-5 fw-bolder"><?= $profil['nama']; ?></p>
            <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
              Edit
              <i class="bi bi-pencil-square"></i>
            </a>
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
        <p><?= count($daftar_event); ?></p>
      </div>
      <div class="col-3">
        <p>Popularitas</p>
        <p><?= implode("", $pengikut[0]); ?></p>
      </div>
    </div>
    <!-- Flasher message-->
    <?php if (session()->getFlashdata('danger')): ?>
    <div class="mb-3">
      <div class="row mt-5">
        <div class="col">
          <div class="alert alert-danger text-center" role="alert">
            <?= session()->getFlashdata('danger'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-3">
      <div class="row mt-5">
        <div class="col">
          <div class="alert alert-success text-center" role="alert">
            <?= session()->getFlashdata('success'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- Akhir Flasher message-->
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
        $status = $statusMulai[$index];
      ?>
      <div class="col-md-4 my-3">
        <a href="<?= base_url('peserta/detail/' . $event['id']) ?>">
          <div class="card shadow">
            <img width="214" height="380" src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" class="card-img-top" width="400" height="400" />
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
  <!-- Akhir Event -->

  <!-- Tombol Create Event -->
  <a class="float-button" href="#" data-bs-toggle="modal" data-bs-target="#createmodal">
    <i class="bi bi-plus" style="font-size: 50px;"></i>
  </a>
  <!-- Akhir Tombol Create Event-->

  <!-- Modal Create Event -->
  <div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pengajuan Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row justify-content-center" action="<?= base_url('penyelenggara/pengajuan'); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="col">
              <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama Event</label>
                <input type="text" class="form-control <?= ($validator->hasError('nama'))?'is-invalid':'';?>" id="nama" name="nama" value="<?= old('nama'); ?>" />
                <div class="invalid-feedback">
                  <?= $validator->getError('nama'); ?>
                </div>
              </div>
              <div class="mb-3 row">
                <div class="col">
                  <label for="tanggal" class="form-label fw-bold">Tanggal Event </label>
                  <input type="date" class="form-control <?= ($validator->hasError('tanggal'))?'is-invalid':'';?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>" />
                  <div class="invalid-feedback">
                    <?= $validator->getError('tanggal'); ?>
                  </div>
                </div>
                <div class="col">
                  <label for="waktu" class="form-label fw-bold">Waktu Mulai</label>
                  <input type="time" class="form-control <?= ($validator->hasError('waktu'))?'is-invalid':'';?>" id="waktu" name="waktu" value="<?= old('waktu'); ?>" />
                  <div class="invalid-feedback">
                    <?= $validator->getError('waktu'); ?>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="kuota" class="form-label fw-bold">Kuota Peserta</label>
                <input type="number" class="form-control <?= ($validator->hasError('kuota'))?'is-invalid':'';?>" id="kuota" name="kuota" value="<?= old('kuota'); ?>" />
                <div class="invalid-feedback">
                  <?= $validator->getError('kuota'); ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="link" class="form-label fw-bold">Link Online Meeting</label>
                <input type="text" class="form-control <?= ($validator->hasError('link'))?'is-invalid':'';?>" id="link" name="link" value="<?= old('link'); ?>" />
                <div class="invalid-feedback">
                  <?= $validator->getError('link'); ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi Event</label>
                <textarea class="form-control <?= ($validator->hasError('deskripsi'))?'is-invalid':'';?>" id="deskripsi" name="deskripsi" rows="8"><?= old('deskripsi'); ?></textarea>
                <div class="invalid-feedback">
                  <?= $validator->getError('deskripsi'); ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="poster" class="form-label fw-bold">Poster Event</label>
                <input type="file" class="form-control <?= ($validator->hasError('poster'))?'is-invalid':'';?>" id="poster" name="poster" />
                <div class="invalid-feedback">
                  <?= $validator->getError('poster'); ?>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Create Event -->

  <!-- Modal Edit Profil -->
  <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row justify-content-center" action="<?= base_url('penyelenggara/edit'); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="col">
              <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama Penyelenggara</label>
                <input type="text" class="form-control" id="nama" name="nama" value="" />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="" />
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label fw-bold">Gambar profil</label>
                <input type="file" class="form-control" id="foto" name="foto" />
              </div>
              <div class="mb-3">
                <label for="bg" class="form-label fw-bold">Gambar Background</label>
                <input type="file" class="form-control" id="bg" name="bg" />
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Edit Profil -->

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
    </div>
  </footer>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
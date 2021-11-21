<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<body class="bg-coklat text-light">
  <div class="container mt-100">
    <div class="row justify-content-center">
      <div class="row">
        <a href="<?= base_url(); ?>">
          <h2 class="fw-bolder text-center mb-3"><span class="text-kuning">Event</span>Kita</h2>
        </a>

        <!-- Error Message -->
        <div class="row justify-content-center">
          <?php foreach($validator->getErrors() as $error): ?>
          <div class="col-10">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $error; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
      <form class="row justify-content-center" action="<?= base_url('signup/process'); ?>" method="POST" autocomplete="off">
        <div class="col-4">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>" />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email'); ?>" />
          </div>
          <div class="mb-3">
            <label for="tipeUser" class="form-label">Tipe User</label>
            <select class="form-select" id="tipeUser" name="tipe_user">
              <option value="peserta">Peserta</option>
              <option value="penyelenggara">Penyelenggara</option>
            </select>
          </div>
        </div>
        <div class="col-4">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>" />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>" />
          </div>
          <div class="mb-3">
            <label for="konfirmasi" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="konfirmasi" name="konfirmasi_password" value="<?= old('konfirmasi_password'); ?>" />
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-4">
            <button type="submit" class="mt-3 btn btn-primary container-fluid fw-bolder">Daftar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <p class="mt-5 text-center text-light fw-bold">Sudah punya akun ?
    <a href="<?= base_url('login'); ?>" class="text-kuning">
      Login
    </a>
  </p>
  <?= $this->endSection(); ?>
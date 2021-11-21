<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<body class="bg-coklat text-light">
  <div class="container mt-100">
    <form class="row justify-content-center" action="<?= base_url('login/process'); ?>" method="POST" autocomplete="off">
      <div class="col-md-4">
        <a href="<?= base_url(); ?>">
          <h2 class="fw-bolder text-center mb-3"><span class="text-kuning">Event</span>Kita</h2>
        </a>

        <!-- Flasher message-->
        <div class="mb-3">
          <?php if (session()->getFlashdata('error')): ?>
          <div class="row mt-5">
            <div class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('error'); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <?php if (session()->getFlashdata('success')): ?>
          <div class="row mt-5">
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('success'); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <!-- Akhir Flasher message-->

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" autofocus required value="<?= old('username'); ?>" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required value="<?= old('password'); ?>" />
        </div>
        <button type="submit" class="mt-3 btn btn-primary container-fluid fw-bolder">Login</button>
      </div>
    </form>
  </div>
  <p class="mt-5 text-center text-light fw-bold">Belum punya akun ?
    <a href="<?= base_url('signup'); ?>" class="text-kuning">Daftar</a>
  </p>

  <?= $this->endSection(); ?>
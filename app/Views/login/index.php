<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<body class="bg-coklat text-light" style="overflow:hidden;">
  <div class="row align-items-center">
    <!-- Gambar Cover Samping Kiri -->
    <div class="col-6">
      <img class="img-fluid" src="<?= base_url("img/logincover.jpg")?>" alt="Cover">
    </div>
    <!-- Gambar Cover Samping Kiri -->



    <!-- Form Login -->
    <div class="col-6">
      <div class="container">
        <!-- Judul Event Kita -->
        <a href="<?= base_url(); ?>">
          <h2 class="fw-bolder text-center mb-3"><span class="text-kuning">Event</span>Kita</h2>
        </a>
        <!-- Judul Event Kita -->

        <!-- Flasher message-->
        <div class="mb-3">
          <?php if (session()->getFlashdata('error')): ?>
          <div class="row mt-5">
            <div class="col">
              <div class="alert alert-danger rounded-pill text-center" role="alert">
                <?= session()->getFlashdata('error'); ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <?php if (session()->getFlashdata('success')): ?>
          <div class="row mt-5">
            <div class="col">
              <div class="alert alert-success rounded-pill text-center" role="alert">
                <?= session()->getFlashdata('success'); ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <!-- Akhir Flasher message-->

        <!-- Form -->
        <form class="row align-middle justify-content-center" action="<?= base_url('login/process'); ?>" method="POST" autocomplete="off">
          <div class="form-group mb-4">
            <label for="username" class="mb-2">Username</label>
            <input type="text" class="form-control rounded-pill py-2 px-4" id="username" name="username" placeholder="Ketik username" autofocus required value="<?= old('username'); ?>" />
          </div>
          <div class="form-group mb-4">
            <label for="password" class="mb-2">Password</label>
            <input type="password" class="form-control rounded-pill py-2 px-4" id="password" name="password" placeholder="Masukkan password" required value="<?= old('password'); ?>" />
          </div>

          <div class="row mt-3 justify-content-center">
            <div class="col-6">
              <button type="submit" class="btn btn-primary container-fluid fw-bolder rounded-pill py-2">LOGIN</button>
            </div>
          </div>
        </form>

        <p class="mt-5 text-center text-light fw-bold">Belum punya akun ?
          <a href="<?= base_url('signup'); ?>" class="text-kuning">Daftar</a>
        </p>
        <!-- Form -->
      </div>
    </div>
    <!-- Form Login -->
  </div>

  <?= $this->endSection(); ?>
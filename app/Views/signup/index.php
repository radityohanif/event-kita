<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<body class="bg-coklat text-light" style="overflow:hidden;">
  <div class="row align-items-center">
    <!-- Gambar Cover Samping Kiri -->
    <div class="col-6">
      <img class="img-fluid" src="<?= base_url("img/cover.jpg")?>" alt="Cover">
    </div>
    <!-- Gambar Cover Samping Kiri -->


    <!-- Isi Form disebelah kanan -->
    <div class="col-6">
      <div class="container">
        <!-- Judul Event Kita -->
        <a href="<?= base_url(); ?>">
          <h2 class="fw-bolder text-center mb-3"><span class="text-kuning">Event</span>Kita</h2>
        </a>
        <!-- Judul Event Kita -->

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
        <!-- Error Message -->

        <!-- Form Sign Up -->
        <form class="row justify-content-center" action="<?= base_url('signup/process'); ?>" method="POST" autocomplete="off">
          <div class="col">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control px-4 rounded-pill py-2" placeholder="Masukkan nama anda" id="nama" name="nama" autofocus value="<?= old('nama'); ?>" />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control px-4 rounded-pill py-2" placeholder="Masukkan email anda" id="email" name="email" value="<?= old('email'); ?>" />
            </div>
            <div class="mb-3">
              <label for="tipeUser" class="form-label">Tipe User</label>
              <select class="form-select rounded-pill py-2" id="tipeUser" name="tipe_user">
                <option value="peserta">Peserta</option>
                <option value="penyelenggara">Penyelenggara</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control px-4 rounded-pill py-2" placeholder="Masukkan username baru" id="username" name="username" value="<?= old('username'); ?>" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control px-4 rounded-pill py-2" placeholder="Masukkan password" id="password" name="password" value="<?= old('password'); ?>" />
            </div>
            <div class="mb-3">
              <label for="konfirmasi" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control px-4 rounded-pill py-2" placeholder="Masukkan kembali password" id="konfirmasi" name="konfirmasi_password" value="<?= old('konfirmasi_password'); ?>" />
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-4">
              <button type="submit" class="mt-3 btn btn-primary container-fluid fw-bolder rounded-pill py-2">Daftar</button>
            </div>
          </div>
        </form>
        <!-- Form Sign Up -->
      </div>
      <p class="mt-5 text-center text-light fw-bold">Sudah punya akun ?
        <a href="<?= base_url('login'); ?>" class="text-kuning">
          Login
        </a>
      </p>
    </div>
    <!-- Isi Form disebelah kanan -->
  </div>

  <?= $this->endSection(); ?>
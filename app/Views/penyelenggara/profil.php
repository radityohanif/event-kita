<?= $this->extend('layout/penyelenggara/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">
  <!-- Foto Profil -->
  <h2 class="mt-150 text-center text-coklat fw-bolder mb-4">PROFIL SAYA</h2>
  <div class="row mt-1 justify-content-center">
    <div class="col text-center">
      <img src="<?= base_url('/img/foto profil/' . $_SESSION['user']['gambar_profil']); ?>" alt="foto profil saya" width="200" class="img-fluid rounded-circle shadow" />
    </div>
  </div>
  <!-- Foto Profil Akhir -->
  <!-- Biodata -->
  <fieldset disabled>
    <div class="row mt-5 justify-content-center">
      <div class="col-4">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" placeholder="<?= $_SESSION['user']['nama']; ?>" />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="<?= $_SESSION['user']['email']; ?>" />
        </div>
      </div>
      <div class="col-4">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" placeholder="<?= $_SESSION['user']['username']; ?>" />
        </div>
        <div class="mb-3">
          <label for="nohp" class="form-label">Nomor HP</label>
          <input type="text" class="form-control" id="nohp" placeholder="<?= $_SESSION['user']['no_hp']; ?>" />
        </div>
        <!-- </form> -->
      </div>
    </div>
  </fieldset>
  <!-- Akhir Biodata -->
  <div class="container mt-3">
    <div class="row justify-content-center mb-4">
      <div class="col-5">
        <button class="btn btn-primary container-fluid fw-bold py-2">Ubah Profil</button>
      </div>
    </div>
  </div>
  <?= $this->endSection(); ?>
<?= $this->extend('layout/penyelenggara/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">
  <div class="container mt-150">
    <div class="row">
      <h3 class="text-coklat text-center fw-bolder">FORM PENGAJUAN EVENT</h3>
    </div>
    <form class="row justify-content-center mt-4" action="<?= base_url('penyelenggara/uploadPengajuan'); ?>" method="POST" autocomplete="off">
      <div class="col-8">
        <div class="mb-3">
          <label for="nama" class="form-label fw-bold">Nama Event</label>
          <input type="text" class="form-control" id="nama" name="nama" required />
        </div>
        <div class="mb-3 row">
          <div class="col">
            <label for="tanggal" class="form-label fw-bold">📅Tanggal Event </label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required />
          </div>
          <div class="col">
            <label for="waktu" class="form-label fw-bold">🕛Waktu Mulai</label>
            <input type="time" class="form-control" id="waktu" name="waktu" required />
          </div>
        </div>
        <div class="mb-3">
          <label for="kuota" class="form-label fw-bold">Kuota Peserta</label>
          <input type="number" class="form-control" id="kuota" name="kuota" required />
        </div>
        <div class="mb-3">
          <label for="link" class="form-label fw-bold">🌏Link Online Meeting</label>
          <input type="text" class="form-control" id="link" name="link" required />
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label fw-bold">Deskripsi Event</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="8"></textarea>
        </div>
        <div class="mb-3">
          <label for="poster" class="form-label fw-bold">Poster Event</label>
          <input type="file" class="form-control" id="poster" />
        </div>
        <button type="submit" class="mt-3 btn py-3 container-fluid fw-bolder btn-coklat">Ajukan Event 🚀</button>
      </div>
    </form>
  </div>

  <?= $this->endSection(); ?>
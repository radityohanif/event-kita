<?= $this->extend('layout/penyelenggara/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">
  <div class="container mt-150">
    <div class="row">
      <h3 class="text-coklat text-center fw-bolder">FORM PENGAJUAN EVENT</h3>
    </div>
    <form class="row justify-content-center mt-4" action="<?= base_url('penyelenggara/uploadPengajuan'); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="col-8">
        <div class="mb-3">
          <label for="nama" class="form-label fw-bold">Nama Event</label>
          <input type="text" class="form-control <?= ($validator->hasError('nama'))?'is-invalid':'';?>" id="nama" name="nama" value="<?= old('nama'); ?>" />
          <div class="invalid-feedback"><?= $validator->getError('nama'); ?></div>
        </div>
        <div class="mb-3 row">
          <div class="col">
            <label for="tanggal" class="form-label fw-bold">📅Tanggal Event </label>
            <input type="date" class="form-control <?= ($validator->hasError('tanggal'))?'is-invalid':'';?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>" />
            <div class="invalid-feedback"><?= $validator->getError('tanggal'); ?></div>
          </div>
          <div class="col">
            <label for="waktu" class="form-label fw-bold">🕛Waktu Mulai</label>
            <input type="time" class="form-control <?= ($validator->hasError('waktu'))?'is-invalid':'';?>" id="waktu" name="waktu" value="<?= old('waktu'); ?>" />
            <div class="invalid-feedback"><?= $validator->getError('waktu'); ?></div>
          </div>
        </div>
        <div class="mb-3">
          <label for="kuota" class="form-label fw-bold">Kuota Peserta</label>
          <input type="number" class="form-control <?= ($validator->hasError('kuota'))?'is-invalid':'';?>" id="kuota" name="kuota" value="<?= old('kuota'); ?>" />
          <div class="invalid-feedback"><?= $validator->getError('kuota'); ?></div>
        </div>
        <div class="mb-3">
          <label for="link" class="form-label fw-bold">🌏Link Online Meeting</label>
          <input type="text" class="form-control <?= ($validator->hasError('link'))?'is-invalid':'';?>" id="link" name="link" value="<?= old('link'); ?>" />
          <div class="invalid-feedback"><?= $validator->getError('link'); ?></div>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label fw-bold">Deskripsi Event</label>
          <textarea class="form-control <?= ($validator->hasError('deskripsi'))?'is-invalid':'';?>" id="deskripsi" name="deskripsi" rows="8"><?= old('deskripsi'); ?></textarea>
          <div class="invalid-feedback"><?= $validator->getError('deskripsi'); ?></div>
        </div>
        <div class="mb-3">
          <label for="poster" class="form-label fw-bold">Poster Event</label>
          <input type="file" class="form-control <?= ($validator->hasError('poster'))?'is-invalid':'';?>" id="poster" name="poster" />
          <div class="invalid-feedback"><?= $validator->getError('poster'); ?></div>
        </div>
        <button type="submit" class="mt-3 btn py-3 container-fluid fw-bolder btn-coklat">Ajukan Event 🚀</button>
      </div>
    </form>
  </div>

  <?= $this->endSection(); ?>
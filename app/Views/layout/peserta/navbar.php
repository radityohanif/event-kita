<nav class="navbar navbar-expand-lg bg-coklat fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bolder fs-4" href="<?= base_url(); ?>"><span class="text-kuning">Event</span>Kita</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">FAQ</a>
        </li>
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
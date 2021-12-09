<?= $this->extend('layout/peserta/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">
    <!-- Foto Profil -->
    <h2 class="mt-150 text-center text-coklat fw-bolder mb-4">PROFIL SAYA</h2>
    <div class="row mt-1 justify-content-center">
        <div class="col text-center">
            <img src="<?= base_url('/img/foto profil/' . $profil['gambar_profil']); ?>" alt="foto profil saya"
                width="200" class="img-fluid rounded-circle shadow" />
        </div>
    <form class="" action="<?= base_url('peserta/submitEdit')?>" method="POST" enctype="multipart/form-data">
        <div class="col mt-5 text-center">
            <input type="file" name="foto"></input>
        </div>
    </div>
    <!-- Foto Profil Akhir -->

    <!-- Biodata -->
    
        <div class="row mt-5 justify-content-center">
            <div class="col-4">
                <div class="mb-3">
                    <label for="nama" class="form-label " >Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" value ="<?= $profil['nama']; ?>" name="nama" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email"
                        value ="<?= $profil['email']; ?>" name="email"/>
                </div>
                <div class="mb-3">
                    <label for="ttl" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="ttl"
                        value ="<?= $profil['tanggal_lahir']; ?>" name="tgl"/>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username"
                        value ="<?= $profil['username']; ?>" name="username" disabled/>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor HP</label>
                    <input type="number" class="form-control" id="nohp"
                        value ="<?= $profil['no_hp']; ?>" name="nomorhp" />
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jk" name="jk">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <!-- </form> -->
            </div>
        </div>
    

        <!-- Akhir Biodata -->
        <div class="container mt-3">
            <div class="row justify-content-center mb-4">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary container-fluid fw-bold py-2">Ubah Profil</button>
                </div>
            </div>
        </div>
    </form>
    <?= $this->endSection(); ?>
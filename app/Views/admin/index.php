<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('style/global.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Dashboard Admin</title>
</head>

<body class="bg-kuning">
  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1 class="text-coklat fw-bolder">Hello Admin</h1>
        <h3 class="text-coklat">Daftar Pengajuan Event :</h3>
      </div>
      <div class="col-1">
        <a href="<?= base_url('logout'); ?>" class="btn btn-danger fw-bold">
          Logout
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-hover mt-4 shadow" style="background-color: white;">
          <thead style="line-height:40px">
            <tr class="table table-dark fs-5 text-center">
              <th scope="col">ID</th>
              <th scope="col">Penyelenggara</th>
              <th scope="col">Poster</th>
              <th scope="col">Nama Event</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="fs-5">
            <?php foreach($daftar_event_pengajuan as $event): ?>
            <t>
              <td scope="row" class="align-middle">
                <?= $event['id']; ?>
              </td>
              <td class="align-middle">
                <a href="#"><?= $event['username_penyelenggara']; ?></a>
              </td>
              <td class="align-middle">
                <img src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" height="300" width="300">
              </td>
              <td class="align-middle fw-bolder">
                <?= $event['nama']; ?>
              </td>
              <td class="align-middle">
                <div class="btn-group-vertical" role="group" aria-label="Basic mixed styles example">
                  <form action="<?= base_url('admin/detail'); ?>" method="POST">
                    <input type="hidden" value="<?= $event['id']; ?>" name="id">
                    <button type="submit" class="mb-3 btn btn-primary">Lihat Detail</button>
                  </form>
                </div>
              </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
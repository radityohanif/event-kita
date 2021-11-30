<?php 
d($daftar_event_pengajuan);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Dashboard Admin</title>
</head>

<body>
  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1>Hello Admin</h1>
        <a href="<?= base_url('logout'); ?>">Logout</a>
        <h3>Berikut adalah daftar pengajuan event :</h3>
        <table class="table fs-5 mt-3 border border-dark border-2">
          <thead>
            <tr class="table-dark">
              <th scope="col">ID</th>
              <th scope="col">Penyelenggara</th>
              <th scope="col">Poster</th>
              <th scope="col">Nama Event</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($daftar_event_pengajuan as $event): ?>
            <tr>
              <td scope="row" class="align-middle">
                <?= $event['id']; ?>
              </td>
              <td class="align-middle">
                <a href="#">
                  <?= $event['username_penyelenggara']; ?>
                </a>
              </td>
              <td class="align-middle">
                <img src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" height="300">
              </td>
              <td class="align-middle">

              </td>
              <td class="align-middle">
                <div class="btn-group-vertical" role="group" aria-label="Basic mixed styles example">
                  <button type="button" class="mb-3 btn btn-danger">Blokir</button>
                  <button type="button" class="mb-3 btn btn-primary">Setujui</button>
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
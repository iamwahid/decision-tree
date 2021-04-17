<?php
include("layout/navbar.php");
include("layout/sidebar.php");
include ('config.php');
include ('check_login.php');
$user_id = $_SESSION['user_login'];
$query=mysqli_query($koneksi,"SELECT * FROM dset WHERE umur = '1' AND user_id = $user_id LIMIT 1");
$first = mysqli_fetch_assoc($query);
$query=mysqli_query($koneksi,"SELECT MAX(umur) as last FROM dset WHERE user_id = $user_id");
$max = mysqli_fetch_assoc($query);
if (!$max) {
  echo "error";
}

$query=mysqli_query($koneksi,"SELECT * FROM dset WHERE umur = ".$max['last']." AND user_id = $user_id LIMIT 1");
$last = mysqli_fetch_assoc($query);

$query=mysqli_query($koneksi,"SELECT SUM(pakan) AS sum FROM dset WHERE user_id = $user_id LIMIT 1");
$sum_pakan = mysqli_fetch_assoc($query)['sum'];

$query=mysqli_query($koneksi,"SELECT SUM(mortalitas) AS sum FROM dset WHERE user_id = $user_id");
$sum_mortalitas = mysqli_fetch_assoc($query)['sum'];

$persen_mortalitas = $sum_mortalitas / $first['jumlahayam'] * 100;
?>
<div class="wrapper">
  <!--end-->
  <div class="wrapper">
    <div id="content mt-5">
      <div class="container-fluid mt-5 p-5">

        <div class="row">
          <div class="col-sm">
            <div class="alert alert-secondary" style="width:600px;" role="alert">
              <h3>Informasi ternak</h3>

              <table class="table caption-top" style="width:px;">

                <thead>

                  <!-- <tr>
                    <th scope="col">Tanggal DOC masuk </th>
                    <td> <?=$first['tgl']?> </td>
                  </tr> -->
                  <tr>
                    <th scope="col">Umur </th>
                    <td><?=$last['umur']?> hari</td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah Ayam</th>
                    <td><?=$last['jumlahayam']?> ekor</td>
                  <tr>
                  <tr>
                    <th scope="col">Berat</th>
                    <td><?=$last['berat']?> gram</td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah total pakan</th>
                    <td><?=$sum_pakan?> sak</td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah total mortalitas</th>
                    <td><?=$sum_mortalitas?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Persentase mortalitas </th>
                    <td> <?=$persen_mortalitas?>%</td>
                  </tr>
                  <tr>
                    <th scope="col">Keterangan mortalitas keseluruhan </th>
                    <td> <?=$persen_mortalitas > 5 ? "Mortalitas Besar" : "Mortalitas Kecil" ?></td>
                  </tr>



                </thead>
              </table>
            </div>
          </div>
        </div>

      </div>



    </div>
  </div>
</div>
<!--end-->
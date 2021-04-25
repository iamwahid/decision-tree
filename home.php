<?php
include 'config.php';
include ('check_login.php');

include("layout/navbar.php");
include("layout/sidebar.php");

$settings = [
  'kapasitas_maksimal' => '',
  'umur_awal' => '',
  'umur_panen' => '',
  'umur_panen_maksimal' => '',
  'berat_panen' => '',
  'batas_mortalitas' => '',
];

$query=mysqli_query($koneksi,"SELECT * FROM setting");

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


foreach ($result as $k => $sett) {
    $settings[$sett['key']] = $sett['value'];
}

?>
<div class="wrapper">
  <div class="wrapper">
    <div id="content mt-5">
      <div class="container-fluid mt-5 p-5">
        <div class="row">
          <div class="col-sm">
            <div class="alert alert-secondary" style="width:500px;" role="alert">
              <h3>Informasi</h3>
              <a href="setting.php"><button class="btn btn-secondary" style="width:150px; margin-right:20px;">Ubah Informasi</button></a>
              <table class="table caption-top" style="width:px;">
                <thead>
                  <tr>
                    <th scope="col">Populasi Banyak </th>
                    <td> ≥ <?=$settings['populasi_banyak']?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Populasi Sedang </th>
                    <td>
                      <?=$settings['populasi_sedikit']?> ekor < Populasi < <?=$settings['populasi_banyak']?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Populasi Sedikit</th>
                    <td><?=$settings['populasi_sedikit']?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Mortalitas Besar </th>
                    <td>  ≥  <?=$settings['batas_mortalitas']?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Mortalitas Kecil </th>
                    <td>
                      < <?=$settings['batas_mortalitas']?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Berat Besar</th>
                    <td><?=$settings['berat_besar']?> gram</td>
                  </tr>
                  <tr>
                    <th scope="col">Berat Sedang</th>
                    <td><?=$settings['berat_kurang']?> gram ≤ Berat ≤ <?=$settings['berat_besar']?> gram</td>
                  </tr>
                  <tr>
                    <th scope="col">Berat Kurang</th>
                    <td><?=$settings['berat_kurang']?> gram</td>
                  </tr>
                  <tr>
                    <th scope="col">Umur Kurang</th>
                    <td><?=$settings['umur_kurang']?> Hari</td>
                  </tr>
                  <tr>
                    <th scope="col">Umur Sedang</th>
                    <td><?=$settings['umur_kurang']?> Hari > Umur ≤ <?=$settings['umur_lebih']?> Hari</td>
                  </tr>
                  <tr>
                    <th scope="col">Umur Lebih</th>
                    <td><?=$settings['umur_lebih']?> Hari</td>
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
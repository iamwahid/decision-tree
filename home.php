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
  <!--end-->
  <div class="wrapper">
    <div id="content mt-5">
      <div class="container-fluid mt-5 p-5">

        <div class="row">
          <div class="col-sm">
            <div class="alert alert-secondary" style="width:350px;" role="alert">
              <h3>Informasi</h3>
              <a href="setting.php"><button class="btn btn-secondary" style="width:150px; margin-right:20px;">Ubah Informasi</button></a>
              <table class="table caption-top" style="width:px;">

                <thead>
                  <tr>
                    <th scope="col">Kapasitas maksimal ayam </th>
                    <td><?=$settings['kapasitas_maksimal']?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Umur awal</th>
                    <td><?=$settings['umur_awal']?> hari</td>
                  <tr>
                  <tr>
                    <th scope="col">Umur panen</th>
                    <td><?=$settings['umur_panen']?> hari</td>
                  </tr>
                  <tr>
                    <th scope="col">Umur panen maksimal</th>
                    <td><?=$settings['umur_panen_maksimal']?> hari</td>
                  </tr>
                  <tr>
                    <th scope="col">Berat panen</th>
                    <td><?=$settings['berat_panen']?> gram</td>
                  </tr>
                  <tr>
                    <th scope="col">Mortalitas besar </th>
                    <td> >= <?=$settings['batas_mortalitas']?> ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Mortalitas kecil </th>
                    <td>
                      < <?=$settings['batas_mortalitas']?> ekor</td>
                  </tr>


                </thead>
              </table>
            </div>


          </div>
          <!-- <div class="col-sm">
            <div class="alert alert-secondary" style="width:350px;" role="alert">
              <h3>Informasi ternak</h3>

              <table class="table caption-top" style="width:px;">

                <thead>

                  <tr>
                    <th scope="col">Tanggal DOC masuk </th>
                    <td> 01-01-2021 </td>
                  </tr>
                  <tr>
                    <th scope="col">Umur </th>
                    <td>35 hari</td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah Ayam</th>
                    <td>2945 hari</td>
                  <tr>
                  <tr>
                    <th scope="col">Berat</th>
                    <td>2110 gram</td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah total pakan</th>
                    <td>190 sak</td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah total mortalitas</th>
                    <td>155 ekor</td>
                  </tr>
                  <tr>
                    <th scope="col">Persentase mortalitas </th>
                    <td> 5%</td>
                  </tr>



                </thead>
              </table>
            </div>
          </div> -->
        </div>

      </div>



    </div>
  </div>
</div>
<!--end-->
<?php
include("layout/navbar.php");
include("layout/sidebar.php");
include("config.php");
include ('check_login.php');
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$user_id = $_SESSION['user_login'];
if (!$id) header('location:dataset.php', true, 302);

$dataset = mysqli_query($koneksi, "SELECT * FROM dset WHERE id = '$id' AND user_id = $user_id LIMIT 1");
$dtset = mysqli_fetch_assoc($dataset);

$sop = mysqli_query($koneksi, "SELECT * FROM sop WHERE umur = '".$dtset['umur']."' LIMIT 1");
$dsop = mysqli_fetch_assoc($sop);

?>
<div class="wrapper">
  <div class="wrapper">
    <div id="content mt-5">
      <div class="container-fluid mt-5 p-5">
        <div class="row">
          <div class="col-sm">
            <div class="alert alert-secondary" style="width:100%;" role="alert">
              <h3>Data Ternak Terhadap Prosedur Operasi Standar</h3>
              <table class="table caption-top" style="width:px;">
                <thead>
                  <tr>
                    <th>Paremeter</th>
                    <th>Data Ternak</th>
                    <th>Prosedur Operasi Standar</th>
                    <th>Selisih</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Umur</th>
                    <td><?=$dtset['umur']?> Hari</td>
                    <td><?=$dsop['umur']?> Hari</td>
                    <td> - </td>
                  </tr>
                  <tr>
                    <th>Jumlah Ayam</th>
                    <td><?=$dtset['jumlahayam']?></td>
                    <td> - </td>
                    <td> - </td>
                  </tr>
                  <tr>
                    <th>Mortalitas</th>
                    <td><?=$dtset['mortalitas']?></td>
                    <td> - </td>
                    <td> - </td>
                  </tr>
                  <tr>
                    <th>Berat</th>
                    <td><?=$dtset['berat']?> gram</td>
                    <td><?=$dsop['berat']?> gram</td>
                    <td><?=(int)$dtset['berat'] - (int)$dsop['berat']?> gram</td>
                  </tr>
                  <tr>
                    <th>Pakan</th>
                    <td><?=$dtset['pakan']?> sak</td>
                    <td><?=$dsop['pakan']?> sak</td>
                    <td><?=(float)$dtset['pakan'] - (float)$dsop['pakan']?> sak</td>
                  </tr>
                  <tr>
                    <th>Suhu</th>
                    <td><?=$dtset['ksuhu']?> °C</td>
                    <td><?=$dsop['suhu']?> °C</td>
                    <td><?=(int)$dtset['ksuhu'] - (int)$dsop['suhu']?> °C</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
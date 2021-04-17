<?php
include("layout/navbar.php");
include("layout/sidebar.php");
include("config.php");
include ('check_login.php');
$umur = $_GET['umur'] ?? NULL;
$user_id = $_SESSION['user_login'];
if (!$umur) header('location:dataset.php', true, 302);

$dataset = mysqli_query($koneksi, "SELECT * FROM dset WHERE umur = '$umur' AND user_id = $user_id LIMIT 1");
$sop = mysqli_query($koneksi, "SELECT * FROM sop WHERE umur = '$umur' LIMIT 1");

$dtset = mysqli_fetch_row($dataset);
$dsop = mysqli_fetch_row($sop);

?>

<div class="wrapper">
  <!--end-->
  <div class="wrapper">
    <div id="content mt-5">
      <div class="container-fluid mt-5 p-5">

        <div class="row">
          <div class="col-sm">
            <div class="alert alert-secondary" style="width:100%;" role="alert">
              <h3>Data Ternak terhadap Prosedur Operasi Standar</h3>
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
                    <td><?=$dtset[0]?> Hari</td>
                    <td><?=$dsop[0]?> Hari</td>
                    <td> - </td>
                  </tr>
                  <tr>
                    <th>Jumlah Ayam</th>
                    <td><?=$dtset[1]?></td>
                    <td> - </td>
                    <td> - </td>
                  </tr>
                  <tr>
                    <th>Mortalitas</th>
                    <td><?=$dtset[2]?></td>
                    <td> - </td>
                    <td> - </td>
                  </tr>
                  <tr>
                    <th>Berat</th>
                    <td><?=$dtset[3]?> gram</td>
                    <td><?=$dsop[1]?> gram</td>
                    <td><?=(int)$dtset[3] - (int)$dsop[1]?> gram</td>
                  </tr>
                  <tr>
                    <th>Pakan</th>
                    <td><?=$dtset[4]?> sak</td>
                    <td><?=$dsop[2]?> sak</td>
                    <td><?=(float)$dtset[4] - (float)$dsop[2]?> sak</td>
                  </tr>
                  <tr>
                    <th>Suhu</th>
                    <td><?=$dtset[5]?> °C</td>
                    <td><?=$dsop[3]?> °C</td>
                    <td><?=(int)$dtset[5] - (int)$dsop[3]?> °C</td>
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
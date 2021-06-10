<?php 
include("layout/navbar.php");
include("layout/sidebar.php");
include("config.php");
include ('check_login.php');

if (isset($_POST['import'])) {
  $file = $_FILES['data'];
  
  // echo var_dump($file);die;
  move_uploaded_file($file['tmp_name'], __DIR__.'/csv/'.$file['name']);
  $handle = fopen(__DIR__.'/csv/'.$file['name'], "r");
  $i = 0;
  $query = "INSERT INTO prosedur_pengelolaan_ternak (umur, berat, pakan, suhu) VALUES ";
  while (($data = fgetcsv($handle)) !== FALSE) {
    if ($i == 0) {
      $i++;
      continue;
    }
    $query .= " ('$data[0]', '$data[3]', '$data[4]', '$data[5]'),";
    $i++;
  }

  $query = substr($query, 0, strlen($query)-1) . ";";
  $result = mysqli_query($koneksi, $query);
}

?>

<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Data SOP (.csv)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="file" name="data" style="width:45rem">
            </div>
        </div>
        <div>
            <div class="col-sm mt-5">
                <button type="submit" name="import" value="data" class="btn btn-secondary">Import</button>
                <button type="reset" class="btn btn-danger" onclick="window.location = 'sop.php'">Batal</button>
            </div>
            </div>
        </form>  
    </div>
</div>

<?php 
include "config.php";
include ('check_login.php');

$settings = [
    'kapasitas_maksimal' => '',
    'umur_awal' => '',
    'umur_panen' => '',
    'umur_panen_maksimal' => '',
    'berat_panen' => '',
    'batas_mortalitas' => '',
];

if (isset($_POST['action'])) {
    $data = $_POST['settings'];
    $id = 1;
    foreach ($settings as $k => $sett) {
        if (isset($data[$k]))
        $q = "INSERT INTO setting (`id`, `key`, `value`) VALUES($id, '$k', '".$data[$k]."') ON DUPLICATE KEY UPDATE `key`='$k', `value`='".$data[$k]."'";
        $res=mysqli_query($koneksi,$q);
        $id++;
    }
    header('location:home.php', true, 302);
}

$query=mysqli_query($koneksi,"SELECT * FROM setting");

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


foreach ($result as $k => $sett) {
    $settings[$sett['key']] = $sett['value'];
}

include("layout/navbar.php");
include("layout/sidebar.php");
?>
<!--content-->
<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm">
                <label>Kapasitas Maksimal</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[kapasitas_maksimal]" style="width:45rem" value="<?=$settings['kapasitas_maksimal']?>">
            </div>
        </div> 
        <div class="form-group row">
            <div class="col-sm">
                <label>Umur Awal</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[umur_awal]" style="width:45rem" value="<?=$settings['umur_awal']?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm">
                <label>Umur Panen</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[umur_panen]" style="width:45rem" value="<?=$settings['umur_panen']?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm">
                <label>Umur Panen Maksimal</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[umur_panen_maksimal]" style="width:45rem" value="<?=$settings['umur_panen_maksimal']?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm">
                <label>Berat Panen</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[berat_panen]" style="width:45rem" value="<?=$settings['berat_panen']?>">
            </div>
        </div>
         <div class="form-group row">
            <div class="col-sm">
                <label>Batas Mortalitas</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[batas_mortalitas]" style="width:45rem" value="<?=$settings['batas_mortalitas']?>">
            </div>
        </div>
        <div>
            <div class="col-sm mt-5">
                <button type="submit" name="action" value="save" class="btn btn-secondary">Simpan</button>
                <button type="reset" class="btn btn-danger" onclick="window.location = 'home.php'">Batal</button>
            </div>
            </div>
        </form>  
    </div>
</div>
<!--end-->
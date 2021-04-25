<?php 
include "config.php";
include ('check_login.php');

$settings = [
    'populasi_banyak' => '',
    'populasi_sedikit' => '',
    'batas_mortalitas' => '',
    'berat_besar' => '',
    'berat_kurang' => '',
    'umur_lebih' => '',
    'umur_kurang' => '',
    'aturan_pakan' => '',
    'aturan_suhu' => '',
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
                <label>Populasi banyak </label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[populasi_banyak]" style="width:45rem" value="<?=$settings['populasi_banyak']?>">
            </div>
        </div> 
        
        <div class="form-group row">
            <div class="col-sm">
                <label>Populasi sedikit</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[populasi_sedikit]" style="width:45rem" value="<?=$settings['populasi_sedikit']?>">
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
        <div class="form-group row">
            <div class="col-sm">
                <label>Berat besar</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[berat_besar]" style="width:45rem" value="<?=$settings['berat_besar']?>">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm">
                <label>Berat kurang</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[berat_kurang]" style="width:45rem" value="<?=$settings['berat_kurang']?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm">
                <label>Umur panen lebih</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[umur_lebih]" style="width:45rem" value="<?=$settings['umur_lebih']?>">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm">
                <label>Umur panen kurang</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="settings[umur_kurang]" style="width:45rem" value="<?=$settings['umur_kurang']?>">
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
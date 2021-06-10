<?php 
include("layout/navbar.php");
include("layout/sidebar.php");
include("config.php");
include ('check_login.php');

$action = isset($_GET['action']) ? $_GET['action'] : 'create';
$umur = isset($_GET['umur']) ? $_GET['umur'] : NULL;
if ($action == 'edit' && $umur) {
    $query=mysqli_query($koneksi,"SELECT * FROM prosedur_pengelolaan_ternak WHERE umur = '$umur' LIMIT 1");
    $sop = mysqli_fetch_assoc($query);
}
?>
<!--content-->
<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <form action="sop_action.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-3">
                <label>Umur (Hari)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="umur" value="<?= $action == 'edit' ? $sop['umur'] : '' ?>" <?= $action == 'edit' ? 'readonly' : '' ?> style="width:45rem">
            </div>
        </div> 
        <div class="form-group row">
            <div class="col-sm-3">
                <label>Berat (gram)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="berat" value="<?= $action == 'edit' ? $sop['berat'] : '' ?>"  style="width:45rem">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <label>Pakan (sak)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="pakan" value="<?= $action == 'edit' ? $sop['pakan'] : '' ?>"  style="width:45rem">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <label>Pakan (gram/ekor)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="pakan_gram" value="<?= $action == 'edit' ? $sop['pakan_gram'] : '' ?>"  style="width:45rem">
            </div>
        </div>
         <div class="form-group row">
            <div class="col-sm-3">
                <label>Suhu (°C)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="ksuhu" value="<?= $action == 'edit' ? $sop['suhu'] : '' ?>"  style="width:45rem">
            </div>
        </div>
        <div>
            <div class="col-sm mt-5">
                <?php if ($action == 'create'): ?>
                <button type="submit" name="action" value="create" class="btn btn-secondary">Simpan</button>
                <?php elseif ($action == 'edit'): ?>
                <button type="submit" name="action" value="update" class="btn btn-secondary">Perbarui</button>
                <?php endif ?>
                <button type="reset" class="btn btn-danger" onclick="window.location = 'sop.php'">Batal</button>
            </div>
            </div>
        </form>  
    </div>
</div>
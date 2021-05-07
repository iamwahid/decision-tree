<?php 
include("layout/navbar.php");
include("layout/sidebar.php");
include("config.php");
include ('check_login.php');
// $query=mysqli_query($koneksi,"SELECT * FROM dset");

$action = isset($_GET['action']) ? $_GET['action'] : 'create';
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$user_id = $_SESSION['user_login'];
if ($action == 'edit' && $id) {
    $query=mysqli_query($koneksi,"SELECT * FROM dset WHERE id = '$id' AND user_id = $user_id LIMIT 1");
    $dataset = mysqli_fetch_assoc($query);
}

$query=mysqli_query($koneksi,"SELECT MAX(umur) as val FROM dset WHERE user_id = $user_id");
$max = mysqli_fetch_assoc($query);
$max_val = $max['val'] ? $max['val']+1 : 1;

?>
<!--content-->
<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <form action="dataset_action.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Umur (Hari)</label>
            </div>
            <div class="col-sm">
                <?php if ($action == 'edit'): ?>
                <input type="hidden" name="id" value="<?=$dataset['id']?>">
                <?php endif ?>
                <input class="form-control form-control" type="text" name="umur" style="width:45rem" value="<?= $action == 'edit' ? $dataset['umur'] : $max_val ?>" readonly >
            </div>
        </div> 
        <?php // if ($action == 'create' && (int)$max['val'] <= 1): ?>
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Jumlah Ayam</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="jumlahayam" style="width:45rem" value="<?= $action == 'edit' ? $dataset['jumlahayam'] : '' ?>">
            </div>
        </div>
        <?php // endif ?>
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Mortalitas</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="mortalitas" style="width:45rem" value="<?= $action == 'edit' ? $dataset['mortalitas'] : '' ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Berat (gram)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="berat" style="width:45rem" value="<?= $action == 'edit' ? $dataset['berat'] : '' ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Pakan (sak)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="pakan" style="width:45rem" value="<?= $action == 'edit' ? $dataset['pakan'] : '' ?>">
            </div>
        </div>
         <div class="form-group row">
            <div class="col-sm-2">
                <label>Suhu (°C)</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="ksuhu" style="width:45rem" value="<?= $action == 'edit' ? $dataset['ksuhu'] : '' ?>">
            </div>
        </div>
        
        <div>
            <div class="col-sm mt-5">
                <?php if ($action == 'create'): ?>
                <button type="submit" name="action" value="create" class="btn btn-secondary">Simpan</button>
                <?php elseif ($action == 'edit'): ?>
                <button type="submit" name="action" value="update" class="btn btn-secondary">Perbarui</button>
                <?php endif ?>
                <button type="reset" class="btn btn-danger" onclick="window.location = 'dataset.php'">Batal</button>
            </div>
            </div>
        </form>  
    </div>
</div>
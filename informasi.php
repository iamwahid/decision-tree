<?php 
include("layout/navbar.php");
include("layout/sidebar.php");
include("config.php");
include ('check_login.php');
$query=mysqli_query($koneksi,"SELECT * FROM data_ternak");
?>
<!--content-->
<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <form action="dataset_action.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Umur</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="umur" style="width:45rem">
            </div>
        </div> 
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Jumlah Ayam Awal</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="jumlahayam" style="width:45rem">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Mortalitas</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="mortalitas" style="width:45rem">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Berat</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="berat" style="width:45rem">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label>Pakan</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="pakan" style="width:45rem">
            </div>
        </div>
         <div class="form-group row">
            <div class="col-sm-2">
                <label>Suhu</label>
            </div>
            <div class="col-sm">
                <input class="form-control form-control" type="text" name="ksuhu" style="width:45rem">
            </div>
        </div>
        <div>
            <div class="col-sm mt-5">
                <button type="submit" class="btn btn-secondary">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </div>
            </div>
        </form>  
    </div>
</div>
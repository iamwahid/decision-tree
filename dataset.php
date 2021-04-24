<?php 
include("layout/navbar.php");
include("layout/sidebar.php");
include ('config.php');
include ('check_login.php');
$user_id = $_SESSION['user_login'];
$query=mysqli_query($koneksi,"SELECT * FROM dset WHERE user_id = $user_id");
?>

<!-- content -->
<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <div class="alert alert-secondary" role="alert">
            <h3>Data Ternak</h3>
            <a href="dataset_form.php"><button class="btn btn-secondary" style="width:150px; margin-right:20px;">Input Data</button></a>
            <a href="grafik.php"><button class="btn btn-secondary" style="width:150px; margin-right:20px;">Grafik</button></a>
            <a href="dataset_export.php"><button class="btn btn-secondary" style="width:150px; margin-right:20px;">Export Excel</button></a>
            <a href="#" onclick="dbReset()">
                <button class="btn btn-secondary" style="width:150px; margin-right:20px;">Buat Baru</button>
                <form action="dataset_action.php" id="dataset_reset" method="POST" class="d-none">
                    <input type="hidden" name="action" value="reset">
                </form>
            </a>
            <a href="dataset_info.php"><button class="btn btn-secondary" style="width:150px; margin-right:20px;">Informasi Ternak</button></a>
        </div>
        <table class="table table-striped" style="width:100%;">
        <tr>
            <th scope="col">Umur</th>
            <th scope="col">Jumlah Ayam</th>
            <th scope="col">Mortalitas</th>
            <th scope="col">Berat (gram)</th>
            <th scope="col">Pakan (sak)</th>
            <th scope="col">Suhu (°C)</th>
            <!-- <th scope="col">Kategori Mortalitas</th> -->
            <th scope="col">Pengelolaan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
            
        </tr> 
        <?php
                    while($data=mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?=$data['umur'].' ('.$data['kat_umur'].')' ?></td>
                    <td><?=$data['jumlahayam'].' ('.$data['kat_jumlah'].')' ?></td>
                    <td><?=$data['mortalitas'].' ('.$data['kat_mortalitas'].')' ?></td>
                    <td><?=$data['berat'].' ('.$data['kat_berat'].')' ?></td>
                    <td><?=$data['pakan'].' ('.$data['kat_pakan'].')' ?></td>
                    <td><?=$data['ksuhu'] ?></td>
                    <!-- <td><?=$data['kmortalitas'] ?></td> -->
                    <td><?=$data['pengelolaan']?></td>
                    <td><?=$data['tgl']?></td>
              
                    <td>
                    <a href="dataset_sop_compare.php?id=<?=$data['id']?>"><button type="button" class="btn btn-secondary"><i class="fas fa-info-circle"></i></button></a> 
                    <a href="dataset_form.php?action=edit&id=<?=$data['id']?>"><button type="button" class="btn btn-secondary"><i class="fas fa-edit text-white"></i></button></a> 
                    <a href="#"><button type="button" class="btn btn-danger" onclick="document.getElementById('dataset_delete_<?= $data['id'] ?>').submit()"><i class="fas fa-trash-alt"></i></button></a>
                    <form action="dataset_action.php" id="dataset_delete_<?= $data['id'] ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <input type="hidden" name="action" value="delete">
                    </form>
                    </td>
                    
                </tr>
                <?php
                    }
                ?>
    </table>
</div>
</div>

<script>
function dbReset() {
    let baru = confirm("Yakin Untuk Membuat Data Baru ?")
    if (baru)
        document.getElementById('dataset_reset').submit()
}
</script>
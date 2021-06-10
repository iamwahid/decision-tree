<?php 
include("layout/navbar.php");
include("layout/sidebar.php");
include ('config.php');
include ('check_login.php');
$user_id = $_SESSION['user_login'];
$query=mysqli_query($koneksi,"SELECT * FROM data_ternak WHERE user_id = $user_id");
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
                <button class="btn btn-secondary" style="width:150px; margin-right:20px;">Simpan dan Buat Baru</button>
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
            <th scope="col">Pengelolaan</th>
            <th scope="col">Aksi</th>
            
        </tr> 
        <?php
                    while($data=mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?=$data['umur']?></td>
                    <td><?=$data['jumlahayam']?></td>
                    <td><?=$data['mortalitas']?></td>
                    <td><?=$data['berat']?></td>
                    <td><?=$data['pakan']?></td>
                    <td><?=$data['ksuhu'] ?></td>
                    <td><?=$data['pengelolaan']?></td>
                    
              
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
    if (baru) {
        let popout = window.open('dataset_export.php?close=1', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
        setTimeout(() => {
            popout.close()
            document.getElementById('dataset_reset').submit()
        }, 3000);
    }
}
</script>
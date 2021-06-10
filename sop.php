<?php
include("layout/navbar.php");
include("layout/sidebar.php");
include('config.php');
include ('check_login.php');

$query = mysqli_query($koneksi, "SELECT * FROM prosedur_pengelolaan_ternak");
?>
<!-- content -->
<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <div class="alert alert-secondary" role="alert">
            <h3>Prosedur Pengelolaan Ternak Ayam</h3>
            <a href="sop_form.php"><button class="btn btn-secondary" style="width:150px; margin-right:20px;">Input Data</button></a>
        </div>
        <table class="table table-striped" style="width:1000px;">
            <thead class="border">
                <tr class="align-top">
                    <th rowspan="2" class="border">Umur (hari)</th>
                    <th rowspan="2" class="border">Berat (gram)</th>
                    <th colspan="2" class="border">Pakan</th>
                    <th rowspan="2" class="border">Kebutuhan suhu (°C)</th>
                    <th rowspan="2" class="border">Aksi</th>
                </tr>
                <tr>
                    <th class="border">sak</th>
                    <th class="border">gram/ekor</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?php echo $data['umur']; ?></td>
                    <td><?php echo $data['berat']; ?></td>
                    <td><?php echo $data['pakan']; ?></td>
                    <td><?php echo $data['pakan_gram']; ?></td>
                    <td><?php echo $data['suhu']; ?></td>
                    <td>
                        <a href="sop_form.php?action=edit&umur=<?= $data['umur'] ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-edit text-white"></i>Edit</button></a>
                        <a href="#"><button type="button" class="btn btn-danger" onclick="document.getElementById('sop_delete_<?= $data['umur'] ?>').submit()">Hapus<i class="fas fa-trash-alt"></i></button></a>

                        <form action="sop_action.php" id="sop_delete_<?= $data['umur'] ?>" method="POST">
                            <input type="hidden" name="umur" value="<?= $data['umur'] ?>">
                            <input type="hidden" name="action" value="delete">
                        </form>

                    </td>
                </tr>
            <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>
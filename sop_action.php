<?php
    include ('config.php');
    include ('check_login.php');
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }

    
    if ($action == 'create') {
        $umur=$_POST['umur'];
        $berat=$_POST['berat'];
        $pakan=$_POST['pakan'];
        $pakan_gram=$_POST['pakan_gram'];
        $ksuhu=$_POST['ksuhu'];
        $query=mysqli_query($koneksi,"INSERT INTO prosedur_pengelolaan_ternak(umur, berat, pakan, pakan_gran, suhu) VALUES('$umur','$berat','$pakan', '$pakan_gram', '$ksuhu')");
    } else if ($action == 'update') {
        $umur=$_POST['umur'];
        $berat=$_POST['berat'];
        $pakan=$_POST['pakan'];
        $pakan_gram=$_POST['pakan_gram'];
        $ksuhu=$_POST['ksuhu'];
        $query=mysqli_query($koneksi,"UPDATE prosedur_pengelolaan_ternak SET berat='$berat', pakan='$pakan', pakan_gram='$pakan_gram', suhu='$ksuhu' WHERE umur = $umur");
    } else if ($action == 'delete') {
        $umur=$_POST['umur'];
        $query=mysqli_query($koneksi,"DELETE FROM prosedur_pengelolaan_ternak WHERE umur = $umur");
    }

    if ($query){
        header('location:sop.php');
    } else {
        echo "Gagal disimpan";
    }
?>

<script>
setTimeout(_ => {
    window.location = 'sop.php';
}, 500);
</script>
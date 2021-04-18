<?php
    include ('config.php');
    include ('decision_tree.php');
    include ('check_login.php');
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }
    $user_id = $_SESSION['user_login'];
    $query = NULL;
    if ($action == 'create') {
        $umur=$_POST['umur'];
        $jumlahayam=$_POST['jumlahayam'];
        $mortalitas=$_POST['mortalitas'];
        $berat=$_POST['berat'];
        $pakan=$_POST['pakan'];
        $ksuhu=$_POST['ksuhu'];
        $tgl=$_POST['tgl'];
    
        $dectree = decision_tree($umur, $mortalitas, $jumlahayam, $berat);
        $kmortalitas=$dectree['nilai']; // value from decision tree
        $deskripsi=$dectree['deskripsi']; // value from decision tree
        
        $query=mysqli_query($koneksi,"INSERT INTO dset(`user_id`, `umur`, `jumlahayam`, `mortalitas`, `berat`, `pakan`, `ksuhu`, `kmortalitas`, `deskripsi`, `tgl`)
            VALUES($user_id, '$umur','$jumlahayam','$mortalitas','$berat','$pakan','$ksuhu','$kmortalitas', '$deskripsi', '$tgl')");
        if ($query){
            header('location:dataset.php', true, 302);
        } else { 
            echo "Gagal Buat";
        }
    } else if ($action == 'update') {
        $id=$_POST['id'];
        
        $umur=$_POST['umur'];  
        $jumlahayam=$_POST['jumlahayam'];
        $mortalitas=$_POST['mortalitas'];
        $berat=$_POST['berat'];
        $pakan=$_POST['pakan'];
        $ksuhu=$_POST['ksuhu'];
        $tgl=$_POST['tgl'];
        
        $dectree = decision_tree($umur, $mortalitas, $jumlahayam, $berat);
        $kmortalitas=$dectree['nilai']; // value from decision tree
        $deskripsi=$dectree['deskripsi']; // value from decision tree
        $deskripsi = mysqli_escape_string($koneksi, $deskripsi);
        $sql = "UPDATE dset SET jumlahayam='$jumlahayam', mortalitas='$mortalitas', berat='$berat', pakan='$pakan', ksuhu='$ksuhu', kmortalitas='$kmortalitas', deskripsi='$deskripsi', tgl='$tgl' WHERE id = '$id' AND user_id = $user_id";
        $query=mysqli_query($koneksi, $sql);
        if ($query){
            header('location:dataset.php', true, 302);
        } else {
            echo "Gagal Update";
        }
    } else if ($action == 'delete') {
        $id=$_POST['id'];
        if ($id != NULL) 
            $query=mysqli_query($koneksi,"DELETE FROM dset WHERE id='$id' AND user_id = $user_id");
        
        if ($query){
            header('location:dataset.php', true, 302);
        } else {
            echo "Gagal Hapus";
        }
    } else if ($action == 'reset') {
        // $query=mysqli_query($koneksi,"TRUNCATE TABLE dset");
        $query=mysqli_query($koneksi,"DELETE FROM dset WHERE user_id = $user_id");
        if ($query){
            header('location:dataset_form.php', true, 302);
        } else {
            echo "Gagal Reset";
        }
    }
?>

<script>
setTimeout(_ => {
    window.location = 'dataset.php';
}, 500);
</script>
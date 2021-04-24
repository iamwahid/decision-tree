<?php
    include ('config.php');
    include ('decision_tree_v2.php');
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
    
        $dectree = decision_tree($umur, $mortalitas, $jumlahayam, $berat, $pakan);

        // $kmortalitas=$dectree['nilai']; // value from decision tree
        $pengelolaan=$dectree['pengelolaan']; // value from decision tree
        $deskripsi=$dectree['deskripsi']; // value from decision tree
        $kat_umur=$dectree['umur']; // value from decision tree
        $kat_jumlah=$dectree['jumlahayam']; // value from decision tree
        $kat_mortalitas=$dectree['mortalitas']; // value from decision tree
        $kat_berat=$dectree['berat']; // value from decision tree
        $kat_pakan=$dectree['pakan']; // value from decision tree

        $deskripsi = mysqli_escape_string($koneksi, $deskripsi);
        // echo var_dump($dectree);die;
        $query=mysqli_query($koneksi, "INSERT INTO dset
        (
            `user_id`, 
            `umur`, 
            `jumlahayam`, 
            `mortalitas`, 
            `berat`, 
            `pakan`, 
            `ksuhu`, 
            `kat_umur`, 
            `kat_jumlah`, 
            `kat_mortalitas`, 
            `kat_berat`, 
            `kat_pakan`, 
            `kat_suhu`,
            `kmortalitas`, 
            `deskripsi`, 
            `tgl`, 
            `pengelolaan`
        )
        VALUES
        (
            $user_id, 
            '$umur',
            '$jumlahayam',
            '$mortalitas',
            '$berat',
            '$pakan',
            '$ksuhu',
            '$kat_umur',
            '$kat_jumlah',
            '$kat_mortalitas',
            '$kat_berat',
            '$kat_pakan',
            '',
            '', 
            '$deskripsi', 
            '$tgl', 
            '$pengelolaan')
        ");
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
        
        $dectree = decision_tree($umur, $mortalitas, $jumlahayam, $berat, $pakan);
        // $kmortalitas=$dectree['nilai']; // value from decision tree
        $deskripsi=$dectree['deskripsi']; // value from decision tree
        $deskripsi = mysqli_escape_string($koneksi, $deskripsi);

        $pengelolaan=$dectree['pengelolaan']; // value from decision tree
        $kat_umur=$dectree['umur']; // value from decision tree
        $kat_jumlah=$dectree['jumlahayam']; // value from decision tree
        $kat_mortalitas=$dectree['mortalitas']; // value from decision tree
        $kat_berat=$dectree['berat']; // value from decision tree
        $kat_pakan=$dectree['pakan']; // value from decision tree
        
        $sql = "UPDATE dset SET 
         jumlahayam='$jumlahayam', 
         mortalitas='$mortalitas',
         berat='$berat', 
         pakan='$pakan', 
         ksuhu='$ksuhu',
         kat_jumlah='$kat_jumlah', 
         kat_mortalitas='$kat_mortalitas',
         kat_berat='$kat_berat', 
         kat_pakan='$kat_pakan', 
         kat_suhu='',
         kmortalitas='$kmortalitas', 
         deskripsi='$deskripsi', 
         tgl='$tgl' 
         
         WHERE id = '$id' AND user_id = $user_id";
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
        
        if ($query) {
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

<!-- <script>
setTimeout(_ => {
    window.location = 'dataset.php';
}, 500);
</script> -->
<?php 
include("layout/navbar.php");
include("layout/sidebar.php");
include("config.php");
include ('check_login.php');
$user_id = $_SESSION['user_login'];
$dataset=mysqli_query($koneksi,"SELECT * FROM dset WHERE user_id = $user_id");
$sop=mysqli_query($koneksi,"SELECT * FROM sop");

$dtset = mysqli_fetch_all($dataset, MYSQLI_ASSOC);
$dsop = mysqli_fetch_all($sop, MYSQLI_ASSOC);

$data_berat_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => (float)$d['berat']];
}, $dtset));

$data_pakan_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => (float)$d['pakan']];
}, $dtset));

$data_suhu_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => (float)$d['ksuhu']];
}, $dtset));

$data_mortalitas_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => $d['mortalitas']];
}, $dtset));

$data_jumlahayam_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => $d['jumlahayam']];
}, $dtset));

$sop_berat_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => (float)$d['berat']];
}, $dsop));

$sop_pakan_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => (float)$d['pakan']];
}, $dsop));

$sop_suhu_values = json_encode(array_map(function($d){
    return ["x" => $d['umur'].' Hari', "y" => (float)$d['suhu']];
}, $dsop));

?>
<!--content-->
<div id="content mt-5">
    <div class="container-fluid mt-5 p-5">
        <div class="row">
            <div class="col">
                <h3>Jumlah Ayam</h3>
                <canvas id="sjumlahChart" width="650" height="150"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Mortalitas</h3>
                <canvas id="smortalitasChart" width="650" height="150"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Pakan</h3>
                <canvas id="pakanChart" width="400" height="150"></canvas>
            </div>
            <div class="col-12">
                <h3>Berat</h3>
                <canvas id="beratChart" width="400" height="150"></canvas>
            </div>
            <div class="col-12">
                <h3>Suhu</h3>
                <canvas id="suhuChart" width="400" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
var smortalCtx = document.getElementById('smortalitasChart').getContext('2d');
var sjumlahCtx = document.getElementById('sjumlahChart').getContext('2d');
var pakanCtx = document.getElementById('pakanChart').getContext('2d');
var beratCtx = document.getElementById('beratChart').getContext('2d');
var suhuCtx = document.getElementById('suhuChart').getContext('2d');

var smortalitasChart = new Chart(smortalCtx, {
    type: 'line',
    data: {
        datasets: [
            {
                label: '# Mortalitas',
                data: JSON.parse('<?=$data_mortalitas_values?>'),
                backgroundColor: [
                    'red',
                ],
                borderColor: [
                    'red',
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var sjumlahChart = new Chart(sjumlahCtx, {
    type: 'line',
    data: {
        datasets: [
            {
                label: '# Jumlah Ayam',
                data: JSON.parse('<?=$data_jumlahayam_values?>'),
                backgroundColor: [
                    'green',
                ],
                borderColor: [
                    'green',
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var pakanChart = new Chart(pakanCtx, {
    type: 'line',
    data: {
        datasets: [
            {
                label: '# Pakan',
                data: JSON.parse('<?=$data_pakan_values?>'),
                backgroundColor: [
                    'blue',
                ],
                borderColor: [
                    'blue',
                ],
                borderWidth: 1
            },
            {
                label: '# SOP Pakan',
                data: JSON.parse('<?=$sop_pakan_values?>'),
                backgroundColor: [
                    'lightblue',
                ],
                borderColor: [
                    'lightblue',
                ],
                borderWidth: 1
            }
    ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var beratChart = new Chart(beratCtx, {
    type: 'line',
    data: {
        datasets: [
            {
                label: '# Berat',
                data: JSON.parse('<?=$data_berat_values?>'),
                backgroundColor: [
                    'cyan',
                ],
                borderColor: [
                    'cyan',
                ],
                borderWidth: 1
            },
            {
                label: '# SOP Berat',
                data: JSON.parse('<?=$sop_berat_values?>'),
                backgroundColor: [
                    'indigo',
                ],
                borderColor: [
                    'indigo',
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var suhuChart = new Chart(suhuCtx, {
    type: 'line',
    data: {
        datasets: [
            {
                label: '# Suhu',
                data: JSON.parse('<?=$data_suhu_values?>'),
                backgroundColor: [
                    'orange',
                ],
                borderColor: [
                    'orange',
                ],
                borderWidth: 1
            },
            {
                label: '# SOP Suhu',
                data: JSON.parse('<?=$sop_suhu_values?>'),
                backgroundColor: [
                    'yellow',
                ],
                borderColor: [
                    'yellow',
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
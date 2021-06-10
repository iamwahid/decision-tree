<?php
require 'vendor/autoload.php';
include("config.php");
include ('check_login.php');
$user_id = $_SESSION['user_login'];
$q_sop=mysqli_query($koneksi,"SELECT prosedur_pengelolaan_ternak.*, dataset.jumlahayam d_jumlah, dataset.berat d_berat, dataset.ksuhu d_suhu, dataset.pakan d_pakan, dataset.mortalitas d_mortalitas, dataset.pengelolaan d_pengelolaan FROM prosedur_pengelolaan_ternak LEFT JOIN data_ternak as dataset ON dataset.umur = prosedur_pengelolaan_ternak.umur WHERE dataset.user_id = $user_id");

$sop = mysqli_fetch_all($q_sop, MYSQLI_ASSOC);

$html = '<table border="1">
  <tr>
    <th rowspan="2">Umur</th>
    <th colspan="6">Data Ternak</th>
    <th colspan="3">Standar</th>
    <th colspan="3">Selisih (Data Ternak - Rekomendasi)</th>
  </tr>
  <tr>
    <th>Berat</th>
    <th>Pakan</th>
    <th>Suhu</th>
    <th>Jumlah Ayam</th>
    <th>Mortalitas</th>
    <th>Pengelolaan</th>
    <th>Berat</th>
    <th>Pakan</th>
    <th>Suhu</th>
    <th>Berat</th>
    <th>Pakan</th>
    <th>Suhu</th>
  </tr>';
foreach ($sop as $k => $d) {
  $html .= '<tr>';
  $html .= '<th>'. $d['umur'] .'</th>';
  $html .= '<td>'. $d['d_berat'] .' gram</td>';
  $html .= '<td>'. $d['d_pakan'] .' sak</td>';
  $html .= '<td>'. $d['d_suhu'] .' °C</td>';
  $html .= '<td>'. $d['d_jumlah'] .'</td>';
  $html .= '<td>'. $d['d_mortalitas'] .'</td>';
  $html .= '<td>'. $d['d_pengelolaan'] .'</td>';
  $html .= '<td>'. $d['berat'] .' gram</td>';
  $html .= '<td>'. $d['pakan'] .' sak</td>';
  $html .= '<td>'. $d['suhu'] .' °C</td>';
  $html .= '<td>'. ((float)$d['d_berat'] - (float)$d['berat']) .' gram</td>';
  $html .= '<td>'. ((float)$d['d_pakan'] - (float)$d['pakan'] ).' sak</td>';
  $html .= '<td>'. ((float)$d['d_suhu'] - (float)$d['suhu']) .' °C</td>';
  $html .= '</tr>';
}

$html .= '</table>';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader;
use PhpOffice\PhpSpreadsheet\IOFactory;

$reader = new Reader\Html();
$spreadsheet = $reader->loadFromString($html);

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Ternak.xlsx"');
$writer->save('php://output');
<?php

function getSetting($key)  {
    include 'config.php';
    $settings = [
        'kapasitas_maksimal' => '',
        'umur_awal' => '',
        'umur_panen' => '',
        'umur_panen_maksimal' => '',
        'berat_panen' => '',
        'batas_mortalitas' => '',
    ];
    
    if (!in_array($key, array_keys($settings))) return "";

    $query=mysqli_query($koneksi,"SELECT * FROM setting");
    
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
    
    foreach ($result as $k => $sett) {
        $settings[$sett['key']] = $sett['value'];
    }

    return $settings[$key];
}

function decision_tree($umur, $mortalitas, $jumlahayam, $berat) {
  $batas = getSetting('batas_mortalitas');
  
  $result = [
    'deskripsi' => '',
    'nilai' => ''
  ];

  if ($umur >= 29) {
      if ($mortalitas >= $batas) {
          $result['nilai'] = "Mortalitas Besar";
          $result['deskripsi'] = "kebutuhan suhu pemeliharaan minggu ketiga 27-26'C  konsumsi pakan minggu ketiga 39 sak  ";
      } else {
          $result['nilai'] = "Mortalitas Kecil";
      }
  } else {
      if ($jumlahayam >= 3073) {
          if ($umur >= 2) {
              if ($jumlahayam >= 3087) {
                  $result['nilai'] = "Mortalitas Kecil";
              } else {
                  if ($berat >= 118) {
                      if ($mortalitas >= $batas) {
                          $result['nilai'] = "Mortalitas Besar";
                          $result['deskripsi'] = "kebutuhan suhu pemeliharaan minggu kedua 27-28'C  konsumsi pakan minggu kedua 23 sak   ";
                      } else {
                          $result['nilai'] = "Mortalitas Kecil";
                      }
                  } else {
                      $result['nilai'] = "Mortalitas Besar";
                      $result['deskripsi'] = "kebutuhan suhu pemeliharaan pada minggu pertama 33-30'C   konsumsi pakan minggu pertama 10 sak   ";
                  }
              }
          } else {
              $result['nilai'] = "Mortalitas Besar";
              $result['deskripsi'] = "kebutuhan suhu awal pemeliharaan 33'C  konsumsi pakan 1-1,5 sak per hari   ";
          }
      } else {
          if ($jumlahayam >= 3050) {
              $result['nilai'] = "Mortalitas Kecil";
          } else {
              if ($mortalitas >= $batas) {
                  $result['nilai'] = "Mortalitas Besar";
                  $result['deskripsi'] = "kebutuhan suhu pemeliharaan minggu ketiga 27-26'C  konsumsi pakan minggu ketiga 39 sak  ";
              } else {
                  $result['nilai'] = "Mortalitas Kecil";
              }
          }
      }
  }

  return $result;
}
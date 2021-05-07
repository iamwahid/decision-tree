<?php

function getSetting($key)  {
    include 'config.php';
    $settings = [
        'populasi_banyak' => '',
        'populasi_sedikit' => '',
        'batas_mortalitas' => '',
        'berat_besar' => '',
        'berat_kurang' => '',
        'umur_lebih' => '',
        'umur_kurang' => '',
        'aturan_pakan' => '',
        'aturan_suhu' => '',
    ];
    
    if (!in_array($key, array_keys($settings))) return "";

    $query=mysqli_query($koneksi,"SELECT * FROM setting");
    
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
    
    foreach ($result as $k => $sett) {
        $settings[$sett['key']] = $sett['value'];
    }

    return $settings[$key];
}

function getSOP($umur)  {
    include 'config.php';

    $result = [];

    $query=mysqli_query($koneksi,"SELECT * FROM sop WHERE umur = '$umur' LIMIT 1");
    
    $result = mysqli_fetch_assoc($query);

    return $result;
}

function mapMortalitas($mortalitas) {
    $batas = getSetting('batas_mortalitas');
    if ($mortalitas >= $batas) {
        return 'besar';
    }

    return 'kecil';
}

function mapJumlah($jumlahayam) {
    $abanyak = getSetting('populasi_banyak');
    $asedikit = getSetting('populasi_sedikit');
    if ($jumlahayam >=  $abanyak) {
        return 'banyak';
    } else if ($jumlahayam < $abanyak && $jumlahayam > $asedikit) {
        return 'sedang';
    }

    return 'sedikit';
}

function mapBerat($berat) {
    $bbesar = getSetting('berat_besar');
    $bkurang = getSetting('berat_kurang');
    if ($berat > $bbesar) {
        return 'besar';
    } else if ($berat <= $bbesar && $berat >= $bkurang) {
        return 'sedang';
    }
    
    return 'kurang';
}

function mapUmur($umur) {
    $ulebih = getSetting('umur_lebih');
    $ukurang = getSetting('umur_kurang');
    if ($umur > $ulebih) {
        return 'lebih';
    } else if ($umur <= $ulebih && $umur > $ukurang) {
        return 'sedang';
    }
    
    return 'kurang';
}

function mapPakan($umur, $pakan) {
    $sop = getSOP($umur);
    if ($sop && isset($sop['pakan']) && (float) $sop['pakan'] == (float)$pakan) {
        return  'sesuai';
    }
    return 'tidak sesuai';
}

function decision_tree($umur, $mortalitas, $jumlahayam, $berat, $pakan) {
    $mortalitas = mapMortalitas($mortalitas);
    $jumlahayam = mapJumlah($jumlahayam);
    $berat = mapBerat($berat);
    $pakan = mapPakan($umur, $pakan);
  $result = [
    'deskripsi' => '',
    'pengelolaan' => '',
    'mortalitas' => $mortalitas,
    'jumlahayam' => $jumlahayam,
    'berat' => $berat,
    'pakan' => $pakan,
    'umur' => mapUmur($umur),
  ];
  
//decision tree
    if (strtolower($mortalitas) == "kecil") {
        if (strtolower($jumlahayam) == "banyak") {
            $result['pengelolaan'] = 'Baik';
        } else {
            if (strtolower($jumlahayam) == "sedang") {
                $result['pengelolaan'] = 'Baik';
            } else {
                $result['pengelolaan'] = 'Kurang';
            }
        }
    } else {
        if (strtolower($berat) == "besar") {
            $result['pengelolaan'] = 'Kurang';
        } else {
            if (strtolower($berat) == "sedang") {
                if (strtolower($pakan) == "sesuai") {
                    $result['pengelolaan'] = 'Baik';
                } else {
                    $result['pengelolaan'] = 'Kurang';
                }
            } else {
                if (strtolower($pakan) == "sesuai") {
                    $result['pengelolaan'] = 'Baik';
                } else {
                    if (strtolower($jumlahayam) == "banyak") {
                        if ($umur >= 23) {
                           $result['pengelolaan'] = 'Kurang';
                        } else {
                           $result['pengelolaan'] = 'Kurang';
                        }
                    } else {
                        if (strtolower($jumlahayam) == "sedang") {
                           $result['pengelolaan'] = 'Kurang';
                        } else {
                           $result['pengelolaan'] = 'Kurang';
                        }
                    }
                }
            }
        }
    }

  return $result;
}
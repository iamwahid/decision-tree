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
    if ($jumlahayam >= 3000) {
        return 'besar';
    } else if ($jumlahayam < 3000 && $jumlahayam > 2000) {
        return 'sedang';
    }

    return 'sedikit';
}

function mapBerat($berat) {
    if ($berat > 2000) {
        return 'besar';
    } else if ($berat <= 2000 && $berat >= 1700) {
        return 'sedang';
    }
    
    return 'kurang';
}

function mapUmur($umur) {
    if ($umur > 37) {
        return 'lebih';
    } else if ($umur <= 37 && $umur > 34) {
        return 'sedang';
    }
    
    return 'kurang';
}

function mapPakan($umur, $pakan) {
    $sop = getSOP($umur);
    if ($sop && isset($sop['pakan']) && (int) $sop['pakan'] == $pakan) {
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

    if (strtolower($mortalitas) == "kecil") {
        if (strtolower($jumlahayam) == "banyak") {
            $result['pengelolaan'] = 'baik';
        } else {
            if (strtolower($jumlahayam) == "sedang") {
                $result['pengelolaan'] = 'baik';
            } else {
                $result['pengelolaan'] = 'kurang';
            }
        }
    } else {
        if (strtolower($berat) == "besar") {
            $result['pengelolaan'] = 'kurang';
        } else {
            if (strtolower($berat) == "sedang") {
                if (strtolower($pakan) == "sesuai") {
                    $result['pengelolaan'] = 'baik';
                } else {
                    $result['pengelolaan'] = 'kurang';
                }
            } else {
                if (strtolower($pakan) == "sesuai") {
                    $result['pengelolaan'] = 'baik';
                } else {
                    if (strtolower($jumlahayam) == "banyak") {
                        if ($umur >= 23) {
                           $result['pengelolaan'] = 'kurang';
                        } else {
                           $result['pengelolaan'] = 'kurang';
                        }
                    } else {
                        if (strtolower($jumlahayam) == "sedang") {
                           $result['pengelolaan'] = 'kurang';
                        } else {
                           $result['pengelolaan'] = 'kurang';
                        }
                    }
                }
            }
        }
    }

  return $result;
}
<?php

require('connection/connect.php');
$query = "SELECT * FROM mahasiswa JOIN jurusan ON mahasiswa.kode_jurusan = jurusan.kode_jurusan";
$execute = mysqli_query($conn, $query);
$cek_data = mysqli_affected_rows($conn);

if ($cek_data > 0) {
  $response['kode'] = 1;
  $response['message'] = 'Semua Data Mahasiswa';
  $response['data'] = array();

  while ($getData = mysqli_fetch_object($execute)) {
    $F['id'] = $getData->id;
    $F['nim'] = $getData->nim;
    $F['kode_jurusan'] = $getData->kode_jurusan;
    $F['nama_lengkap'] = $getData->nama_lengkap;
    $F['gender'] = $getData->gender;
    $F['tempat_lahir'] = $getData->tempat_lahir;
    $F['tanggal_lahir'] = $getData->tanggal_lahir;
    $F['nomor_hp'] = $getData->nomor_hp;
    $F['alamat'] = $getData->alamat;
    $F['nama_jurusan'] = $getData->nama_jurusan;

    array_push($response['data'], $F);
  }
} else {
  $response['kode'] = 0;
  $response['message'] = 'Data Tidak Tersedia';
}

echo json_encode($response);
mysqli_close($conn);

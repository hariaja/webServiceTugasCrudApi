<?php

require('connection/connect.php');
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

  $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
  $execute = mysqli_query($conn, $query);
  $cekData = mysqli_affected_rows($conn);

  if ($cekData > 0) {
    $response['kode'] = 1;
    $response['message'] = 'Detail Data Mahasiswa';
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
      array_push($response['data'], $F);
    }
  } else {
    $response['kode'] = 0;
    $response['message'] = 'Data Tidak Tersedia';
  }
} else {
  $response['kode'] = 0;
  $response['message'] = 'Tidak Ada Post Data';
}

echo json_encode($response);
mysqli_close($conn);

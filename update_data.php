<?php

require('connection/connect.php');
$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id = $_POST['id'];
  $nim = $_POST['nim'];
  $kode_jurusan = $_POST['kode_jurusan'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $gender = $_POST['gender'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $nomor_hp = $_POST['nomor_hp'];
  $alamat = $_POST['alamat'];

  $query = "UPDATE mahasiswa SET
  nim = '$nim',
  kode_jurusan = '$kode_jurusan',
  nama_lengkap = '$nama_lengkap',
  gender = '$gender',
  tempat_lahir = '$tempat_lahir',
  tanggal_lahir = '$tanggal_lahir',
  nomor_hp = '$nomor_hp',
  alamat = '$alamat' WHERE id = '$id'";
  $execute = mysqli_query($conn, $query);
  $cekData = mysqli_affected_rows($conn);

  if ($cekData > 0) {
    $response['kode'] = 1;
    $response['message'] = 'Data Berhasil Diupdate';
  } else {
    $response['kode'] = 0;
    $response['message'] = 'Gagal Mengupdate Data';
  }
} else {
  $response['kode'] = 0;
  $response['message'] = 'Tidak Ada Post Data';
}

echo json_encode($response);
mysqli_close($conn);

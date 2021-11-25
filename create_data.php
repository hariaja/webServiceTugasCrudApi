<?php

require('connection/connect.php');
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nim = $_POST['nim'];
  $kode_jurusan = $_POST['kode_jurusan'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $gender = $_POST['gender'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $nomor_hp = $_POST['nomor_hp'];
  $alamat = $_POST['alamat'];

  $query = "INSERT INTO mahasiswa (nim, kode_jurusan, nama_lengkap, gender, tempat_lahir, tanggal_lahir, nomor_hp, alamat) VALUES('$nim', '$kode_jurusan', '$nama_lengkap', '$gender', '$tempat_lahir', '$tanggal_lahir', '$nomor_hp', '$alamat')";

  $execute = mysqli_query($conn, $query);
  $cekData = mysqli_affected_rows($conn);

  if ($cekData > 0) {
    $response['kode'] = 1;
    $response['message'] = 'Data Berhasil Ditambahkan';
  } else {
    $response['kode'] = 0;
    $response['message'] = 'Gagal Menyimpan Data';
  }
} else {
  $response['kode'] = 0;
  $response['message'] = 'Tidak Ada Post Data';
}

echo json_encode($response);
mysqli_close($conn);

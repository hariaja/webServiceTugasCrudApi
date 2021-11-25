<?php

require('connection/connect.php');
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

  $query = "DELETE FROM mahasiswa WHERE id = '$id'";

  $execute = mysqli_query($conn, $query);
  $cekData = mysqli_affected_rows($conn);

  if ($cekData > 0) {
    $response['kode'] = 1;
    $response['message'] = 'Data Berhasil Dihapus';
  } else {
    $response['kode'] = 0;
    $response['message'] = 'Gagal Menghapus Data';
  }
} else {
  $response['kode'] = 0;
  $response['message'] = 'Tidak Ada Post Data';
}

echo json_encode($response);
mysqli_close($conn);

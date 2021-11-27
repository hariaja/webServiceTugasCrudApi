<?php

// $host = "localhost";
// $user = "root";
// $pass = "root";
// $database = "mahasiswa_api_db";

// $conn = mysqli_connect($host, $user, $pass, $database) or die("Database mySQL Tidak Terhubung");

$user = "root";
$pass = "";
$host = "localhost";
$dbdb = "mahasiswa_api_db";

$conn = new mysqli($host, $user, $pass, $dbdb);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

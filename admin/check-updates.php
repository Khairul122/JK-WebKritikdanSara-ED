<?php
session_start();
include 'function.php'; // sesuaikan dengan file koneksi database Anda

$lastChecked = $_SESSION['last_checked'] ?? time();
$query = "SELECT COUNT(*) AS new_complaints FROM pengaduan WHERE tgl_lapor > FROM_UNIXTIME($lastChecked)";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$newComplaint = $row['new_complaints'] > 0;
$_SESSION['last_checked'] = time();

echo json_encode(['newComplaint' => $newComplaint]);
?>

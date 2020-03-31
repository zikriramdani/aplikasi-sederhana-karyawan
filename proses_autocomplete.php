<?php
include 'koneksi.php';

$no_induk = $_GET['no_induk'];

$query = "SELECT * FROM tbl_karyawan WHERE no_induk = '$no_induk'";
$readKaryawan = mysqli_query($koneksi, $query);
$dataKaryawan = mysqli_fetch_array($readKaryawan);

$data = array(
	'tahun' => date('Y', strtotime($dataKaryawan['tanggal_lahir'])),
	'bulan' => date('M', strtotime($dataKaryawan['tanggal_lahir'])),
);

echo json_encode($data);

?>
<?php
include 'koneksi.php';

if(isset($_POST['Simpan'])) {
    $no_induk       = $_POST['no_induk'];
	$kode_bagian    = $_POST['kode_bagian'];
    $nama           = $_POST['nama'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $tanggal_masuk  = $_POST['tanggal_masuk'];
    $golongan       = $_POST['golongan'];
	 
	$insert = "INSERT INTO tbl_karyawan (no_induk,kode_bagian,nama,tempat_lahir,tanggal_lahir,tanggal_masuk,golongan) VALUES ('$no_induk', '$kode_bagian', '$nama', '$tempat_lahir', '$tanggal_lahir', '$tanggal_masuk', '$golongan')";

	$insertdata = mysqli_query($koneksi, $insert);
	if($insertdata ) {
        header('Location: insert_karyawan.php?status=sukses');
    } else {
        header('Location: insert_karyawan.php?status=gagal');
    }
} else {
	header('Location: insert_karyawan.php');
    die("Akses dilarang...");
}

mysqli_close($koneksi);
?>
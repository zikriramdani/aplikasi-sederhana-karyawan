<?php
include 'koneksi.php';

if(isset($_POST['Simpan'])) {
	$no_induk   = $_POST['no_induk'];
    $tahun      = $_POST['tahun'];
    $bulan      = $_POST['bulan'];
    $kode_gaji  = $_POST['kode_gaji'];
    $jumlah     = $_POST['jumlah'];

    $cek = "SELECT * FROM tbl_gaji WHERE no_induk='$no_induk'";
    $cekData = mysqli_query($koneksi, $cek);
    $rowsData = mysqli_num_rows($cekData);

    if ($rowsData > 0) {
        echo "<script>window.alert('No induk sudah disimpan')
    window.location='insert_gaji.php?status=gagal'</script>";
    } else {
    	$insert = "INSERT INTO tbl_gaji (no_induk,tahun,bulan,kode_gaji,jumlah) VALUES ('$no_induk','$tahun','$bulan','$kode_gaji','$jumlah')";
    	$insertdata = mysqli_query($koneksi, $insert);

    	if($insertdata ) {
            header('Location: insert_gaji.php?status=sukses');
        } else {
            header('Location: insert_gaji.php?status=gagal');
            die('Query Error : '.mysqli_errno($koneksi). 
           ' - '.mysqli_error($koneksi));
        }
    }
} else {
	header('Location: insert_gaji.php');
    die("Akses dilarang...");
}

mysqli_close($koneksi);
?>
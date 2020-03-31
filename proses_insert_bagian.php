<?php
include 'koneksi.php';

if(isset($_POST['Simpan'])) {
	$kode_bagian = $_POST['kode_bagian'];
    $nama_bagian = $_POST['nama_bagian'];
    $kepala_bagian = $_POST['kepala_bagian'];

    $cek = "SELECT * FROM tbl_bagian WHERE kode_bagian='$kode_bagian'";
    $cekData = mysqli_query($koneksi, $cek);
    $rowsData = mysqli_num_rows($cekData);

    if ($rowsData > 0) {
        echo "<script>window.alert('Kode bagian sudah disimpan')
    window.location='insert_bagian.php?status=gagal'</script>";
    } else {
    	$insert = "INSERT INTO tbl_bagian (kode_bagian,nama_bagian,kepala_bagian) VALUES ('$kode_bagian', '$nama_bagian', '$kepala_bagian')";

    	$insertdata = mysqli_query($koneksi, $insert);
    	if($insertdata ) {
            header('Location: insert_bagian.php?status=sukses');
        } else {
            header('Location: insert_bagian.php?status=gagal');
        }
    }
} else {
	header('Location: insert_bagian.php');
    die("Akses dilarang...");
}

mysqli_close($koneksi);
?>
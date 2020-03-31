<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Aplikasi sederhana karyawan</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/tables.css">
</head>
<body>

<div class="flex-container">
	<header>
		<a href="./">Home</a>
		<a href="insert_bagian.php" class="active">Insert Bagian</a>
		<a href="insert_karyawan.php">Insert Karyawan</a>
		<a href="insert_gaji.php">Insert Gaji</a>
		<a href="report_karyawan.php">Report Karyawan</a>
	</header>

	<section class="content">
		<p>Silahkan isi form bagian dibawah ini!</p>

		<form action="proses_insert_bagian.php" method="POST">
		  	<label>Kode Bagian:</label><br>
		  	<input type="text" name="kode_bagian" placeholder="Masukkan kode bagian" required><br>

		  	<label>Nama Bagian:</label><br>
		  	<input type="text" name="nama_bagian" placeholder="Masukkan nama bagian" required><br>

		  	<label>Kepala Bagian:</label><br>
		  	<input type="text" name="kepala_bagian" placeholder="Masukkan kepala bagian" required><br>

		  	<input type="submit" name="Simpan" value="Simpan">
		</form>

		<hr>
		<div class="text-center"><h3>Data Bagian</h3></div>
		<div class="mb-20">
			<?php
				include 'koneksi.php';

				$query = "SELECT * FROM tbl_bagian ORDER BY id_bagian DESC";
				$read = mysqli_query($koneksi, $query);
			?>
			<table>
			  	<tr>
			    	<th>Kode Bagian</th>
			    	<th>Nama Bagian</th>
			    	<th>Kepala Bagian</th>
			  	</tr>
			  	<?php  
				    while($bagian_data = mysqli_fetch_array($read)) {         
				        echo "<tr>";
				        echo "<td>".$bagian_data['kode_bagian']."</td>";
				        echo "<td>".$bagian_data['nama_bagian']."</td>";
				        echo "<td>".$bagian_data['kepala_bagian']."</td>";    
				        echo "</tr>";        
				    }
			    ?>
			</table>
		</div>
	</section>

	<?php include 'footer.php';?>
</div>

</body>
</html>

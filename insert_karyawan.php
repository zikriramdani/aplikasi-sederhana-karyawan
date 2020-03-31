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
		<a href="insert_bagian.php">Insert Bagian</a>
		<a href="insert_karyawan.php" class="active">Insert Karyawan</a>
		<a href="insert_gaji.php">Insert Gaji</a>
		<a href="report_karyawan.php">Report Karyawan</a>
	</header>

	<section class="content">
		<p>Silahkan isi form karyawan dibawah ini!</p>

		<form action="proses_insert_karyawan.php" method="POST">
			<label>No Induk:</label><br>
		  	<input type="number" name="no_induk" placeholder="Masukkan no induk" required><br>

		  	<label>Kode Bagian:</label><br>
		  	<?php
				include 'koneksi.php';

				$query = "SELECT * FROM tbl_bagian ORDER BY id_bagian ASC";
				$read = mysqli_query($koneksi, $query);
			?>
			<select name="kode_bagian">
				<?php  
					while($bagian_data = mysqli_fetch_array($read)) {  
					    echo "<option value='".$bagian_data['kode_bagian']."'>".$bagian_data['kode_bagian']."</option>";
			    	}
				?>
			</select><br>

		  	<label>Nama:</label><br>
		  	<input type="text" name="nama" placeholder="Masukkan nama" required><br>

		  	<label>Tempat Lahir:</label><br>
		  	<input type="text" name="tempat_lahir" placeholder="Masukkan tempat lahir" required><br>

		  	<label>Tanggal Lahir:</label><br>
		  	<input type="date" name="tanggal_lahir" placeholder="Masukkan tanggal lahir" required><br>

		  	<label>Tanggal Masuk:</label><br>
		  	<input type="date" name="tanggal_masuk" placeholder="Masukkan tanggal masuk" required><br>

		  	<label>Golongan:</label><br>
		  	<input type="number" name="golongan" placeholder="Masukkan golongan" required><br>

		  	<input type="submit" name="Simpan" value="Simpan">
		</form>

		<hr>
		<div class="text-center"><h3>Data Bagian</h3></div>
		<div class="mb-20">
			<?php
			include 'koneksi.php';

			$query = "SELECT * FROM tbl_karyawan ORDER BY no_induk DESC";
			$read = mysqli_query($koneksi, $query);
			?>
			<table>
			  	<tr>
			    	<th>Kode Bagian</th>
			    	<th>Nama</th>
			    	<th>Tempat Lahir</th>
			    	<th>Tanggal Lahir</th>
			    	<th>Tanggal Masuk</th>
			    	<th>Golongan</th>
			  	</tr>
			  	<?php  
				    while($karyawan_data = mysqli_fetch_array($read)) {      
				        echo "<tr>";
				        echo "<td>".$karyawan_data['kode_bagian']."</td>";
				        echo "<td>".$karyawan_data['nama']."</td>";
				        echo "<td>".$karyawan_data['tempat_lahir']."</td>"; 
				        echo "<td>".$karyawan_data['tanggal_lahir']."</td>"; 
				        echo "<td>".$karyawan_data['tanggal_masuk']."</td>";   
				        echo "<td>".$karyawan_data['golongan']."</td>";  
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

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
		<div class="submenu">
		  	<a href="#" class="active">Master</a>
		  	<div class="submenu-content">
			    <a href="insert_bagian.php">Insert Bagian</a>
				<a href="insert_karyawan.php">Insert Karyawan</a>
				<a href="insert_gaji.php" class="active">Insert Gaji</a>
		  	</div>
		</div>
		<a href="report_karyawan.php">Report Karyawan</a>
	</header>

	<section class="content">
		<p>Silahkan isi form gaji dibawah ini!</p>

		<form action="proses_insert_bagian.php" method="POST">
		  	<label>No Induk:</label><br>
		  	<?php
				include 'koneksi.php';

				$query = "SELECT * FROM tbl_karyawan ORDER BY id_karyawan ASC";
				$readKaryawan = mysqli_query($koneksi, $query);
			?>
		  	<select name="no_induk">
		  		<?php  
					while($bagian_data = mysqli_fetch_array($readKaryawan)) {  
					    echo "<option value='".$bagian_data['no_induk']."'>".$bagian_data['no_induk']."</option>";
			    	}
				?>
		  	</select><br>

		  	<label>Tahun:</label><br>
		  	<input type="text" name="nama_bagian" placeholder="" required readonly><br>

		  	<label>Bulan:</label><br>
		  	<input type="text" name="kepala_bagian" placeholder="" required readonly><br>

		  	<label>Kode Gaji:</label><br>
		  	<select name="kode_gaji">
		  		<option value="GP">GP (Gaji Pokok)</option>
		  		<option value="TO">TO (Tunjangan Obat)</option>
		  		<option value="IN">IN (Insentif)</option>
		  	</select><br>

		  	<label>Jumlan:</label><br>
		  	<input type="number" name="jumlah" placeholder="Masukkan jumlah" required><br>

		  	<input type="submit" name="Simpan" value="Simpan">
		</form>

		<hr>
		<div class="text-center"><h3>Data Gaji</h3></div>
		<div class="mb-20">
			<?php
				include 'koneksi.php';

				$query = "SELECT * FROM tbl_gaji ORDER BY id_gaji ASC";
				$readGaji = mysqli_query($koneksi, $query);
			?>
			<table>
			  	<tr>
			    	<th>No Induk</th>
			    	<th>Tahun</th>
			    	<th>Bulan</th>
			    	<th>Kode Gaji</th>
			    	<th>Jumlah</th>
			  	</tr>
			  	<?php  
				    while($gaji_data = mysqli_fetch_array($readGaji)) {         
				        echo "<tr>";
				        echo "<td>".$gaji_data['no_induk']."</td>";
				        echo "<td>".$gaji_data['tahun']."</td>";
				        echo "<td>".$gaji_data['bulan']."</td>";
				        echo "<td>".$gaji_data['kode_gaji']."</td>";
				        echo "<td>".number_format($gaji_data['jumlah'], 0, ".", ".")."</td>"; 
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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Aplikasi sederhana karyawan</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/tables.css">
</head>
<body>

<div class="flex-container">
	<header>
		<a href="./">Home</a>
		<div class="submenu">
		  	<a href="#">Master</a>
		  	<div class="submenu-content">
			    <a href="insert_bagian.php">Insert Bagian</a>
				<a href="insert_karyawan.php">Insert Karyawan</a>
				<a href="insert_gaji.php">Insert Gaji</a>
		  	</div>
		</div>
		<a href="report_karyawan.php" class="active">Report Karyawan</a>
	</header>

	<section class="content">
		<h3 class="text-center">DAFTAR PEMBAYARAN GAJI KARYAWAN<br>Periode Januari 2013</h3>

		<div><h3 class="mb-0"><b>Nama Bagian : a</b></h3 class="mb-0"></div>
		<div class="mb-20">
			<?php
				include 'koneksi.php';

				$query = "SELECT * FROM tbl_bagian ORDER BY id_bagian DESC";
				$read = mysqli_query($koneksi, $query);
			?>
			<table>
			  	<tr>
			    	<th class="text-center">No.</th>
			    	<th class="text-center">No Induk</th>
			    	<th class="text-center">Nama Karyawan</th>
			    	<th class="text-center">Umur<br>(Tahun)</th>
			    	<th class="text-center">Tgl Masuk</th>
			    	<th class="text-center">Gol</th>
			    	<th class="text-center">Gaji Pokok</th>
			  	</tr>
			  	<?php  
				    while($bagian_data = mysqli_fetch_array($read)) {         
				        echo "<tr>";
				        echo "<td class='text-center'>".$bagian_data['kode_bagian']."</td>";
				        echo "<td class='text-center'>".$bagian_data['nama_bagian']."</td>";
				        echo "<td>".$bagian_data['kepala_bagian']."</td>";
				        echo "<td class='text-center'>".$bagian_data['kode_bagian']."</td>";
				        echo "<td>".$bagian_data['nama_bagian']."</td>";
				        echo "<td class='text-center'>".$bagian_data['kepala_bagian']."</td>"; 
				        echo "<td class='text-right'>".$bagian_data['kepala_bagian']."</td>";
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

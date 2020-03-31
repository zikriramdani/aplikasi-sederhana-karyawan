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
		<h3 class="text-center">DAFTAR PEMBAYARAN GAJI KARYAWAN<br>Periode : Januari 2013</h3>

		<?php
			include 'koneksi.php';

			$queryBagian = "SELECT * FROM tbl_bagian";
			$readBagian = mysqli_query($koneksi, $queryBagian);
		?>
		<?php
			while($bagian_data = mysqli_fetch_array($readBagian)) {  
				echo "<div>";
					echo "<h3 class='mb-0'><b>Nama Bagian : ".$bagian_data['nama_bagian']."</b></h3>";
				echo "</div>";

				$queryJoin = "SELECT * FROM tbl_karyawan JOIN tbl_bagian ON tbl_karyawan.kode_bagian = tbl_bagian.kode_bagian JOIN tbl_gaji ON tbl_karyawan.no_induk = tbl_gaji.no_induk AND tbl_karyawan.kode_bagian = '$bagian_data[kode_bagian]'";
				$readJoin = mysqli_query($koneksi, $queryJoin);
				$no = 0;
				
				echo "<div class='mb-20'>";
					echo "<table class='table-report'>";
					  	echo "<tr>";
					    	echo "<th class='text-center'>No.</th>";
					    	echo "<th class='text-center'>No Induk</th>";
					    	echo "<th class='text-center'>Nama Karyawan</th>";
					    	echo "<th class='text-center'>Umur<br>(Tahun)</th>";
					    	echo "<th class='text-center'>Tgl Masuk</th>";
					    	echo "<th class='text-center'>Gol</th>";
					    	echo "<th class='text-center'>Gaji Pokok</th>";
					  	echo "</tr>";
						while($join_data = mysqli_fetch_array($readJoin)) {
							$no++;

					        echo "<tr>";
					        echo "<td class='text-center'>$no</td>";
					        echo "<td class='text-center'>".$join_data['no_induk']."</td>";
					        echo "<td>".$join_data['nama']."</td>";

				        	$birthDate 	= new DateTime($join_data['tanggal_lahir']);
	                    	$today  = new DateTime();
	                    	$y 	 	= $today->diff($birthDate)->y;
				        	echo "<td class='text-center'>".$y."</td>";

					        echo "<td class='text-center'>".date('d M Y', strtotime($join_data['tanggal_masuk']))."</td>";
					        echo "<td class='text-center'>".$join_data['golongan']."</td>"; 
					        echo "<td class='text-right'>".number_format($join_data['jumlah'], 0, ".", ".")."</td>";
					        echo "</tr>";   	
						}
					echo "</table>";
				echo "</div>";
			}
		?>
	</section>

	<?php include 'footer.php';?>
</div>

</body>
</html>

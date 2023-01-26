<?php
include "config.php";

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = $_POST["keyword"];
}

?>

<html>
	<head>
		<title>
			Sistem Pendataan Mahasiswa Hasnur Center
		</title>
		<link rel="stylesheet" type="text/css" href="belajar_style.css?<?php echo time(); ?>">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>

	<body>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a style="margin-left:50px" class="nav-link " aria-current="page" href="">Home</a>
			</li>
			<li class="nav-item">
			<form class="d-flex" role="search" method="POST">
                    <input class="form-control me-2" type="text" nama="keyword" placeholder="Search" aria-label="Search" autocomplete="off">
                    <button class="btn btn-outline-info" type="submit" nama="cari">Temukan</button>
                </form>
			</li>
			<li class="nav-item">
				<a style="margin-left:600px;" class="nav-link" href="logout.php">Log Out</a>
			</li>
			
		</ul>

		<div class="wraper" id="title-id">
			<center>
				<div class="title"> <img src="img/YHC.png" width=300px height=130><br>
					<div>
						SISTEM PENGELOLAAN DATA MAHASISWA <br>HASNUR CENTER
					</div>
				</div>
			</center><hr>
			<div style="margin-left:23px;">
				<div class="sidebar-left" >
					<div class="card">
						<form class="form" action="aksi.php" method="POST">
						<h4>
							INPUT DATA
						</h4>
							<input type="text" name="nama" placeholder="Nama Mahasiswa" class="input" required><br>
							<input type="text" name="semester" placeholder="Semester" class="input" required><br>
							<input type="text" name="prodi" placeholder="Program Studi" class="input" required><br>
							<input type="text" name="kelas" placeholder="Kelas" class="input" required><br>
							<input type="text" name="angkatan" placeholder="Tahun Angkatan" class="input" required><br>
							<input type="submit" name="tambah" value="SIMPAN DATA" class="btn">
						</form>
					</div>
				</div>
			</div>
			<div class="sidebar-right">
				<div style="padding:20px;"><span style="font-size:20px;">DATA MAHASISWA</span><hr>
					<table class="table1">
						<tr>
							<th width="5%">No</th>
							<th width="20%">Nama</th>
							<th width="10%">Semester</th>
							<th width="20%">Program Studi</th>
							<th width="10%">Kelas</th>
							<th width="10%">Tahun Angkatan</th>
							<th width="10%">Aksi</th>
						</tr>

						<?php
							$koneksi = mysqli_connect('localhost', 'root', '', 'belajar_crud');
							$hasil  = mysqli_query($koneksi, "SELECT * FROM mahasiswa") or die(mysqli_error($koneksi));
							$no     = 1;
							while($data = mysqli_fetch_array($hasil)):
						?>

						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['semester']; ?> </td>
							<td><?php echo $data['prodi']; ?></td>
							<td><?php echo $data['kelas']; ?> </td>
							<td><?php echo $data['angkatan']; ?></td>
							<td>
								<a href="ubah.php?id=<?=$data['id']?>" class="aksi birutua">Ubah</a>
								<br>
								<a href="aksi.php?act=hapus&id=<?=$data['id']?>" class="aksi birumuda">Hapus</a>
							</td>
						</tr>

						<?php 
							endwhile; 
						?>

					</table>
				</div>

				<div 
					style="clear:both;">
				</div>

			</div>
		</div>
	</body>
</html>
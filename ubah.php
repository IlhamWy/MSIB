<?php
	include  "config.php";
	$id     =  $_GET['id'];
	$koneksi = mysqli_connect("localhost","root","","belajar_crud");
	$runs   = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id='$id'");
	$data   = mysqli_fetch_array($runs);
?>

<html>
	<head>
		<title>
			CRUD
		</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="belajar_style.css?<?php echo time(); ?>">
	</head>

	<body>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a style="margin-left:50px" class="nav-link " aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item">
				<a style="margin-left:10px;" class="nav-link " href="data_json.php">Data JSON Mahasiswa</a>
			</li>
			<li class="nav-item">
				<a style="margin-left:10px;" class="nav-link " href="data_json_login.php">Data JSON Username</a>
			</li>
			<li class="nav-item">
				<a style="margin-left:600px;" class="nav-link" href="#">Log Out</a>
			</li>
		</ul>
		<div class="wraper" id="title-id">
			<div class="title">
				UBAH DATA MAHASISWA 
			</div>
			<div style="margin-left:12px;">
				<div class="sidebar-left">
					<form class="form" action="aksi.php" method="POST">
						<input type="hidden" value="<?=$data['id']?>" name="id">
						<input type="text" name="nama"  value="<?=$data['nama']?>" placeholder="Nama Mahasiswa" class="input" required><br>
						<input type="text" name="semester"  value="<?=$data['semester']?>" placeholder="No.KIP-K" class="input" required><br>
						<input type="text" name="prodi" value="<?=$data['prodi']?>" placeholder="Program Studi" class="input" required><br>
						<input type="submit" name="ubah" value="UBAH DATA" class="btn">
						</form>
					</div>
				</div>
			<div class="sidebar-right">
				<div style="padding:20px;">
					<span style="font-size:20px;">DATA MAHASISWA</span>
					<table class="table1">
						<tr>
							<th width="5%">No</th>
							<th width="30%">Nama</th>
							<th width="20%">No.KIP-K</th>
							<th width="25%">Program Studi</th>
							<th width="30%">Aksi</th>
						</tr>
						<?php
							$koneksi = mysqli_connect("localhost","root","","belajar_crud");
							$run = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
							while ($mahasiswa = mysqli_fetch_array($run)) {
								$no="";
						?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $mahasiswa['nama']; ?></td>
									<td><?php echo $mahasiswa['semester']; ?></td>
									<td><?php echo $mahasiswa['prodi']; ?></td>
									<td>
										<a href="" class="aksi green">Ubah</a>
										<a href="aksi.php?act=hapus&id=<?=$mahasiswa['id']?>" class="aksi red">Hapus</a>
									</td>
								</tr>
						<?php }$no=0; ?>
					</table>
				</div>
			</div>
			<div style="clear:both;"></div>
		</div>
	</body>
</html>
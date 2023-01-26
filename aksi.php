<?php
	include "config.php";
	if(isset($_POST['tambah'])){ 	//untuk menambahkan data
		$nama  = $_POST['nama'];
		$semester  = $_POST['semester'];
		$prodi = $_POST['prodi'];
		$kelas  = $_POST['kelas'];
		$angkatan = $_POST['angkatan'];

		$koneksi = mysqli_connect("localhost","root","","belajar_crud");
		$run   = mysqli_query($koneksi,"INSERT INTO mahasiswa VALUES('','$nama','$semester','$prodi','$kelas','$angkatan')");
		if($run){
			header('location: index.php');
		}else{
			echo "Gagal insert data!";
		}
	}


	elseif(isset($_POST['ubah'])){  //untuk mengubah data
		$nama  = $_POST['nama'];
		$semester  = $_POST['semester'];
		$prodi = $_POST['prodi'];
		$kelas  = $_POST['kelas'];
		$angkatan = $_POST['angkatan'];
		$id    = $_POST['id'];

		$koneksi = mysqli_connect("localhost","root","","belajar_crud");
		$run   = mysqli_query($koneksi,"UPDATE mahasiswa SET nama='$nama', semester='$semester', prodi='$prodi', kelas='$kelas',angkatan='$angkatan', WHERE id='$id'");
		if($run){
			header('location: index.php');
		}else{
			echo "Gagal di ubah...";
		}
	}


	if($_GET['act']=='hapus'){    //untuk menghapus data
		$id = $_GET['id'];

		$koneksi = mysqli_connect("localhost","root","","belajar_crud");
		$run   = mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE id='$id'");
		if($run){
			header('location: index.php');
		}else{
			echo "Gagal dihapus!";
		}
	}
?>
<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Pengguna</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['username'];?></span>
			<div class="float-right">	
				<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a> 
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>		
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Tambah Pengguna</h4>
						</div>
						<div class="card-body">
							<form action="../proses/crud.php?aksi=tambah_siswa" method="POST">
                                <div class="form-group">
									<label>NISN </label>
									<input type="number" value="" class="form-control" name="nisn" required>
								</div>
								<div class="form-group">
									<label>Nama Siswa</label>
									<input type="text" value="" class="form-control" name="nama_siswa" required>
								</div>
                                <div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" value="" class="form-control" name="tmp_lahir" required>
								</div>
                                <div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" value="" class="form-control" name="tgl_lahir" required>
								</div>
                                <div class="form-group">
									<label>Alamat</label>
									<input type="text" value="" class="form-control" name="alamat" required>
								</div>
                                <div class="form-group">
									<label>Telepon</label>
									<input type="number" value="" class="form-control" name="telp" required>
								</div>
                                <div class="form-group">
									<label>kelas</label>
									<select name="id_kelas" required>
                                        <option value="1">Kelas 10</option>
                                        <option value="2">Kelas 11</option>
                                    </select>
								</div>
								
								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Tambah Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>
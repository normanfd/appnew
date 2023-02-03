<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';
    
    // tampilkan form edit
    $idGet = strip_tags($_GET['id']);
    $hasil = $proses->tampil_data_id('guru','id_guru',$idGet);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Pengguna</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
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
						<h4 class="card-title">Edit Pengguna - <?php echo $hasil['nama_pengguna'];?></h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input dengan method post ke proses crud dengan paramater get aksi edit -->
							<form action="../proses/crud.php?aksi=edit_guru" method="POST">
							<div class="form-group">
									<label>NIP </label>
									<input type="number" value="<?php echo $hasil['nip'];?>" class="form-control" name="nip">
								</div>
								<div class="form-group">
									<label>Nama Guru</label>
									<input type="text" value="<?php echo $hasil['nama_guru'];?>" class="form-control" name="nama_guru">
								</div>
                                <div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" value="<?php echo $hasil['tmp_lahir_guru'];?>" class="form-control" name="tmp_lahir_guru">
								</div>
                                <div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" value="<?php echo $hasil['tgl_lahir_guru'];?>" class="form-control" name="tgl_lahir_guru">
								</div>
                                <div class="form-group">
									<label>Alamat</label>
									<input type="text" value="<?php echo $hasil['alamat'];?>" class="form-control" name="alamat">
								</div>
                                <div class="form-group">
									<label>Telepon</label>
									<input type="number" value="<?php echo $hasil['telp'];?>" class="form-control" name="telp">
									<input type="hidden" value="<?php echo $hasil['id_guru'];?>" class="form-control" name="id_guru">
								</div>
                                <div class="form-group">
									<label>Mata pelajaran</label>
									<select name="id_matpel">
                                        <option value="1" <?php if($hasil['id_matpel'] == 1) echo"selected"; ?> >Matematika</option>
                                        <option value="2" <?php if($hasil['id_matpel'] == 2) echo"selected"; ?> >Bahasa Indonesia</option>
                                    </select>
								</div>
								
								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Simpan Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>
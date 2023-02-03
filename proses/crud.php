<?php
    require 'panggil.php';

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $nama = strip_tags($_POST['nama']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $alamat = strip_tags($_POST['alamat']);
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        
        $tabel = 'tbl_user';
        # proses insert
        $data[] = array(
            'username'		=>$user,
            'password'		=>md5($pass),
            'nama_pengguna'	=>$nama,
            'telepon'		=>$telepon,
            'email'			=>$email,
            'alamat'		=>$alamat
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
    }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama']);
		$telepon = strip_tags($_POST['telepon']);
		$email = strip_tags($_POST['email']);
		$alamat = strip_tags($_POST['alamat']);
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);
		
        // jika password tidak diisi
        if($pass == '')
        {
            $data = array(
                'username'		=>$user,
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }else{

            $data = array(
                'username'		=>$user,
                'password'		=>md5($pass),
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
    }
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan 
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan 
            echo "<script>window.location='../guru/index.php';</script>";
        }
    }


    // proses tambah guru
    if(!empty($_GET['aksi'] == 'tambah_guru'))
    {
        $nip = strip_tags($_POST['nip']);
        $nama_guru = strip_tags($_POST['nama_guru']);
        $tmp_lahir_guru = strip_tags($_POST['tmp_lahir_guru']);
        $tgl_lahir_guru = strip_tags($_POST['tgl_lahir_guru']);
        $alamat = strip_tags($_POST['alamat']);
        $telp = strip_tags($_POST['telp']);
        $id_matpel = strip_tags($_POST['id_matpel']);
        
        $tabel = 'guru';
        # proses insert
        $data[] = array(
            'nip'               => $nip,
            'nama_guru'         => $nama_guru,
            'tmp_lahir_guru'    => $tmp_lahir_guru,
            'tgl_lahir_guru'    => $tgl_lahir_guru,
            'alamat'            => $alamat,
            'telp'              => $telp,
            'id_matpel'         => $id_matpel
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../guru/index.php"</script>';
    }

    // hapus data guru
    if(!empty($_GET['aksi'] == 'hapus_guru'))
    {
        $tabel = 'guru';
        $where = 'id_guru';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../guru/index.php"</script>';
    }

    // proses tambah siswa
    if(!empty($_GET['aksi'] == 'tambah_siswa'))
    {
        $nisn = strip_tags($_POST['nisn']);
        $nama_siswa = strip_tags($_POST['nama_siswa']);
        $tmp_lahir = strip_tags($_POST['tmp_lahir']);
        $tgl_lahir = strip_tags($_POST['tgl_lahir']);
        $alamat = strip_tags($_POST['alamat']);
        $telp = strip_tags($_POST['telp']);
        $id_kelas = strip_tags($_POST['id_kelas']);
        
        $tabel = 'siswa';
        # proses insert
        $data[] = array(
            'nisn'               => $nisn,
            'nama_siswa'         => $nama_siswa,
            'tmp_lahir'          => $tmp_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'            => $alamat,
            'telp'              => $telp,
            'id_kelas'         => $id_kelas
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../siswa/index.php"</script>';
    }

    // hapus data siswa
    if(!empty($_GET['aksi'] == 'hapus_siswa'))
    {
        $tabel = 'siswa';
        $where = 'id_siswa';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../siswa/index.php"</script>';
    }

    // proses edit guru
	if(!empty($_GET['aksi'] == 'edit_guru'))
	{
		$nip = strip_tags($_POST['nip']);
        $nama_guru = strip_tags($_POST['nama_guru']);
        $tmp_lahir_guru = strip_tags($_POST['tmp_lahir_guru']);
        $tgl_lahir_guru = strip_tags($_POST['tgl_lahir_guru']);
        $alamat = strip_tags($_POST['alamat']);
        $telp = strip_tags($_POST['telp']);
        $id_matpel = strip_tags($_POST['id_matpel']);

        $data = array(
            'nip'               => $nip,
            'nama_guru'         => $nama_guru,
            'tmp_lahir_guru'    => $tmp_lahir_guru,
            'tgl_lahir_guru'    => $tgl_lahir_guru,
            'alamat'            => $alamat,
            'telp'              => $telp,
            'id_matpel'         => $id_matpel
        );

        $tabel = 'guru';
        $where = 'id_guru';
        $id = strip_tags($_POST['id_guru']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../guru/index.php"</script>';
    }

    // proses edit siswa
	if(!empty($_GET['aksi'] == 'edit_siswa'))
	{
		$nisn = strip_tags($_POST['nisn']);
        $nama_siswa = strip_tags($_POST['nama_siswa']);
        $tmp_lahir = strip_tags($_POST['tmp_lahir']);
        $tgl_lahir = strip_tags($_POST['tgl_lahir']);
        $alamat = strip_tags($_POST['alamat']);
        $telp = strip_tags($_POST['telp']);
        $id_kelas = strip_tags($_POST['id_kelas']);

        $data = array(
            'nisn'               => $nisn,
            'nama_siswa'         => $nama_siswa,
            'tmp_lahir'          => $tmp_lahir,
            'tgl_lahir'          => $tgl_lahir,
            'alamat'            => $alamat,
            'telp'              => $telp,
            'id_kelas'         => $id_kelas
        );

        $tabel = 'siswa';
        $where = 'id_siswa';
        $id = strip_tags($_POST['id_siswa']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../siswa/index.php"</script>';
    }
?>
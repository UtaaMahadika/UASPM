<?php

    $connection = new mysqli("localhost", "root", "", "uas");
    $nip    = $_POST['nip'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email  = $_POST['email'];
    $prodi  = $_POST['prodi'];
    
    $result = mysqli_query($connection, "UPDATE tbl_dosen SET nama='$nama', alamat='$alamat', email='$email', prodi='$prodi' WHERE nip='$nip'");
    
    if($result){
        echo json_encode([
            'msg' => 'Data Berhasil Di Ubah'
        ]);
    }else{
        echo json_encode([
            'msg' => 'Data Gagal Di Ubah'
        ]);
    }

?>
<?php

    $connection = new mysqli("localhost", "root", "", "uas");
    $nip    = $_POST['nip'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email  = $_POST['email'];
    $prodi  = $_POST['prodi'];
    
    $result = mysqli_query($connection, "INSERT INTO tbl_dosen VALUES('$nip', '$nama', '$alamat', '$email', '$prodi')");
    
    if($result){
        echo json_encode([
            'msg' => 'Data Berhasil Di Input'
        ]);
    }else{
        echo json_encode([
            'msg' => 'Data Gagal Di Input'
        ]);
    }

?>
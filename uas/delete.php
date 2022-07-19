<?php

    $connection = new mysqli("localhost", "root", "", "uas");
    $nip = $_POST['nip'];
    $result = mysqli_query($connection, "DELETE FROM tbl_dosen WHERE nip=".$nip);

    if($result){
        echo json_encode([
            'msg' => 'Data Berhasil Dihapus'
        ]);
    }else{
        echo json_encode([
            'msg' => 'Data Gagal Dihapus'
        ]);
    }

?>
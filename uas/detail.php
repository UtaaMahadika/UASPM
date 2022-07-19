<?php 

    $connection = new mysqli("localhost","root","","uas");
    $data       = mysqli_query($connection, "SELECT * FROM tbl_dosen WHERE nip=".$_GET['nip']);
    $data       = mysqli_fetch_array($data, MYSQLI_ASSOC);

    echo json_encode($data);
?>
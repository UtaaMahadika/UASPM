<?php 

    $connection = new mysqli("localhost","root","","uas");
    $data       = mysqli_query($connection, "SELECT * FROM tbl_dosen");
    $data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

    echo json_encode($data);
?>
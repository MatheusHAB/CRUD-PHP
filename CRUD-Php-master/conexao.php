<?php
    $con = mysqli_connect('localhost:3333', 'root', '');
    $database = mysqli_select_db($con, 'sistema_login');

    if(!$con || !$database) echo mysqli_error($con);


?>
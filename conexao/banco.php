<?php

$con = mysqli_connect("dumont", "200008", "200008", "d200008");

if (mysqli_connect_errno()) {
    echo "Falha ao se conectar ao MySQL: " . mysqli_connect_erro();
} else {
    mysqli_select_db($con, "d200008");
}

?>
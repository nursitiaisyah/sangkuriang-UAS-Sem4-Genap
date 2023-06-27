<?php
    $conSS = mysqli_connect("localhost", "root", "", "sangkuriang2");

    if ($conSS -> connect_error)
    {
        die("Tidak dapat menghubungi server");
    }
?>
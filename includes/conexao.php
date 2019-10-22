<?php
    // definindo local, usuário e senha (XAMPP)
    $conn = mysqli_connect('localhost','root','');
    // selecionado a base de dados
    $banco = mysqli_select_db($conn,'sistemaemp');
    // definindo o tipo de charset
    mysqli_set_charset($conn,'utf8');

?>
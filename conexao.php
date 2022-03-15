<?php

//conexao do banco

$conexao = mysqli_connect("localhost","root","meubancodedados2022");

if (!$conexao) {
    die ('Não foi possivel conectar ao banco de dados. Erro detectado: '.mysqli_connect_error());
}



mysqli_set_charset($conexao, 'utf8');

?>
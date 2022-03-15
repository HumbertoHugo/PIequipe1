<?php
//cadastro
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$endereco = $_POST['endereço'];
$referencia = $_POST['referencia'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$termos = $_POST['termos'];


require("conexao.php");

mysqli_select_db($conexao, "playandbuy");

$inserir = "INSERT INTO cadastro_principal (id, nome, sobrenome, email, senha, endereco, referencia, cidade, estado, cep, termos) VALUES ('','$nome','$sobrenome','$email', '$senha', '$endereco', '$referencia', '$cidade', '$estado', '$cep', '$termos')";

mysqli_query($conexao, $inserir);

echo "Cadastro Realizado";

mysqli_close($conexao);

?>
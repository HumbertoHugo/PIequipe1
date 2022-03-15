<?php
//ler dados

require("conexao.php");
mysqli_select_db($conexao,"playandbuy");

$consulta = "SELECT * FROM cadastro";
$cadastro = mysqli_query($conexao, $consulta);
while($array = mysqli_fetch_array($cadastro))

{
echo $array['id']."-". " Cadastros Realizados: ".$array['nomecompleto']."<br>";   
}

mysqli_close($conexao);
?>
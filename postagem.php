<?php
require("conexao.php");
//cadastro
$evento = $_FILES['evento'];
$descricao = $_FILES['descricao_imagem'];
$nome_imagem = $_FILES['nomedaimagem'];
$tamanho_imagem = $_FILES['tamanhoimagem'];
$tipo_imagem = $_FILES['tipoimagem'];
$imagem = $_FILES['foto'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];
$console = $_POST['playstation']['xbox']['nintendo']['outros'];
$pcnotebook = $_POST['computador']['notebook'];
$jogos = $_POST['fisica']['digital'];
$acessorios = $_POST['gamepad']['mouse']['teclado']['headset']['volantes']['webcam']['mousepad']['som'];
$perifericos = $_POST['pcomputador']['pconsoles']['audiovideo']['poutros'];


if ($imagem != "none") {

    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    
    fclose($fp);
    
    if (mysqli_affected_rows($conexao) > 0)
print "A imagem foi salva na base de dados.";
else
print "Não foi possível salvar a imagem na base de dados.";
} 
else
print "Não foi possível carregar a imagem.";
?>

mysqli_select_db($conexao, "playandbuy");

$inserir = "INSERT INTO postagem (id, titulo, descricao, foto, console, pcnotebook, jogos, acessorios, perifericos) VALUES ('','$titulo','$descricao','$foto', '$console', '$pcnotebook', '$jogos', '$acessorios', '$perifericos')";

mysqli_query($conexao, $inserir);

echo "Postagem Realizada";

mysqli_close($conexao);

?>
<?php
// Conexão com o banco de dados
require "conexao.php";

// Inicia sessões
session_start();

// Recupera o login
$Usuario = isset($_POST["Usuario"]) ? addslashes(trim($_POST["Usuario"])) : FALSE;
// Recupera a senha, a criptografando em MD5
$Senha = isset($_POST["Senha"]) ? md5(trim($_POST["Senha"])) : FALSE;

// Usuário não forneceu a senha ou o login
if(!$Usuario || !$Senha)
{
	echo "Você deve digitar seu Usuario e Senha!";
	exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o número de linhas retornadas seja 1 o login é válido,
* caso 0, inválido.
*/
$SQL = "SELECT id, nome, Usuario, senha, postar
FROM aut_usuarios WHERE login = "" . $Usuario . """;
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)
{
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = @mysql_fetch_array($result_id);

	// Agora verifica a senha
	if(!strcmp($senha, $dados["Senha"]))
	{
		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
		$_SESSION["id_usuario"]= $dados["id"];
		$_SESSION["nome_usuario"] = stripslashes($dados["nome"]);
		$_SESSION["permissao"]= $dados["postar"];
		header("Location: index.php");
		exit;
	}
	// Senha inválida
	else
	{
	 "Senha inválida!";
	exit;
	}
}
	// Login inválido
else
{
	echo "Usuario fornecido por você é inexistente!";
	exit;
}
?>

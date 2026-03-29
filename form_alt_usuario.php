<?php

$id_usuario = isset($_GET['id_usuario'])?$_GET['id_usuario']:0;
$usuario = "";
if($id_usuario > 0){
    //Conectar com o banco
    include_once('config.inc.php');
    $conexao = new PDO (dsn,usuario,senha);
    //Montar a consulta
    $sql = "SELECT * FROM scriptia WHERE ID = :id_usuario";

    //Preparar consulta
    $comando = $conexao->prepare($sql);

    //Vincular parametros
    $comando->bindValue(':id_usuario',$id_usuario);
    //Executar consulta
    $comando->execute();
    $usuario = $comando->fetch();
     
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
</head>
<body>
    <form action="atualizar.php" method="POST">
             Id <input type="text" name="id_usuario" readonly  value="<?=isset($usuario)?$usuario['id_usuario']:0?>"><br>
            <br>
            Nome: <input type="text" name="nome" id="nome"  value="<?=isset($usuario)?$usuario['nome']:""?>"><br>
            <br>
            Username: <input type="text" name="username" id="username"  value="<?=isset($usuario)?$usuario['username']:""?>"><br>
            <br>
            E-mail: <input type="email" name="email" id="email"  value="<?=isset($usuario)?$usuario['email']:""?>"><br>
            <br>
            Data de Nascimento: <input type="datan" name="datan" id="datan"  value="<?=isset($usuario)?$usuario['datan']:0?>"><br>
            <br>
            Telefone para contato: <input type="tel" name="tele" id="tele"  value="<?=isset($usuario)?$usuario['tele']:""?>"><br>
            <br>
            Fale um pouco sobre você: <input type="text" name="bio" id="bio"  value="<?=isset($usuario)?$usuario['bio']:""?>"><br>
            <br>
              <br>
            Senha: <input type="text" name="senha" id="senha"  value="<?=isset($usuario)?$usuario['senha']:""?>"><br>
            <button type="submit">Salvar</button>
    </form>
</body>
</html>
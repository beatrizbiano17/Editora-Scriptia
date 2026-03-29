<?php
$usuario = isset($_POST['usuario'])?$_POST['usuario']:"";
$senha = isset($_POST['senha'])?$_POST['senha']:"";
//validar usuario/senha no banco

include_once "config.inc.php";
$conexao = new PDO(dsn,usuario,senha);
$sql = "select id, email,nome from aluno
            where email = :usuario
            and senha = :senha";
$comando = $conexao->prepare($sql);
$comando->bindValue(':usuario',$usuario);
$comando->bindValue(':senha',md5($senha));
$comando->execute();
$registro = $comando->fetch();
if($registro){
    session_start();
    $_SESSION['id'] = $registro['id'];
     $_SESSION['email'] = $registro['email'];
      $_SESSION['nome'] = $registro['nome'];
      
    header('location: listar.php');
    



}else{
    header('location: login.html?auth_error=Usuario ou Senha incorretos.');

}
?>
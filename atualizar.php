<?php
     session_start();
?>
<?php
include_once("config.inc.php");
//Pegar as informações no formulario
$id_usuario = isset($_POST['id_usuario'])?$_POST['id_usuario']:0;
$nome = isset($_POST['nome'])?$_POST['nome']:0;
$username = isset($_POST['username'])?$_POST['username']:0;
$email = isset($_POST['email'])?$_POST['email']:0;
$datan = isset($_POST['datan'])?$_POST['datan']:0;
$tele = isset($_POST['tele'])?$_POST['tele']:0;
$bio = isset($_POST['bio'])?$_POST['bio']:0;
$senha = isset($_POST['senha'])?$_POST['senha']:0;


//Abrir conexao 
$conexao = new PDO(dsn,usuario,senha);


//Monatr sql
$sql = "UPDATE aluno
            SET nome = :nome,
                username = :username,
                email = :email,
                datan = :datan,
                tele = :tele
                bio = :bio,
                senha = :senha,
            WHERE id_usuario = :id_usuario";
//preparar a consulta

$comando = $conexao->prepare($sql);
//Enviar os parametros
$comando->bindValue(':id_usuario',$id_usuario);
$comando->bindValue(':nome',$nome);
$comando->bindValue(':username',$username);
$comando->bindValue(':email',$email);
$comando->bindValue(':datan',$datan);
$comando->bindValue(':tele',$tele);
$comando->bindValue(':bio',$bio);
$comando->bindValue(':senha',$senha);


//executar a consulta
if ($comando->execute())
    echo "Dados atualizados com sucesso!";
else 
    echo"Erro ao atualizar os dados...";

?>
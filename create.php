<?php
     session_start();
?>
<?php
include "config.inc.php";

$nome = isset($_POST['nome'])?$_POST['nome']:"";
$username = isset($_POST['username'])?$_POST['username']:"";
$email = isset($_POST['email'])?$_POST['email']:"";
$datan = isset($_POST['datan'])?$_POST['datan']:"";
$tele = isset($_POST['tele'])?$_POST['tele']:"";
$bio = isset($_POST['bio'])?$_POST['bio']:"";
$senha = isset($_POST['senha'])?$_POST['senha']:"";


  //conectar com o banco de dados

if($nome != ""){
//conectar com o banco
    $conexao =  new PDO(dsn,usuario,senha);
    //montar query que sera executada
    $sql = "INSERT INTO aluno (nome,username,email,datan,tele,bio,senha) 
                values (:nome,:username,:email,:datan,:tele,:bio,:senha)";

    //preparar o comando para execuatr
    $comando = $conexao->prepare($sql);

    //passar as informaçoes que seram salvas/ vincular os paramêtros
    $comando->bindValue(':nome',$nome);
    $comando->bindValue(':username',$username);
    $comando->bindValue(':email',$email);
    $comando->bindValue(':datan',$datan);
    $comando->bindValue(':tele',$tele);
    $comando->bindValue(':bio',$bio);
    $comando->bindValue(':bio',md5($bio));


    //executar o comando
    //executar o comando
    if($comando->execute())
            echo "Dados inseridos com sucesso!";
    else
            echo "Erro ao inserir dados";
}else{
        echo "o campo nome é obrigatório!";
}
?>
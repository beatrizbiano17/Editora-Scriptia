<?php
     session_start();
?>
<?php
$id_usuario = isset($_GET['id_usuario'])?$_GET['id_usuario']:0;

if ($id_usuario > 0 ){
    include_once "config.inc.php";

    $conexao = new PDO(dsn,usuario,senha);
    $sql = "DELETE from aluno
            WHERE id_usuario = :id_usuario";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_usuario',$id_usuario);
if ($comando->execute())
    echo "Registro excluido com sucesso";

else 
    echo "Não foi possivel excluir o registro";
}


?>
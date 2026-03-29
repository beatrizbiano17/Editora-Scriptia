<?php
   include "valida_login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta</title>
</head>
<body>
    <h1> Bem vindo <?php echo $_SESSION['nome'];?></h1>
    <h3><a href="sair.php">Sair</a></h3>


<form method="GET">
    <input type="text" name="filtro" id="filtro">
    
<SElect name = "campo">
        <OPtion>Id</OPtion>
            <Option>Nome</Option>
             <Option>Username</Option>
             <Option>E-mail</Option>
             <Option>Data de Nascimento </Option>
             <Option>Telefone</Option>
             <Option>Biografia</Option>
            <Option>Senha</Option></SElect>
             <button type="submit">Enviar</button>
</form>

<table border="1">
<tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Username</th>
    <th>E-mail</th>
    <th>Data de Nascimento</th>
    <th>Telefone</th>
    <th>Biografia</th>
    <th>Senha</th>
     <th>Alterar</th>
     <th>Excluir</th>
</tr>

<?php
include "config.inc.php";

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
$campo = isset($_GET['campo']) ? $_GET['campo'] : "nome";

// conectar
$conexao = new PDO(dsn, usuario, senha);

// lista de campos permitidos (segurança)
$permitidos = ['id_usuario','nome','username','email','datan','tele','bio',  'senha'];

// query com parâmetro
$sql = "SELECT * FROM scriptia WHERE $campo LIKE :filtro";


$comando = $conexao->prepare($sql);
$comando->bindValue(":filtro", "%$filtro%");
$comando->execute();

$registros = $comando->fetchAll(PDO::FETCH_ASSOC);

foreach ($registros as $usuario){
    echo "<tr>
        <td>{$usuario['id']}</td>
        <td>{$usuario['nome']}</td>
        <td>{$usuario['useranme']}</td>
        <td>{$usuario['email']}</td>
        <td>{$usuario['datan']}</td>
        <td>{$usuario['tele']}</td>
        <td>{$usuario['tbio']}</td>
         <td>{$usuario['senha']}</td>

        <td> <a href='formulario_alterar_usuario.php?id={$usuario['id']}'</a>Alterar</td>.
        <td><a href='excluir.php?id=".$usuario['id']."'>Excluir</td>
       
    </tr>";
}
?>

</table>
</body>
</html>
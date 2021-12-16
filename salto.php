<!DOCTYPE html>
<?php 
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";
$title = "Saltos";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 2;


?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title   >
    <link rel="stylesheet" href="../css/estilo.css">
    <script>
        function excluirRegistro(url) {
            if (confirm("Você quer excluir?"))
                location.href = url; 
        }
    </script>
</head>
<body>
    <br>
    <a href="cad.php"><button>Cadastrar novo</button></a>
    <br><br>
    <form method="post">
    <input type="text" name="consulta" id="consulta" value="<?php echo $consulta; ?>">
    <input type="submit" value="Pesquisar">
    <br><br>
        <legend>Pesquisar por: </legend>

        <br>

        <input type="radio" name="tipo" value="1" <?php if ($tipo == 1){echo 'checked';}?>>
        <label for="id">ID</label>

        <br>

        <input type="radio" name="tipo" value="2" <?php if ($tipo == 2){echo 'checked';}?>>
        <label for="nome">Nome</label>
    </form>
    
    <br>
    <table border="1">
       <tr><th>ID</th>
        <th>Nome</th> 
        <th>Nascimento</th>
        <th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
        </tr>
    <?php 
    $pdo = Conexao::getInstance();

    if ($tipo == 1 ) 
    $consulta = $pdo->query("SELECT * FROM salto
                            WHERE id
                            LIKE '$consulta%'
                            ORDER BY id");

    if ($tipo == 2 )
    $consulta = $pdo->query("SELECT * FROM salto
                            WHERE nome 
                            LIKE '$consulta%'
                            ORDER BY nome");


    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   

        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['nascimento']));?></td>
            <td><a href='../show/show.php?id=<?php echo $linha['id'];?>'> <img class="icon" src="../img/show.png" alt=""> </a></td>
            <td><a href='cad.php?acao=editar&id=<?php echo $linha['id'];?>'><img class="icon" src="../img/edit.png" alt=""></a></td>
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="../img/delete.png" alt=""></a></td>
        </tr>
    <?php } ?>       
    </table>
    
</body>
</html>

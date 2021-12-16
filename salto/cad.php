<!DOCTYPE html>
<?php
include_once "acao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novo cadastro</title>
</head>
<body>
<br>
<a href="salto.php"><button>Listar</button></a>
<br><br>
<form action="acao.php" method="post">
<fieldset>
<label for="id">Id: </label>
<input readonly type="text" name="id" id="id" value="<?php if ($acao == "editar") echo $dados['id']; else echo 0; ?>"><br>

<label for="nome">Nome do aluno </label>
<input required=true type="text" name="nome" id="nome" value="<?php if ($acao == "editar") echo $dados['nome']; ?>"><br>

<label for="nota1">Primeira nota do aluno</label>
<input required=true type="text" name="nota1" id="nota1" value="<?php if ($acao == "editar") echo $dados['nota1']; ?>"><br>

<label for="nota2">Segunda nota do aluno</label>
<input required=true type="text" name="nota2" id="nota2" value="<?php if ($acao == "editar") echo $dados['nota2']; ?>"><br>

<label for="nota3">Terceira nota do aluno</label>
<input required=true type="text" name="nota3" id="nota3" value="<?php if ($acao == "editar") echo $dados['nota3']; ?>"><br>

<label for="nota4">Quarta nota do aluno</label>
<input required=true type="text" name="nota4" id="nota4" value="<?php if ($acao == "editar") echo $dados['nota4']; ?>"><br>

<label for="nota5">Quinta nota do aluno</label>
<input required=true type="text" name="nota5" id="nota5" value="<?php if ($acao == "editar") echo $dados['nota5']; ?>"><br>

<label for="nascimento">Data de nascimento do aluno</label>
<input required=true type="date" name="nascimento" id="nascimento" value="<?php if ($acao == "editar") echo $dados['nascimento']; ?>"><br>

    <br><button type="submit" name="acao" id="acao" value="salvar">Salvar</button>

</fieldset>
</form>
</body>
</html>
<!DOCTYPE html>
<?php 
     include_once "../conf/default.inc.php";
     require_once "../conf/Conexao.php";
     $title = "Saltos";
     define('constante','3');
     $id = isset($_GET['id']) ? $_GET['id'] : "1";
     $cor = "vermelho";
     $teste = "";

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<a href="../salto/salto.php"><button>Listar</button></a>
<a href="../salto/cad.php"><button>Novo</button></a>
</br></br>


<!-- títulos -->

<table border="1">
<tr>
        <th>ID</th>
        <th>Nota 1</th> 
        <th>Nota 2</th>
        <th>Nota 3</th>
        <th>Nota 4</th>
        <th>Nota 5</th>
        <th>Idade</th>
        <th>Média das notas</th>
        <th>Menor nota</th>
        <th>Maior nota</th>
        <th>Menor nota válida</th>
        <th>Maior nota válida</th>
</tr>

<?php
   
    $sql = "SELECT * FROM salto WHERE id = $id";
   
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){

//idade define quantos anos a pessoa tem, if fala pra ficar em verde e o elseif em azul/else define sem cor

       $idade =  date("Y")- date("Y",strtotime($linha['nascimento']));
        if($idade < 18){
        $cor = "verde";
       } elseif ($idade > 50){
           $cor = "azul";
       }else{
           $cor = "";
       }

        

        $notasmaiores = max($linha['nota1'], $linha['nota2'], $linha['nota3'], $linha['nota4'], $linha['nota5']);

        $notasmenores = min($linha['nota1'], $linha['nota2'], $linha['nota3'], $linha['nota4'], $linha['nota5']);

        $soma = ($linha['nota1'] + $linha['nota2'] + $linha['nota3'] + $linha['nota4'] + $linha['nota5']);

// fala pra não usar a nota maior e menor        

        $notasN = ($soma - $notasmaiores - $notasmenores);

        $menornotavalida = min($linha['nota1'], $linha['nota2'], $linha['nota3'], $linha['nota4'], $linha['nota5']);
        $maiornotavalida = max($linha['nota1'], $linha['nota2'], $linha['nota3'], $linha['nota4'], $linha['nota5']);

        //foi feita a média 

        $media = ((($linha['nota1'] + $linha['nota2'] + $linha['nota3'] + $linha['nota4'] + $linha['nota5']) - $notasmenores )- $notasmaiores) / constante ;


       ?>
       <tr>
           <td><?php echo $linha['id'];?></td>
           <td><?php echo $linha['nota1'];?></td>
           <td><?php echo $linha['nota2'];?></td>
           <td><?php echo $linha['nota3'];?></td>
           <td><?php echo $linha['nota4'];?></td>
           <td><?php echo $linha['nota5'];?></td>

           <td class="<?php echo $cor;?>"><?php echo $idade;?></td>

           <td><?php echo number_format($media, 2, '.' , ',');?></td>

           <td><?php echo $notasmenores;?></td>

           <td><?php echo $notasmaiores;?></td>

           <td class="vermelho"><?php echo $menornotavalida;?></td>
           
           <td class="azul2"><?php echo $maiornotavalida;?></td>
       </tr>
    <?php } ?> 
</body>
</html>
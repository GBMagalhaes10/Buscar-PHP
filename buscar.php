<?php
    include('conecta.php');
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="javascript" type="text/javascript" href="personalizado.js">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Buscar</title>
</head>
<body>
    <h1 align="center">Buscar</h1>

    <form action="">
        <input name="busca" class="b" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="digite o nome do aluno" type="text">
        <button type="submit">Localizar</button>
</form>
<br>

<table border="2" width="1350px">
    <tr>
        <th>Matrícula</th>
        <th>Nome do Aluno</th>
        <th>Curso</th>
    </tr>

    <?php
    if(!isset($_GET['busca'])){
        ?>
        <tr>
        <td colspan="3">Digite um nome</td>
        </tr>
        
        <?php
    }else{ /*buscar código + caso não tenha nada no bd*/
        $pesquisa = $conexao->real_escape_string($_GET['busca']);
        $sql_code = "SELECT * FROM alunos WHERE id_alu LIKE '%$pesquisa%' OR nomealu LIKE '%$pesquisa%' ";
        $sql_query = $conexao->query($sql_code) or die("Erro ao consultar" .$conexao->error);
    }
        if($sql_query->num_rows ==0){
            ?>
         <tr>
            <td colspan="3">Nenhum resultado encontrado</td>
        </tr>  
        
    
        <?php } else{ /*retorno para a tabela*/
            while($dados = $sql_query->fetch_assoc()){
               ?>
               <tr>
                   <td><?php echo $dados['id_alu'];?></td>
                   <td><?php echo $dados['nomealu'];?></td>
                   <td><?php echo $dados['Curso'];?></td>
            </tr>
            <?php
            }
                ?>
            
            
                
            

        
        
        
        
        

    <?php }?> 
       
    </table> 

    

    
    
</body>
</html>

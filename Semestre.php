<!DOCTYPE html>
<html>
<?php 
    include 'BD/database.php';

    $id    =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $dsCodigo   ="";
    $dsData     ="";
    
        
    if($id != NULL){        //lógica para alterar valores no BD, se id for diferente de nulo, significa alteração
        $sql="select * from tb_semestre where CD_CODIGO=".$id ;
        $res_consulta = execute_query($sql);
        
        foreach ($res_consulta as $dados):
            $dsCodigo   =$dados['CD_CODIGO'];// "Codigo" nome da coluna no BD
            $dsData     =$dados['DT_DATA'];
        endforeach;  
    }
?>  

<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <form method="post" action="processar.php">
        <div class="menu">
            <a href="Index" target="_self">Inicio</a>
            <a href="Aula.php"        target="_self">Aula</a> 
            <a href="Aluno.php"       target="_self">Aluno</a> 
            <a href="Professor.php"   target="_self">Professor</a> 
            <a href="Turma.php"       target = "_self">Turma</a> 
            <a href="Presença.php"    target = "_self">Presença</a> 
            <a href="Endereco.php"    target="_self">Endereço</a>
            <a href="Semestre.php"    target="_self"  class="selecionado">Semestre</a>
            <a href="planodeaula.php" target="_self">Plano de aula</a>
        </div>
        <h1>SEMESTRE</h1>
        <table class="inserir">
            <tr>
                <td>Código</td>
                <td><input placeholder="Não preencher"  disabled type="text" name="TxtCodSem" id="TxtCodSem" value="<?php echo $dsCodigo?>"></td>
                <td>Data</td>
                <td><input type="date" name="TxtDataSem" id="TxtDataSem" value="<?php echo $dsData?>"></td>
                
                <td><a href="Semestre.php" class="btn-limpar">Limpar</a></td>
                <input name="id" type="hidden" id="id" value="<?php echo $id ?> " />
                <input name="tipo" type="hidden" id="tipo" value="semestre" />
                <td><input type="submit" onclick="return validarSemestre();" value="Gravar"  class="btn"/></td>
            </tr>
        </table>
    </form>
    <div class="listar">
    <?php include('Listar/listarSemestre.php'); ?>  
    </div>  
</body>
</html>
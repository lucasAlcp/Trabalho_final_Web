<!DOCTYPE html>
<html lang="en">
<?php     
    include 'BD/database.php';
    
    $id         =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $dsCod      ="";
    $dsNomeAlunos ="";
    $dsTemaAula ="";
    $dsData     ="";
    $dsAluno       ="";
    $dsAula    ="";

    if($id != NULL){//lógica para alterar valores no BD, se id for diferente de nulo, significa alteração
        $sql="select * from tb_presenca where CD_CODIGO=".$id ;
        $res_consulta = execute_query($sql);

        foreach ($res_consulta as $dados):
            $dsCod      = $dados['CD_CODIGO'];  // "Codigo" nome da coluna no BD      
            $dsNomeAlunos = $dados['NM_NOME_DOS_ALUNOS'];
            $dsTemaAula = $dados['DS_TEMA_DA_AULA'];
            $dsData     = $dados['DT_DATA'];
            $dsAluno      = $dados['CD_ALUNO'];
            $dsAula    = $dados['CD_AULA'];
        endforeach;   
    }
?>  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="Presença.php"    target = "_self" class="selecionado">Presença</a> 
            <a href="Endereco.php"    target="_self">Endereço</a>
            <a href="Semestre.php"    target="_self">Semestre</a>
            <a href="planodeaula.php" target="_self">Plano de aula</a>
        </div> 
        <h1>Presença</h1>
        <table class="inserir">
            <tr>
                <td>Código</td>
                <td><input type="text" placeholder="Não preencher"  disabled name="TxtCodPres" id="TxtCodPres" value="<?php echo $dsCod?>"></td>
                <td>Nome dos Alunos</td>
                <td><input type="text" name="TxtNomeAlunosPres" id="TxtNomeAlunosPres" value="<?php echo $dsNomeAlunos?>"></td>
                <td>Tema da Aula</td>
                <td><input type="text" name="TxtTemaPres" id="TxtTemaPres" value="<?php echo $dsTemaAula?>"></td>
                <td><a href="Presença.php" class="btn-limpar">Limpar</a></td>
            </tr>
            <tr>
                <td>Data</td>
                <td><input type="date" name="TxtDataPres" id="TxtDataPres" value="<?php echo $dsData?>"></td>
                <td>Código do Aluno</td>
                <td><input type="text" name="TxtAlunoPres" id="TxtAlunoPres" value="<?php echo $dsAluno?>"></td>
                <td>Código da Aula</td>
                <td><input type="text" name="TxtAulaPres" id="TxtAulaPres" value="<?php echo $dsAula ?>"></td>
                <input name="id" type="hidden" id="id" value="<?php echo $id ?> " />
                <input name="tipo" type="hidden" id="tipo" value="presença" />
                <td><input type="submit" onclick="return validarProfessor();" value="Gravar" class="btn" /></td>
            </tr>
        </table>
    </form>
    <div class="listar">
    <?php include('Listar/listarPresença.php'); ?>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<?php     
    include 'BD/database.php';
    
    $id         =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $dsCod      ="";
    $dsTelefone ="";
    $dsDataNasc ="";
    $dsNome     ="";
    $dsRa       ="";
    $dsCurso    ="";
    $dsTurno    ="";
    $dsSexo     ="";

    if($id != NULL){//lógica para alterar valores no BD, se id for diferente de nulo, significa alteração
        $sql="select * from tb_professor where CD_CODIGO=".$id ;
        $res_consulta = execute_query($sql);

        foreach ($res_consulta as $dados):
            $dsCod      = $dados['CD_CODIGO'];  // "Codigo" nome da coluna no BD      
            $dsTelefone = $dados['NB_TELEFONE'];
            $dsDataNasc = $dados['DT_NASCIMENTO'];
            $dsNome     = $dados['NM_NOME'];
            $dsRa       = $dados['NB_RA'];
            $dsCurso    = $dados['DS_CURSO'];
            $dsTurno    = $dados['DS_TURNO'];
            $dsSexo     = $dados['DS_SEXO'];
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
            <a href="Professor.php"   target="_self" class="selecionado">Professor</a> 
            <a href="Turma.php"       target = "_self">Turma</a> 
            <a href="Presença.php"    target = "_self">Presença</a> 
            <a href="Endereco.php"    target="_self">Endereço</a>
            <a href="Semestre.php"    target="_self">Semestre</a>
            <a href="planodeaula.php" target="_self">Plano de aula</a>
        </div>
        <h1>PROFESSOR</h1>
        <table class="inserir">
            <tr>
                <td>Código</td>
                <td><input type="text" placeholder="Não preencher"  disabled name="TxtCodProf" id="TxtCodProf" value="<?php echo $dsCod?>"></td>
                <td>Telefone</td>
                <td><input type="text" name="TxtTelProf" id="TxtTelProf" value="<?php echo $dsTelefone?>"></td>
                <td>Data de Nascimento</td>
                <td><input type="date" name="TxtNascProf" id="TxtNascProf" value="<?php echo $dsDataNasc?>"></td>
                <td>Nome</td>
                <td><input type="text" name="TxtNomeProf" id="TxtNomeProf" value="<?php echo $dsNome?>"></td>
                <td><a href="Professor.php" class="btn-limpar">Limpar</a></td>
            </tr>
            <tr>
                <td>RA</td>
                <td><input type="text" name="TxtRa" id="TxtRa" value="<?php echo $dsRa?>"></td>
                <td>Curso</td>
                <td><input type="text" name="TxtCurso" id="TxtCurso" value="<?php echo $dsCurso?>"></td>
                <td>Turno</td>
                <td><input type="text" name="TxtTurno" id="TxtTurno" value="<?php echo $dsTurno?>"></td>
                <td>Sexo</td>
                <td><input type="text" name="TxtSexo" id="TxtSexo" value="<?php echo $dsSexo?>"></td>
                <input name="id" type="hidden" id="id" value="<?php echo $id ?> " />
                <input name="tipo" type="hidden" id="tipo" value="professor" />
                <td><input type="submit" onclick="return validarProfessor();" value="Gravar" class="btn" /></td>
            </tr>
        </table>
    </form>
    <div class="listar">
    <?php include('Listar/listarProfessor.php'); ?>
    </div>
</body>
</html>
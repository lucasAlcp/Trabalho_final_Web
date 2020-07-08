<!DOCTYPE html>
<html lang="en">
<?php
    include 'BD/database.php';
    
    $id         =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $dsCod      ="";
    $dsSemestre ="";
    $dsProfessor ="";

    if($id != NULL){//lógica para alterar valores no BD, se id for diferente de nulo, significa alteração
        $sql="select * from tb_turma where CD_CODIGO=".$id;
        $res_consulta = execute_query($sql);

        foreach ($res_consulta as $dados):
            $dsCod      = $dados['CD_CODIGO'];  // "Codigo" nome da coluna no BD      
            $dsSemestre = $dados['CD_SEMESTRE'];
            $dsProfessor = $dados['CD_PROFESSOR'];
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
            <a href="Turma.php"       target = "_self" class="selecionado">Turma</a> 
            <a href="Presença.php"    target = "_self">Presença</a> 
            <a href="Endereco.php"    target="_self">Endereço</a>
            <a href="Semestre.php"    target="_self">Semestre</a>
            <a href="planodeaula.php" target="_self">Plano de aula</a>
        </div> 
        <h1>Turma</h1>
        <table class="inserir">
            <tr>
                <td>Código</td>
                <td><input type="text" placeholder="Não preencher"  disabled  name="TxtCodTurma" id="TxtCodTurma" value="<?php echo $dsCod?>"></td>
                <td>Semestre</td>
                <td><input type="text" name="TxtSemTurma" id="TxtSemTurma" value="<?php echo $dsSemestre?>"></td>
            </tr>
            <tr>
                <td>Professor</td>
                <td><input type="text" name="TxtProfTurma" id="TxtProfTurma" value="<?php echo $dsProfessor?>"></td>
                <input name="id" type="hidden" id="id" value="<?php echo $id ?> " />
                <input name="tipo" type="hidden" id="tipo" value="turma" />
                <td><input type="submit" onclick="return validarProfessor();" value="Gravar" class="btn" /></td>
                <td><a href="Turma.php" class="btn-limpar">Limpar</a></td>
            </tr>
        </table>
    </form>
    <div class="listar">
    <?php include('Listar/listarTurma.php'); ?>
    </div>
</body>
</html>
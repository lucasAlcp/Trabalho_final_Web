<!DOCTYPE html>
<html>
<?php
    include 'BD/database.php';
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    
    if($id != NULL){
        $sql = "SELECT * FROM plano WHERE id=".$id ;
        $res_consulta = execute_query($sql);
        foreach($res_consulta as $dados):
            $data = $dados['data'];
            $tema = $dados['tema_aula'];
            $conteudo = $dados['conteudo'];
            $plano = $dados['plano_aula'];
        endforeach; 
    }else{
        $data     = '';
        $tema     = '';
        $conteudo = '';
        $plano    = '';   
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
            <a href="Semestre.php"    target="_self">Semestre</a>
            <a href="planodeaula.php" target="_self" class="selecionado">Plano de aula</a>
        </div>
        <h1>Plano de aula</h1>
            <table class="inserir">
                <tr>
                    <input type="hidden" value="plano" name="tipo">
                    <input type="hidden" value="<?php echo $id?>" name="id">

                    <td>Data</td>
                    <td><input type="date" name="data" value="<?php echo $data;?>"></td>
                    <td>Tema da aula</td>
                    <td><input type="text" name="tema_aula" value="<?php echo $tema;?>"></td>
                    <td><a href="planodeaula.php" class="btn-limpar">Limpar</a></td>
                </tr>
                <tr>
                    <td>Conteúdo</td>
                    <td><input type="text" name="conteudo" value="<?php echo $conteudo;?>"></td>
                    <td>Plano de aula</td>
                    <td><input type="text" name="plano_aula" value="<?php echo $plano;?>"></td>
                    <td><input type="submit" value="Gravar" class="btn" /></td>
                </tr>
            </table>
        </form>
        <div class="listar">
        <?php include('Listar/listarPlano.php'); ?>
        </div>
</body>
</html>
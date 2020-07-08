<!DOCTYPE html>
<html>
<?php     
    include 'BD/database.php';
    $id =  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    if($id != NULL){//lógica para alterar valores no BD, se id for diferente de nulo, significa alteração
        $sql="SELECT * FROM aluno WHERE id=".$id ;
        $res_consulta = execute_query($sql);
        foreach ($res_consulta as $dados):
            $nome = $dados['nome'];
            $nasc = $dados['nascimento'];
            $sexo = $dados['sexo'];
            $rg = $dados['rg'];
            $cpf = $dados['cpf'];
            $nat = $dados['naturalidade'];
            $e_civil = $dados['estado_civil'];
            $tab_atual = $dados['trabalho_atual'];
            $telefone = $dados['telefone'];
            $escolaridade = $dados['nivel_de_escolaridade'];
            $obs_medicas = $dados['obs_medicas'];
            $endereco = $dados['endereco'];
        endforeach;
    }else{
        $nome = '';
        $nasc = '';
        $sexo ='';
        $rg = '';
        $cpf = '';
        $nat = '';
        $e_civil = '';
        $tab_atual = '';
        $telefone = '';
        $escolaridade = '';
        $obs_medicas = '';
        $endereco = '';
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
            <a href="Aluno.php"       target="_self" class="selecionado">Aluno</a> 
            <a href="Professor.php"   target="_self">Professor</a> 
            <a href="Turma.php"       target = "_self">Turma</a> 
            <a href="Presença.php"    target = "_self">Presença</a> 
            <a href="Endereco.php"    target="_self">Endereço</a>
            <a href="Semestre.php"    target="_self">Semestre</a>
            <a href="planodeaula.php" target="_self">Plano de aula</a>
        </div>
        <h1>Aluno</h1>
        <table class="inserir">
            <tr>
            <!-- Identificador da pagina -->
            <input type="hidden" value="aluno" name="tipo">
            <!--ID DO ALUNO-->
            <input type="hidden" value="<?php echo $id?>" name="id">
            <td>Nome</td>
            <td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
            <td>Nascimento</td>
            <td><input type="date" name="nascimento" value="<?php echo $nasc;?>"></td>
            <td>Sexo</td>
            <td><input type="text" name="sexo" value="<?php echo $sexo;?>"></td>
            </tr>
            <td>RG</td>
            <td><input type="number" name="rg" value="<?php echo $rg;?>"></td>
            <td>CPF</td>
            <td><input type="number" name="cpf" value="<?php echo $cpf;?>"></td>
            <td>Naturalidade</td>
            <td><input type="text" name="naturalidade" value="<?php echo $nat;?>"></td>
            </tr>
            <tr>
            <td>Estado Civil</td>
            <td><input type="text" name="estado_civil" value="<?php echo $e_civil;?>"></td>
            <td>Tabralho Atual</td>
            <td><input type="text" name="trabalho_atual" value="<?php echo $tab_atual;?>"></td>
            <td>Telefone</td>
            <td><input type="tel" name="telefone" value="<?php echo $telefone;?>"></td>
            <td><a href="Aluno.php" class="btn-limpar">Limpar</a></td>
            </tr>
            <tr>
            <td>Escolaridade</td>
            <td><input type="text" name="nivel_de_escolaridade" value="<?php echo $escolaridade;?>"></td>
            <td>Obs Medicas</td>
            <td><input type="text" name="observacoes_medicas" value="<?php echo $obs_medicas;?>"></td>
            <td>Endereço</td>
            <td><input type="text" name="endereco" value="<?php echo $endereco;?>"></td>
            <td><input type="submit" value="Gravar" class="btn" /></td>
            </tr>
        </table>
    </form>
    <div class="listar">
    <?php include('Listar/listarAluno.php'); ?>
    </div>
</body>
</html>
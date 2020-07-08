<?php
    include 'BD/database.php';

    $tipo  =  filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $id    =  filter_input(INPUT_POST, 'id',   FILTER_SANITIZE_STRING);

    if($tipo=='aula') {
        $codigo   =  filter_input(INPUT_POST, 'TxtCodAula',  FILTER_SANITIZE_STRING);
        $data     =  filter_input(INPUT_POST, 'TxtDataAula', FILTER_SANITIZE_STRING);
        $codTurma =  filter_input(INPUT_POST, 'TxtCodTurma', FILTER_SANITIZE_STRING);
        $conteudo =  filter_input(INPUT_POST, 'TxtConteudo', FILTER_SANITIZE_STRING);
        $feedback =  filter_input(INPUT_POST, 'TxtFeedback', FILTER_SANITIZE_STRING);

        if($id == " "){
            $sql="insert into tb_aula (DT_DATA, DS_CONTEUDO, DS_FEEDBACK, CD_TURMA)
            values ( '".$data."', '".$conteudo."', '".$feedback."', '".$codTurma."')";
            echo $sql;
            execute($sql);
            echo 'Inclusao';
        }else{
            $sql=" update TB_AULA set DT_DATA= '".$data."', DS_FEEDBACK= '".$feedback."', DS_CONTEUDO= '".$conteudo."',
            CD_TURMA= '".$codTurma."' where CD_CODIGO=".$id;
            echo $sql;
            execute($sql);            
        }
        header('location: Aula.php');               
        exit;        
    }

    if($tipo=='professor') {
        $CodProf  =  filter_input(INPUT_POST, 'TxtCodProf',  FILTER_SANITIZE_STRING);
        $TelProf  =  filter_input(INPUT_POST, 'TxtTelProf',  FILTER_SANITIZE_STRING);//"TxtCodCalcado" é campo de texto da pagina Calçado.php
        $NascProf =  filter_input(INPUT_POST, 'TxtNascProf', FILTER_SANITIZE_STRING);
        $NomeProf =  filter_input(INPUT_POST, 'TxtNomeProf', FILTER_SANITIZE_STRING);
        $Ra       =  filter_input(INPUT_POST, 'TxtRa',       FILTER_SANITIZE_STRING);
        $Curso    =  filter_input(INPUT_POST, 'TxtCurso',    FILTER_SANITIZE_STRING);
        $Turno    =  filter_input(INPUT_POST, 'TxtTurno',    FILTER_SANITIZE_STRING);
        $Sexo     =  filter_input(INPUT_POST, 'TxtSexo',     FILTER_SANITIZE_STRING);

        if($id == " "){
            $sql="insert into tb_professor (NB_TELEFONE , DT_NASCIMENTO, NM_NOME, NB_RA, DS_CURSO, DS_TURNO, DS_SEXO)
            values ('".$TelProf."', '".$NascProf."', '".$NomeProf."', '".$Ra."', '".$Curso."', '".$Turno."', '".$Sexo."')";//"codigo" é a coluna no BD
            echo $sql;
            execute($sql);
            echo 'Inclusao';//      
        }else{            
                $sql=" update tb_professor set NB_TELEFONE= '".$TelProf."', DT_NASCIMENTO= '".$NascProf."', NM_NOME= '".$NomeProf."',
                NB_RA= '".$Ra."',  DS_CURSO= '".$Curso."',  DS_TURNO= '".$Turno."',  DS_SEXO= '".$Sexo."'  where CD_CODIGO=".$id;
                echo $sql;
                execute($sql);
                echo 'Edição';
            }
        header('location: Professor.php');    
        exit;
    }
    if($tipo=='aluno'){
        $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
        $nasc = filter_input(INPUT_POST,'nascimento',FILTER_SANITIZE_STRING);
        $sexo = filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_STRING);
        $rg = filter_input(INPUT_POST,'rg',FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
        $nat = filter_input(INPUT_POST,'naturalidade',FILTER_SANITIZE_STRING);
        $e_civil = filter_input(INPUT_POST,'estado_civil',FILTER_SANITIZE_STRING);
        $tab_atual = filter_input(INPUT_POST,'trabalho_atual',FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_STRING);
        $escolaridade = filter_input(INPUT_POST,'nivel_de_escolaridade',FILTER_SANITIZE_STRING);
        $obs_medicas = filter_input(INPUT_POST,'observacoes_medicas',FILTER_SANITIZE_STRING);
        $endereco = filter_input(INPUT_POST,'endereco',FILTER_SANITIZE_STRING);
        if($id == NULL){
            $sql = "INSERT INTO aluno (nome, nascimento, sexo, rg, cpf, naturalidade, estado_civil, trabalho_atual, telefone, nivel_de_escolaridade, obs_medicas, endereco) VALUES ('$nome', '$nasc', '$sexo', '$rg', '$cpf','$nat', '$e_civil', '$tab_atual', '$telefone', '$escolaridade', '$obs_medicas', '$endereco')";
            execute($sql);
        }else{
            $sql = "UPDATE aluno SET nome = '$nome', nascimento = '$nasc', sexo = '$sexo', rg = '$rg',cpf = '$cpf',estado_civil = '$e_civil',trabalho_atual = '$tab_atual',telefone = '$telefone', nivel_de_escolaridade = '$escolaridade', obs_medicas = '$obs_medicas',endereco = '$endereco' WHERE id = '$id'";
            execute($sql);
        }
        
        header('location: Aluno.php');
        exit; 
    }
    if($tipo=='turma') {
        $codTurma   =  filter_input(INPUT_POST, 'TxtCodTurma',  FILTER_SANITIZE_STRING);
        $semestreTurma     =  filter_input(INPUT_POST, 'TxtSemTurma', FILTER_SANITIZE_STRING);
        $professorTurma =  filter_input(INPUT_POST, 'TxtProfTurma', FILTER_SANITIZE_STRING);

        if($id == " "){
            $sql="insert into tb_turma (CD_SEMESTRE, CD_PROFESSOR)
            values ( '".$semestreTurma."', '".$professorTurma."')";
            echo $sql;
            execute($sql);
            echo 'Inclusao';
        }else{
            $sql=" update tb_turma set CD_SEMESTRE= '".$semestreTurma."', CD_PROFESSOR= '".$professorTurma."' where CD_CODIGO=".$id;
            echo $sql;
            execute($sql);            
        }
        header('location: Turma.php');               
        exit;        
    }

    if($tipo=='presença') {
        $codPres =  filter_input(INPUT_POST, 'TxtCodPres',  FILTER_SANITIZE_STRING);
        $nomeAlunos  =  filter_input(INPUT_POST, 'TxtNomeAlunosPres',  FILTER_SANITIZE_STRING);
        $temaAula =  filter_input(INPUT_POST, 'TxtTemaPres', FILTER_SANITIZE_STRING);
        $dataPres  =  filter_input(INPUT_POST, 'TxtDataPres', FILTER_SANITIZE_STRING);
        $aluno      =  filter_input(INPUT_POST, 'TxtAlunoPres',       FILTER_SANITIZE_STRING);
        $aula   =  filter_input(INPUT_POST, 'TxtAulaPres',    FILTER_SANITIZE_STRING);

        if($id == " "){
            $sql="INSERT INTO tb_presenca (NM_NOME_DOS_ALUNOS , DS_TEMA_DA_AULA, DT_DATA, CD_ALUNO, CD_AULA)
            values ('".$nomeAlunos."', '".$temaAula."', '".$dataPres."', '".$aluno."', '".$aula."')";
            echo $sql;
            execute($sql);
            echo 'Inclusao';      
        }else{            
                $sql=" UPDATE tb_presenca set NM_NOME_DOS_ALUNOS= '".$nomeAlunos."', DS_TEMA_DA_AULA= '".$temaAula."', DT_DATA= '".$dataPres."',
                CD_ALUNO= '".$aluno."',  CD_AULA= '".$aula."'where CD_CODIGO=".$id;
                echo $sql;
                execute($sql);
                echo 'Edição';
            }
        header('location: Presença.php');    
        exit;
    }
    if($tipo=='semestre') {
        $codigo   =  filter_input(INPUT_POST, 'TxtCodSem',  FILTER_SANITIZE_STRING);
        $data     =  filter_input(INPUT_POST, 'TxtDataSem', FILTER_SANITIZE_STRING);
        
        if($id == " "){
            $sql="insert into tb_semestre (DT_DATA)
            values ( '".$data."')";
            echo $sql;
            execute($sql);
            echo 'Inclusao';
        }else{
            $sql=" update tb_semestre set DT_DATA= '".$data."' where CD_CODIGO=".$id;
            echo $sql;
            execute($sql);            
        }
        header('location: Semestre.php');               
        exit;        
    }
    if($tipo=='endereco') {
        $codigo  =  filter_input(INPUT_POST, 'TxtCodEndereco',  FILTER_SANITIZE_STRING);
        $cidade  =  filter_input(INPUT_POST, 'TxtCidade',  FILTER_SANITIZE_STRING);
        $bairro =  filter_input(INPUT_POST, 'TxtBairro', FILTER_SANITIZE_STRING);
        $cep =  filter_input(INPUT_POST, 'TxtCep', FILTER_SANITIZE_STRING);
        $rua       =  filter_input(INPUT_POST, 'TxtRua',       FILTER_SANITIZE_STRING);
        $codAluno    =  filter_input(INPUT_POST, 'TxtCodAluno',    FILTER_SANITIZE_STRING);


        if($id == " "){
            $sql="insert into tb_endereco (NM_CIDADE, NM_BAIRRO, NM_RUA, CD_ALUNO, NB_CEP)
            values ('".$cidade."', '".$bairro."', '".$rua."','".$codAluno."', '".$cep."')";//"codigo" é a coluna no BD
            echo $sql;
            execute($sql);
            echo 'Inclusao';//      
        }else{            
                $sql=" update tb_endereco set NM_CIDADE= '".$cidade."', NM_BAIRRO= '".$bairro."', NM_RUA= '".$rua."',
                CD_ALUNO= '".$codAluno."',  NB_CEP= '".$cep."' where CD_CODIGO=".$id;
                echo $sql;
                execute($sql);
                echo 'Edição';
            }
        header('location: Endereco.php');    
        exit;
    }
    if($tipo=='plano'){
        $data      = filter_input(INPUT_POST,'data',FILTER_SANITIZE_STRING);
        $tema      = filter_input(INPUT_POST,'tema_aula',FILTER_SANITIZE_STRING);
        $conteudo  = filter_input(INPUT_POST,'conteudo',FILTER_SANITIZE_STRING);
        $plano     = filter_input(INPUT_POST,'plano_aula',FILTER_SANITIZE_STRING);
        if($id == NULL){
            $sql = "INSERT INTO plano (data, tema_aula, conteudo, plano_aula) VALUES ('$data','$tema', '$conteudo','$plano')";
            execute($sql);
        }else{
            $sql = "UPDATE plano SET data = '$data', tema_aula = '$tema', conteudo = '$conteudo',  plano_aula = '$plano' WHERE id = '$id'";
            execute($sql);
        }

        header('location: planodeaula.php');
        exit;
    }
?>
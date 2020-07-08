<?php
    include 'database.php';
    
    $tipo    =  filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_STRING);
    $id      =  filter_input(INPUT_GET, 'id',   FILTER_SANITIZE_STRING);

    if($tipo=='aula') {
        $sql=" delete from tb_aula  where CD_CODIGO=".$id;
        echo $sql;
        execute($sql);
        header('location: ../Aula.php');    
    }
    if($tipo=='professor') {
        $sql=" delete from tb_professor  where CD_CODIGO=".$id;
        echo $sql;
        execute($sql);
        header('location: ../Professor.php');
    }
    if($tipo=='aluno') {
        $sql=" delete from aluno  where id=".$id;
        execute($sql);
        header('location: ../Aluno.php');
    }
    if($tipo=='turma') {
        $sql=" delete from tb_turma  where CD_CODIGO=".$id;
        echo $sql;
        execute($sql);
        header('location: ../Turma.php');
    }
    if($tipo=='presença') {
        $sql=" delete from tb_presença  where CD_CODIGO=".$id;
        echo $sql;
        execute($sql);
        header('location: ../Presença.php');
    }
     if($tipo=='endereco') {
        $sql=" delete from tb_endereco  where CD_CODIGO=".$id;
        echo $sql;
        execute($sql);
        header('location: ../Endereco.php');    
    }
    if($tipo=='semestre') {
        $sql=" delete from tb_semestre  where CD_CODIGO=".$id;
        echo $sql;
        execute($sql);
        header('location: ../Semestre.php');
    }
    if($tipo=='plano'){
        $sql=" delete from plano where id=".$id;
        execute($sql);
        header('location: ../planodeaula.php');    
    }
    exit;
?>
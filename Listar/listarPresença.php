<?php
    $sql="select * from tb_presenca";
    $res_consulta = execute_query($sql);
?>
<br/>

<table style="font-size: 0.8rem; text-align: center;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome dos Alunos</th>
            <th>Tema da Aula</th>
            <th>Data</th>
            <th>Código do Aluno</th>
            <th>Código da Aula</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($res_consulta as $dados) : ?>
        <tr style="font-size: 12px;">
            <td><?php echo $dados['CD_CODIGO']; ?></td>
            <td><?php echo $dados['NM_NOME_DOS_ALUNOS']; ?></td>
            <td><?php echo $dados['DS_TEMA_DA_AULA']; ?></td>
            <td><?php echo $dados['DT_DATA']; ?></td>
            <td><?php echo $dados['CD_ALUNO']; ?></td>
            <td><?php echo $dados['CD_AULA']; ?></td>
            <td style="width: 150px;">
                <a href="BD/apagar.php?id=<?php echo $dados['CD_CODIGO']; ?>&tipo=presença" class="btn-excluir">Excluir</a>   
                <a href="Presença.php?id=<?php echo $dados['CD_CODIGO']; ?>" class="btn-alterar">Alterar</a>
            </td>
        </tr>
        <?php  endforeach;?>
    </tbody>
</table>
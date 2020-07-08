<?php
    $sql="select * from tb_professor ";
    $res_consulta = execute_query($sql);
?>
<br/>

<table style="font-size: 0.8rem; text-align: center;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Nome</th>
            <th>RA</th>
            <th>Curso</th>
            <th>Turno</th>
            <th>Sexo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody">
        <?php foreach($res_consulta as $dados) : ?>
        <tr style="font-size: 12px;">
            <td><?php echo $dados['CD_CODIGO']; ?></td>
            <td><?php echo $dados['NB_TELEFONE']; ?></td>
            <td><?php echo $dados['DT_NASCIMENTO']; ?></td>
            <td><?php echo $dados['NM_NOME']; ?></td>
            <td><?php echo $dados['NB_RA']; ?></td>
            <td><?php echo $dados['DS_CURSO']; ?></td>
            <td><?php echo $dados['DS_TURNO']; ?></td>
            <td><?php echo $dados['DS_SEXO']; ?></td>
            <td style="width: 150px;">
                <a href="BD/apagar.php?id=<?php echo $dados['CD_CODIGO']; ?>&tipo=professor" class="btn-excluir">Excluir</a>   |
                <a href="Professor.php?id=<?php echo $dados['CD_CODIGO']; ?>" class="btn-alterar">Alterar</a>
            </td>
        </tr>
        <?php  endforeach;?>
    </tbody>
</table>
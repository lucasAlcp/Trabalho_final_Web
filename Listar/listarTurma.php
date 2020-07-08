<?php
    $sql="select * from tb_turma ";
    $res_consulta = execute_query($sql);
?>
<br/>

<table style="font-size: 0.8rem; text-align: center;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Semestre</th>
            <th>Professor</th>
        </tr>
    </thead>
    <tbody">
        <?php foreach($res_consulta as $dados) : ?>
            <tr style="font-size: 12px;">
            <td><?php echo $dados['CD_CODIGO']; ?></td>
            <td><?php echo $dados['CD_SEMESTRE']; ?></td>
            <td><?php echo $dados['CD_PROFESSOR']; ?></td>
            <td style="width: 150px;">
                <a href="BD/apagar.php?id=<?php echo $dados['CD_CODIGO']; ?>&tipo=turma" class="btn-excluir">Excluir</a>   |
                <a href="Turma.php?id=<?php echo $dados['CD_CODIGO']; ?>" class="btn-alterar">Alterar</a>
            </td>
        </tr>
        <?php  endforeach;?>
    </tbody>
</table>
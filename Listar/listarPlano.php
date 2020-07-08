<?php
    $sql = "select * from plano ";
    $res_consulta = execute_query($sql);
?>
<table>
    <thead>
        <tr>
            <th>Data</th>
            <th>Tema da aula</th>
            <th>Conteudo</th>
            <th>Plano de aula</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($res_consulta as $dados) : ?>
    <tr>
        <td><?php echo $dados['data']; ?></td>
        <td><?php echo $dados['tema_aula']; ?></td>
        <td><?php echo $dados['conteudo']; ?></td>
        <td><?php echo $dados['plano_aula']; ?></td>
        <td>
            <a href="BD/apagar.php?id=<?php echo $dados['id']; ?>&tipo=plano" class="btn-excluir">Excluir</a>
            <a href="planodeaula.php?id=<?php echo $dados['id']; ?>" class="btn-alterar">Alterar</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
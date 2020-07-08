<?php
    $sql="select * from aluno ";
    $res_consulta = execute_query($sql);
?>
<table style="font-size: 0.8rem; text-align: center;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Sexo</th>
            <th>RG</th>
            <th>CPF</th>
            <th>naturalidade</th>
            <th>estado Civil</th>
            <th>Trabalho Atual</th>
            <th>Telefone</th>
            <th>Escolaridade</th>
            <th>Obs Medicas</th>
        <th>Endereço</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($res_consulta as $dados) : ?>
        <tr>
            <td><?php echo $dados['nome']; ?></td>
            <td><?php echo $dados['nascimento'];?></td>
            <td><?php echo $dados['sexo'];?></td>
            <td><?php echo $dados['rg'];?></td>
            <td><?php echo $dados['cpf'];?></td>
            <td><?php echo $dados['naturalidade'];?></td>
            <td><?php echo $dados['estado_civil'];?></td>
            <td><?php echo $dados['trabalho_atual'];?></td>
            <td><?php echo $dados['telefone'];?></td>
            <td><?php echo $dados['nivel_de_escolaridade'];?></td>
            <td><?php echo $dados['obs_medicas'];?></td>
            <td><?php echo $dados['endereco'];?></td>
            <td style="width:220px;">
                <a href="BD/apagar.php?id=<?php echo $dados['id']; ?>&tipo=aluno" class="btn-excluir">Excluir</a> |     
                <a href="Aluno.php?id=<?php echo $dados['id']; ?>" class="btn-alterar">Alterar</a>
            </td>
        </tr>
    <?php  endforeach;?>
    </tbody>
</table>
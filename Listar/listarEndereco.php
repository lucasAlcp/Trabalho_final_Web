<?php
    $sql="select * from tb_endereco ";
    $res_consulta = execute_query($sql);
?>
<br/>

<table style="font-size: 0.8rem; text-align: center;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>CEP</th>
            <th>Código do Aluno</th>
	    <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($res_consulta as $dados) : ?>
        <tr style="font-size: 12px;">
            <td><?php echo $dados['CD_CODIGO']; ?></td>
            <td><?php echo $dados['NM_CIDADE']; ?></td>
            <td><?php echo $dados['NM_BAIRRO']; ?></td>
            <td><?php echo $dados['NM_RUA']; ?></td>
            <td><?php echo $dados['NB_CEP']; ?></td>
            <td style="width:220px;">
				<a href="BD/apagar.php?id=<?php echo $dados['CD_CODIGO']; ?>&tipo=endereco" class="btn-excluir">Excluir</a>    | 
                <a href="Endereco.php?id=<?php echo $dados['CD_CODIGO']; ?>" class="btn-alterar">Alterar</a>                
            </td>
        </tr>
        <?php  endforeach;?>
    </tbody>
</table>
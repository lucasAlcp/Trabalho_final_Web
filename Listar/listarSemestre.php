<?php
    $sql="select * from tb_semestre ";
    $res_consulta = execute_query($sql);
?>
<br/>

<table style="font-size: 0.8rem; text-align: center;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Data</th>
	    <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($res_consulta as $dados) : ?>
        <tr style="font-size: 12px;">
            <td><?php echo $dados['CD_CODIGO']; ?></td>
            <td><?php echo $dados['DT_DATA']; ?></td>
            <td style="width:220px;">
				<a href="BD/apagar.php?id=<?php echo $dados['CD_CODIGO']; ?>&tipo=semestre" class="btn-excluir">Excluir</a>    | 
                <a href="Semestre.php?id=<?php echo $dados['CD_CODIGO']; ?>" class="btn-alterar">Alterar</a>                
            </td>
        </tr>
        <?php  endforeach;?>
    </tbody>
</table>
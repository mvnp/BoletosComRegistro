	<tr>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center">&nbsp;<?php echo $nosso_numero_alex;?>&nbsp;</div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo $cod_movimento; echo "<br>".$xfrase_movimento;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo $cod_motivo; echo "<br>".$frase_motivo;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="left"><?php echo "NOME DO PAGADOR";?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo datacx_databr($vencimento);?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo datacx_databr($data_ocorrencia);?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($valor_nominal); $total_valor_nominal+=$valor_nominal;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($valor_pago); $total_valor_pago+=$valor_pago;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($juros_multa); $total_juros_multa+=$juros_multa;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($desconto); $total_desconto+=$desconto;?></div></td>
	</tr>

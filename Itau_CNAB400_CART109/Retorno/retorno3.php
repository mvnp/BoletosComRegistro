<tr>

<td><div align="center">&nbsp;<?php echo $nosso_numero_alex;?>&nbsp;</div></td>
<td><div align="center"><?php echo $cod_movimento; echo "<br>".$xfrase_movimento;?></div></td>
<td><div align="center">
		
<?php
echo "(".substr( $cod_ocorrencia,0,2 ).")<br>";

if( $cod_movimento == 02 ){
	$frase_motivo = "REMESSA CONFIRMADA (02)";
	echo $frase_motivo;
}

if( $cod_movimento == 17 ){
	$frase_motivo = rejeicao_17( substr($cod_ocorrencia,0,2) );
	echo $frase_motivo;
}

if( $cod_movimento == 16 ){
	$frase_motivo = rejeicao_16( substr($cod_ocorrencia,0,2) );
	echo $frase_motivo;
}

if( $cod_movimento == 15 ){
	$frase_motivo = rejeicao_15( substr($cod_ocorrencia,0,2) );
	echo $frase_motivo;
}

if( $cod_movimento == 03 ){
	$frase_motivo = rejeicao_03( substr($cod_ocorrencia,0,2) );
	echo $frase_motivo;
}

if( $cod_movimento == 06 ){
	$frase_motivo = motivo_liquidacao( substr($cod_ocorrencia,0,2) );
	echo $frase_motivo;
}

if( $cod_movimento == 09 ){
	$frase_motivo = motivo_liquidacao( substr($cod_ocorrencia,0,2) );
	echo $frase_motivo;
}
?>		
</div></td>
		
		
		
		
		<td><div align="left"><?php echo "aluno do seu boleto";?></div></td>
		<td><div align="center"><?php echo datacx_databr($vencimento);?></div></td>
		<td><div align="center"><?php echo datacx_databr($data_ocorrencia);?></div></td>
		<td><div align="right"><?php echo $valor_nominal; $total_valor_nominal+=$valor_nominal;?></div></td>
		<td><div align="right">
		
		<?php 
		if( $cod_movimento == 06 || $cod_movimento == 10 ){
			echo $valor_pago; 
			$total_valor_pago+=$valor_pago;
		}
		?>
		
		</div></td>
		<td><div align="right"><?php echo $juros_multa; $total_juros_multa+=$juros_multa;?></div></td>
		<td><div align="right"><?php echo $desconto; $total_desconto+=$desconto;?></div></td>
		<td><div align="right"><?php echo $valor_liquido; $total_valor_liquido+=$valor_liquido;?></div></td>
		
	</tr>

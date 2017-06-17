<?php
$xdata_processamento = date("Y/m/d");

function datasql($data1) {
	$data1 = substr($data1,0,2).'/'.substr($data1,2,2).'/'.substr($data1,4,4);
	if (!empty($data1)){
	$p_dt = explode('/',$data1);
	$data_sql = $p_dt[2].'-'.$p_dt[1].'-'.$p_dt[0];
	return $data_sql;
	}
}

function datacx_databr( $var1 ){
	// Converter uma string data brasileira em uma data brasileira com as barras
	// Entrada: DDMMAAAA / Saida: DD/MM/AAAA
	$j_dia = substr($var1,0,2);
	$j_mes = substr($var1,2,2);
	$j_ano = substr($var1,4,4);
	$j_dtf = $j_dia."/".$j_mes."/".$j_ano;
	return $j_dtf;
}

function remove_zero_esq( $var1 ){
	$tam = strlen( $var1 );
	for( $i=0; $i<$tam; $i++ ){
		if( substr( $var1, $i, 1 )	== "0" ){
			$y = substr( $var1, ($i+1), ($tam) );
		}else{
			return $y;
		}
	}
	return $y;
}


function numero_usa( $var1 ){
	$tam  = strlen( $var1 );
	$ped1 = substr( $var1,0,($tam-2) );
	$ped2 = substr( $var1,-2);
	$num2 = $ped1.".".$ped2;
	if( $num2 == "." ){
		$num2 = "0.00";
	}	
	return $num2;
}

function rejeicao_03( $v1 ){

	switch( $v1 ){
	
		case 03:
			$xf = "AG.COBRADORA - NÃO FOI POSSÍVEL ATRIBUIR A AGÊNCIA PELO CEP OU CEP INVÁLIDO";
			break;
		
		case 04:
			$xf = "ESTADO - SIGLA DO ESTADO INVÁLIDA";		
			break;

		case 05:
			$xf = "DATA DE VENCIMENTO - PRAZO DE OPERAÇÃO MENOR QUE O MÍNIMO OU MAIOR QUE O MÁXIMO";		
			break;

		case 08:
			$xf = "NOME DO PAGADOR - NÃO INFORMADO OU DESLOCADO";		
			break;

		case 09:
			$xf = "AGÊNCIA/CONTA - AGÊNCIA ENCERRADA";		
			break;

		case 10:
			$xf = "LOGRADOURO - NÃO INFORMADO OU DESLOCADO";		
			break;

		case 11:
			$xf = "CEP - CEP NÃO NUMÉRICO";		
			break;

		case 13:
			$xf = "ESTADO/CEP INCOMPATÍVEL COM A SIGLA DO ESTADO";		
			break;

		case 14:
			$xf = "NOSSO NÚMERO JÁ REGISTRADO NO CADASTRO OU FORA DA FAIXA";		
			break;

		case 15:
			$xf = "NOSSO NÚMERO EM DUPLICIDADE NO MESMO MOVIMENTO";		
			break;

		case 37:
			$xf = "CNPJ/CPF DO PAGADOR - NÃO NUMÉRICO OU IGUAL A ZERO";		
			break;

		case 42:
			$xf = "NOSSO NUMERO FORA DA FAIXA";		
			break;

		case 54:
			$xf = "DATA DE VENCIMENTO - BANCO CORRESPONDENTE - TITULO COM VENCIMENTO INFERIOR A 15 DIAS";		
			break;

		case 55:
			$xf = "DEP./BCO.CORRESP. - CEP NÃO PERTENCE A DEPOSITÁRIA INFORMADA";		
			break;

		case 56:
			$xf = "DT.VCTO./BCO.CORRESP. - SUPERIOR A 180 DIAS DA DATA DE ENTRADA";		
			break;
		

		case 61:
			$xf = "JUROS DE MORA MAIOR QUE O PERMITIDO";		
			break;
		

		case 62:
			$xf = "VALOR DO DESCONTO MAIOR QUE O VALOR DO TÍTULO";		
			break;
		

		case 66:
			$xf = "DATA DE VENCIMENTO INVÁLIDA / FORA DE PRAZO DE OPERAÇÃO (MÍNIMO/MÁXIMO)";		
			break;

	}
	
	return( $xf );
	
}	


function rejeicao_15( $v1 ){

	switch( $v1 ){
	
		case 04:
			$xf = "NOSSO NÚMERO EM DUPLICIDADE NUM MESMO MOVIMENTO";
			break;
		
		case 05:
			$xf = "SOLICITAÇÃO DE BAIXA PARA TÍTULO JÁ LIQUIDADO OU JÁ BAIXADO";		
			break;

		case 06:
			$xf = "SOLICITAÇÃO DE BAIXA PARA TÍTULO NÃO REGISTRADO NO SISTEMA DO BANCO";		
			break;

		
	}
	
	return( $xf );
	
}	




function rejeicao_16( $v1 ){

	switch( $v1 ){
	
		case 01:
			$xf = "INSTRUÇÃO/OCORRÊNCIA NÂO EXISTE";
			break;
		
		case 03:
			$xf = "CONTA NÃO TEM PERMISÃO PARA PROTESTAR (FALE COM O GERENTE)";		
			break;

		case 06:
			$xf = "NOSSO NÚMERO IGUAL A ZEROS";		
			break;

		case 09:
			$xf = "CPF/CNPJ DO SACADOR AVALISTA INVÁLIDO";		
			break;

		case 14:
			$xf = "REGISTRO EM DUPLICIDADE";		
			break;

		case 15:
			$xf = "CNPJ/CPF INFORMADO SEM NOME DO SACADOR/AVALISTA";		
			break;

		case 19:
			$xf = "VALOR DO ABATIMENTO MAIOR QUE 90% DO TITULO";		
			break;
			

		case 20:
			$xf = "EXISTE SITUAÇÃO DE PROTESTO PENDENTE PARA O TÍTULO";		
			break;

		case 21:
			$xf = "TÍTULO NÃO REGISTRADO NO SISTEMA DO BANCO";		
			break;

		case 22:
			$xf = "TÍTULO JÁ HAVIA SIDO BAIXADO OU LIQUIDADO";		
			break;

		case 23:
			$xf = "INSTRUÇÃO NÃO ACEITA";		
			break;

		case 31:
			$xf = "EXISTE UMA OCORRENCIA DO PAGADOR QUE BLOQUEIA A INSTRUÇÃO";		
			break;

		case 48:
			$xf = "DADOS DO PAGADOR INVÁLIDOS (CPF/CNPJ/NOME)";		
			break;

		case 49:
			$xf = "DADOS DO ENDERECO DO PAGADOR INVÁLIDOS";		
			break;

		case 50:
			$xf = "DATA DE EMISSÃO DO TÍTULO INVÁLIDA";		
			break;
		
	}
	
	return( $xf );
	
}	


function rejeicao_17( $v1 ){

	switch( $v1 ){
	
		case 02:
			$xf = "AGÊNCIA COBRADORA INVÁLIDA OU COM O MESMO CONTEÚDO";
			break;
		
		case 04:
			$xf = "SIGLA DO ESTADO INVÁLIDO";		
			break;

		case 05:
			$xf = "DATA DE VENCIMENTO INVÁLIDA OU COM O MESMO CONTEÚDO";		
			break;

		case 08:
			$xf = "NOME DO PAGADOR COM O MESMO CONTEÚDO";		
			break;

		case 11:
			$xf = "CEP INVÁLIDO";		
			break;

		case 12:
			$xf = "NÚMERO DE INSCRIÇÃO INVÁLIDO SACADOR AVALISTA";		
			break;

		case 61:
			$xf = "TÍTULO JÁ BAIXADO OU LIQUIDADO OU NÃO EXISTE TÍTULO CORRESPONDENTE";		
			break;
		
	}
	
	return( $xf );
	
}	


function motivo_liquidacao( $var1 ){

	if( $var1 == "06" ){
		$xfra = "LIQUIDAÇÃO NORMAL";
	}elseif( $var1 == "08" ){
		$xfra = "LIQUIDAÇÃO EM CARTÓRIO";
	}elseif( $var1 == 0 ){
		$xfra = "LIQUIDAÇÃO NORMAL";
	}elseif( $var1 == "09" ){
		$xfra = "BAIXA SIMPLES";
	}elseif( $var1 == "10" ){
		$xfra = "BAIXA POR TER SIDO LIQUIDADO";
	}else{
		$xfra = "MOTIVO PG: ".$var1." <br>CONSULTAR MANUAL";
	}
	return( $xfra );
	
}	


$z = 0; // contador dos itens da tabela a ser exibida
$total_itens = 0;
$total_itens_processados = 0;
$total_valor_nominal = 0;
$frase_motivo = "";
$bg_color = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>ARQUIVO DE RETORNO - ITAU CNAB 240</title>

</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" valign="top"><div align="left"><span class="titulo_das_tabelas">ARQUIVOS PROCESSADOS - ITA&Uacute; </span></div></td>
      </tr>
      <tr>
        <td width="15%"><div align="right" class="label_normal">Arquivo de Retorno:&nbsp;</div></td>
        <td width="85%" class="label_normal"><div align="left" class="label_normal"> <strong><?php echo $_FILES['arquivo']['name'];?></strong> </div></td>
      </tr>
      <tr>
        <td><div align="left" class="label_normal">
            <div align="right" class="label_normal">Emiss&atilde;o:&nbsp; </div>
        </div></td>
        <td class="label_normal"><div align="left"><?php echo date("d/m/Y")." - ".date("h:m:s");?></div></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td width="96%" height="26" bgcolor="#FFFFFF"><table width="100%">
      <tr>
        <td height="40" colspan="12" valign="middle" bgcolor="#FFCC00"><div align="center">PROCESSAMENTO DE ARQUIVO DE RETORNO </div></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#FFFF66"><div align="center">N&ordm; Boleto</div></td>
        <td bgcolor="#FFFF66"><div align="center">C&oacute;d.&nbsp;Movimento</div></td>
        <td bgcolor="#FFFF66"><div align="center">C&oacute;d.&nbsp;Motivo</div></td>
        <td bgcolor="#FFFF66"><div align="center">Aluno / Contratante</div></td>
        <td bgcolor="#FFFF66"><div align="center">Vencimento</div></td>
        <td bgcolor="#FFFF66"><div align="center">Pagamento</div></td>
        <td bgcolor="#FFFF66"><div align="center">Valor</div></td>
        <td bgcolor="#FFFF66"><div align="center">Valor Pago</div></td>
        <td bgcolor="#FFFF66"><div align="center">Acr&eacute;scimos</div></td>
        <td bgcolor="#FFFF66"><div align="center">Desconto</div></td>
        <td bgcolor="#FFFF66"><div align="center">L&iacute;quido</div></td>
      </tr>
      <?php

# Pegando dados do arquivo ##############################################################################

$nome = $_FILES['arquivo']['name'];
$type = $_FILES['arquivo']['type'];
$size = $_FILES['arquivo']['size'];
$tmp  = $_FILES['arquivo']['tmp_name'];

$b = 4;

$pasta = "retorno"; // Nome da pasta onde ficaram os arquivos de retorno

if(move_uploaded_file($tmp, $pasta."/".$nome)){

	$lendo = @fopen($pasta."/".$nome,"r");

	if (!$lendo){
		echo "Erro ao abrir a URL.";
		exit;
	}else{
		//echo "<br>arquivo aberto com sucesso";
	}

	$i = 1;
	$x = 1;
	$cod_motivo = "  ";
		
	while ( !feof( $lendo ) ) {
	
		$linha = fgets($lendo,241);
		
		$rr = "<pre>".$linha."</pre>";
		
		$xtamanho_linha = strlen($linha);
	
		if( $xtamanho_linha == 240 ){
			
			if( $i > 2 && substr( $rr, $b+14,1 ) == "T" && substr( $rr, $b+16,2)!=28 ){   // Essa linha e' um Segmento "T"
				$num_sequencial_t         = substr( $rr, $b+9,5 );                  // 04.3T ->   Num. Seq.T -> Numero Seq.             -> 9(005)   -> Conforme (G038)
				$carteira_nosso_numero    = substr( $rr, $b+38,3 );                 // 13.3T ->   Nosso Num  -> carteira                -> 9(003)   -> Conforme (G069)
				$nosso_numero_bradesco    = substr( $rr, $b+41,8 );                // 13.3T ->   Nosso Num  -> Identific. titulo banco -> 9(011)   -> Conforme (G069)
				$nosso_numero_dv          = substr( $rr, $b+49,1 );                 // 13.3T ->   Nosso Num  -> DV Nosso Numero         -> 9(001)   -> Conforme (G069)
				$nosso_num                = substr( $rr, $b+59,10 );                // nosso numero para funcionar de acordo com o sistema alex.
				$nosso_numero_alex        = remove_zero_esq( $nosso_num );
				$vencimento               = substr( $rr, $b+74,8 );                 // 13.3T ->   Vencimento -> Modalidade nosso numero -> 9(002)   -> Conforme (G069)
				$vm                       = substr( $rr, $b+82,15 );                // 13.3T ->   Valor tit. -> Modalidade nosso numero -> 9(002)   -> Conforme (G069)
				$valor_nominal            = numero_usa( remove_zero_esq( $vm ) );
				$cod_movimento            = substr( $rr, $b+16,2 );                 // indica o que houve com o titulo
				
				switch( $cod_movimento ){
				
					case 02:
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "REMESSA <br>ENTRADA <br>CONFIRMADA (02)";
						$frase_motivo = "REMESSA CONFIRMADA (02)";
						break;

					case 03: // REJEICAO
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "REMESSA <br>ENTRADA <br>REJEITADA (03)";
						$frase_motivo = rejeicao_03( $cod_ocorrencia );
						break;

					case 06: // LIQUIDACAO
					    $cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "TÍTULO <br>LIQUIDADO (06)";
						$cod_motivo_liquidacao = substr( $rr, $b+214,8);
						$cod_motivo = $cod_motivo_liquidacao;
						$frase_motivo = motivo_liquidacao( substr(trim($cod_motivo_liquidacao),-2) );
						break;
						
					case 09: // BAIXA SIMPLES
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "TÍTULO <br>BAIXADO (09)";
						$cod_motivo_liquidacao = substr( $rr, $b+214,8);
						$cod_motivo = $cod_motivo_liquidacao;
						$frase_motivo = motivo_liquidacao( substr(trim($cod_motivo_liquidacao),-2) );
						break;

					case 15: // REJEICAO
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "REMESSA <br>ENTRADA <br>REJEITADA (15)";
						$frase_motivo = rejeicao_15( $cod_ocorrencia );
						break;

					case 16: // REJEICAO
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "REMESSA <br>ENTRADA <br>REJEITADA (16)";
						$frase_motivo = rejeicao_16( $cod_ocorrencia );
						break;
						
					case 17: // REJEICAO
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "REMESSA <br>ENTRADA <br>REJEITADA (17)";
						$frase_motivo = rejeicao_17( $cod_ocorrencia );
						break;						
					
					case 28:
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "TARIFA DE RELAÇÃO DAS LIQUIDAÇÕES";
						$frase_motivo = $xfrase_movimento;
						break;
					
					case 29:
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "TARIFA DE MANUTENÇÃO DE TÍTULOS VENCIDOS";
						$frase_motivo = $xfrase_movimento;
						break;

					case 30:
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "DÉBITO MENSAL DE TARIFAS (PARA ENTRADAS E BAIXAS)";
						$frase_motivo = $xfrase_movimento;
						break;

					case 37:
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "TARIFA DE EMISSÃO DE BOLETO/TARIFA DE ENVIO DE DUPLICATA";
						$frase_motivo = $xfrase_movimento;
						break;

					case 40:
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "TARIFA MENSAL DE EMISSÃO DE BOLETOS";
						$frase_motivo = $xfrase_movimento;
						break;

					case 54:
						$cod_ocorrencia = substr( $rr, $b+214,8);
						$xfrase_movimento = "TARIFA MENSAL DE LIQUIDAÇÕES NA CARTEIRA";
						$frase_motivo = $xfrase_movimento;
						break;
					
				} // fim do switch ... case
			
			}  // fim de se a linha fot uma linha T
			
			// *****************************************************************************************************************************************
			// final essa linha e' segmento "T"
			// *****************************************************************************************************************************************
			
			
			
			
			
			

			// *****************************************************************************************************************************************
			// Essa linha e' um segmento "U"
			// *****************************************************************************************************************************************
			
			if( $i > 3 && substr( $rr, $b+14,1 ) == "U" && substr( $rr, $b+16,2)!=28 ){
			
				$total_itens_processados++;

				$cod_movimento_u = $cod_movimento;  // o mesmo cod. de movimento da linha U = ao da linha T (linha anterior)

				$num_sequencial_u         = substr( $rr, $b+9,5 );           // 04.3U -> Num. Seq.U           -> Numero Seq.             -> 9(005)   -> Conforme (G038)
				
				$jumu                     = substr( $rr, $b+18,15 );         // 08.3U -> Juros/Multa          -> Juros/Multa             -> 9(015)   -> Conforme (C048)
				$juros_multa = numero_usa ( remove_zero_esq( $jumu ) );
				
				$desco                    = substr( $rr, $b+33,15 );         // 09.3U -> Valor do desconto    -> Valor do desconto       -> 9(015)   -> Conforme (C049)
				$desconto                 = numero_usa ( remove_zero_esq( $desco ) );
				
				$vp                       = substr( $rr, $b+78,15 );         // 12.3U -> Valor pago pagador   -> Valor pago pagador      -> 9(015)   -> Conforme (C052)
				$valor_pago = numero_usa ( remove_zero_esq( $vp ) );
				
				$vl                       = substr( $rr, $b+93,15 );         // 13.3U -> Valor liquido        -> Valor liquido           -> 9(015)   -> Conforme (C078)
				$valor_liquido = numero_usa ( remove_zero_esq( $vl ) );
				
				$outdes                   = substr( $rr, $b+108,15 );        // 14.3U -> Outras despesas      -> Outras Despesas         -> 9(015)   -> Conforme (C054)				
				$outras_despesas          = numero_usa ( remove_zero_esq( $outdes ) );
				
				$data_ocorrencia          = substr( $rr, $b+138,8 );         // 16.3U -> Data ocorrencia      -> Data do evento que afet -> 9(008)   -> Conforme (C056)
				
				$data_credito             = substr( $rr, $b+146,8 );         // 17.3U -> Data do credito      -> Data do credito         -> 9(008)   -> Conforme (C057)				
				
				$data_deb_tarifa          = substr( $rr, $b+158,8 );         // 19.3U -> Data deb. tarifa     -> Data do deb. tarifa     -> 9(008)   -> 

				if( $cod_movimento_u == "06" ){
					// SEU CODIGO PARA LIQUIDACAO DESTE BOLETO - BOLETO LIQUIDADO
					require "retorno3.php";
				}
				if( $cod_movimento_u == "02" ){
					// SEU CODIGO PARA REGISTRAR QUE O BOLETO FOI ACEITO NA REMESSA - ENTRADA CONFIRMADA
					require "retorno3.php";
				}
				if( $cod_movimento_u == "03" || $cod_movimento_u == "15" || $cod_movimento_u == "16" ){
					// SEU CODIGO PARA REGISTRAR QUE O BOLETO FOI REJEITADO NA REMESSA - ENTRADA REJEITADA
					require "retorno3.php";
				}
				
			
			} // Final essa linha e' segmento "U"
			
			$i++;
	
		} // fim se a linha == 240	
?>
      <?php
	} // fim While
?>
      <?php
	
	fclose($lendo);

} // end mov_upload

?>
      <tr>
        <td height="30" colspan="5" bgcolor="#FFCC00" class="label_normal">&nbsp;</td>
        <td height="30" bgcolor="#FFCC00" class="label_normal"><div align="right">Totais:</div></td>
        <td height="30" bgcolor="#FFCC00" class="label_normal"><div align="right"><?php echo $total_valor_nominal;?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo $total_valor_pago;?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo $total_juros_multa;?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo $total_desconto;?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo $total_valor_liquido;?></div></td>
       
      </tr>
    </table>
        
        <!-- final do meio -->    </td>
  </tr>
</table>

<?php
##########################################################################################################################################
# AUTOR: ALEXANDRE GUIMARAES SARMENTO
# ARQUIVO: retorno2.php 
# FUNCAO: LER E PROCESSAR OS ARQUIVOS DE RETORNO DA CAIXA ECONOMICA FEDERAL ENVIADOS PELO ARQUIVO: retorno.php
# DATA: 27-12-2016
# E-MAIL: alexandre890@yahoo.com.br
# WHATSAPP: (98) 99212-5970
# CIDADE: SAO LUIS - MA
##########################################################################################################################################
?>

<?php

$xdata_processamento = date("Y/m/d");

$z = 0; // contador dos itens da tabela a ser exibida
$total_itens = 0;
$total_itens_processados = 0;
$total_valor_nominal = 0;
$frase_motivo = "";
$bg_color = "";

##########################################################################################################################################
// FUNCOES AUXILIARES
##########################################################################################################################################

function php_fnumber($var1){
	//return number_format($var1,2,",",'.’.');
	return number_format($var1,2, ',', '.');
}

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

function motivo_liquidacao( $var1 ){

	if( $var1 == "01" ){
		$xfra = " ";
	}elseif( $var1 == "02" ){
		$xfra = "PG CASA <br>LOTÉRICA";
	}elseif( $var1 == "03" ){
		$xfra = "PG AGENCIA <br>CAIXA";
	}elseif( $var1 == "04" ){
		$xfra = "COMPENSAÇÃO <br>ELETRÔNICA";
	}elseif( $var1 == "05" ){
		$xfra = "COMPENSAÇÃO <br>CONVENCIONAL";
	}elseif( $var1 == "06" ){
		$xfra = "INTERNET <br>BANKING";
	}elseif( $var1 == "07" ){
		$xfra = "CORRESPONDENTE <br>BANCÁRIO";
	}elseif( $var1 == "08" ){
		$xfra = "EM CARTÓRIO";
	}else{
		$xfra = "MOTIVO PG: ".$var1." <br>CONSULTAR MANUAL";
	}
	return( $xfra );
	
}	

function motivo_rejeicao( $var1 ){

	if( $var1 == "08" ){
		$xfra = "NOSSO NÚMERO<br>INVÁLIDO";
	}elseif( $var1 == "09" ){
		$xfra = "NOSSO NÚMERO<br>DUPLICADO";
	}elseif( $var1 == "48" ){
		$xfra = "CEP INVÁLIDO";
	}elseif( $var1 == "49" ){
		$xfra = "CEP SEM PRACA DE<br> COBRANCA (NAO LOCALIZADO)";
	}elseif( $var1 == "50" ){
		$xfra = "CEP REFERENTE A <br>UM BANCO CORRESPONDENTE";
	}elseif( $var1 == "51" ){
		$xfra = "CEP INCOMPATIVEL COM<br> A UNIDADE DA FEDERACAO";
	}elseif( $var1 == "52" ){
		$xfra = "UNIDADE DA FEDERAÇÃO<br> INVÁLIDA";
	}elseif( $var1 == "87" ){
		$xfra = "NÚMERO DA REMESSA<br> INVÁLIDO";
	}elseif( $var1 == "63" ){
		$xfra = "ENTRADA PARA TITULO<br> JÁ CADASTRADO";
	}elseif( $var1 == "16" ){
		$xfra = "DATA DE VENCIMENTO<br> INVÁLIDA";
	}elseif( $var1 == "09" ){
		$xfra = "CEP REFERENTE A UM <br>BANCO CORRESPONDENTE";
	}elseif( $var1 == "10" ){
		$xfra = "CARTEIRA INVÁLIDA";
	}elseif( $var1 == "06" ){
		$xfra = "NÚMERO INSCRIÇÃO DO <br>BENEFICIÁRIO INVÁLIDO";
	}elseif( $var1 == "07" ){
		$xfra = "AG/CONTA/DV<br>INVÁLIDOS";
	}else{
		$xfra = "ERRO: ".$var1." ";
	}

	return( $xfra );

}

##########################################################################################################################################
// FIM - FUNCOES AUXILIARES
##########################################################################################################################################

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>RETORNO - CAIXA CNAB 240</title>

</head>

<body>


<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100%" colspan="3"><div align="center"><img src="../../../figuras/logo-big.png" width="350" height="138" /></div></td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    
   
    <td width="79%"><div align="left">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2" valign="top"><div align="center"><span class="titulo_das_tabelas">DEMO - ARQUIVO DE RETORNO -  CAIXA ECON&Ocirc;MICA - CNAB 240 </span></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="label_normal">&nbsp;</td>
        </tr>
        <tr>
          <td><div align="right" class="label_normal">Arquivo de Retorno:&nbsp;</div></td>
          <td width="71%" class="label_normal"><div align="left" class="label_normal"> <strong><?php echo $_FILES['arquivo']['name'];?></strong> </div></td>
          </tr>
        <tr>
          <td><div align="left" class="label_normal">
            <div align="right" class="label_normal">Emiss&atilde;o:&nbsp; </div>
          </div></td>
          <td class="label_normal"><div align="left"><?php echo date("d/m/Y")." - ".date("h:m:s");?></div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="label_normal">&nbsp;</td>
        </tr>
      </table>
    </div></td>
  </tr>
  
  <tr>
    <td height="26" colspan="2" bgcolor="#FFFFFF"><table width="100%" class="tabela_info2">
      <tr>
        <td height="40" colspan="13" valign="middle" bgcolor="#FFCC00"><div align="center" class="titulo_das_tabelas">ARQUIVO DE RETORNO </div></td>
      </tr>
      <tr>
        
        <td height="30" bgcolor="#FFCC00"><div align="center">N&ordm; Boleto</div></td>
        <td bgcolor="#FFCC00"><div align="center">C&oacute;d.&nbsp;Movimento</div></td>
        <td bgcolor="#FFCC00"><div align="center">C&oacute;d.&nbsp;Motivo</div></td>
        <td bgcolor="#FFCC00"><div align="center">Nome do Pagador </div></td>
        <td bgcolor="#FFCC00"><div align="center"> Vencimento</div></td>
        <td bgcolor="#FFCC00"><div align="center">Pagamento</div></td>
        <td bgcolor="#FFCC00"><div align="center">Valor</div></td>
        <td bgcolor="#FFCC00"><div align="center">Valor Pago</div></td>
        <td bgcolor="#FFCC00"><div align="center">Acr&eacute;scimos</div></td>
        <td bgcolor="#FFCC00"><div align="center">Desconto</div></td>
        <td bgcolor="#FFCC00"><div align="center">L&iacute;quido</div></td>
      </tr>

<?php

# Pegando dados do arquivo ##############################################################################

$nome = $_FILES['arquivo']['name'];
$type = $_FILES['arquivo']['type'];
$size = $_FILES['arquivo']['size'];
$tmp  = $_FILES['arquivo']['tmp_name'];

$b = 4;

$pasta = "retorno"; // NOME DA PASTA ONDE IRAO FICAR TODOS OS UPLOADS DE RETORNO

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
			
			if( $i > 2 && substr( $rr, $b+14,1 ) == "T" && substr( $rr, $b+16,2)!=28 ){   // if para tratar de que essa linha e' segmento T
				
				$num_sequencial_t         = substr( $rr, $b+9,5 );                  // 04.3T ->   Num. Seq.T -> Numero Seq.             -> 9(005)   -> Conforme (G038)
				
				$modalidade_nosso_numero  = substr( $rr, $b+40,2 );                 // 13.3T ->   Nosso Num  -> Modalidade nosso numero -> 9(002)   -> Conforme (G069)
				$nosso_numero_caixa       = substr( $rr, $b+42,15 );                // 13.3T ->   Nosso Num  -> Identific. titulo banco -> 9(015)   -> Conforme (G069)
				$nosso_num                = substr( $rr, $b+43,14 );                // nosso numero para funcionar de acordo com o sistema alex.
				$nosso_numero_alex        = remove_zero_esq( $nosso_num );
				
				$vencimento               = substr( $rr, $b+74,8 );                 // 13.3T ->   Vencimento -> Modalidade nosso numero -> 9(002)   -> Conforme (G069)
				//echo $vencimento;
				$vm                       = substr( $rr, $b+82,15 );                // 13.3T ->   Valor tit. -> Modalidade nosso numero -> 9(002)   -> Conforme (G069)
				$valor_nominal            = numero_usa( remove_zero_esq( $vm ) );
				
				$cod_movimento = substr( $rr, $b+16,2 );                            // Codigo de Movimento ou movimentacao => indica o que houve com o titulo
				
				switch( $cod_movimento ){
				
					case 06:
						$xfrase_movimento = "TÍTULO <br>LIQUIDADO";
						$bg_color = "#98FB98"; // verde
						$cod_motivo_liquidacao = substr( $rr, $b+214,10);
						$cod_motivo = $cod_motivo_liquidacao;
						$frase_motivo = motivo_liquidacao( substr(trim($cod_motivo_liquidacao),-2) );
						break;
					
					case 02:
						$xfrase_movimento = "REMESSA <br>ENTRADA <br>CONFIRMADA";
						$bg_color = "#FFF"; // branco
						break;
					
					case 03:
						$xfrase_movimento = "REMESSA <br>ENTRADA <br>REJEITADA";
						$bg_color = "#FFC4C4"; // vermelho
						$cod_motivo_rejeicao = substr( $rr, $b+214,10);
						$cod_motivo = $cod_motivo_rejeicao;
						$frase_motivo = motivo_rejeicao( substr(trim($cod_motivo_rejeicao),-2) );
						break;
					
					case 28:
						$xfrase_movimento = "DÉBITO DE <br>TARIFAS/CUSTAS";
						break;
					
					case 27:
						$xfrase_movimento = "CONFIRMAÇÃO DO <br>PEDIDO DE ALTERAÇÃO <br>OUTROS DADOS";
						break;
					
					case 30:
						$xfrase_movimento = "ALTERAÇÃO DE <br>DADOS REJEITADA";
						break;
						
					case 45:
						$xfrase_movimento = "ALTERAÇÃO <br>DE DADOS";
						break;
						
					case 09:
						$xfrase_movimento = "BAIXA";  // baixa != liquidacao / ocorre quando o banco remove o titulo de seu roll de titulos a receber
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

				$num_sequencial_u         = substr( $rr, $b+9,5 );         // 04.3U -> Num. Seq.U           -> Numero Seq.       -> 9(005)   -> Conforme (G038)
				
				$jumu                     = substr( $rr, $b+18,15 );       // 08.3U -> Juros/Multa          -> Juros/Multa       -> 9(015)   -> Conforme (C048)
				$juros_multa = numero_usa ( remove_zero_esq( $jumu ) );
				
				$desco                    = substr( $rr, $b+33,15 );       // 09.3U -> Valor do desconto    -> Valor do desconto -> 9(015)   -> Conforme (C049)
				$desconto                 = numero_usa ( remove_zero_esq( $desco ) );
				
				$vp                       = substr( $rr, $b+78,15 );       // 12.3U -> Valor pago pagador   -> Valor pago pagador      -> 9(015)   -> Conforme (C052)
				$valor_pago = numero_usa ( remove_zero_esq( $vp ) );
				
				$vl                       = substr( $rr, $b+93,15 );       // 13.3U -> Valor liquido        -> Valor liquido           -> 9(015)   -> Conforme (C078)
				$valor_liquido = numero_usa ( remove_zero_esq( $vl ) );
				
				$outdes                   = substr( $rr, $b+108,15 );      // 14.3U -> Outras despesas      -> Outras Despesas         -> 9(015)   -> Conforme (C054)				
				$outras_despesas          = numero_usa ( remove_zero_esq( $outdes ) );
				
				$data_ocorrencia          = substr( $rr, $b+138,8 );       // 16.3U -> Data ocorrencia      -> Data do evento que afet -> 9(008)   -> Conforme (C056)
				$data_credito             = substr( $rr, $b+146,8 );       // 17.3U -> Data do credito      -> Data do credito         -> 9(008)   -> Conforme (C057)				
				
				$data_deb_tarifa          = substr( $rr, $b+158,8 );       // 19.3U -> Data deb. tarifa     -> Data do deb. tarifa     -> 9(008)   -> 

				if( $cod_movimento_u == "06" ){ // titulo liquidado (pago)
					// seu codigo para dar baixa no boleto e demais registros em banco de dados 
				}
				if( $cod_movimento_u == "02" ){ // remessa com entrada confirmada (foi aceita)
					// Seu codigo aqui para ser executado quando o movimento == 2 ou seja, remessa aceita.
				}
				if( $cod_movimento_u == "03" ){  // boleto rejeitado na sua remessa 
					// seu codigo aqui para ser executado quando o movimento == 3 ou seja, remessa rejeitada.
				}
				
				// obs: 
				// existem ainda trocentos outros codigos de movimento no manual, se quiser tratar todos, informe-os aqui.
				
?>

<tr>
		<td height="50" bgcolor="<?php echo $bg_color;?>"><div align="center">&nbsp;<?php echo $nosso_numero_alex;?>&nbsp;</div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo $cod_movimento; echo "<br>".$xfrase_movimento;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo $cod_motivo; echo "<br>".$frase_motivo;?></div></td>

		<td bgcolor="<?php echo $bg_color;?>"><div align="left"><?php echo "Nome do pagador do boleto";?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo datacx_databr($vencimento);?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="center"><?php echo datacx_databr($data_ocorrencia);?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($valor_nominal); $total_valor_nominal+=$valor_nominal;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($valor_pago); $total_valor_pago+=$valor_pago;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($juros_multa); $total_juros_multa+=$juros_multa;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($desconto); $total_desconto+=$desconto;?></div></td>
		<td bgcolor="<?php echo $bg_color;?>"><div align="right"><?php echo php_fnumber($valor_liquido); $total_valor_liquido+=$valor_liquido;?></div></td>
		</tr>


<?php
			
			} // Final essa linha e' segmento "U"
			
			$i++;
	
		} // fim se a linha == 240	

	} // fim While

} // end mov_upload

?>




 <tr>
        <td height="30" colspan="5" bgcolor="#FFCC00" class="label_normal">&nbsp;</td>
        <td height="30" bgcolor="#FFCC00" class="label_normal"><div align="right">Totais:</div></td>
        <td height="30" bgcolor="#FFCC00" class="label_normal"><div align="right"><?php echo php_fnumber($total_valor_nominal);?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo php_fnumber($total_valor_pago);?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo php_fnumber($total_juros_multa);?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo php_fnumber($total_desconto);?></div></td>
        <td height="30" bgcolor="#FFCC00"><div align="right"><?php echo php_fnumber($total_valor_liquido);?></div></td>
        </tr>
    </table>   </td>
    
  </tr>
</table>


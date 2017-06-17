<?php
######################################################################################################################################################
# AUTOR..........: ALEXANDRE GUIMARÃES SARMENTO
# CIDADE/UF......: SAO LUIS - MA
# CONTATO........: alexandre890@yahoo.com.br / +55 (98) 99212-5970 (vivo/whatsapp)
# DATA DO CODIGO.: 25/03/2017
# FINALIDADE.....: GERAR ARQUIVO DE REMESSA DO BANCO SICOOB - PADRAO CNAB-240
# LICENCA DE USO.: GPL
######################################################################################################################################################
# Agradecimento especial ao:
# SAMUCA HANTSCHEL - São Bento do Sul - RS
# samuca@samuca.eti.br
# http://www.samuca.eti.br
# O Samuca Desenvolveu a solução para o DV (digito verificador) do SICOOB usado tanto na geração dos boletos quanto no arquivo de remessa.
# Obrigado Samuca!
######################################################################################################################################################
?>

<?php
######################################################################################################################################################
# FUNCOES DO SISTEMA (NAO ALTERAR)
######################################################################################################################################################
function remover_acentos($str) { 
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', 'ç', 'Ç', "'"); 
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o','c','C', " "); 
  return str_replace($a, $b, $str); 
} 

function post_slug($str){ 
  return strtoupper(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), 
  array('', '-', ''), remover_acentos($str))); 
} 

/*Campos Numéricos (“Picture 9”)
• Alinhamento: sempre à direita, preenchido com zeros à esquerda, sem máscara de edição;
• Não utilizados: preencher com zeros.
*/

function picture_9($palavra,$limite){
	$var=str_pad($palavra, $limite, "0", STR_PAD_LEFT);
	return $var;
}

/*
Campos Alfanuméricos (“Picture X”)
• Alinhamento: sempre à esquerda, preenchido com brancos à direita;
• Não utilizados: preencher com brancos;
• Caracteres: maiúsculos, sem acentuação, sem ‘ç’, sem caracteres especiais.
*/
	 
function picture_x( $palavra, $limite ){
	$var = str_pad( $palavra, $limite, " ", STR_PAD_RIGHT );
	$var = remover_acentos( $var );
	if( strlen( $palavra ) >= $limite ){
		$var = substr( $palavra, 0, $limite );
	}
	$var = strtoupper( $var );// converte em letra maiuscula
	return $var;
}	 
	 

function zeros($min,$max){
	
	$x = ($max - strlen($min));

	for($i = 0; $i < $x; $i++){
		$zeros .= '0';
	}
	
	return $zeros.$min;
}

function complementoRegistro($int,$tipo){
	
	if($tipo == "zeros"){
	
		$space = '';
	
		for($i = 1; $i <= $int; $i++){
			$space .= '0';
		}
	
	}else if($tipo == "brancos"){
		
		$space = '';
		
		for($i = 1; $i <= $int; $i++){
			
			$space .= ' ';
		
		}
	}

	return $space;
}


function picture_99($palavra,$limite){

	$var=str_pad($palavra, $limite, "0", STR_PAD_LEFT);

	return $var;
}


# =============================================================================================
# Contribuicao do SAMUCA
# =============================================================================================
		
/*
#################################################
FUNÇÃO DO MÓDULO 10 RETIRADA DO PHPBOLETO

ESTA FUNÇÃO PEGA O DÍGITO VERIFICADOR DO PRIMEIRO, SEGUNDO
E TERCEIRO CAMPOS DA LINHA DIGITÁVEL
#################################################
*/
function modulo_10($num) {
	$numtotal10 = 0;
	$fator = 2;
 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial10[$i] = $numeros[$i] * $fator;
		$numtotal10 .= $parcial10[$i];
		if ($fator == 2) {
			$fator = 1;
		}
		else {
			$fator = 2; 
		}
	}
	
	$soma = 0;
	for ($i = strlen($numtotal10); $i > 0; $i--) {
		$numeros[$i] = substr($numtotal10,$i-1,1);
		$soma += $numeros[$i]; 
	}
	$resto = $soma % 10;
	$digito = 10 - $resto;
	if ($resto == 0) {
		$digito = 0;
	}

	return $digito;
}

/*
#################################################
FUNÇÃO DO MÓDULO 11 RETIRADA DO PHPBOLETO

MODIFIQUEI ALGUMAS COISAS...

ESTA FUNÇÃO PEGA O DÍGITO VERIFICADOR:

NOSSONUMERO
AGENCIA
CONTA
CAMPO 4 DA LINHA DIGITÁVEL
#################################################
*/

function modulo_11($num, $base=9, $r=0) {
	$soma = 0;
	$fator = 2; 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial[$i] = $numeros[$i] * $fator;
		$soma += $parcial[$i];
		if ($fator == $base) {
			$fator = 1;
		}
		$fator++;
	}
	if ($r == 0) {
		$soma *= 10;
		$digito = $soma % 11;
		
		//corrigido
		if ($digito == 10) {
			$digito = "X";
		}

		/*
		alterado por mim, Daniel Schultz

		Vamos explicar:

		O módulo 11 só gera os digitos verificadores do nossonumero,
		agencia, conta e digito verificador com codigo de barras (aquele que fica sozinho e triste na linha digitável)
		só que é foi um rolo...pq ele nao podia resultar em 0, e o pessoal do phpboleto se esqueceu disso...
		
		No BB, os dígitos verificadores podem ser X ou 0 (zero) para agencia, conta e nosso numero,
		mas nunca pode ser X ou 0 (zero) para a linha digitável, justamente por ser totalmente numérica.

		Quando passamos os dados para a função, fica assim:

		Agencia = sempre 4 digitos
		Conta = até 8 dígitos
		Nosso número = de 1 a 17 digitos

		A unica variável que passa 17 digitos é a da linha digitada, justamente por ter 43 caracteres

		Entao vamos definir ai embaixo o seguinte...

		se (strlen($num) == 43) { não deixar dar digito X ou 0 }
		*/
		
		if (strlen($num) == "43") {
			//então estamos checando a linha digitável
			if ($digito == "0" or $digito == "X" or $digito > 9) {
					$digito = 1;
			}
		}
		return $digito;
	} 
	elseif ($r == 1){
		$resto = $soma % 11;
		return $resto;
	}
}

# =============================================================================================
# Final da contribuicao do SAMUCA
# =============================================================================================
			


######################################################################################################################################################
# Variaveis que podem ser alteradas de acordo com sua necessidade 
######################################################################################################################################################
# Dados bancarios e do arquivo da remessa a ser gerado
######################################################################################################################################################

$pasta_destino               = "remessa/";                                 // local onde ficarao seus arquivos de remessa em seu servidor

$carteira                    = "1";                                        // CODIGO DA CARTEIRA
$cpf_cnpj                    = "05743985000169";                           // CNPJ

$arq                         = $cpf_cnpj."_".date("d").date("m")."AB";     // nome do seu arquivo de remessa a ser gerado 
$extensao                    = "REM";                                      // extensao do arquivo de remessa

$agencia                     = "4437";                                     // AGENCIA DA CONTA DA EMPRESA / cod. da cooperativa
$dv_agencia                  = "0";                                        // DIGITO DA AGENCIA

$conta                       = "4554";                                     // CONTA CORRENTE
$dv_conta                    = "3";                                        // DIGITO DA CONTA

$dv_ag_conta                 = "3";                                        // DIGITO DA AGENCIA/CONTA (VERIFICAR E OBTER COM O SEU BANCO)

$num_banco                   = "756";                                      // CODIGO DO BANCO 
$nome_banco                  = "BANCO COOPERATIVO DO BRASIL SA";           // NOME DO BANCO
$codigo_beneficiario         = "89001";                                    // COD. BENEFICIARIO OU COD. DO CONVENIO
$conta_cedente               = "89001";                                    // COD. DO CEDENTE (OBTER COM O SEU BANCO)
$empresa_beneficiario        = "D A  BAILEY JUNIOR";                       // NOME DA EMPRESA

######################################################################################################################################################
# dados do 1º boleto 
######################################################################################################################################################

$nosso_num[0]                = "1";                                      // NOSSO NUMERO 1 => NUMERO DO SEU BOLETO. P.EX. ==> BOLETO Nº 0000001;
$data_vencimento_boleto[0]   = "05012017";                               // VENCIMENTO DO BOLETO -> DDMMYYYY
$data_emissao_boleto[0]      = "03012017";                               // EMISSAO DO BOLETO -> DDMMYYYY
$valor_boleto[0]             = "23600";                                  // VALOR DO BOLETO 236,00 => 23600
$data_juros[0]               = "06012017";                               // DATA LIMITE PARA COBRAR JUROS E MULTA -> DDMMYYYY
$valor_juros[0]              = "0100";                                   // JUROS EM TAXA PERCENTUAL 1% AO MES => 01,00% AO MES => 0100 
$valor_multa[0]              = "0200";                                   // MULTA EM PORCENTAGEM CONTENDO 2 CASAS DECIMAIS, P.EX. "0200" = 2%
$data_desconto[0]            = "05012017";                               // DATA LIMITE PARA DESCONTO -> DDMMYYYY
$valor_desconto[0]           = "0500";                                   // VALOR DO DESCONTO EM PORCENTAGEM -> 5% = 0500
$valor_iof[0]                = "000";                                    // VALOR DO IOF (DEIXAR ZERADO)
$valor_abatimento[0]         = "000";                                    // DEIXAR 000
$tipo_inscricao_pagador[0]   = "1";                                      // tipo de inscrição do pagador 1 pessoa fisica 2 pessoa juridica
$numero_inscricao_pagador[0] = "40329543765";                            // CPF -> INFORMAR UM CPF VALIDO
$nome_pagador[0]             = "JOSE MELO REGO";                         // NOME DO PAGADOR
$endereco_pagador[0]         = "AV ALFA QUADRA 15 CASA 29";              // ENDERECO
$bairro_pagador[0]           = "PARQUE ATHENAS";                         // BAIRRO
$cep_pagador[0]              = "65073";                                  // PRIMEIROS 5 DIGITOS DO CEP
$cep_pagador_sufixo[0]       = "300";                                    // TRES ULTIMOS DIGITOS DO CEP -> nao podera ser 000
$cidade_pagador[0]           = "SAO LUIS";                               // CIDADE
$estado_pagador[0]           = "MA";                                     // ESTADO

######################################################################################################################################################
# dados do 2º boleto
######################################################################################################################################################

$nosso_num[1]                = "0203799";                                // NOSSO NUMERO 2 => NUMERO DO SEU BOLETO. P.EX. ==> BOLETO Nº 0203799;
$data_vencimento_boleto[1]   = "15012017";                               // VENCIMENTO DO BOLETO -> DDMMYYYY
$data_emissao_boleto[1]      = "03012017";                               // EMISSAO DO BOLETO -> DDMMYYYY
$valor_boleto[1]             = "23400";                                  // VALOR DO BOLETO
$data_juros[1]               = "16012017";                               // DATA LIMITE PARA COBRAR JUROS E MULTA -> DDMMYYYY
$valor_juros[1]              = "0100";                                   // JUROS EM TAXA PERCENTUAL
$valor_multa[1]              = "0200";                                   // MULTA EM PORCENTAGEM CONTENDO 2 CASAS DECIMAIS, P.EX. "0200" = 2%
$data_desconto[1]            = "15012017";                               // DATA LIMITE PARA DESCONTO -> DDMMYYYY
$valor_desconto[1]           = "0500";                                   // VALOR DO DESCONTO EM PORCENTAGEM
$valor_iof[1]                = "000";                                    // VALOR DO IOF (DEIXAR ZERADO)
$valor_abatimento[1]         = "000";                                    // DEIXAR 000
$tipo_inscricao_pagador[1]   = "1";                                      // tipo de inscrição do pagador 1 pessoa fisica 2 pessoa juridica
$numero_inscricao_pagador[1] = "40329543766";                            // CPF DO PAGADOR -> INFORMAR CPF VALIDO
$nome_pagador[1]             = "ANTONIO DA PA VIRADA";                   // NOME DO PAGADOR
$endereco_pagador[1]         = "RUA SOUSA LIMA 36";                      // ENDERECO
$bairro_pagador[1]           = "PLANALTO DA PIPIRA";                     // BAIRRO
$cep_pagador[1]              = "65073";                                  // PRIMEIROS 5 DIGITOS DO CEP
$cep_pagador_sufixo[1]       = "300";                                    // TRES ULTIMOS DIGITOS DO CEP
$cidade_pagador[1]           = "SAO LUIS";                               // CIDADE
$estado_pagador[1]           = "MA";                                     // ESTADO

######################################################################################################################################################
# dados do 3º boleto
######################################################################################################################################################

$nosso_num[2]                = "020380";                                 // NOSSO NUMERO 2 => NUMERO DO SEU BOLETO. P.EX. ==> BOLETO Nº 0203799;
$data_vencimento_boleto[2]   = "18012017";                               // VENCIMENTO DO BOLETO -> DDMMYYYY
$data_emissao_boleto[2]      = "03012017";                               // EMISSAO DO BOLETO -> DDMMYYYY
$valor_boleto[2]             = "23700";                                  // VALOR DO BOLETO
$data_juros[2]               = "19012017";                               // DATA LIMITE PARA COBRAR JUROS E MULTA -> DDMMYYYY
$valor_juros[2]              = "0100";                                   // JUROS EM TAXA PERCENTUAL
$valor_multa[2]              = "0200";                                   // MULTA EM PORCENTAGEM CONTENDO 2 CASAS DECIMAIS, P.EX. "0200" = 2%
$data_desconto[2]            = "18012017";                               // DATA LIMITE PARA DESCONTO -> DDMMYYYY
$valor_desconto[2]           = "0500";                                   // VALOR DO DESCONTO EM PORCENTAGEM
$valor_iof[2]                = "000";                                    // VALOR DO IOF (DEIXAR ZERADO)
$valor_abatimento[2]         = "000";                                    // DEIXAR 000
$tipo_inscricao_pagador[2]   = "1";                                      // tipo de inscrição do pagador 1 pessoa fisica 2 pessoa juridica
$numero_inscricao_pagador[2] = "40329543766";                            // CPF DO PAGADOR -> INFORMAR CPF VALIDO
$nome_pagador[2]             = "ASTROGILDA NEVES DA COSTA REIS";         // NOME DO PAGADOR
$endereco_pagador[2]         = "RUA DAS MANGABEIRAS, 987";               // ENDERECO
$bairro_pagador[2]           = "RECANTO DOS NOBRES";                     // BAIRRO
$cep_pagador[2]              = "65073";                                  // PRIMEIROS 5 DIGITOS DO CEP
$cep_pagador_sufixo[2]       = "300";                                    // TRES ULTIMOS DIGITOS DO CEP
$cidade_pagador[2]           = "SAO LUIS";                               // CIDADE
$estado_pagador[2]           = "MA";                                     // ESTADO

######################################################################################################################################################
// CONFIGURACOES 
// ( NAO PODE ALTERAR )
######################################################################################################################################################

$fusohorario         = 3; // como o servidor de hospedagem é a dreamhost pego o fuso para o horario do brasil
$timestamp           = mktime(date("H") - $fusohorario, date("i"), date("s"), date("m"), date("d"), date("Y"));

$DATAHORA['PT'][$i]  = gmdate("d/m/Y H:i:s", $timestamp);
$DATAHORA['EN'][$i]  = gmdate("Y-m-d H:i:s", $timestamp);
$DATA['PT'][$i]      = gmdate("d/m/Y", $timestamp);
$DATA['EN'][$i]      = gmdate("Y-m-d", $timestamp);
$DATA['DIA'][$i]     = gmdate("d",$timestamp);
$DATA['MES'][$i]     = gmdate("m",$timestamp);
$DATA['ANO'][$i]     = gmdate("Y",$timestamp);
$HORA                = gmdate("H:i:s", $timestamp);
$HORA1               = gmdate("His", $timestamp);

define("REMESSA",$PATH."",true);

$arquivo         = $arq.".".$extensao;   
$filename        = $arquivo;             

$conteudo        = '';
$lote_sequencial = 1;
$lote_servico    = 1;      

$header          = '';
$header_lote     = '';

$linha_p         = '';
$linha_q         = '';
$linha_r         = '';
$linha_s         = '';

$linha_5         = '';     

$linha_9         = '';

$conteudo_meio   = '';

$qtd_titulos     = 0; # calcular quantos boletos existem

$total_valor     = 0; 

$num_seg_linha_p_q_r_s = 1;

$xnumero_seq = 1;

$numero_sequencial_arquivo = $xnumero_seq; // cada arquivo gerado deverá ter uma sequencia (vide arquivo anterior .php)

######################################################################################################################################################
// REGISTRO HEADER ou HEADER DE ARQUIVO - ( Registro TIPO 0 )
// PARTE 1
// NAO ALTERAR 
######################################################################################################################################################

$header .= picture_9($num_banco,3);                     // 01.0 -> Cod. do banco. 
$header .= complementoRegistro(4,"zeros");              // 02.0 -> Cod. do lote
$header .= complementoRegistro(1,"zeros");              // 03.0 -> Tipo de Registro
$header .= complementoRegistro(9,"brancos");            // 04.0 -> CNAB literal remessa escr. extenso 003 009 X(07)
$header .= '2';                                         // 05.0 -> Tipo de inscrição do beneficiario : um se pessoa fisico (1) ou juridica (2)
$header .= picture_9($cpf_cnpj,14);                     // 06.0 -> Nº de Inscrição do  Beneficiario cpf ou cnpj
$header .= picture_x($codigo_beneficiario,20);          // 07.0 -> Codigo do Convenio -> Codigo do convenio no banco
$header .= picture_9($agencia,5);                       // 08.0 -> Cod. da agencia mantenedora da conta
$header .= picture_x($dv_agencia,1);                    // 09.0 -> Digito verificador
$header .= picture_9($conta,12);                        // 10.0 -> Num. da conta corrente
$header .= picture_x($dv_conta,1);                      // 11.0 -> Digito verificador da conta corrente
$header .= complementoRegistro(1,"brancos");            // 12.0 -> Digito verificador da ag/conta - deixar em branco
$header .= picture_x($empresa_beneficiario,30);         // 13.0 -> Nome da empresa
$header .= picture_x($nome_banco,30);                   // 14.0 -> Nome do banco, neste caso: CAIXA ECONOMICA FEDERAL ate completar 30 espacos
$header .= complementoRegistro(10,"brancos");           // 15.0 -> 10 espaços em banco
$header .='1';                                          // 16.0 -> Cod. (1) = Remessa ou (2) = Retorno.
$header .= $DATA['DIA'][$i].$DATA['MES'][$i].$DATA['ANO'][$i];      // 17.0 -> Data da geracao arquivo 
$header .= $HORA1;                                      // 18.0 -> Hora da geracao arquivo 
$header .= picture_9($numero_sequencial_arquivo,6);     // 19.0 -> Sequencial do arquivo um numero novo para cada arquivo de remessa que for gerado
$header .='081';                                        // 20.0 -> Nova versao da leitura
$header .= complementoRegistro(5,"zeros");              // 21.0 -> Densidade de Gravacao do Arquivo
$header .= complementoRegistro(20,"brancos");           // 22.0 -> Filler
$header .= complementoRegistro(20,"brancos");           // 23.0 -> 
$header .= complementoRegistro(29,"brancos");           // 24.0 -> Preencher com espacos
$header .= chr(13).chr(10);                             // QUEBRA DE LINHA

######################################################################################################################################################
// HEADER DE LOTE ou HEADER DE LOTE DE ARQUIVO REMESSA
// DESCRICAO DE REGISTRO - ( Registro TIPO 1 )
// PARTE 2
// NAO ALTERAR
######################################################################################################################################################

$header_lote .= picture_9($num_banco,3);                     // 01.1 -> Cod. do banco, neste caso = 104
$header_lote .= picture_9($lote_servico,4);                  // 02.1 -> Lote de servico = igual ao campo 02.1 do header acima
$header_lote .='1';                                          // 03.1 -> Preencher '1’ (equivale a Header de Lote)
$header_lote .='R';                                          // 04.1 -> Preencher ‘R’ (equivale a Arquivo Remessa)
$header_lote .='01';                                         // 05.1 -> Preencher com ‘01', se Cob. Registrada; ou ‘02’, se Cob. Sem Registro/Serviços
$header_lote .= complementoRegistro(2,"brancos");            // 06.1 -> Preencher com brancos
$header_lote .='040';                                        // 07.1 -> No. da versão do layout.
$header_lote .= complementoRegistro(1,"brancos");            // 08.1 -> Preencher com espacos
$header_lote .= '2';                                         // 09.1 -> Tipo de inscrição do beneficiario : um se pessoa fisico (1) ou juridica (2)
$header_lote .= picture_9($cpf_cnpj,15);                     // 10.1 -> CNPJ = Número de Inscrição do  Beneficiário cpf ou cnpj
$header_lote .= picture_x($codigo_beneficiario,20);          // 11.1 -> COD. CEDENTE ou COD. DO CONVENIO NO BANCO = código do beneficiário 
$header_lote .= picture_9($agencia,5);                       // 12.1 -> Agencia mantenedora da conta
$header_lote .= picture_x($dv_agencia,1);                    // 13.1 -> Digito verificador
$header_lote .= picture_9($conta,12);                        // 14.1 -> Num. da conta corrente
$header_lote .= picture_x($dv_conta,1);                      // 15.1 -> digito verificador da conta corrente
$header_lote .= complementoRegistro(1,"brancos");            // 16.1 -> Uso exclusivo da caixa
$header_lote .= picture_x($empresa_beneficiario,30);         // 17.1 -> Nome da empresa
$header_lote .= complementoRegistro(40,"brancos");           // 18.1 -> mensagem 1
$header_lote .= complementoRegistro(40,"brancos");           // 19.1 -> mensagem 2
$header_lote .= picture_9($numero_sequencial_arquivo,8);     // 20.1 -> Controle de cobranca - No. da remessa, mesmo que 19.0
$header_lote .= $DATA['DIA'][$i].$DATA['MES'][$i].$DATA['ANO'][$i];      // 21.1 -> Controle de cobranca - Data de gravacao do arquivo de remessa
$header_lote .= complementoRegistro(8,"zeros");              // 22.1 -> Data do credito. Preencher com zeros
$header_lote .= complementoRegistro(33,"brancos");           // 23.1 -> CNAB. Preencher com espacos 
$header_lote .= chr(13).chr(10);                             // Quebra de linha










# loop para pegar os dados dos boletos

$total_boletos = count( $nosso_num );                        // contar quantos boletos existem no vetor de boletos $nosso_num


for( $t = 0; $t < $total_boletos; $t++ ){

	// *****************************************************************************************************************
	// LINHA P ou SEGMENTO P 
	//
	// (Obs: para cada boleto você terá uma linha P, Q e R) essas 3 (três) linhas descrevem o boleto e seus dados
	//
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "P":
	// DADOS DO TITULO
	// PARTE 3
	// TAMANHO DO REGISTRO = 240 CARACTERES
	//
	// *****************************************************************************************************************
	// NAO PODE ALTERAR
	// *****************************************************************************************************************

	$numero_documento              = $nosso_num[$t];                                      // documento numero == nosso numero
	$nosso_numero                  = picture_99( $nosso_num[$t], 7 );                     // Nosso numero com 7 digitos e zeros a esquerda

	# Código do SAMUCA #######################################################################################################################

	$qtde_nosso_numero = strlen( $nosso_numero );
	$sequencia_nosso_numero = picture_9( $agencia, 4 ).picture_9( $conta_cedente, 10 ).picture_9( $nosso_numero, 7 );
	$cont = 0;
	for ( $num = 0; $num <= strlen( $sequencia_nosso_numero ); $num++ ){
			$cont++;
			if($cont == 1){
					$constante = 3;
				}if($cont == 2){
					$constante = 1;
				}if($cont == 3){
					$constante = 9;
				}if($cont == 4){
					$constante = 7;
					$cont = 0;
				}		
			$calculoDv = $calculoDv + ( substr( $sequencia_nosso_numero, $num, 1 ) * $constante );
		}
	$Resto = $calculoDv % 11;
	if( $Resto == 0 || $Resto == 1 ){
			$Dv = 0;
		}else{
			$Dv = 11 - $Resto;
		}

	$nosso_numero = picture_9( $nosso_numero, 7 ).$Dv;	

	$Dv = "";
	$calculoDv = "";
	$Resto = "";

	# FIM do Código do SAMUCA ###############################################################################################################
		
	$linha_p .= picture_9($num_banco,3);                 // 01.3P -> CCONTROLE. COD. DO BANCO
	$linha_p .= picture_9($lote_servico,4);              // 02.3P -> CONTROLE. LOTE DE SERVICO. TEM QUE SER IGUAL AO HEADER DE LOTE DO CAMPO 02.1 
	$linha_p .= '3';                                     // 03.3P -> CONTROLE. TIPO DE REGISTRO. Preencher com 3 (EQUIVALE A DETALHE DO LOTE)
	$linha_p .= picture_9($num_seg_linha_p_q_r_s,5);     // 04.3P -> SERVICO. Nº Sequencial do Registro no Lote. (G038). EVOLUIR DE 1 EM 1 
	$linha_p .= 'P';                                     // 05.3P -> SERVICO. Cód. Segmento do Registro Detalhe, PREENCHER P
	$linha_p .= complementoRegistro(1,"brancos");        // 06.3P -> SERVICO. Preencher com espaco
	$linha_p .= picture_9('01',2);                       // 07.3P -> SERVICO. Cod. de movimento remessa. 1=entrada/2=baixa/6=alterar vencimento (C004)
	$linha_p .= picture_9($agencia,5);                   // 08.3P -> COD. ID. BENEFICIARIO. Agencia mantenedora da conta
	$linha_p .= picture_x($dv_agencia,1);                // 09.3P -> COD. ID. BENEFICIARIO. Digito verificador
	$linha_p .= picture_9($conta,12);                    // 10.3P -> NUMERO DA CONTA CORRENTE
	$linha_p .= picture_x($dv_conta,1);                  // 11.3P -> DIGITO VERIFICADOR DA CONTA CORRENTE
	$linha_p .= complementoRegistro(1,"brancos");        // 12.3P -> DIGITO VERIFICADOR DA AG/CONTA - brancos

	// nosso numero
	$linha_p .= picture_9($nosso_numero,10);             // 13.3P -> nosso_numero (07 digitos) + DV (1 digito) em 10 posicoes com zeros a esquerda
	$linha_p .= '01';                                    // 13.3P -> numero da parcela do nosso numero. 01 = parcela unica. pode usar de 01 a 99
	$linha_p .= '01';                                    // 13.3P -> Modalidade/Carteira = 01 com registro (vide capa da planilha)
	$linha_p .= '4';                                     // 13.3P -> Tipo formulário. 1=auto-copiativi/3=auto-envelopavel/4=A4 s/envelope/6=A4 s/env 3 vias
	$linha_p .= complementoRegistro(5,"brancos");        // 13.3P -> em branco 5 posicoes
	// fim de nosso numero


	$linha_p .= '1';                                      // 14.3P -> codigo da carteira (1) equivale a cobrança com registro
	$linha_p .= '0';                                      // 15.3P -> Forma de Cadastramento do Título no Banco. informar '0'
	$linha_p .= complementoRegistro(1,"brancos");         // 16.3P -> Tipo de Documento - deixar em branco
	$linha_p .= '2';                                      // 17.3P -> Identificação da Emissao do boleto. 1 = Banco emite/ 2 = Cliente emite 
	$linha_p .= '2';                                      // 18.3P -> Identificacao da Entrega do boleto. 1 = banco emite / 2 = cliente emite 
	$linha_p .= picture_x($numero_documento,15);          // 19.3P -> Numero do documento de cobranca. (C011) = meu numero de boleto
	$linha_p .= picture_9($data_vencimento_boleto[$t],8); // 20.3P -> Data de vencimento do título, no formato DDMMAAAA (Dia, Mêse Ano);
	$linha_p .= picture_9($valor_boleto[$t],15);          // 21.3p -> Valor nominal,usando 2 casas dec. (p.ex.tít valor 530,44 => 0000000053044)
	$linha_p .= complementoRegistro(5,"zeros");           // 22.3P -> Agência Encarregada da Cobrança (Preencher com zeros)
	$linha_p .= complementoRegistro(1,"brancos");         // 23.3P -> DV da agencia (G009)
	$linha_p .= picture_9('99',2);                        // 24.3P -> Espécie Tít. (NF, DD:DOC DE DIVIDA, CPR: CÉDULA DE PRODUTO RURAL, OU:OUTROS = 99
	$linha_p .= picture_x('N',1);                         // 25.3P -> Aceite. preencher com ‘A’ (Aceite) ou‘N’ (Não Aceite)
	$linha_p .= picture_9($data_emissao_boleto[$t],8);    // 26.3P -> Data de emissjão do título, no formato DDMMAAAA (Dia, Mêse Ano);
	$linha_p .= picture_9('2',1);                         // 27.3P -> Juros de mora;tipo:‘1’ (Valor por Dia); ou ‘2’ (Taxa Mensal); ou ‘3’(Isento)
	$linha_p .= picture_9($data_juros[$t],8);             // 28.3P -> Data início cobrança de Juros de Mora, no formato DDMMAAAA (Dia, Mês e Ano). 
														  //          0 = dia posterior venc. 
														  //          devendo ser maior que a Data de Vencimento; 
														  //          ATENÇÃO, caso a informação seja inválida ou nãoinformada, 
										                  //          o sistema assumirá data igual à Datade Vencimento + 1
	$linha_p .= picture_9($valor_juros[$t],15);           // 29.3P -> Juros de Mora por Dia/Taxa

	// Se houver taxa de desconto nesse boleto
	if( $valor_desconto[$t] > 0 ){
		$linha_p .= picture_9('2',1);                     // 30.3P -> DESCONTO 1. Cod. desc. / 0=Sem Desconto / 1=Valor Fixo / 2 = Percentual
		$linha_p .= picture_9($data_desconto[$t],8);      // 31.3P -> DESCONTO 1. Data do desconto
		$linha_p .= picture_9($valor_desconto[$t],15);    // 32.3P -> DESCONTO 1. Valor/percentual do desconto a ser concedido
	}else{
		$linha_p .= picture_9('0',1);                     // 30.3P -> DESCONTO 1. Cod. desc. / 0=Sem Desconto / 1=Valor Fixo / 2 = Percentual
		$linha_p .= picture_9('0',8);                     // 31.3P -> DESCONTO 1. Data do desconto
		$linha_p .= picture_9('0',15);                    // 32.3P -> DESCONTO 1. Valor/percentual do desconto a ser concedido
	}

	$linha_p .= picture_9($valor_iof[$t],15);            // 33.3P -> VLR. IOF. Valor do IOF a ser recolhido
	$linha_p .= picture_9($valor_abatimento[$t],15);     // 34.3P -> Valor do abatimento
	$linha_p .= picture_x($numero_documento[$t],25);     // 35.3P -> Uso empresa cedente. Identificacao do titulo na empresa. Identico ao campo 19.3P
	$linha_p .= '3';                                     // 36.3P -> Cód. Protesto. 1 = protestar dias corridos / 2=protestar dias uteis / 3=nao pro
	$linha_p .= '00';                                    // 37.3P -> Prazo para protesto. Numero de dias para  Protesto
	$linha_p .= '0';                                     // 38.3P -> Cód p/ Baixa/Devolucao
	$linha_p .= complementoRegistro(3,"brancos");        // 39.3P -> Prazo p/ baixa/devolucao. Numero de dias para baixa/devolucao
	$linha_p .= picture_9('9',2);                        // 40.3P -> Codigo da moeda. 09 = REAL
	$linha_p .= complementoRegistro(10,"zeros");         // 41.3P -> Preencher com zeros
	$linha_p .= complementoRegistro(1,"brancos");        // 42.3P -> Preencher com espacos
	$linha_p .= chr(13).chr(10);                         // essa é a quebra de linha

	$num_seg_linha_p_q_r_s++;

	$qtd_titulos++;

	$total_valor+=$valor_boleto[$t];

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "Q":
	// DADOS DO PAGADOR E SACADOR/AVALISTA
	// PARTE 4
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************

	$linha_q .= picture_9($num_banco,3);                     // 01.3Q -> Cod. Banco. Caixa = 104 
	$linha_q .= picture_9($lote_servico,4);                  // 02.3Q -> Lote de serviço
	$linha_q .= '3';                                         // 03.3Q -> tipo de registro. Equivalente a detalhe de lote. preencher '3'
	$linha_q .= picture_9($num_seg_linha_p_q_r_s,5);         // 04.3Q -> Nº Sequencial do Registro no Lote
	$linha_q .= 'Q';                                         // 05.3Q -> Cód. Segmento do Registro Detalhe
	$linha_q .= complementoRegistro(1,"brancos");            // 06.3Q -> Espaco
	$linha_q .= picture_9('01',2);                           // 07.3Q -> Cod de Mov. ref. a entrada de titulo em remessa (obs: existem mais cods)
	$linha_q .= $tipo_inscricao_pagador[$t];                 // 08.3Q -> Tipo de Inscricao do Pagador (1) CPF (pessoa física) (2) CNPJ Pessoa jurídica
	$linha_q .= picture_9($numero_inscricao_pagador[$t],15); // 09.3Q -> cpf ou cnpj
	$linha_q .= picture_x($nome_pagador[$t],40);             // 10.3Q -> Nome do pagador
	$linha_q .= picture_x($endereco_pagador[$t],40);         // 11.3Q -> Endereco do pagador
	$linha_q .= picture_x($bairro_pagador[$t],15);           // 12.3Q -> Bairro
	$linha_q .= picture_9($cep_pagador[$t],5);               // 13.3Q -> Cep
	$linha_q .= picture_9($cep_pagador_sufixo[$t],3);        // 14.3Q -> Cep (sufixo)
	$linha_q .= picture_x($cidade_pagador[$t],15);           // 15.3Q -> Cidade
	$linha_q .= picture_x($estado_pagador[$t],2);            // 16.3Q -> UF
	$linha_q .= '0';                                         // 17.3Q -> Tipo sacador AVALISTA/0=nenhum/1-CPF (p. física) (2) CNPJ Pessoa jurídica
	$linha_q .= complementoRegistro(15,"zeros");             // 18.3Q -> CPF ou CNPJ do Sacador avalista
	$linha_q .= complementoRegistro(40,"brancos");           // 19.3Q -> nome do sacador avalista
	$linha_q .= complementoRegistro(3,"zeros");              // 20.3Q -> Cod. banco correspondente na compensacao
	$linha_q .= complementoRegistro(20,"brancos");           // 21.3Q -> Espaco
	$linha_q .= complementoRegistro(8,"brancos");            // 22.3Q -> Espaco

	$tam_linha_q  = strlen($linha_q);
	$zeros_rest_2 = 240 - $tam_linha_q;
	$linha_q      = $linha_q.complementoRegistro($zeros_rest_2,"zeros");

	$linha_q .= chr(13).chr(10);                         // essa é a quebra de linha

	$num_seg_linha_p_q_r_s++;


	// ********************

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "R":
	// DADOS DO PAGADOR E SACADOR/AVALISTA
	// PARTE 4
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************

	$linha_r .= picture_9($num_banco,3);                 // 01.3R -> Cod. Banco. Caixa = 104 
	$linha_r .= picture_9($lote_servico,4);              // 02.3R -> Lote de serviço
	$linha_r .= '3';                                     // 03.3R -> tipo de registro. Equivalente a detalhe de lote. preencher '3'
	$linha_r .= picture_9($num_seg_linha_p_q_r_s,5);       // 04.3R -> Nº Sequencial do Registro no Lote
	$linha_r .= 'R';                                     // 05.3R -> Cód. Segmento do Registro Detalhe
	$linha_r .= complementoRegistro(1,"brancos");        // 06.3R -> Espaco
	$linha_r .= picture_9('01',2);                       // 07.3R -> Cod. Movimento Rem = 01 => Entrada de titulo Nota Explicativa: (C004)
	$linha_r .= '0';                                     // 08.3R -> DESCONTO-2. COD. DESCONTO / 0=sem / 1=valor fixo / 2=valor percentual
	$linha_r .= picture_9('0',8);                        // 09.3R -> DESCONTO-2. DATA DESCONTO 
	$linha_r .=	picture_9('0',15);                       // 10.3R -> DESCONTO-2. VALOR DO DESCONTO
	$linha_r .= '0';                                     // 11.3R -> DESCONTO-3. COD. DESCONTO / 0=sem / 1=valor fixo / 2=valor percentual
	$linha_r .= picture_9('0',8);                        // 12.3R -> DESCONTO-3. DATA DESCONTO 
	$linha_r .=	picture_9('0',15);                       // 13.3R -> DESCONTO-3. VALOR DO DESCONTO
	$linha_r .= '2';                                     // 14.3R -> MULTA. / 0=sem / 1=valor fixo / 2=valor percentual
	$linha_r .= picture_9($data_juros[$t],8);            // 15.3R -> MULTA. DATA DA MULTA 
	$linha_r .=	picture_9($valor_multa[$t],15);          // 16.3R -> MULTA. VALOR EM PERCENTUAL
	$linha_r .= complementoRegistro(10,"brancos");       // 17.3R -> INFORMACAO AO PAGADOR - preencher com espacos
	$linha_r .= complementoRegistro(40,"brancos");       // 18.3R -> INFORMACAO 3 - mensagem 3
	$linha_r .= complementoRegistro(40,"brancos");       // 19.3R -> INFORMACAO 4 - Mensagem 4
	$linha_r .= complementoRegistro(20,"brancos");       // 20.3R -> CNAB uso exclusivo
	$linha_r .= complementoRegistro(8,"zeros");          // 21.3R -> cod. ocor. do pagador
	$linha_r .= complementoRegistro(3,"zeros");          // 22.3R -> cod do banco na conta de debito = 000
	$linha_r .= complementoRegistro(5,"zeros");          // 23.3R -> cod da agencia do debito = 00000
	$linha_r .= complementoRegistro(1,"brancos");        // 24.3R -> digito verificador da agencia do debito
	$linha_r .= complementoRegistro(12,"zeros");         // 25.3R -> conta corrente do debito
	$linha_r .= complementoRegistro(1,"brancos");        // 26.3R -> digito verificador da conta de debito
	$linha_r .= complementoRegistro(1,"brancos");        // 27.3R -> digito verificador da agencia/conta de debito
	$linha_r .= '0';                                     // 28.3R -> aviso deb.auto.(1=emite end informado /02=nao emite/03=emite end.cad.banco)
	$linha_r .= complementoRegistro(9,"brancos");        // 29.3R -> preencher com brancos
	$linha_r .= chr(13).chr(10);                         // essa é a quebra de linha
		
	$lote_sequencial++;

	$num_seg_linha_p_q_r_s++;


	// *****************************************************************************************************************
	// Segmento "S":
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************

	$linha_s .= picture_9($num_banco,3);                 // 01.3S -> Cod. Banco.  
	$linha_s .= picture_9($lote_servico,4);              // 02.3S -> Lote de serviço
	$linha_s .= '3';                                     // 03.3S -> tipo de registro. Equivalente a detalhe de lote. preencher '3'
	$linha_s .= picture_9($num_seg_linha_p_q_r_s,5);     // 04.3S -> Nº Sequencial do Registro no Lote
	$linha_s .= 'S';                                     // 05.3S -> Cód. Segmento do Registro Detalhe
	$linha_s .= complementoRegistro(1,"brancos");        // 06.3S -> Espaco
	$linha_s .= picture_9('01',2);                       // 07.3S -> Cod. Movimento Rem = 01 => Entrada de titulo Nota Explicativa: (C004)
	$linha_s .= '3';                                     // 08.3S -> Identificacao da impressao = 3.
	$linha_s .= picture_x('MENSAGEM 01',40);             // 09.3S -> mensagem 
	$linha_s .=	picture_x('MENSAGEM 02',40);             // 10.3S -> mensagem
	$linha_s .= picture_x('MENSAGEM 03',40);             // 11.3S -> mensagem
	$linha_s .= picture_x('MENSAGEM 04',40);             // 12.3S -> mensagem
	$linha_s .=	picture_x('MENSAGEM 05',40);             // 13.3S -> mensagem
	$linha_s .= complementoRegistro(22,"brancos");       // 06.3S -> em branco
	$linha_s .= chr(13).chr(10);                         // essa é a quebra de linha
		
	$lote_sequencial++;

	$num_seg_linha_p_q_r_s++;

	// *****************************************************************************************************************

	$conteudo_meio .= $linha_p.$linha_q.$linha_r.$linha_s;

	$linha_p = "";
	$linha_q = "";
	$linha_r = "";
	$linha_s = "";


} // final do for para pegar os boletos






// *****************************************************************************************************************
// TRAILER DE LOTE DE ARQUIVO REMESSA
// DESCRICAO DE REGISTRO TIPO "5"
// PARTE 5 - PNULTIMA LINHA DO ARQUIVO
// TAMANHO DO REGISTRO = 240 CARACTERES
// *****************************************************************************************************************
	
$linha_5 .= picture_9($num_banco,3);                 // 01.5 -> COD. DO BANCO. ( CAIXA = 104 / BRADESCO = 237 )
$linha_5 .= picture_9($lote_servico,4);              // 02.5 -> CONTROLE -> Lote de servico equivalente a 02.1
$linha_5 .= '5';                                     // 03.5 -> CONTROLE -> Tipo de registro, preencher com '5' / equivalente a (Trailer de Lote).
$linha_5 .= complementoRegistro(9,"brancos");        // 04.5 -> CNAB. FIller, preencher com espacos

$qtd_registros = ( $qtd_titulos *4 ) +2;
$linha_5 .= picture_9( $qtd_registros, 6 );             // 05.5 -> Qtd. de registros no lote => Somatoria dos registros 1, 3(p,q,r e s) e 5 

$linha_5 .= picture_9($qtd_titulos,6);               // 06.5 -> TOTALIZACAO COBRANCA SIMPLES - Preencher com a qtd. de boletos do lote
$linha_5 .=	picture_9($total_valor,17);              // 07.5 -> TOTALIZACAO COBRANCA SIMPLES - Preencher com o valor total dos boletos no lote   

$linha_5 .= complementoRegistro(6,"zeros");          // 08.5 -> cobranca vinculada -> qtd. titulos
$linha_5 .= complementoRegistro(17,"zeros");         // 09.5 -> cobranca vinculada -> valor total dos titulos

$linha_5 .= complementoRegistro(6,"zeros");          // 10.5 -> cobranca caucionada -> qtd. titulos
$linha_5 .= complementoRegistro(17,"zeros");         // 11.5 -> cobranca caucionada -> valor total dos titulos

$linha_5 .= complementoRegistro(6,"zeros");          // 12.5 -> cobranca descontada -> qtd. titulos
$linha_5 .= complementoRegistro(17,"zeros");         // 13.5 -> cobranca descontada -> valor total dos titulos

$linha_5 .= complementoRegistro(8,"brancos");        // 14.5 -> numero do aviso de lancamento

$linha_5 .= complementoRegistro(117,"brancos");      // 15.5 -> CNAB -> Filler -> Preencher com espacos

$linha_5 .= chr(13).chr(10);                         // essa é a quebra de linha

// *****************************************************************************************************************
// TRAILER DE ARQUIVO REMESSA
// DESCRICAO DE REGISTRO TIPO "9"
// PARTE 5 - FINAL OU RODAPE DO ARQUIVO
// TAMANHO DO REGISTRO = 240 CARACTERES
// *****************************************************************************************************************
	
$linha_9 .= picture_9( $num_banco, 3 );                 // 01.9 -> COD. DO BANCO. CAIXA = 104
$linha_9 .= '9999';                                  // 02.9 -> lote de serviço. Preencher '9999'
$linha_9 .= '9';                                     // 03.9 -> Tipo de registro. Preencher '9'
$linha_9 .= complementoRegistro( 9, "brancos" );        // 04.9 -> CNAB. FIller

$qtd_lotes_arquivo = $lote_servico;
$linha_9 .= picture_9( $qtd_lotes_arquivo, 6 );         // 05.9 -> Quantidade de lotes do arquivo => sempre sera = 1


$qtd_reg_arq = ( $qtd_titulos * 4 ) + 4;                
$linha_9 .= picture_9( $qtd_reg_arq, 6 );               // 06.9 -> ( Qtd. linhas P,Q,R e S) + header + header de lote + trailer de arq + trailer lote


$linha_9 .= complementoRegistro( 6, "zeros" );          // 07.9 -> Quantidade de contas p/ conciliacao (lotes) ==> *(G037)

$linha_9 .= complementoRegistro( 205, "brancos" );      // 08.9 -> Espacos

$linha_9 .= chr(13).chr(10);                         // essa é a quebra de linha


//echo "<br>Tamanho linha 9 = ".strlen($linha_9);

$conteudo = $header.$header_lote.$conteudo_meio.$linha_5.$linha_9;


// Em nosso exemplo, nós vamos abrir o arquivo $filename
// em modo de adição. O ponteiro do arquivo estará no final
// do arquivo, e é pra lá que $conteudo irá quando o 
// escrevermos com fwrite().
// 'w+' e 'w' apaga tudo e escreve do zero
// 'a+' comeca a escrever do inicio para o fim preservando o conteudo do arquivo

if (!$handle = fopen($filename, 'w+')){
	erro("<br>Não foi possível abrir o arquivo ($filename)");
}

// Escreve $conteudo no nosso arquivo aberto.
if (fwrite($handle, "$conteudo") === FALSE){
	echo "<br>Não foi possível escrever no arquivo ($filename)";
}
fclose($handle);
?>


<?php
// TRANSFERIR O ARQUIVO PARA O SERVIDOR

	$xdestino = $pasta_destino.$filename;
	$xorigem = $filename;
	@copy($xorigem,$xdestino);
	
	$arquivo = $filename;
	//echo "<br>passei aqui na hora de copiar....";

?>

<p><img src="http://remessaphp.com.br/upload/logos/123/logo-big.png"></p>

<?php 
echo "<p>Arquivo de remessa gerado com sucesso!</p>";
?>

<p>Download do Arquivo de Remessa: <a href="remessa/<?php echo $arquivo;?>" target="_blank" download ><?php echo "remessa/".$arquivo;?></a></p>
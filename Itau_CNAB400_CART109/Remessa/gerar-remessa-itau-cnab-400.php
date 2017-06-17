<?php

##########################################################################################################################################

# AUTOR: ALEXANDRE GUIMARAES SARMENTO
# DATA: 27-12-2016
# E-MAIL: alexandre890@yahoo.com.br
# WHATSAPP: (98) 99212-5970
# CIDADE: SAO LUIS - MA
# ATUALIZADO EM: 04/05/2017

##########################################################################################################################################

##########################################################################################################################################

# AUTOR: DILCILEINE CLAUDINO
# DATA: 21/03/2017
# E-MAIL: dilcileine@gmail.com
# WHATSAPP: (44) 99909-3317
# CIDADE: MARINGÁ - PR

##########################################################################################################################################


function remover_acentos($str) 

{ 

  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', 'ç', 'Ç', "'" ); 

  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o','c','C', " " ); 

  return str_replace($a, $b, $str); 

} 



function post_slug($str) 

{ 

  return strtoupper(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), 

  array('', '-', ''), remover_acentos($str))); 

} 

?> 



<?php

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

	 

function sequencial($i){

if($i < 10)

{

return zeros(0,5).$i;

}

else if($i > 10 && $i < 100)

{

return zeros(0,4).$i;

}

else if($i > 100 && $i < 1000)

{

return zeros(0,3).$i;

}

else if($i > 1000 && $i < 10000)

{

return zeros(0,2).$i;

}

else if($i > 10000 && $i < 100000)

{

return zeros(0,1).$i;

}

}



function zeros($min,$max)

{

$x = ($max - strlen($min));

for($i = 0; $i < $x; $i++)

{

$zeros .= '0';

}

return $zeros.$min;

}



function complementoRegistro($int,$tipo){

if($tipo == "zeros")

{

$space = '';

for($i = 1; $i <= $int; $i++)

{

$space .= '0';

}

}

else if($tipo == "brancos")

{

$space = '';

for($i = 1; $i <= $int; $i++)

{

$space .= ' ';

}

}



return $space;

}





$erros = 0;

$extensao = ".TST";



// achar o digito verificador do nosso numero

			

function digitoVerificador_nossonumero( $numero ) {

	$resto2 = modulo_11($numero, 7, 1);

     $digito = 11 - $resto2;

     if ($digito == 10) {

        $dv = "P";

     } elseif($digito == 11) {

     	$dv = 0;

	} else {

        $dv = $digito;

     	}

	 return $dv;

}



// FUNÇÕES

// Algumas foram retiradas do Projeto PhpBoleto e modificadas para atender as particularidades de cada banco



function formata_numero($numero,$loop,$insert,$tipo = "geral") {

	if ($tipo == "geral") {

		$numero = str_replace(",","",$numero);

		while(strlen($numero)<$loop){

			$numero = $insert . $numero;

		}

	}

	if ($tipo == "valor") {

		/*

		retira as virgulas

		formata o numero

		preenche com zeros

		*/

		$numero = str_replace(",","",$numero);

		while(strlen($numero)<$loop){

			$numero = $insert . $numero;

		}

	}

	if ($tipo == "convenio") {

		while(strlen($numero)<$loop){

			$numero = $numero . $insert;

		}

	}

	return $numero;

}



		

function modulo_11($num, $base=9, $r=0)  {

    /**

     *   Autor:

     *           Pablo Costa <pablo@users.sourceforge.net>

     *

     *   Função:

     *    Calculo do Modulo 11 para geracao do digito verificador 

     *    de boletos bancarios conforme documentos obtidos 

     *    da Febraban - www.febraban.org.br 

     *

     *   Entrada:

     *     $num: string numérica para a qual se deseja calcularo digito verificador;

     *     $base: valor maximo de multiplicacao [2-$base]

     *     $r: quando especificado um devolve somente o resto

     *

     *   Saída:

     *     Retorna o Digito verificador.

     *

     *   Observações:

     *     - Script desenvolvido sem nenhum reaproveitamento de código pré existente.

     *     - Assume-se que a verificação do formato das variáveis de entrada é feita antes da execução deste script.

     */                                        



    $soma = 0;

    $fator = 2;



    /* Separacao dos numeros */

    for ($i = strlen($num); $i > 0; $i--) {

        // pega cada numero isoladamente

        $numeros[$i] = substr($num,$i-1,1);

        // Efetua multiplicacao do numero pelo falor

        $parcial[$i] = $numeros[$i] * $fator;

		// Soma dos digitos

        $soma += $parcial[$i];

		if ($fator == $base) {

            // restaura fator de multiplicacao para 2 

            $fator = 1;

        }

        $fator++;

    }



    /* Calculo do modulo 11 */

    if ($r == 0) {

        $soma *= 10;

        $digito = $soma % 11;

        if ($digito == 10) {

            $digito = 0;

        }

        return $digito;

    } elseif ($r == 1){

        $resto = $soma % 11;

        return $resto;

    }

}

		// final da funcao 
		
// FIM DAS FUNCOES

// INICIO DO CODIGO

#################################################################################################
# BLOCO 1 ==> NAO ALTERAR 
#################################################################################################

$fusohorario     = 3; // como o servidor de hospedagem é a dreamhost pego o fuso para o horario do brasil
$timestamp       = mktime(date("H") - $fusohorario, date("i"), date("s"), date("m"), date("d"), date("Y"));
$DATAHORA['PT']  = gmdate("d/m/Y H:i:s", $timestamp);
$DATAHORA['EN']  = gmdate("Y-m-d H:i:s", $timestamp);
$DATA['PT']      = gmdate("d/m/Y", $timestamp);
$DATA['EN']      = gmdate("Y-m-d", $timestamp);
$DATA['DIA']     = gmdate("d",$timestamp);
$DATA['MES']     = gmdate("m",$timestamp);
$DATA['ANO']     = gmdate("Y",$timestamp);
$HORA            = gmdate("H:i:s", $timestamp);
$HORA1           = gmdate("His", $timestamp);
$filename        = "remessa-demo-itau-cnab-400-".date('d').''.date('m').''.date('Y').'-'.date("His").'.rem';  // nome do arquivo remessa a gerar
$conteudo        = '';   // nao alterar
$lote_sequencial = 1;    // nao alterar
$lote_servico    = 1;    // nao alterar - para cobrança registrada é 1 - nao alterar
$header          = '';   // nao alterar - linha do header
$registro_t1     = '';   // nao alterar - linha do corpo ou dos boletos
$linha_9         = '';   // nao alterar - linha do rodape ou trailler do arquivo
$conteudo_meio   = '';   // nao alterar - linha usada para montar o arquivo
$num_seq_linha   = 1;

// *****************************************************************************************************************
// DADOS DA EMPRESA EMISSORA DO BOLETO - TROQUE POR SEUS DADOS
// *****************************************************************************************************************
 
$carteira                  = '09';                                     // NUMERO DA CARTEIRA ( 09 = COM REGISTRO BRADESCO )
$cpf_cnpj                  = '12345569000155';                         // CNPJ DA EMPRESA SEM PONTOS OU TRACOS
$agencia                   = '2554';                                   // NUMERO DA AGENCIA
$dv_agencia                = '0';                                      // DIGITO VERIFICADOR DA AGENCIA
$conta                     = '23456';                                  // NUMERO DA CONTA
$dv_conta                  = '7';                                      // DIGITO VERIFICADOR DA CONTA
$dv_ag_conta               = '0';                                      // DIGITO VERIFICADOR DA AGENCA/CONTA
$num_banco                 = '341';                                    // NUMERO DO BANCO - 237 => BRADESCO
$nome_banco                = 'ITAU SA';                                // NOME DO BANCO -> BRADESCO SA
$codigo_beneficiario       = '123456';                                 // COD. DO BENEFICIARIO
$empresa_beneficiario      = 'EMPRESA DEMO';                           // NOME DA EMPRESA
$numero_sequencial_arquivo = 1;                                        // cada arquivo gerado deverá ter uma sequencia (vide arquivo anterior .php)

// *****************************************************************************************************************
// LAYOUT DO ARQUIVO REMESSA - REGISTRO HEADER LABEL - ( 1a. linha do arquivo de remessa )
// *****************************************************************************************************************

$header .= "0";                                                        // 001 a 001 -> IDENTIFICAÇÃO do registro Header
$header .= "1";                                                        // 002 a 002 -> Tipo de Operação - Remessa
$header .= "REMESSA";                                                  // 003 a 009 -> Literal Remessa - POR REMESSA
$header .= "01";                                                       // 010 a 011 -> codigo do servico ou do movimento - POR 01
$header .= picture_x("COBRANCA",15);                                   // 012 a 026 -> literal servico - por COBRANCA
$header .= picture_9($agencia,4);                                  	   // 027 a 030 -> Agencia mantedora da conta
$header .= complementoRegistro(2,"zeros");                             // 031 a 032 -> Complemento de geistro (00)
$header .= picture_9($conta,5);                                        // 033 a 037 -> Numero da conta corrente
$header .= picture_9($dv_conta,1);                                     // 038 a 038 -> Digito de auto conferencia AG/CONTA EMPRESA
$header .= complementoRegistro(8,"brancos"); 						   // 039 a 046 -> Complemento do Registro (Branco)
$header .= picture_x($empresa_beneficiario,30);                        // 047 a 076 -> Nome do banco por extenso
$header .= picture_9($num_banco,3);                                    // 077 a 079 -> numero do banco (341)
$header .= picture_x($nome_banco,15);                                  // 080 a 094 -> Nome por extenso do Banco (BANCO ITAU SA)
$header .= date('dmy');       										   // 095 a 100 -> Data da gravacao do arquivo (data atual)
$header .= complementoRegistro(294,"brancos");                         // 101 a 394 -> Complemento do Registro (Branco)
$header .= picture_9($numero_sequencial_arquivo,6);                    // 111 a 117 -> Num. sequencial de remessa -> Id da sua remessa
$header .= chr(13).chr(10);                                            // QUEBRA DE LINHA

$num_seq_linha = $num_seq_linha+1;

// *******************************************************************************************************************
// LACO PARA PEGAR OS BOLETOS
// *******************************************************************************************************************
$total = 1;

for( $j=0; $j<$total; $j++ ){

	$nosso_numero                    = '32244';               // variavel nosso numero
	$numero_documento                = $nosso_numero;

	// achar o digito verificador do nosso numero
	$yc    = "09"; 
	$nnum  = formata_numero($yc,2,0).formata_numero( $nosso_numero,11,0 ) ;
	$dv_nn = digitoVerificador_nossonumero( $nnum );
	// final

	$dv_nosso_numero                 = $dv_nn;              // incluindo o dig. verificador para atender o bradesco
	$data_vencimento_boleto          = '050217';            // data de vencimento formato DDMMYY
	$data_multa                      = '060217';            // FORMATO -> DDMMYY (06 DIGITOS)
	$data_emissao_boleto             = '201216';            // FORMATO -> DDMMYY (06 DIGITOS)
	$valor_boleto                    = '75897';             // R$ 758,97
	$data_juros                      = '060217';
	$data_desconto                   = '050217';
	$valor_desconto                  = '500';               // 500 = 5.00%
	$instrucao1                      = '91';                // 03=devolver apos 30 dias/02=devolver apos 5 dias/05 receber conforme instrucoes
	                                                        // do proprio titulo/06=devolver apos 10 dias do venc./07=dev. após 15 dias/08=apos 20d/
	                                                        // 09=protestar/10=nao protestar/39=Nao Receber apos o vencimento/91=nao receber apos xx
	                                                        // dias do vencimento / 
															// Vide outros codigos ref. a NOTA 11 no manual do banco PG 17. 
	$instrucao2                      = '70';                // 70=para uso do banco/usar qualquer codigo da nota 1 da pág. 17 como na variavel anterior

	$valor_multa                     = '200';               // VALOR DA MULTA INFORMADA EM TAXA PERCENTUAL MENSAL => 200 = 2.00%
	$data_mora                       = '060217';            // DATA DA MORA
	$prazo_dias                      = '45';                // QUANTIDADE DE DIAS DE PRAZO PARA A BAIXA DO TITULO
	
	if( $valor_desconto >0 ){
		$xdata_limite_desc = picture_9( substr( $data_desconto,0,6 ),6 ); 
		$xvalor_desconto   = picture_9($valor_desconto,13);               
	}else{
		$xdata_limite_desc = picture_9('0',6);                            
		$xvalor_desconto   = picture_9('0',13);                           
	}

	$valor_iof                       = complementoRegistro(13,"zeros");         // 193 a 205 -> Valor do IOF => Somente se sua empresa for conecessionaria de credito
    $valor_abatimento                = complementoRegistro(13,"zeros");         // 206 a 218 -> Valor do abatimento a ser concedido ou cancelado
	$tipo_inscricao_pagador          = '1';                                     // 219 a 220 -> Tipo de inscricao de pessoa 1=fisica / 2= juridica
    $numero_inscricao_pagador        = '40329542322';                           // 221 a 234 -> Nº Inscricao do pagador 
	$nome_pagador                    = 'ROBERTO DOS SANTOS SOUSA MELO';         // 235 a 274 -> Nome do pagador
	$endereco_pagador                = 'RUA CEARA 678';                         // 235 a 274 -> Nome do pagador
	$bairro_pagador                  = 'CENTRO';                                // 275 a 314 -> Endereco do pagador
    $pri_msg                         = complementoRegistro(12,"brancos");       // 315 a 326 -> 1a. Mensagem
	$cep_pagador                     = '65072';                                 // 327 a 331 -> CEP
	$cep_pagador_sufixo              = '300';                                   // 332 a 334 -> Sufixo do CEP
	$cidade_pagador                  = 'SAO LUIS';                              // 335 a 394 -> Sacador/Avalista
	$estado_pagador                  = 'MA';                                    // 395 a 400 -> No. sequencial do registro
	$email_pagador                   = 'ROBERTO@UOL.COM.BR';                    // 235 a 274 -> EMAIL PAGADOR

// *****************************************************************************************************************

// REGISTRO DE TRANSACAO - TIPO 1 (OBRIGATORIO) -> Dados dos boletos

// *****************************************************************************************************************

$registro_t1 .= "1";                                                 	// 001 a 001 -> Identificacao do registro. Sempre = 1
$registro_t1 .= picture_9('02',02);           						 	// 002 a 003 -> Tipo de inscricao da empresa -Manual NOTA 1
$registro_t1 .= picture_9($cpf_cnpj,14);            					// 004 a 017 -> Numero de Inscricao da empresa - CPF/CNPJ -Manual NOTA 1
$registro_t1 .= picture_9($agencia,4);					            	// 018 a 021 -> Agencia mantedora da conta
$registro_t1 .= complementoRegistro(2,'zeros');							// 022 a 023 -> zeros 00
$registro_t1 .= picture_9($conta,5); 									// 024 a 028 -> Numero da conta corrente da empresa
$registro_t1 .= picture_9($dv_conta,1);									// 029 a 029 -> Digito da conta
$registro_t1 .= complementoRegistro(4,"brancos");                    	// 030 a 033 -> Brancos
$registro_t1 .= complementoRegistro(4,"brancos");           			// 034 a 037 -> Cod da instrução - NOTA 27
$registro_t1 .= complementoRegistro(25,"brancos");              		// 038 a 062 -> IDENTIFICAÇÃO do titulo da empresa - NOTA 2
$registro_t1 .= picture_9($nosso_numero,8);                         	// 063 a 070 -> Identificacao do titulo no banco Nosso Numero
$registro_t1 .= complementoRegistro(13,"zeros");           				// 071 a 083 -> Quantidade de moeda NOTA 4
$registro_t1 .= picture_9($carteira,3);                         		// 084 a 086 -> Numero da carteira
$registro_t1 .= complementoRegistro(21,"brancos");              		// 087 a 107 -> Uso do banco
$registro_t1 .= picture_x('I',1);								        // 108 a 108 ->Cod da carteira I
$registro_t1 .= picture_9('01',2);                         				// 109 a 110 -> IDENTIFICAÇÃO da ocorrencia
$registro_t1 .= picture_x($numero_documento ,10);						// 111 a 120 -> numero do documento
$registro_t1 .= picture_9($data_vencimento_boleto,6);                	// 121 a 126 -> Data de vencimento 
$registro_t1 .= picture_9($valor_boleto,13);                         	// 127 a 139 -> valor do titulo
$registro_t1 .= picture_9($num_banco,3);                         		// 140 a 142 -> CODIGO do banco 341
$registro_t1 .= complementoRegistro(5,"zeros"); 						// 143 a 147 -> AGencia cobradora...na remessa preenche com 0
$registro_t1 .= picture_x('99',2);                         				// 148 a 149 -> especie do titulo NOTA 10
$registro_t1 .= picture_x('N',1);										// 150 a 150 -> aceito ou não aceito
$registro_t1 .= picture_9($data_emissao_boleto ,6);                		// 151 a 156 -> Data de emissao do boleto 
$registro_t1 .= picture_x($instrucao1,2);								// 157 a 158 -> Instrucao 1 do boleto 39 não receber apos o vencimento
$registro_t1 .= picture_x($instrucao2,2);								// 159 a 160 -> Instrucao 2 do boleto 70 uso do banco
$registro_t1 .= picture_9($valor_multa,13);								// 161 a 173 -> valor da multa de mora de atraso
$registro_t1 .= picture_9($data_desconto,6);							// 174 a 179 -> data limite para concessao de desconto
$registro_t1 .= picture_9($valor_desconto,13);							// 180 a 192 -> valor para desconto
$registro_t1 .= picture_9($valor_iof,13);								// 193 a 205 -> valor do iof
$registro_t1 .= picture_9($valor_abatimento,13);						// 206 a 218 -> valor do abatimento
$registro_t1 .= picture_9($tipo_inscricao_pagador,2);					// 219 a 220 -> cod do pagador cpf ou cnpj (MUDAR CONFORME O BANCO)
$registro_t1 .= picture_9($numero_inscricao_pagador,14);             	// 221 a 234 -> Inscricao do pagador - CPF
$registro_t1 .= picture_x($nome_pagador,30);                         	// 235 a 264 -> Nome do pagador
$registro_t1 .= complementoRegistro(10,"brancos");                    	// 265 a 274 -> BRANCOS
$registro_t1 .= picture_x($endereco_pagador,40);                     	// 275 a 314 -> Endereco completo
$registro_t1 .= picture_x($bairro_pagador,12);                     		// 315 a 326 -> Endereco completo
$registro_t1 .= picture_9($cep_pagador,8);                           	// 327 a 334 -> CEP
$registro_t1 .= picture_x($cidade_pagador,15);                     		// 335 a 349 -> Cidade Pagador
$registro_t1 .= picture_x($estado_pagador,2);                     		// 350 a 351 -> UF pagador
$registro_t1 .= picture_x($avalista,30);								// 352 a 381 -> NOME avalista
$registro_t1 .= complementoRegistro(4,"brancos");						// 382 a 385 -> espaço em branco
$registro_t1 .= picture_9($data_mora,6);       					     	// 386 a 391 -> data de mora
$registro_t1 .= picture_9($prazo_dias,2);        						// 392 a 393 -> prazo
$registro_t1 .= complementoRegistro(1,"brancos");						// 394 a 394 -> brancos
$registro_t1 .= picture_9( $num_seq_linha, 6 );                      	// 395 a 400 -> Numero sequencia do registro



$registro_t1 .= chr(13).chr(10);                                     // QUEBRA DE LINHA

$lote_sequencial++;

$num_seq_linha = $num_seq_linha+1;

$conteudo_meio .= $registro_t1;

} 



// *******************************************************************************************************************

// Final do Laco que pega os dados dos boletos no seu banco de dados - FINAL DO CORPO (MEIO ou MIOLO) 

// *******************************************************************************************************************







	// *****************************************************************************************************************

	// REGISTRO TRAILLER - TIPO "9" - MONTAGEM DA ULTIMA LINHA DO ARQUIVO DE REMESSA

	// *****************************************************************************************************************

		

	//$num_seq_linha = $num_seq_linha+1;
////
	//print_r('teste'.$num_seq_linha);

	

	$linha_9 .= '9';                                                // 001 a 001 -> Identificacao registro -> Por 9

	$linha_9 .= complementoRegistro(393,"brancos");                 // 002 a 394 -> Branco

	$linha_9 .= picture_9($num_seq_linha,6);                        // 395 a 400 -> Numero sequencial registro



	$linha_9 .= chr(13).chr(10);                                    // QUEBRA DE LINHA



	$conteudo = $header.$registro_t1.$linha_9;

	

// Em nosso exemplo, nós vamos abrir o arquivo $filename
// em modo de adição. O ponteiro do arquivo estará no final
// do arquivo, e é pra lá que $conteudo irá quando o 
// escrevermos com fwrite().
// 'w+' e 'w' apaga tudo e escreve do zero
// 'a+' comeca a escrever do inicio para o fim preservando o conteudo do arquivo.

if (!$handle = fopen($filename, 'w+')){
	erro("<div align='center' class='label_normal'>&nbsp;Não foi possível abrir o arquivo ($filename)</div><br>");
}

// Escreve $conteudo no nosso arquivo aberto.
if (fwrite($handle, $conteudo) === FALSE){
	echo "<div align='center' class='label_normal'>&nbsp;Não foi possível escrever no arquivo ($filename)</div><br>";
}
fclose($handle);
echo "<div align='center' class='label_normal'>&nbsp;Arquivo de remessa gerado com sucesso!</div>";

?>

<?php
// TRANSFERIR O ARQUIVO PARA O SERVIDOR

	$xdestino = "remessa-400/".$filename;
	$xorigem = $filename;
	@copy($xorigem,$xdestino);
	
	$arquivo = $filename;
	// excluir o arquivo da raiz
	if( file_exists($filename)){
		unlink($filename);
	}

?>

<?php 
echo $registro_t1;
?>

<br>

<a href="remessa-400/<?php echo $filename;?>" target="_blank"><br>Clique para download do arquivo de remessa: <?php echo $filename;?></a> 


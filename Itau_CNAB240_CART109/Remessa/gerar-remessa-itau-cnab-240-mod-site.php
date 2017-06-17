<?php
##########################################################################################################################################
# AUTOR: ALEXANDRE GUIMARAES SARMENTO
# DATA: 27-12-2016
# E-MAIL: alexandre890@yahoo.com.br
# WHATSAPP: (98) 99212-5970
# CIDADE: SAO LUIS - MA
##########################################################################################################################################
# COLABORADOR: MARCELO CAJAIBA
# E-MAIL: marcelocajaiba@gmail.com
# CIDADE: TEOFILO OTONI - MG
##########################################################################################################################################


##########################################################################################################################################
# NAO ALTERAR AS FUNCOES
##########################################################################################################################################
function modulo_10($num) { 
		$numtotal10 = 0;
        $fator = 2;

        // Separacao dos numeros
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num,$i-1,1);
            // Efetua multiplicacao do numero pelo (falor 10)
            // 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Itaú
            $temp = $numeros[$i] * $fator; 
            $temp0=0;
            foreach (preg_split('//',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v){ $temp0+=$v; }
            $parcial10[$i] = $temp0; //$numeros[$i] * $fator;
            // monta sequencia para soma dos digitos no (modulo 10)
            $numtotal10 += $parcial10[$i];
            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2; // intercala fator de multiplicacao (modulo 10)
            }
        }
		
        // Calculo do modulo 10
        $resto = $numtotal10 % 10;
        $digito = 10 - $resto;
        if ($resto == 0) {
            $digito = 0;
        }
		
        return $digito;
		
}

function remover_acentos($str) 
{ 
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', 'ç', 'Ç', "'"); 
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o','c','C', " "); 
  return str_replace($a, $b, $str); 
} 

function post_slug($str) 
{ 
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
	 
function sequencial($i)
{
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

function complementoRegistro($int,$tipo)
{
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
#################################################################################################
// FIM DAS FUNCOES
#################################################################################################


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

define("REMESSA",$PATH."",true);

$conteudo        = '';
$lote_sequencial = 1;
$lote_servico    = 1; // para cobrança registrada é 1

$header          = '';
$header_lote     = '';

$linha_p         = '';
$linha_q         = '';
$linha_r         = '';

$linha_5         = '';     // NOVO: ADD EM 22-11-2016

$linha_9         = '';

$conteudo_meio   = '';

$qtd_titulos     = 0; // NOVO: ADD EM 22-11-2016
$total_valor     = 0; // NOVO: ADD EM 22-11-2016

$num_banco       = '341';  // numero do banco

##########################################################################################################################################
# BLOCO 2 - PODE ALTERAR
##########################################################################################################################################

$filename             = 'E2300044.REM';                 // nome desejado para o seu arquivo de remessa a ser criado
$valor_multa          = '200';                          // 2%
$conta                = '202967';                       // numero da conta corrente da empresa
$carteira             = '109';                          // carteiras, consulte a sua. (109=cliente gera e entrega/157=cliente gera banco entrega)
$agencia              = '4526';                         // Numero da agencia da empresa sem o digito
$dv_agencia           = '0';                            // digito da egencia
$codigo_beneficiario  = '202967';                       // geralmente o mesmo numero da conta. e' o cedente da conta
$cpf_cnpj             = '16594259000149';               // funny cnpj
$empresa_beneficiario = 'EMPRESA DEMO LTDA';            // funny nome empresa

$numero_sequencial_arquivo = '44';                      // cada arquivo gerado deverá ter uma sequencia - e' o ID da remessa 

##########################################################################################################################################
# NAO ALTERAR AQUI
$dav_conta                 = modulo_10( $agencia.$conta );
##########################################################################################################################################




##########################################################################################################################################
# COMECO DO CODIGO OU MONTAGEM DAS LINHAS
##########################################################################################################################################


// *****************************************************************************************************************
// REGISTRO HEADER - ( TIPO 0 )
// PARTE 1 - 1a. linha do arquivo
// *****************************************************************************************************************

$header .= $num_banco;                                  // 01.0 -> Cod. do banco no caso da caixa = 341 
$header .= complementoRegistro(4,"zeros");              // 02.0 -> Cod. do lote
$header .= complementoRegistro(1,"zeros");              // 03.0 -> Tipo de Registro
$header .= complementoRegistro(9,"brancos");            // 04.0 -> CNAB literal remessa escr. extenso 003 009 X(07)
$header .= '2';                                         // 05.0 -> Tipo de inscrição do beneficiario : um se pessoa fisico (1) ou juridica (2)
$header .= picture_9($cpf_cnpj,14);                     // 06.0 -> Nº de Inscrição do  Beneficiario cpf ou cnpj
$header .= complementoRegistro(20,"brancos");           // 07.0 -> Uso exclusivo da caixa, preencher com zeros
$header .= '0';                                         // 08.0 -> '0'
$header .= picture_9($agencia,4);                       // 09.0 -> agencia
$header .= complementoRegistro(1,"brancos");            // 10.0 -> brancos
$header .= complementoRegistro(7,"zeros");              // 11.0 -> Uso exclusivo da caixa, preencher com 7 zeros
$header .= picture_9($conta,5);                         // 12.0 -> conta corrente da empresa
$header .= ComplementoRegistro(1,"brancos");            // 13.0 -> brancos
$header .= picture_9($dav_conta,1);                     // 14.0 -> DÍGITO DE AUTO-CONFERÊNCIA AG./CONTA EMPRESA
$header .= picture_x($empresa_beneficiario,30);         // 15.0 -> 10 espaços em banco
$header .= picture_x('BANCO ITAU SA',30);               // 16.0 -> NOME POR EXTENSO DO BANCO COBRADOR
$header .= complementoRegistro(10,"brancos");           // 17.0 -> Completar Registros
$header .= '1';                                         // 18.0 -> Cod. (1) = Remessa ou (2) = Retorno.
$header .= $DATA['DIA'].$DATA['MES'].$DATA['ANO'];      // 19.0 -> Data da geracao arquivo 
$header .= $HORA1;                                      // 20.0 -> Hora da geracao arquivo 
$header .= picture_9($numero_sequencial_arquivo,6);     // 21.0 -> Sequencial do arquivo um numero novo para cada arquivo de remessa que for gerado
$header .= '040';                                       // 22.0 -> N.º DA VERSÃO DO LAYOUT DO ARQUIVO
$header .= complementoRegistro(5,"zeros");              // 23.0 -> COMPLEMENTO DE REGISTRO
$header .= complementoRegistro(54,"brancos");           // 24.0 -> COMPLEMENTO DE REGISTRO
$header .= complementoRegistro(3,"zeros");              // 25.0 -> COMPLEMENTO DE REGISTRO
$header .= complementoRegistro(12,"brancos");           // 26.0 -> Preencher com espacos

$header .= chr(13).chr(10);                             // QUEBRA DE LINHA

// *****************************************************************************************************************
// DESCRICAO DE REGISTRO - ( TIPO 1 )
// HEADER DE LOTE DE ARQUIVO REMESSA
// PARTE 2
// *****************************************************************************************************************

$header_lote .= $num_banco;                                  // 001 -> Cod. do banco, neste caso = 104
$header_lote .= picture_9($lote_servico,4);                  // 004 -> Lote de servico = igual ao campo 002 do header acima
$header_lote .= '1';                                         // 008 -> Preencher '1’ (equivale a Header de Lote)
$header_lote .= 'R';                                         // 009 -> Preencher ‘R’ (equivale a Arquivo Remessa)
$header_lote .= '01';                                        // 010 -> Preencher com ‘01', se Cobrança Registrada; ou ‘02’, se Cobrança Sem Registro/Serviços
$header_lote .= complementoRegistro(2,"zeros");              // 012 -> Preencher com zeros
$header_lote .= '030';                                       // 014-> No. da versão do layout. Preencher com 030
$header_lote .= complementoRegistro(1,"brancos");            // 017 -> Preencher com espacos
$header_lote .= '2';                                         // 018 -> Tipo de inscrição do beneficiario : um se pessoa fisico (1) ou juridica (2)
$header_lote .= picture_9($cpf_cnpj,15);                     // 019 -> CNPJ = Número de Inscrição do  Beneficiário cpf ou cnpj
$header_lote .= complementoRegistro(20,"brancos");           // 034 -> Uso exclusivo da caixa, preencher com zeros
$header_lote .= complementoRegistro(1,"zeros");              // 054 -> Complementar com zero
$header_lote .= picture_9($agencia,4);                       // 055 -> Agencia mantenedora da conta
$header_lote .= complementoRegistro(1,"brancos");            // 059 -> Complementar com branco
$header_lote .= complementoRegistro(7,"zeros");              // 060 ->  Complementar com zeros
$header_lote .= picture_9($conta,5);                         // 067 -> Numero da conta corrente 
$header_lote .= complementoRegistro(1,"brancos");            // 072 -> Complementar com branco
$header_lote .= picture_9($dav_conta,1);                     // 073 ->DÍGITO DE AUTO-CONFERÊNCIA AG./CONTA EMPRESA
$header_lote .= picture_x($empresa_beneficiario,30);         // 074 -> Nome da empresa
$header_lote .= complementoRegistro(80,"brancos");           // 104 -> COMPLEMENTO DE REGISTRO
$header_lote .= picture_9($numero_sequencial_arquivo,8);     // 184 -> Controle de cobranca - No. da remessa, mesmo que 19.0
$header_lote .= $DATA['DIA'].$DATA['MES'].$DATA['ANO'];      // 192 -> Controle de cobranca - Data de gravacao do arquivo de remessa
$header_lote .= '06012017';                                  // 200 -> Data do credito. Preencher com zeros
$header_lote .= complementoRegistro(33,"brancos");           // 208 -> COMPLEMENTO DE REGISTRO

$header_lote .= chr(13).chr(10);                             // Quebra de linha

// *****************************************************************************************************************
// DADOS DOS CLIENTES PARA TESTE
// *****************************************************************************************************************

$num_seg_linha_p_q_r = 1;

for($j=0; $j<$total; $j++){

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "P":
	// DADOS DO TITULO
	// PARTE 3
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************

	// *****************************************************************************************************************
	// REGISTRO DETALHE (OBRIGATORIO)  - VARIAVEIS DO PAGADOR E DO TITULO
	// *****************************************************************************************************************

	$nosso_numero                    = $vetor['nosso_numero'][$j];   //'322226';
	$numero_documento                = $nosso_numero;
	$data_vencimento_boleto          = substr($vetor['data_vencimento'][$j],6,2).substr($vetor['data_vencimento'][$j],4,2).substr($vetor['data_vencimento'][$j],0,4);
	$data_multa                      = $vetor['data_multa'][$j];
	$data_emissao_boleto             = substr($vetor['data_emissao'][$j],6,2).substr($vetor['data_emissao'][$j],4,2).substr($vetor['data_emissao'][$j],0,4);
	$valor_boleto                    = $vetor['valor_boleto'][$j]; // 35000'; //350,00
	$data_juros                      = substr($vetor['data_juros'][$j],6,2).substr($vetor['data_juros'][$j],4,2).substr($vetor['data_juros'][$j],0,4);
	$i = 2;
	$valor_juros                     = $vetor['valor_juros'][$j]; // 0034 ou 350,00, depende se em valor ou em taxa
	$data_desconto                   = substr($vetor['data_desconto'][$j],6,2).substr($vetor['data_desconto'][$j],4,2).substr($vetor['data_desconto'][$j],0,4);
	$valor_desconto                  = $vetor['valor_desconto'][$j]; //    = '000';
	$valor_iof                       = $vetor['valor_iof'][$j]; //         = '000';
    $valor_abatimento                = $vetor['valor_abatimento'][$j]; //  = '000';
	$tipo_inscricao_pagador          = $vetor['tipo_inscricao_pagador'][$j]; // tipo de inscrição do pagador 1 pessoa fisica 2 pessoa juridica
    $numero_inscricao_pagador        = $vetor['cpf_cnpj_pagador'][$j]; // cpf ou cnpj do pagador
	$nome_pagador                    = $vetor['nome_pagador'][$j]; // $obj_pagador->getNome();
	$endereco_pagador                = $vetor['endereco_pagador'][$j]; 
	$bairro_pagador                  = $vetor['bairro_pagador'][$j];   
	$cep_pagador                     = substr($vetor['cep_pagador'][$j],0,5);
	$cep_pagador_sufixo              = substr($vetor['cep_pagador'][$j],5,3);
	$cidade_pagador                  = $vetor['cidade_pagador'][$j];
	$estado_pagador                  = $vetor['estado_pagador'][$j];  
	$email_pagador                   = $vetor['email_pagador'][$j];
	$dav_nosso_numero = modulo_10( $agencia.$conta.$carteira.$nosso_numero );//DÍGITO DE AUTO-CONFERÊNCIA NOSSO NÚMERO 

	$linha_p .= '341';                                   // 001P -> CCONTROLE. COD. DO BANCO, Neste caso = 104
	$linha_p .= picture_9($lote_servico,4);              // 004P -> CONTROLE. LOTE DE SERVICO. TEM QUE SER IGUAL AO HEADER DE LOTE DO CAMPO 002
	$linha_p .= '3';                                     // 008P -> CONTROLE. TIPO DE REGISTRO. Preencher com 3 (EQUIVALE A DETALHE DO LOTE)
	$linha_p .= picture_9($num_seg_linha_p_q_r,5);       // 009P -> SERVICO. Nº Sequencial do Registro no Lote. (G038). EVOLUIR DE 1 EM 1 PARA CADA SEGMENTO DO LOTE
	$linha_p .= 'P';                                     // 014P -> SERVICO. Cód. Segmento do Registro Detalhe, PREENCHER P
	$linha_p .= complementoRegistro(1,"brancos");        // 015P -> SERVICO. Preencher com espaco
	$linha_p .= picture_9('01',2);                       // 016P -> SERVICO. Cod. de movimento remessa. 1=entrada/2=baixa/6=alterar vencimento (C004)
    $linha_p .= complementoRegistro(1,"zeros");          // 018P -> SERVICO. Preencher com zero
	$linha_p .= picture_9($agencia,4);                   // 019P -> COD. ID. BENEFICIARIO. Agencia mantenedora da conta
    $linha_p .= complementoRegistro(1,"brancos");        // 023P -> SERVICO. Preencher com espaco
    $linha_p .= complementoRegistro(7,"zeros");          // 024P -> SERVICO. Preencher com zeros
    $linha_p .= picture_9($conta,5);                     // 031P -> COD. ID. BENEFICIARIO. conta corrente. 
    $linha_p .= complementoRegistro(1,"brancos");        // 036P ->  Preencher com espaco
	$linha_p .= picture_9($dav_conta,1);                 // 037P -> DÍGITO DE AUTO-CONFERÊNCIA AG./CONTA EMPRESA
	$linha_p .= picture_9($carteira,3);                  // 038P -> NÚMERO DA CARTEIRA NO BANCO
	$linha_p .= picture_9($nosso_numero,8);              // 041P -> CARTEIRA/NOSSO NUMERO. Identificacao do titulo no banco = Nosso numero 
    $linha_p .= picture_9($dav_nosso_numero,1);          // 049P -> DÍGITO DE AUTO-CONFERÊNCIA NOSSO NÚMERO 
    $linha_p .= complementoRegistro(8,"brancos");        // 050P -> Preencher com espaco
	$linha_p .= complementoRegistro(5,"zeros");          // 058P -> Preencher com zeros
	$linha_p .= picture_9($numero_documento,10);         // 063P -> Numero do documento de cobranca. (C011) = meu numero de boleto
    $linha_p .= complementoRegistro(5,"brancos");        // 073P -> Preencher com espaco    
    $linha_p .= picture_9($data_vencimento_boleto,8);    // 78P -> Data de vencimento do título, no formato DDMMAAAA (Dia, Mêse Ano);
    $linha_p .= picture_9($valor_boleto,15);             // 086p -> Valor nominal do título,utilizando 2 casas decimais (exemplo:título de valor 530,44 - preencher 0000000053044)
    $linha_p .= complementoRegistro(5,"zeros");          // 101P -> AGÊNCIA ONDE O TÍTULO SERÁ COBRADO
    $linha_p .= complementoRegistro(1,"zeros");          // 106P -> DÍGITO AUTO-CONFERÊNCIA AGÊNCIA COBRADORA
	$linha_p .= picture_9('99',2);                       // 107P -> Especie de título
    $linha_p .= 'N' ;                                    // 109P -> IDENTIFICAÇÃO DE TÍTULO ACEITO/NÃO ACEITO  A – SIM N – NÃO
	$linha_p .= picture_9($data_emissao_boleto,8);       // 110P -> Data Emissão do Título
	$linha_p .= '0';                                     // 118P -> Completar com Zero
	$linha_p .= picture_9($data_juros,8);                // 119P -> Data Juros Mora
	$linha_p .= picture_9($valor_juros,15);              // 127P ->  VALOR DE MORA POR DIA DE ATRASO
	$linha_p .= '0';                                     // 142P -> Completar com Zero
	$linha_p .= picture_9($data_desconto,8);             // 143 -> Data LImite de Desconto
    $linha_p .= picture_9($valor_desconto,15);           // 151P -> Valor do  primeiro desconto
    $linha_p .= picture_9($valor_iof,15);                // 166P -> VLR. IOF. Valor do IOF a ser recolhido
    $linha_p .= picture_9($valor_abatimento,15);         // 181P -> Valor do abatimento
    $linha_p .= picture_9($numero_documento,25);         // 196P -> Uso empresa cedente. Identificacao do titulo na empresa. Identico ao campo 19.3P
    $linha_p .= '3';                                     // 221P CÓDIGO PARA NEGATIVAÇÃO OU PROTESTO   No Itaú é: Código para Protesto. 1 = protestar / 3 = nao protestar
    $linha_p .= '00';                                    // 222P -> Prazo para protesto. Numero de dias para  Protesto
    $linha_p .= '1';                                     // 224P ->CÓD. BAIXA Itaú: Código p/ Baixa/Devolução: vencido: '1’ (Baixar/ Devolver) ou ‘2’ (Não Baixar / Não Devolver
    $linha_p .= picture_9('55',2);                       // 225P ->NÚMERO DE DIAS PARA BAIXA  Prazo p/ baixa/devolucao. Numero de dias para baixa/devolucao. 
	$linha_p .= complementoRegistro(13,"zeros");         // 227P -> Preencher com zeros
    $linha_p .= complementoRegistro(1,"brancos");

	$linha_p .= chr(13).chr(10);                         // essa é a quebra de linha
	
	$num_seg_linha_p_q_r++;
	
	$qtd_titulos++;
	
	$total_valor+=$valor_boleto;

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "Q":
	// DADOS DO PAGADOR E SACADOR/AVALISTA
	// PARTE 4
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
	
	$linha_q .= '341';                                   // 001Q -> Cod. Banco. Itaú= 341
	$linha_q .= picture_9($lote_servico,4);              // 004Q -> Lote de serviço
	$linha_q .= '3';                                     // 008Q -> tipo de registro. Equivalente a detalhe de lote. preencher '3'
	$linha_q .= picture_9($num_seg_linha_p_q_r,5);       // 009Q -> Nº Sequencial do Registro no Lote
	$linha_q .= 'Q';                                     // 014Q -> Cód. Segmento do Registro Detalhe
	$linha_q .= complementoRegistro(1,"brancos");        // 015Q -> Espaco
	$linha_q .= picture_9('01',2);                       // 016Q -> IDENTIFICAÇÃO DA OCORRÊNCIA
	$linha_q .= $tipo_inscricao_pagador;                 // 018Q -> Tipo de Inscricao do Pagador (1) CPF (pessoa física) (2) CNPJ Pessoa jurídica
	$linha_q .= picture_9($numero_inscricao_pagador,15); // 019Q -> cpf ou cnpj
    $linha_q .= picture_x($nome_pagador,30);             // 034Q -> Nome do pagador
	$linha_q .= complementoRegistro(10,"brancos");       // 064Q -> Completar com Brancos
    $linha_q .= picture_x($endereco_pagador,40);         // 074Q -> Endereco do pagador
    $linha_q .= picture_x($bairro_pagador,15);           // 114Q -> Bairro
    $linha_q .= picture_9($cep_pagador,5);               // 129Q -> Cep (primeiros 5 digitos => p.ex 65072 )
	$linha_q .= picture_9($cep_pagador_sufixo,3);        // 134Q -> Cep (sufixo ou o complento de 3 digitos => p.ex 110 )
    $linha_q .= picture_x($cidade_pagador,15);           // 137Q -> Cidade
	$linha_q .= picture_x($estado_pagador,2);            // 152Q -> UF
    $linha_q .= '0';                                     // 154Q -> Tipo de Inscrição do sacador AVALISTA (0) nenhum (1) CPF (pessoa física) (2) CNPJ Pessoa jurídica
    $linha_q .= picture_9('0',15);                       //155Q ->NÚMERO DE INSCRIÇÃO DO SACADOR/AVALISTA
	$linha_q .= complementoRegistro(30,"brancos");       // 170Q -> nome do sacador avalista
	$linha_q .= complementoRegistro(10,"brancos");       // 200.3Q -> completar com Brancos
    $linha_q .= complementoRegistro(3,"zeros");          // 210.3Q -> completar com Brancos
	$linha_q .= complementoRegistro(28,"brancos");       // 200.3Q -> completar com Brancos
	
	$tam_linha_q  = strlen($linha_q);
	$zeros_rest_2 = 240 - $tam_linha_q;
	$linha_q      = $linha_q.complementoRegistro($zeros_rest_2,"zeros");
	
	$linha_q .= chr(13).chr(10);                         // essa é a quebra de linha
 
 	$num_seg_linha_p_q_r++;
	

// ********************

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "R":
	// DADOS DO PAGADOR E SACADOR/AVALISTA
	// PARTE 4
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
	
	$linha_r .= '341';                                   // 001 -> Cod. Banco. Caixa = 341 
	$linha_r .= picture_9($lote_servico,4);              // 002 -> Lote de serviço
	$linha_r .= '3';                                     // 003 -> tipo de registro. Equivalente a detalhe de lote. preencher '3'
	$linha_r .= picture_9($num_seg_linha_p_q_r,5);       // 004R -> Nº Sequencial do Registro no Lote
	$linha_r .= 'R';                                     // 005R -> Cód. Segmento do Registro Detalhe
	$linha_r .= complementoRegistro(1,"brancos");        // 006R -> Espaco
	$linha_r .= picture_9('01',2);                       // 007R ->  IDENTIFICAÇÃO DA OCORRÊNCIA
	$linha_r .= '0';                                     // 008R -> COMPLEMENTO DE REGISTRO
    $linha_r .= picture_9('0',8);                        // 009R -> DESCONTO-2. DATA DESCONTO 
    $linha_r .=	picture_9('0',15);                       // 010R -> DESCONTO-2. VALOR DO DESCONTO
	$linha_r .= '0';                                     // 011R -> Completar com Zeros
    $linha_r .= picture_9('0',8);                        // 012R -> DESCONTO-3. DATA DESCONTO 
    $linha_r .=	picture_9('0',15);                       // 013R -> DESCONTO-3. VALOR DO DESCONTO

	$linha_r .= '0';                                     // 014R -> MULTA. COD. DESCONTO / 0=sem / 1=valor fixo / 2=valor percentual
	#$linha_r .= picture_x($data_juros,8);               // 015R -> MULTA. DATA DA MULTA 
    #$linha_r .= picture_x('200',15);                    // 016R -> MULTA. VALOR DA MULTA
    $linha_r .= complementoRegistro(8,"zeros");          // 015R -> MULTA. DATA DA MULTA 
	$linha_r .=	complementoRegistro(15,"zeros");         // 016R -> MULTA. VALOR DA MULTA

	$linha_r .= complementoRegistro(10,"brancos");       // 017R -> INFORMACAO AO PAGADOR - preencher com espacos
	$linha_r .= complementoRegistro(40,"brancos");       // 018R -> INFORMACAO 3 - mensagem 3
	$linha_r .= complementoRegistro(60,"brancos");       // 019R -> INFORMACAO 4 - Mensagem 4

	$linha_r .= complementoRegistro(8,"zeros");          // 200R ->CÓDIGOS DE OCORRÊNCIA DO PAGADOR
	$linha_r .= complementoRegistro(8,"zeros");          // 201R -> brancos
    $linha_r .= complementoRegistro(1,"brancos");        // 210R -> completar com Brancos
    $linha_r .= complementoRegistro(12,"zeros");         // 220R -> completar com zeros
    $linha_r .= complementoRegistro(2,"brancos");        // 230R -> completar com Brancos
    $linha_r .= complementoRegistro(1,"zeros");          // 240R -> completar com zeros
    $linha_r .= complementoRegistro(9,"brancos");        // 250R -> completar com Brancos

	$linha_r .= chr(13).chr(10);                         // essa é a quebra de linha
		
	$lote_sequencial++;
	
 	$num_seg_linha_p_q_r++;
	
	$conteudo_meio .= $linha_p.$linha_q.$linha_r;
	#$conteudo_meio .= $linha_p.$linha_q;

	$linha_p = "";
	$linha_q = "";
	$linha_r = "";

// **********************

} // final do for $j para extrair os dados dos clientes




	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO TIPO "5"
	// TRAILER DE LOTE DE ARQUIVO REMESSA
	// PARTE 5 - PNULTIMA LINHA DO ARQUIVO
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
		
	$linha_5 .= '341';                                   // 001.5 -> COD. DO BANCO. CAIXA = 104
    $linha_5 .= picture_9($lote_servico,4);              // 004.5 -> CONTROLE -> Lote de servico equivalente a 02.1
    $linha_5 .= '5';                                     // 008.5 -> CONTROLE -> Tipo de registro, preencher com '5' equivalente a (Trailer de Lote).
    $linha_5 .= complementoRegistro(9,"brancos");        // 009.5 -> CNAB. FIller, preencher com espacos
	$qtd_registros = ($lote_sequencial*3)-2;
    $linha_5 .= picture_9(($qtd_registros+1),6);           // 018.5 -> Qtd. de registros no lote. Somatoria dos registros de tipo 1, 3 e 5 ( obs alex = total de linhas -2 )
    $linha_5 .= picture_9($qtd_titulos,6);               // 024.5 -> TOTALIZACAO COBRANCA SIMPLES - Preencher com a qtd. de titulos informados no lote
    $linha_5 .=	picture_9($total_valor,17);              // 030.5 -> TOTALIZACAO COBRANCA SIMPLES - Preencher com o valor total de titulos informados no lote   
    $linha_5 .= complementoRegistro(6,"zeros");          // 047.5 -> Preencher com zeros     
    $linha_5 .= complementoRegistro(17,"zeros");         // 053.5 -> VALOR TOTAL TÍTULOS EM COBRANÇA VINCULADA     
    $linha_5 .= complementoRegistro(46,"zeros");         // 070.5 -> Preencher com zeros 
    $linha_5 .= complementoRegistro(8,"zeros");          // 116.5 -> CREFERÊNCIA DO AVISO BANCÁRIO
    $linha_5 .= complementoRegistro(117,"brancos");      // 124.5 -> CNAB -> Filler -> Preencher com espacos
	
	$linha_5 .= chr(13).chr(10);                         // essa é a quebra de linha

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO TIPO "9"
	// TRAILER DE ARQUIVO REMESSA
	// PARTE 5 - FINAL OU RODAPE DO ARQUIVO
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
		
	$qtd_lotes_arquivo = $lote_servico;
	$qtd_reg_arq = ($lote_sequencial*2)+2;                 

	$linha_9 .= '341';                                   // 001.9 -> COD. DO BANCO. CAIXA = 104
	$linha_9 .= '9999';                                  // 004.9 -> lote de serviço. Preencher '9999'
	$linha_9 .= '9';                                     // 008.9 -> Tipo de registro. Preencher '9'
	$linha_9 .= complementoRegistro(9,"brancos");        // 009.9 -> CNAB. FIller
	$linha_9 .= picture_9($qtd_lotes_arquivo,6);         // 018.9 -> Quantidade de lotes do arquivo
	$linha_9 .= picture_9(($qtd_reg_arq+1),6);           // 024.9 -> Quantidade de registros no arquivo
	$linha_9 .= complementoRegistro(6,"zeros");          // 030.9 -> Espacos
	$linha_9 .= complementoRegistro(205,"brancos");      // 036.9 -> Espacos
	
	$linha_9 .= chr(13).chr(10);                         // essa é a quebra de linha
		 
	$conteudo = $header.$header_lote.$conteudo_meio.$linha_5.$linha_9;

// Em nosso exemplo, nós vamos abrir o arquivo $filename
// em modo de adição. O ponteiro do arquivo estará no final
// do arquivo, e é pra lá que $conteudo irá quando o 
// escrevermos com fwrite().
// 'w+' e 'w' apaga tudo e escreve do zero
// 'a+' comeca a escrever do inicio para o fim preservando o conteudo do arquivo

if (!$handle = fopen($filename, 'w+')){
	erro("Não foi possível abrir o arquivo ($filename)<br>");
}

// Escreve $conteudo no nosso arquivo aberto.
if (fwrite($handle, "$conteudo") === FALSE){
	echo "Não foi possível escrever no arquivo ($filename)<br>";
}
fclose($handle);
echo "Arquivo de remessa gerado com sucesso!<br>";

?>


<?php
// TRANSFERIR O ARQUIVO PARA O SERVIDOR

	$xdestino = "remessa/".$filename;
	$xorigem = $filename;
	@copy($xorigem,$xdestino);
	
	$arquivo = $filename;
	//echo "<br>passei aqui na hora de copiar....";

?>
<?php
# ******************************************************************************************************************************************************************
# Arquivo.......: Gerar-remessa-bb-arquivo.php
# Autor.........: Alexandre Guimaraes Sarmento 
# Contatos......: (98) 99212-5970 / E-mail: alexandre890@yahoo.com.br
# Funcao........: Gerar o arquivo de remessas padrão CNAB-240 do Banco do Brasil S/A
# Atualizado em.: 21-01-2017
# Licenca.......: GPL
# ******************************************************************************************************************************************************************
?>
<?php
# ******************************************************************************************************************************************************************
# NAO ALTERAR ==> FUNCOES DO SISTEMA
# ******************************************************************************************************************************************************************
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

		// achar o digito verificador do nosso numero
			
		function digitoVerificador_nossonumero($numero) {
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


# ******************************************************************************************************************************************************************
# FIM DAS FUNCOES
# ******************************************************************************************************************************************************************


# ******************************************************************************************************************************************************************
# NAO ALTERAR ==> DADOS FIXOS - NAO ALTERAR
# ******************************************************************************************************************************************************************
# NAO ALTERAR ==> DADOS PARA A CRIACAO DO ARQUIVO
# ******************************************************************************************************************************************************************

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


# ******************************************************************************************************************************************************************
# NAO ALTERAR ==> DADOS PARA A CRIACAO DO CONTEUDO DO ARQUIVO
# ******************************************************************************************************************************************************************

$xnumero_seq         = 1;    // numero ou ID do arquivo de remessa
$numero_sequencial_arquivo = $xnumero_seq; // cada arquivo gerado deverá ter uma sequencia (vide arquivo anterior .php)

$conteudo            = '';
$lote_sequencial     = 1;
$lote_servico        = 1; 
$header              = '';
$header_lote         = '';
$linha_p             = '';
$linha_q             = '';
$linha_r             = '';
$linha_5             = '';
$linha_9             = '';
$conteudo_meio       = '';
$qtd_titulos         = 0; 
$total_valor         = 0; 

define("REMESSA",$PATH."",true);

$filename        = $arquivo;


# ******************************************************************************************************************************************************************
# ALTERE AQUI ==> * * * COLOQUE AQUI OS DADOS DA SUA EMPRESA E DA CONTA CORRENTE E ALTERE COMO PREFERIR * * * 
# ******************************************************************************************************************************************************************

$valor_multa                = 200; // 200 => 2,00 %       // porcentagem de multa com 2 casas decimais     
$carteira                   = 14;                         // codigo da carteira de cobranca registrada
$cpf_cnpj                   = '05743985000179';           // cnpj da empresa
$agencia                    = '0645';                     // agencia
$dv_agencia                 = '3';                        // digito verificador da agencia
$codigo_beneficiario        = '000078';                   // Codigo do cedente / beneficiario
$empresa_beneficario        = 'D A MARLEY JUNIOR';        // nome da empresa
$numero_sequencial_arquivo  = 1;                          // Nº remessa tem que ser sequencial e unico
$xid_remessa                = picture_9($numero_sequencial_arquivo,7); // Nº da remessa
$conta                     = '28243';                     // conta corrente
$dv_conta                  = $vetor['dv_conta'][$i];      // digito verificador da conta corrente
$dv_ag_conta               = $vetor['dv_ag_conta'][$i];   // digito verificador da agencia/conta -> pegar com o banco
$num_banco                 = '001';                       // numero do banco
$nome_banco                = 'BANCO DO BRASIL SA';        // 'BANCO DO BRASIL SA'
$conta_cedente             = '000078';                    // codigo do cedente

// nome do arquivo
$arquivo                    = "E".$xid_remessa.".REM";    // nome do arquivo de remessa a ser gerado
$filename                   = $arquivo;                   // nome do arquivo de remessa a ser gerado

// *****************************************************************************************************************
// REGISTRO HEADER - ( TIPO 0 )
// PARTE 1
// *****************************************************************************************************************

$header .= picture_9($num_banco,3);                                 // 01.0 -> Cod. do banco - (G001)
$header .= complementoRegistro(4,"zeros");                          // 02.0 -> Cod. do lote
$header .= complementoRegistro(1,"zeros");                          // 03.0 -> Tipo de Registro
$header .= complementoRegistro(9,"brancos");                        // 04.0 -> CNAB literal remessa escr. extenso 003 009 X(07)
$header .= '2';                                                     // 05.0 -> Tipo de inscrição do beneficiario : um se pessoa fisico (1) ou juridica (2)
$header .= picture_9($cpf_cnpj,14);                                 // 06.0 -> Nº de Inscrição do  Beneficiario cpf ou cnpj
$header .= picture_9($codigo_beneficiario,9);                       // 07.0 -> Convenio -> Codigo do convenio no banco
$header .= '0014';                                                  // 07.0 -> Convenio -> Cobranca cedente
$header .= picture_9($carteira,2);                                  // 07.0 -> Convenio -> Numero da carteira
$header .= '019';                                                   // 07.0 -> Convenio -> Variacao da carteira
$header .= complementoRegistro(2,"brancos");                        // 07.0 -> Convenio -> Complemento BB
$header .= picture_9($agencia,5);                                   // 08.0 -> Cod. da agencia mantenedora da conta
$header .= picture_x($dv_agencia,1);                                // 09.0 -> Digito verificador
$header .= picture_9($conta,12);                                    // 10.0 -> Num. da conta corrente
$header .= picture_x($dv_conta,1);                                  // 11.0 -> Digito verificador da conta corrente
$header .= complementoRegistro(1,"brancos");                        // 12.0 -> Digito verificador da ag/conta - deixar em branco
$header .= picture_x($empresa_beneficiario,30);                     // 13.0 -> Nome da empresa
$header .= picture_x($nome_banco,30);                               // 14.0 -> Nome do banco, neste caso: CAIXA ECONOMICA FEDERAL ate completar 30 espacos
$header .= complementoRegistro(10,"brancos");                       // 15.0 -> 10 espaços em banco
$header .='1';                                                      // 16.0 -> Cod. (1) = Remessa ou (2) = Retorno.
$header .= $DATA['DIA'][$i].$DATA['MES'][$i].$DATA['ANO'][$i];      // 17.0 -> Data da geracao arquivo 
$header .= $HORA1;                                                  // 18.0 -> Hora da geracao arquivo 
$header .= picture_9($numero_sequencial_arquivo,6);                 // 19.0 -> Sequencial do arquivo um numero novo para cada arquivo de remessa que for gerado
$header .='084';                                                    // 20.0 -> Nova versao da leitura
$header .= complementoRegistro(5,"zeros");                          // 21.0 -> Densidade de Gravacao do Arquivo
$header .= complementoRegistro(20,"brancos");                       // 22.0 -> Filler
$header .= complementoRegistro(20,"brancos");                       // 23.0 -> Preencher com ‘REMESSA-TESTE' na fase de testes(simulado) ou REMESSA-PRODUCAO quando OK
$header .= complementoRegistro(29,"brancos");                       // 24.0 -> Preencher com espacos
$header .= chr(13).chr(10);                                         // QUEBRA DE LINHA

// *****************************************************************************************************************
// DESCRICAO DE REGISTRO - ( TIPO 1 )
// HEADER DE LOTE DE ARQUIVO REMESSA
// PARTE 2
// *****************************************************************************************************************

$header_lote .= picture_9($num_banco,3);                     // 01.1 -> Cod. do banco, neste caso = 104
$header_lote .= picture_9($lote_servico,4);                  // 02.1 -> Lote de servico = igual ao campo 02.1 do header acima
$header_lote .='1';                                          // 03.1 -> Preencher '1’ (equivale a Header de Lote)
$header_lote .='R';                                          // 04.1 -> Preencher ‘R’ (equivale a Arquivo Remessa)
$header_lote .='01';                                         // 05.1 -> Preencher com ‘01', se Cobrança Registrada; ou ‘02’, se Cobrança Sem Registro/Serviços
$header_lote .= complementoRegistro(2,"brancos");            // 06.1 -> Preencher com brancos
$header_lote .='043';                                        // 07.1 -> No. da versão do layout. Preencher com 030
$header_lote .= complementoRegistro(1,"brancos");            // 08.1 -> Preencher com espacos
$header_lote .= '2';                                         // 09.1 -> Tipo de inscrição do beneficiario : um se pessoa fisico (1) ou juridica (2)
$header_lote .= picture_9($cpf_cnpj,15);                     // 10.1 -> CNPJ = Número de Inscrição do  Beneficiário cpf ou cnpj
$header_lote .= picture_9($codigo_beneficiario,9);           // 11.1 -> Convenio -> Codigo do convenio no banco
$header_lote .= '0014';                                      // 11.1 -> Convenio -> Cobranca cedente
$header_lote .= picture_9($carteira,2);                      // 11.1 -> Convenio -> Numero da carteira
$header_lote .= '019';                                       // 11.1 -> Convenio -> Variacao da carteira
$header_lote .= complementoRegistro(2,"brancos");            // 11.1 -> Convenio -> Complemento BB
$header_lote .= picture_9($agencia,5);                       // 12.1 -> Agencia mantenedora da conta
$header_lote .= picture_9($dv_agencia,1);                    // 13.1 -> Digito verificador
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

// *****************************************************************************************************************
// DADOS DOS CLIENTES PARA TESTE
// *****************************************************************************************************************

$num_seg_linha_p_q_r = 1;

$total_boletos = 1;

for( $j=0; $j<$total_boletos; $j++ ){

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "P":
	// DADOS DO TITULO
	// PARTE 3
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************

	// *****************************************************************************************************************
	// REGISTRO DETALHE (OBRIGATORIO)  - VARIAVEIS DO PAGADOR E DO TITULO
	// *****************************************************************************************************************

	// dados do boleto
	$nosso_numero                    = '24430';         // nosso numero
	$numero_documento                = $nosso_numero;   // numero do documento

	// Observacao importante::: 
	//
	// Para contas do BB com Convenio de 7 digitos, o campo [ NOSSO NUMERO ] TEM QUE TER 10 (DEZ) digitos, portanto,
	// Boleto que tenha campo nosso numero como sendo 24430 devera' ser informado sendo => Nosso numero => 0000024430
	// no arquivo de remessa o nosso numero deve ser informado com o codigo do convenio seguido do nosso numero, logo,
	// se o convenio for p.ex. 2974701, o campo nosso numero no arquivo de remessa deve ser informado sendo:
	// [ 29747010000024430 ] que totalizam 17 digitos, sendo 7 de convenio + 10 de nosso numero.
	// NOSSO NUMERO = [ CCCCCCC + SSSSSSSSSS ],
	// C = Convenio preenchido com zeros a esquerda | S = Numero do boleto preenchido com zeros a esquerda
	//
	//
	// Para contas do BB com Convenio de 6 Digitos, o campo [ NOSSO NUMERO ] tem que ser:
	// NOSSO NUMERO => [ CCCCCC + SSSSS + D ]
	// ONDE:
	// CCCCCC => 06 (seis) primeiros digitos do codigo do convenio
	// SSSSS  => 05 (cinco) digitos que e' o seu numero de boleto
	// D      => 01 (um) digito final que e' o DV ou digito verificador. 
	// Observar que o calculo do digito verificado e' feito por meio da funcao digitoVerificador_nossonumero() logo 
	// abaixo.
	//
	//
	// Para as contas do BB com Convenio de 4 digitos,
	// ou seja:
	// NOSSO NUMERO => [ CCCC + SSSSSSS + D ]  
	// CCCC = convenio com 4 digitos + SSSSSSS = numero de boleto com 7 digitos + D = digito verificador com 1 digito.


	$dv_nn = digitoVerificador_nossonumero( $nosso_numero );
	$dv_nosso_numero                 = $dv_nn;          // digito verificador do nosso numero
		
	$data_vencimento_boleto          = '05022017';       // data de vencimento do boleto
	$data_multa                      = '06022017';       // data da multa
	$data_emissao_boleto             = '03012017';       // data da emissao do boleto
	$valor_boleto                    = '35000';          // valor nominal do titulo ==> 35000 ==> // 350,00
	$data_juros                      = '06022017';       // data a partir daqual incidira juros
	$valor_juros                     = '0034';           // 0034 ou 350,00, depende se em valor ou em taxa
	$data_desconto                   = '05022017';       // desconto ate o dia.......
	$valor_desconto                  = '500';            // valor expresso em porcentagem
	$valor_iof                       = '000';            // valor do iof
    $valor_abatimento                = '000';            // valor do abatimento que nao e a mesma coisa que desconto
	
	// dados do pagador do boleto
	$tipo_inscricao_pagador          = '1';              // tipo de inscrição do pagador 1 pessoa fisica 2 pessoa juridica
    $numero_inscricao_pagador        = '40329542330';    // cpf
	$nome_pagador                    = 'JOSE MELO REGO'; // nome
	$endereco_pagador                = 'RUA ABCDEF, 45'; // endereco
	$bairro_pagador                  = 'CENTRO';         // bairro
	$cep_pagador                     = '65073';          // cep prefixo
	$cep_pagador_sufixo              = '300';            // cep sufixo
	$cidade_pagador                  = 'SAO LUIS';       // cidade
	$estado_pagador                  = 'MA';             // estado
	$email_pagador                   = 'JOSE@REGO.COM';  // email


	// NAO ALTERAR ==> Montando a linha P do boleto do loop

	$linha_p .= picture_9($num_banco,3);                 // 01.3P -> CCONTROLE. COD. DO BANCO, Neste caso = 104 = caixa / 237 = bradesco
	$linha_p .= picture_9($lote_servico,4);              // 02.3P -> CONTROLE. LOTE DE SERVICO. TEM QUE SER IGUAL AO HEADER DE LOTE DO CAMPO 02.1 
	$linha_p .= '3';                                     // 03.3P -> CONTROLE. TIPO DE REGISTRO. Preencher com 3 (EQUIVALE A DETALHE DO LOTE)
	$linha_p .= picture_9($num_seg_linha_p_q_r,5);       // 04.3P -> SERVICO. Nº Sequencial do Registro no Lote. (G038). EVOLUIR DE 1 EM 1 PARA CADA SEGMENTO DO LOTE
	$linha_p .= 'P';                                     // 05.3P -> SERVICO. Cód. Segmento do Registro Detalhe, PREENCHER P
	$linha_p .= complementoRegistro(1,"brancos");        // 06.3P -> SERVICO. Preencher com espaco
	$linha_p .= picture_9('01',2);                       // 07.3P -> SERVICO. Cod. de movimento remessa. 1=entrada/2=baixa/6=alterar vencimento (C004)
	$linha_p .= picture_9($agencia,5);                   // 08.3P -> COD. ID. BENEFICIARIO. Agencia mantenedora da conta
	$linha_p .= picture_x($dv_agencia,1);                // 09.3P -> COD. ID. BENEFICIARIO. Digito verificador
	$linha_p .= picture_9($conta,12);                    // 10.3P -> NUMERO DA CONTA CORRENTE
	$linha_p .= picture_x($dv_conta,1);                  // 11.3P -> DIGITO VERIFICADOR DA CONTA CORRENTE
	$linha_p .= picture_x($dv_ag_conta,1);               // 12.3P -> DIGITO VERIFICADOR DA AG/CONTA

	$linha_p .= picture_9($conta_cedente,7);             // 13.3P -> convenios 7 digitos => NN = cedente de 7 dig + o NN com 10 digitos e deixar o resto em branco

	$linha_p .= picture_x($nosso_numero,10);             // 13.3P -> convenios 7 digitos => NN = cedente de 7 dig + o NN com 10 digitos e deixar o resto em branco
	$linha_p .= complementoRegistro(3,"brancos");        // 13.3P -> deixando o resto em branco para completar 20 digitos
	$linha_p .= '7';                                     // 14.3P -> 7 para carteira 17 modalidade simples 
	$linha_p .= complementoRegistro(1,"zeros");          // 15.3P -> campo nao tratado pelo banco deixar zero
	$linha_p .='2';                                      // 16.3P -> Nao tratado pelo banco, pode ser tipo de Documento - Preencher '2’ (equivale a Escritural)
	$linha_p .='2';                                      // 17.3P -> Identificação da Emissao do boleto. 1 = Banco emite/ 2 = Cliente emite (C009)
	$linha_p .='2';                                      // 18.3P -> Identificacao da Entrega/distribuicao do boleto. => Carteira 17 = 1 (banco) ou 2 (cliente) (C010)
	$linha_p .= picture_x($nosso_numero,15);             // 19.3P -> Numero do documento de cobranca. (C011) = meu numero de boleto
	$linha_p .= picture_9($data_vencimento_boleto,8);    // 20.3P -> Data de vencimento do título, no formato DDMMAAAA (Dia, Mêse Ano);
	$linha_p .= picture_9($valor_boleto,15);             // 21.3p -> Valor nominal do título,utilizando 2 casas decimais (exemplo:título de valor 530,44 - preencher 0000000053044)
	$linha_p .= complementoRegistro(5,"zeros");          // 22.3P -> Agência Encarregada da Cobrança (Preencher com zeros)
	$linha_p .= picture_x($dv_agencia,1);                // 23.3P -> DV da agencia (G009)
	$linha_p .= picture_x('02',2);                       // 24.3P -> Espécie do Título (NF: NOTA FISCAL, DD:DOCUMENTO DE DIVIDA, CPR: CÉDULA DE PRODUTO RURAL, OU:OUTROS = 99
	$linha_p .= picture_x('N',1);                        // 25.3P -> Aceite. preencher com ‘A’ (Aceite) ou‘N’ (Não Aceite)
	$linha_p .= picture_9($data_emissao_boleto,8);       // 26.3P -> Data de emissjão do título, no formato DDMMAAAA (Dia, Mêse Ano);
	$linha_p .= picture_9('2',1);                        // 27.3P -> Juros de mora;preencher com o tipo de preferência:‘1’ (Valor por Dia); ou ‘2’ (Taxa Mensal); ou ‘3’(Isento)
	$linha_p .= picture_9($data_juros,8);                // 28.3P -> Data para início da cobrança de Juros de Mora, no formato DDMMAAAA (Dia, Mês e Ano). 0 = dia posterior venc. 
	                                                     //          devendo ser maior que a Data de Vencimento; ATENÇÃO, caso a informação seja inválida ou nãoinformada, 
										                 //          o sistema assumirá data igual à Datade Vencimento + 1
	$linha_p .= picture_9($valor_juros,15);              // 29.3P -> Juros de Mora por Dia/Taxa

// Se houver taxa de desconto nesse boleto
if( $valor_desconto >0 ){
	$linha_p .= picture_9('2',1);                        // 30.3P -> DESCONTO 1. Cod. do desconto. tipo desconto Pagador / 0=Sem Desconto / 1=Valor Fixo / 2 = Percentual
	$linha_p .= picture_9($data_desconto,8);             // 31.3P -> DESCONTO 1. Data do desconto
	$linha_p .= picture_9($valor_desconto,15);           // 32.3P -> DESCONTO 1. Valor/percentual do desconto a ser concedido
}else{
	$linha_p .= picture_9('0',1);                        // 30.3P -> DESCONTO 1. Cod. do desconto. tipo desconto Pagador / 0=Sem Desconto / 1=Valor Fixo / 2 = Percentual
	$linha_p .= picture_9('0',8);                        // 31.3P -> DESCONTO 1. Data do desconto
	$linha_p .= picture_9('0',15);                       // 32.3P -> DESCONTO 1. Valor/percentual do desconto a ser concedido
}

	$linha_p .= picture_9($valor_iof,15);                // 33.3P -> VLR. IOF. Valor do IOF a ser recolhido
	$linha_p .= picture_9($valor_abatimento,15);         // 34.3P -> Valor do abatimento
	$linha_p .= picture_x($numero_documento,25);         // 35.3P -> Uso empresa cedente. Identificacao do titulo na empresa. Identico ao campo 19.3P
	$linha_p .= '3';                                     // 36.3P -> Código para Protesto. 1 = protestar / 3 = nao protestar
	$linha_p .= '00';                                    // 37.3P -> Prazo para protesto. Numero de dias para  Protesto
	$linha_p .= '1';                                     // 38.3P -> Código p/ Baixa/Devolução: Preencher - vencido: '1’ (Baixar/ Devolver) ou ‘2’ (Não Baixar / Não Devolver
	$linha_p .= picture_9('090',3);                      // 39.3P -> Prazo p/ baixa/devolucao. Numero de dias para baixa/devolucao
   	$linha_p .= picture_9('9',2);                        // 40.3P -> Codigo da moeda. 09 = REAL
	$linha_p .= complementoRegistro(10,"zeros");         // 41.3P -> numero do contrato - pode ser informado zeros - campo nao tratado
	$linha_p .= complementoRegistro(1,"brancos");        // 42.3P -> Preencher com espacos
	$linha_p .= chr(13).chr(10);                         // essa é a quebra de linha
	
	$num_seg_linha_p_q_r++;
	
	$qtd_titulos++;
	
	$total_valor+=$valor_boleto;


	// NAO ALTERAR ==> Montando a linha Q do boleto do loop

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "Q":
	// DADOS DO PAGADOR E SACADOR/AVALISTA
	// PARTE 4
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
	
	$linha_q .= picture_9($num_banco,3);                 // 01.3Q -> Cod. Banco. Caixa = 104 
	$linha_q .= picture_9($lote_servico,4);              // 02.3Q -> Lote de serviço
	$linha_q .= '3';                                     // 03.3Q -> tipo de registro. Equivalente a detalhe de lote. preencher '3'
	$linha_q .= picture_9($num_seg_linha_p_q_r,5);       // 04.3Q -> Nº Sequencial do Registro no Lote
	$linha_q .= 'Q';                                     // 05.3Q -> Cód. Segmento do Registro Detalhe
	$linha_q .= complementoRegistro(1,"brancos");        // 06.3Q -> Espaco
	$linha_q .= picture_9('01',2);                       // 07.3Q -> Cod de Movimento Remessa
	$linha_q .= $tipo_inscricao_pagador;                 // 08.3Q -> Tipo de Inscricao do Pagador (1) CPF (pessoa física) (2) CNPJ Pessoa jurídica
	$linha_q .= picture_9($numero_inscricao_pagador,15); // 09.3Q -> cpf ou cnpj
	$linha_q .= picture_x($nome_pagador,40);             // 10.3Q -> Nome do pagador
	$linha_q .= picture_x($endereco_pagador,40);         // 11.3Q -> Endereco do pagador
	$linha_q .= picture_x($bairro_pagador,15);           // 12.3Q -> Bairro
	$linha_q .= picture_9($cep_pagador,5);               // 13.3Q -> Cep
	$linha_q .= picture_9($cep_pagador_sufixo,3);        // 14.3Q -> Cep (sufixo)
	$linha_q .= picture_x($cidade_pagador,15);           // 15.3Q -> Cidade
	$linha_q .= picture_x($estado_pagador,2);            // 16.3Q -> UF
	
	$linha_q .= '0';                                     // 17.3Q -> Tipo de Inscrição do sacador AVALISTA (0) nenhum (1) CPF (pessoa física) (2) CNPJ Pessoa jurídica
	$linha_q .= picture_9('0',15);                       // 18.3Q -> CPF ou CNPJ do Sacador avalista
	
	$linha_q .= complementoRegistro(40,"brancos");       // 19.3Q -> nome do sacador avalista
	$linha_q .= complementoRegistro(3,"zeros");          // 20.3Q -> Zeros
	$linha_q .= complementoRegistro(20,"brancos");       // 21.3Q -> Espaco
	$linha_q .= complementoRegistro(8,"brancos");        // 22.3Q -> Espaco
	
	$tam_linha_q  = strlen($linha_q);
	$zeros_rest_2 = 240 - $tam_linha_q;
	$linha_q      = $linha_q.complementoRegistro($zeros_rest_2,"zeros");

	$linha_q .= chr(13).chr(10);                         // essa é a quebra de linha
 
 	$num_seg_linha_p_q_r++;
	

	// NAO ALTERAR ==> Montando a linha R do boleto do loop

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO - ( TIPO 3 ) , Segmento "R":
	// DADOS DO PAGADOR E SACADOR/AVALISTA
	// PARTE 4
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
	
	$linha_r .= picture_9($num_banco,3);                 // 01.3R -> Cod. Banco. Caixa = 104 
	$linha_r .= picture_9($lote_servico,4);              // 02.3R -> Lote de serviço
	$linha_r .= '3';                                     // 03.3R -> tipo de registro. Equivalente a detalhe de lote. preencher '3'
	$linha_r .= picture_9($num_seg_linha_p_q_r,5);       // 04.3R -> Nº Sequencial do Registro no Lote
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
    $linha_r .= picture_9($data_juros,8);                // 15.3R -> MULTA. DATA DA MULTA 
    $linha_r .=	picture_9($valor_multa,15);              // 16.3R -> MULTA. VALOR
	$linha_r .= complementoRegistro(10,"brancos");       // 17.3R -> INFORMACAO AO PAGADOR - preencher com espacos
	$linha_r .= complementoRegistro(40,"brancos");       // 18.3R -> INFORMACAO 3 - mensagem 3
	$linha_r .= complementoRegistro(40,"brancos");       // 19.3R -> INFORMACAO 4 - Mensagem 4
	$linha_r .= complementoRegistro(20,"brancos");       // 20.3R -> CNAB uso exclusivo
	$linha_r .= complementoRegistro(8,"zeros");          // 21.3R -> cod. ocor. do pagador
	$linha_r .= complementoRegistro(3,"zeros");          // 22.3R -> cod. do banco na conta do debito - deixar 0
	$linha_r .= complementoRegistro(5,"zeros");          // 23.3R -> cod. da agencia
	$linha_r .= complementoRegistro(1,"brancos");        // 24.3R -> digito verificador da agencia
	$linha_r .= complementoRegistro(12,"zeros");         // 25.3R -> conta corrente
	$linha_r .= complementoRegistro(1,"brancos");        // 26.3R -> digito verificador da conta
	$linha_r .= complementoRegistro(1,"brancos");        // 27.3R -> digito verificador da ag./conta	
	$linha_r .= complementoRegistro(1,"zeros");         // 28.3R -> conta corrente
	$linha_r .= complementoRegistro(9,"brancos");        // 29.3R -> digito verificador da conta

	$linha_r .= chr(13).chr(10);                         // essa é a quebra de linha
		
	$lote_sequencial++;
	
 	$num_seg_linha_p_q_r++;
	
	$conteudo_meio .= $linha_p.$linha_q.$linha_r;

	$linha_p = "";
	$linha_q = "";
	$linha_r = "";

} // final do LOOP para obter os dados dos boletos e dos clientes e montar o conteudo do meio do arquivo (linhas P, Q e R)



	// NAO ALTERAR ==> Montando a linha 5 

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO TIPO "5"
	// TRAILER DE LOTE DE ARQUIVO REMESSA
	// PARTE 5 - PNULTIMA LINHA DO ARQUIVO
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
		
	$linha_5 .= picture_9($num_banco,3);                 // 01.5 -> COD. DO BANCO. ( CAIXA = 104 / BRADESCO = 237 )
    $linha_5 .= picture_9($lote_servico,4);              // 02.5 -> CONTROLE -> Lote de servico equivalente a 02.1
    $linha_5 .= '5';                                     // 03.5 -> CONTROLE -> Tipo de registro, preencher com '5' //         equivalente a (Trailer de Lote).
    $linha_5 .= complementoRegistro(9,"brancos");        // 04.5 -> CNAB. FIller, preencher com espacos

	$qtd_registros = ($lote_sequencial*3)+2-1-1;
    $linha_5 .= picture_9(($qtd_registros-1),6);         // 05.5 -> Qtd. de registros no lote. Somatoria dos registros
	                                                     //         de tipo 1, 3 e 5 ( obs alex = total de linhas -2 )

    $linha_5 .= picture_9($qtd_titulos,6);               // 06.5 -> TOTALIZACAO COBRANCA SIMPLES - Preencher com a qtd. de titulos informados no lote
    $linha_5 .=	picture_9($total_valor,17);              // 07.5 -> TOTALIZACAO COBRANCA SIMPLES - Preencher com o valor total de titulos informados no lote   

    $linha_5 .= complementoRegistro(6,"zeros");          // 08.5 -> cobranca vinculada -> qtd. titulos
    $linha_5 .= complementoRegistro(17,"zeros");         // 09.5 -> cobranca vinculada -> valor total dos titulos

    $linha_5 .= complementoRegistro(6,"zeros");          // 10.5 -> cobranca caucionada -> qtd. titulos
    $linha_5 .= complementoRegistro(17,"zeros");         // 11.5 -> cobranca caucionada -> valor total dos titulos

    $linha_5 .= complementoRegistro(6,"zeros");          // 12.5 -> cobranca descontada -> qtd. titulos
    $linha_5 .= complementoRegistro(17,"zeros");         // 13.5 -> cobranca descontada -> valor total dos titulos

    $linha_5 .= complementoRegistro(8,"brancos");        // 14.5 -> numero do aviso de lancamento
    $linha_5 .= complementoRegistro(117,"brancos");      // 15.5 -> CNAB -> Filler -> Preencher com espacos
	
	$linha_5 .= chr(13).chr(10);                         // essa é a quebra de linha

	// NAO ALTERAR ==> Montando a linha 9 

	// *****************************************************************************************************************
	// DESCRICAO DE REGISTRO TIPO "9"
	// TRAILER DE ARQUIVO REMESSA
	// PARTE 5 - FINAL OU RODAPE DO ARQUIVO
	// TAMANHO DO REGISTRO = 240 CARACTERES
	// *****************************************************************************************************************
		
	$linha_9 .= picture_9($num_banco,3);                 // 01.9 -> COD. DO BANCO. CAIXA = 104
	$linha_9 .= '9999';                                  // 02.9 -> lote de serviço. Preencher '9999'
	$linha_9 .= '9';                                     // 03.9 -> Tipo de registro. Preencher '9'
	$linha_9 .= complementoRegistro(9,"brancos");        // 04.9 -> CNAB. FIller
	$qtd_lotes_arquivo = $lote_servico;
	$linha_9 .= picture_9($qtd_lotes_arquivo,6);         // 05.9 -> Quantidade de lotes do arquivo

	$qtd_reg_arq = ($lote_sequencial*3)+2-1+1-1;                 
	$linha_9 .= picture_9($qtd_reg_arq,6);               // 06.9 -> Quantidade de registros no arquivo

	$linha_9 .= complementoRegistro(6,"zeros");          // 07.9 -> Quantidade de contas p/ conciliacao (lotes) ==> *(G037)
	$linha_9 .= complementoRegistro(205,"brancos");      // 08.9 -> Espacos
	$linha_9 .= chr(13).chr(10);                         // quebra de linha

	$conteudo = $header.$header_lote.$conteudo_meio.$linha_5.$linha_9;



// *****************************************************************************************************************
# CRIAR O ARQUIVO FISICO DA REMESSA
// *****************************************************************************************************************

if (!$handle = fopen($filename, 'w+')){
	erro("<br>&nbsp;Não foi possível abrir o arquivo ($filename)");
}

if (fwrite($handle, "$conteudo") === FALSE){
	echo "<br>&nbsp;Não foi possível escrever no arquivo ($filename)";
}

fclose($handle);

echo "<br>&nbsp;Arquivo de remessa gerado com sucesso!";

// TRANSFERIR O ARQUIVO PARA O SERVIDOR

$xdestino = "remessa/".$filename;
$xorigem = $filename;

@copy($xorigem,$xdestino);

$arquivo = $filename;
//echo "<br>passei aqui na hora de copiar....";

?>
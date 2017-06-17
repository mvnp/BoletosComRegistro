<?php
##########################################################################################################################################
# AUTOR: ALEXANDRE GUIMARAES SARMENTO
# DATA: 27-12-2016
# E-MAIL: alexandre890@yahoo.com.br
# WHATSAPP: (98) 99212-5970
# CIDADE: SAO LUIS - MA
##########################################################################################################################################

require "funcoes.php";

// *****************************************************************************************************************
// DADOS FIXOS - NAO ALTERAR
// *****************************************************************************************************************

$fusohorario         = 3; 
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
$conteudo            = '';        // nao alterar
$lote_sequencial     = 1;         // nao alterar
$lote_servico        = 1;         // nao alterar - para cobrança registrada é 1 - nao alterar
$header              = '';        // nao alterar - linha do header
$registro_t1         = '';        // nao alterar - linha do corpo ou dos boletos
$linha_9             = '';        // nao alterar - linha do rodape ou trailler do arquivo
$conteudo_meio       = '';        // nao alterar - linha usada para montar o arquivo
$num_seq_linha       = 1;


// *****************************************************************************************************************
// DADOS VARIAVEIS - PODEM SER ALTERADOS
// *****************************************************************************************************************

// DADOS DE CONFIGURACAO DO ARQUIVO DE REMESSAS A SER GERADO - PODE SER ALTERADO DE ACORDO COM SUA NECESSIDADE
$arquivo                   = "CB".date("d").date("m")."01.TST";  // nome do seu arquivo de remessa a ser gerado 
$filename                  = $arquivo;  // nome do seu arquivo de remessa a ser gerado
$numero_sequencial_arquivo = 1;                                        // CADA ARQUIVO DE REMESSA DEVERA TER UM NUMERO SEQUENCIAL DIFERENTE E CRESCENTE

// DADOS DA EMPRESA EMISSORA DO BOLETO - TROQUE POR SEUS DADOS
$cpf_cnpj                  = '018125973000112';                        // CNPJ DA EMPRESA SEM PONTOS OU TRACOS
$empresa_beneficiario      = 'JOSISVANIO SERVICOS DE INFORMATICA ME';  // NOME DA EMPRESA

// DADOS DA CONTA EMISSORA DO BOLETO - TROQUE POR SEUS DADOS
$carteira                  = '09';                                     // NUMERO DA CARTEIRA ( 09 = COM REGISTRO BRADESCO )
$agencia                   = '3016';                                   // NUMERO DA AGENCIA
$dv_agencia                = '0';                                      // DIGITO VERIFICADOR DA AGENCIA
$conta                     = '148160';                                 // NUMERO DA CONTA
$dv_conta                  = '2';                                      // DIGITO VERIFICADOR DA CONTA
$dv_ag_conta               = '0';                                      // DIGITO VERIFICADOR DA AGENCA/CONTA
$num_banco                 = '237';                                    // NUMERO DO BANCO - 237 => BRADESCO
$nome_banco                = 'BRADESCO';                               // NOME DO BANCO -> BRADESCO SA
$codigo_beneficiario       = '4771031';                                // COD. DO BENEFICIARIO

$dados_da_conta            = '0'.picture_9($carteira,3).picture_9($agencia,5).picture_9($conta,6).picture_9($dv_conta,1);

// *****************************************************************************************************************
// DADOS DOS BOLETOS A SEREM REMETIDOS - PODEM SER ALTERADOS
// *****************************************************************************************************************

// AQUI VOCE DEVERA FAZER UM LOOP PARA POPULAR AS VARIAVEIS DOS BOLETOS COM OS DADOS DOS BOLETOS DE SUA TABELA MYSQL

// BOLETO NUMERO 01

	$nosso_numero[0]                 = '667598';                        // NOSSO NUMERO SEM O DIGITO VERIFICADOR
	$numero_documento[0]             = '9110910';                       // NUMERO DO DOCUMENTO

	$nnum[0]                         = formata_numero( $carteira,2,0 ).formata_numero( $nosso_numero[0],11,0 ) ;
	$dv_nn[0]                        = digitoVerificador_nossonumero( $nnum[0] ); // DIGITO VERIFICADOR DO NOSSO NUMERO
	$dv_nosso_numero[0]              = $dv_nn[0];                       // incluindo o dig. verificador para atender o bradesco
	$data_vencimento_boleto[0]       = '100617';                        // data de vencimento formato DDMMYY
	$data_emissao_boleto[0]          = '170517';                        // FORMATO -> DDMMYY (06 DIGITOS)
	$valor_boleto[0]                 = '45000';                         // R$ 450,00
	$data_juros[0]                   = '110617';                        // data para comecar a cobrar os juros
	$tipo_multa[0]                   = '2';                             // tipo multa: 2=porcentagem/1=valor em reais/0=sem multa   
	$data_multa[0]                   = '110617';                        // FORMATO -> DDMMYY (06 DIGITOS)
	$valor_multa[0]                  = '200';                           // VALOR DA MULTA INFORMADA EM TAXA PERCENTUAL MENSAL => 200 => 2%
	$data_limite_desc[0]             = '000000';                        // data limite para dar o desconto
	$valor_desconto[0]               = '000';                           // 000 = 0% / 500 => 5%
	$valor_iof[0]                    = '0';                             // 193 a 205 -> Valor do IOF => So se sua empresa for conc. credito
    $valor_abatimento[0]             = '0';                             // 206 a 218 -> Valor do abatimento a ser concedido ou cancelado
	$tipo_inscricao_pagador[0]       = '1';                             // 219 a 220 -> Tipo de inscricao de pessoa 1=fisica / 2= juridica
    $numero_inscricao_pagador[0]     = '36034320534';                   // 221 a 234 -> Nº Inscricao do pagador 
	$nome_pagador[0]                 = 'JOSEILTON SANTOS DA PAIXAO';    // 235 a 274 -> Nome do pagador
	$endereco_pagador[0]             = 'RUA CEARA 678';                 // 235 a 274 -> Nome do pagador
	$bairro_pagador[0]               = 'CENTRO';                        // 275 a 314 -> Endereco do pagador
	$cep_pagador[0]                  = '65072';                         // 327 a 331 -> CEP
	$cep_pagador_sufixo[0]           = '300';                           // 332 a 334 -> Sufixo do CEP
	$cidade_pagador[0]               = 'SAO LUIS';                      // 335 a 394 -> Sacador/Avalista
	$estado_pagador[0]               = 'MA';                            // 395 a 400 -> No. sequencial do registro
	$email_pagador[0]                = 'ROBERTO@UOL.COM.BR';            // 235 a 274 -> EMAIL PAGADOR
	
	$enderecamento_aviso_debito[0]   = '2';                             // 106 a 106 -> End. aviso debito. 1=emite / 2=nao emite / outros emite 
	$especie_titulo[0]               = '12';                            // 148 a 149 -> Especie titulo. 01=dupl/02=nota promiss/12=dupl serv/99=outros
	$valor_por_dia_de_atraso[0]      = '003';                           // Valor por dia de atraso (em porcentagem) => 003 => 0,03% ao dia => 1% ao mes



// BOLETO NUMERO 02

	$nosso_numero[1]                 = '8011353';                       // NOSSO NUMERO SEM O DIGITO VERIFICADOR
	$numero_documento[1]             = '0512417';                       // NUMERO DO DOCUMENTO

	$nnum[1]                         = formata_numero( $carteira,2,0 ).formata_numero( $nosso_numero[1],11,0 ) ;
	$dv_nn[1]                        = digitoVerificador_nossonumero( $nnum[1] ); // DIGITO VERIFICADOR DO NOSSO NUMERO
	$dv_nosso_numero[1]              = $dv_nn[1];                       // incluindo o dig. verificador para atender o bradesco
	$data_vencimento_boleto[1]       = '100617';                        // data de vencimento formato DDMMYY
	$data_emissao_boleto[1]          = '170517';                        // FORMATO -> DDMMYY (06 DIGITOS)
	$valor_boleto[1]                 = '40000';                         // R$ 400,00
	$data_juros[1]                   = '110617';                        // data para comecar a cobrar os juros
	$tipo_multa[1]                   = '2';                             // tipo multa: 2=porcentagem/1=valor em reais/0=sem multa   
	$data_multa[1]                   = '110617';                        // FORMATO -> DDMMYY (06 DIGITOS)
	$valor_multa[1]                  = '200';                           // VALOR DA MULTA INFORMADA EM TAXA PERCENTUAL MENSAL => 200 => 2%
	$data_limite_desc[1]             = '000000';                        // data limite para dar o desconto
	$valor_desconto[1]               = '000';                           // 000 = 0% / 500 => 5%
	$valor_iof[1]                    = '0';                             // 193 a 205 -> Valor do IOF => So se sua empresa for conc. credito
    $valor_abatimento[1]             = '0';                             // 206 a 218 -> Valor do abatimento a ser concedido ou cancelado
	$tipo_inscricao_pagador[1]       = '1';                             // 219 a 220 -> Tipo de inscricao de pessoa 1=fisica / 2= juridica
    $numero_inscricao_pagador[1]     = '36034320534';                   // 221 a 234 -> Nº Inscricao do pagador 
	$nome_pagador[1]                 = 'JOSEILTON SANTOS DA PAIXAO';    // 235 a 274 -> Nome do pagador
	$endereco_pagador[1]             = 'RUA CEARA 678';                 // 235 a 274 -> Nome do pagador
	$bairro_pagador[1]               = 'CENTRO';                        // 275 a 314 -> Endereco do pagador
	$cep_pagador[1]                  = '65072';                         // 327 a 331 -> CEP
	$cep_pagador_sufixo[1]           = '300';                           // 332 a 334 -> Sufixo do CEP
	$cidade_pagador[1]               = 'SAO LUIS';                      // 335 a 394 -> Sacador/Avalista
	$estado_pagador[1]               = 'MA';                            // 395 a 400 -> No. sequencial do registro
	$email_pagador[1]                = 'ROBERTO@UOL.COM.BR';            // 235 a 274 -> EMAIL PAGADOR	

	$enderecamento_aviso_debito[1]   = '2';                             // 106 a 106 -> End. aviso debito. 1=emite / 2=nao emite / outros emite 
	$especie_titulo[1]               = '12';                            // 148 a 149 -> Especie titulo. 01=dupl/02=nota promiss/12=dupl serv/99=outros
	$valor_por_dia_de_atraso[1]      = '003';                           // Valor por dia de atraso (em porcentagem) => 003 => 0,03% ao dia => 1% ao mes
	
// FIM DO LOOP PARA A OBTENCAO DOS DADOS DOS SEUS BOLETOS


// INICIO DO CODIGO PARA MONTAR O ARQUIVO DE REMESSA

// *****************************************************************************************************************
// LAYOUT DO ARQUIVO REMESSA - REGISTRO HEADER LABEL - ( 1a. linha do arquivo de remessa ) - NAO ALTERAR
// *****************************************************************************************************************

$header .= "0";                                                                  // 001 a 001 -> Banco (237 = bradesco) - POR 0
$header .= "1";                                                                  // 002 a 002 -> Identificacao do arquivo remessa - POR 1
$header .= "REMESSA";                                                            // 003 a 009 -> Literal Remessa - POR REMESSA
$header .= "01";                                                                 // 010 a 011 -> codigo do servico ou do movimento - POR 01
$header .= picture_x("COBRANCA",15);                                             // 012 a 026 -> literal servico - por COBRANCA
$header .= picture_9($codigo_beneficiario,20);                                   // 027 a 046 -> Cod. da empresa (fornecido pelo bradesco) (pag. 16)
$header .= picture_x($empresa_beneficiario,30);                                  // 047 a 076 -> Razao social
$header .= picture_9($num_banco,3);                                              // 077 a 079 -> por 237
$header .= picture_x($nome_banco,15);                                            // 080 a 094 -> Nome do banco por extenso
$header .= $DATA['DIA'][$i].$DATA['MES'][$i].substr($DATA['ANO'][$i],2,2);       // 095 a 100 -> Data da gravacao do arquivo
$header .= complementoRegistro(8,"brancos");                                     // 101 a 108 -> Branco
$header .= "MX";                                                                 // 109 a 110 -> Identificacao do sistema ->  Por MX
$header .= picture_9($numero_sequencial_arquivo,7);                              // 111 a 117 -> Num. sequencial de remessa -> Id da sua remessa
$header .= complementoRegistro(277,"brancos");                                   // 118 a 394 -> Branco
$header .= picture_9($num_seq_linha,6);                                          // 395 a 400 -> NUMERO SEQUENCIAL DO REGISTRO DE UM EM UM

$header .= chr(13).chr(10);                                                      // QUEBRA DE LINHA

$num_seq_linha++;


// *******************************************************************************************************************
// LACO PARA PEGAR OS BOLETOS
// *******************************************************************************************************************

$qtd_boletos = count( $nosso_numero ); // nosso_numero e' um vetor de nossos numeros de nossos boletos, logo, por ele
                                       // temos como saber quantos boletos foram obtidos no loop acima, onde pegamos
                                       // os dados dos nossos boletos.

for( $j=0; $j<$qtd_boletos; $j++ ){    // inicio do loop para montagem das linhas do arquivo de remessa


// *****************************************************************************************************************
// REGISTRO DE TRANSACAO - TIPO 1 (OBRIGATORIO) -> Dados dos boletos
// *****************************************************************************************************************

$registro_t1 .= "1";                                                 // 001 a 001 -> Identificacao do registro. Sempre = 1
$registro_t1 .= complementoRegistro(5,"brancos");                    // 002 a 006 -> Agencia de debito (opcional) deixei em branco. 
$registro_t1 .= complementoRegistro(1,"brancos");                    // 007 a 007 -> digito da egencia de debito (opcional)
$registro_t1 .= complementoRegistro(5,"brancos");                    // 008 a 012 -> Razao da conta corrente (Opcional)
$registro_t1 .= complementoRegistro(7,"brancos");                    // 013 a 019 -> Conta corrente (opcional)
$registro_t1 .= complementoRegistro(1,"brancos");                    // 020 a 020 -> Digito da conta corrente (opcional)

//$registro_t1 .= picture_9($dados_da_conta,17);                     // 021 a 021 -> 021 a 037 -> Dados da conta

$registro_t1 .= '0';                                                 // 021 a 021 -> Inserir um zero fixo  
$registro_t1 .= picture_9($carteira,3);                              // 022 a 024 -> Codigo da carteira 
$registro_t1 .= picture_9($agencia,5);                               // 025 a 029 -> Codigo da agencia cedente
$registro_t1 .= picture_9($conta,7);                                 // 030 a 036 -> Conta corrente
$registro_t1 .= picture_9($dv_conta,1);                              // 037 a 037 -> Digito da conta

$registro_t1 .= picture_9($numero_documento[$j],25);                 // 038 a 062 -> No. controle -> (livre e para uso da empresa - usei o num. docto )
$registro_t1 .= complementoRegistro(3,"zeros");                      // 063 a 065 -> Codigo do banco a ser debitado na camara de compensacao
$registro_t1 .= picture_9($tipo_multa[$j],1);                        // 066 a 066 -> Campo de multa. 2=percentual/1=em reais/0=sem multa
$registro_t1 .= picture_9($valor_multa[$j],4);                       // 067 a 070 -> Percentual ou valor da multa. Vide o tipo de multa no item acima.
$registro_t1 .= picture_9($nosso_numero[$j],11);                     // 071 a 081 -> Identificacao do titulo no banco Nosso Numero
$registro_t1 .= picture_9($dv_nosso_numero[$j],1);                   // 082 a 082 -> Digito de auto conferencia do nosso numero
$registro_t1 .= complementoRegistro(10,'zeros');                     // 083 a 092 -> Desconto de bonificacao por dia (10 zeros)
$registro_t1 .= picture_9('2',1);                                    // 093 a 093 -> Condicao para emissao da papeleta 1=banco emite / 2=cliente emite
$registro_t1 .= 'N';                                                 // 094 a 094 -> Se o banco vai por por o boleto em debito em conta N=nao
$registro_t1 .= complementoRegistro(10,'brancos');                   // 095 a 104 -> deixar 10 brancos
$registro_t1 .= complementoRegistro(1,'brancos');                    // 105 a 105 -> deixar 1 branco
$registro_t1 .= picture_9($enderecamento_aviso_debito[$j],1);        // 106 a 106 -> enderecamento aviso debito 1=emite / 2=nao emite
$registro_t1 .= complementoRegistro(2,'brancos');                    // 107 a 108 -> deixar 2 brancos
$registro_t1 .= "01";                                                // 109 a 110 -> cod. movimento (pag.20) -> 01 = remessa, pedido de registro
$registro_t1 .= picture_9($numero_documento[$j],10);                 // 111 a 120 -> Numero do documento (nosso numero)
$registro_t1 .= picture_9($data_vencimento_boleto[$j],6);            // 121 a 126 -> Data de vencimento   
$registro_t1 .= picture_9($valor_boleto[$j],13);                     // 127 a 139 -> valor do titulo
$registro_t1 .= complementoRegistro(3,"zeros");                      // 140 a 142 -> Agência/banco encarregado da Cobrança (Preencher com zeros)
$registro_t1 .= complementoRegistro(5,"zeros");                      // 143 a 147 -> Agencia depositaria -> preencher com zeros
$registro_t1 .= picture_x($especie_titulo[$j],2);                     // 148 a 159 -> Especie de titulo. 99 = outros / 12=Duplicata servico (DS)
$registro_t1 .= "N";                                                 // 150 a 150 -> Identificacao -> Sempre 'N' 
$registro_t1 .= picture_9($data_emissao_boleto[$j],6);               // 151 a 156 -> Data de emissao do titulo
$registro_t1 .= complementoRegistro(2,"zeros");                      // 157 a 158 -> 1a. instrucao
$registro_t1 .= complementoRegistro(2,"zeros");                      // 159 a 160 -> 2a. instrucao
$registro_t1 .= picture_9($valor_por_dia_de_atraso[$j],13);          // 161 a 173 -> Valor cobrado por dia de atraso em percentual = 003 => 0,03 
$registro_t1 .= picture_9($data_limite_desc[$j],6);                  // 174 a 179 -> Data limite para desconto
$registro_t1 .= picture_9($valor_desconto[$j],13);                   // 180 a 192 -> Valor do desconto
$registro_t1 .= picture_9($valor_iof[$j],13);                        // 193 a 205 -> Valor do IOF - zeros
$registro_t1 .= picture_9($valor_abatimento[$j],13);                 // 206 a 218 -> Valor do abatimento a ser concedido ou cancelado
$registro_t1 .= picture_9($tipo_inscricao_pagador[$j],2);            // 219 a 220 -> Tipo de pagador/1=CPF/2=CNPJ/3=PIS-PASEP/98=NAO TEM/99=OUTROS
$registro_t1 .= picture_9($numero_inscricao_pagador[$j],14);         // 221 a 234 -> Inscricao do pagador - CPF
$registro_t1 .= picture_x($nome_pagador[$j],40);                     // 235 a 274 -> Nome do pagador
$registro_t1 .= picture_x($endereco_pagador[$j],40);                 // 275 a 314 -> Endereco completo
$registro_t1 .= complementoRegistro(12,"brancos");                   // 315 a 326 -> 1a. mensagem
$registro_t1 .= picture_9($cep_pagador[$j],5);                       // 327 a 331 -> CEP
$registro_t1 .= picture_9($cep_pagador_sufixo[$j],3);                // 332 a 334 -> Cep (sufixo)
$registro_t1 .= complementoRegistro(60,"brancos");                   // 335 a 394 -> Sacador/Avalista ou 2a. mensagem
$registro_t1 .= picture_9($num_seq_linha,6);                         // 395 a 400 -> Numero sequencia do registro

$registro_t1 .= chr(13).chr(10);                                     // QUEBRA DE LINHA

$lote_sequencial++;
	
$num_seq_linha++;
	
$conteudo_meio .= $registro_t1;
	

} // final do FOR e do loop de monstagem das linhas centrais do arquivo de remessa

// *******************************************************************************************************************
// Final do Laco que pega os dados dos boletos no seu banco de dados - FINAL DO CORPO (MEIO ou MIOLO) 
// *******************************************************************************************************************

	// *****************************************************************************************************************
	// REGISTRO TRAILLER - TIPO "9" - MONTAGEM DA ULTIMA LINHA DO ARQUIVO DE REMESSA
	// *****************************************************************************************************************
		
	//$num_seq_linha--;
	
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
// 'a+' comeca a escrever do inicio para o fim preservando o conteudo do arquivo

if (!$handle = fopen($filename, 'w+')){
	erro("<div align='center' class='label_normal'>&nbsp;Não foi possível abrir o arquivo ($filename)</div><br>");
}

// Escreve $conteudo no nosso arquivo aberto.
if (fwrite($handle, "$conteudo") === FALSE){
	echo "<div align='center' class='label_normal'>&nbsp;Não foi possível escrever no arquivo ($filename)</div><br>";
}
fclose($handle);
echo "<div align='center' class='label_normal'>&nbsp;Arquivo de remessa gerado com sucesso!";
?>
<br>
<br>
<a href="remessa-400/<?php echo $filename;?>" target="_blank" download><?php echo $filename;?></a>

<?php
echo "</div>";
?>

<?php
// TRANSFERIR O ARQUIVO PARA O SERVIDOR

	$xdestino = "remessa-400/".$filename;
	$xorigem = $filename;
	@copy($xorigem,$xdestino);
	
	$arquivo = $filename;

?>
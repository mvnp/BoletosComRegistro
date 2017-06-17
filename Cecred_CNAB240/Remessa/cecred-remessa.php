# AUTOR...: Samuca Hantschel
# E-MAIL..: samuca@samuca.eti.br
# SITE....: http://www.samuca.eti.br
# CIDADE..: Sao Bento do Sul
# ARQUIVO.: CECRED-REMESSA.PHP
# FUNCAO..: GERAR O ARQUIVO DE REMESSA DA COOPERATIVA DE CREDITO CECRED - CNAB-240
# DATA....: 10-03-2017
###################################################################################################################


<?PHP
# Gerar arquivo remessa CECRED
 
# FUNÇÕES
if(!function_exists(limit))
    {
        function limit($palavra,$limite)
        {
            if(strlen($palavra) >= $limite)
            {
                $var = substr($palavra, 0,$limite);
            }
            else
            {
                $max = (int)($limite-strlen($palavra));
                $var = $palavra.complementoRegistro($max,"brancos");
            }
            return $var;
        }
    }
 
if(!function_exists(sequencial))
    {
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
    }
 
if(!function_exists(zeros))
    {
        function zeros($min,$max)
        {
            $x = ($max - strlen($min));
            for($i = 0; $i < $x; $i++)
            {
                $zeros .= '0';
            }
            return $zeros.$min;
        }
    }
 
if(!function_exists(complementoRegistro))
    {
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
    }
 
if(!function_exists(formata_numdoc))
    {
        function formata_numdoc($num,$tamanho)
            {
                while(strlen($num)<$tamanho)
                    {
                        $num="0".$num; 
                    }
                return $num;
            }
    }
 
#### Código do banco
$codigo_banco = '085';
 
################################
# DADOS PARA TESTE, COLOQUE OS DADOS DO EMISSOR DO BOLETO
$dados2[cpf_cnpj_con] = '00.000.000/000-00';
$dados2[agencia_con] = '1111-1';
$dados2[conta_con] = '2222-2';
$dados2[carteira_con] = '01';
$dados2[convenio_con] = '11231';
$dados2[cedente_con] = 'Razão social';
 
# DADOS DO BOLETO
$id_rem = 111; # Crie aqui um código sequencial
$dados[id_cob] = '123'; # Número do pedido ou referência que você queira usar pra identificar o boleto
$dados[valor_cob] = '1.00';
$dados[data_vencimento_cob_f] = '10032017'; #DiaMesAno
 
# DADOS DO CLIENTE
$dados[tipo_inscricao] = '2'; # 2-CNPJ      1-CPF
$dados[documento_cliente] = '11.222.333/444-55';
$dados[cliente_fornecedor] = 'João da Silva';
$dados[endereco_cli] = 'Rua do Abacaxi, 123';
$dados[bairro_cli] = 'Centro';
$dados[cep_cli] = '89000-000';
$dados[desc_cid] = 'São Bento do Sul';
$dados[desc_est] = 'SC';
################################
 
 
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$hora = formata_numdoc(date("H"),2);
$minuto = formata_numdoc(date("m"),2);
$segundo = formata_numdoc(date("s"),2);
$codigo = formata_numdoc($id_rem,2);
 
$filename = "CB$dia$mes$ano$codigo.REM";
$conteudo = '';
 
$parametro = htmlspecialchars($id_par_grupo);
$total = substr_count($parametro, ',');
$parametro = explode(",",htmlspecialchars($parametro));
 
$num2++;
# Pega configurações da SRC Cred
$cnpj = str_replace('.','',$dados2[cpf_cnpj_con]);
$cnpj = str_replace('-','',$cnpj);
$cnpj = str_replace('/','',$cnpj);
                                                         
$agencia = explode("-",$dados2[agencia_con]);
$agencia_digito = $agencia[1];
$agencia = $agencia[0];
 
$conta = explode("-",$dados2[conta_con]);
$conta_digito = $conta[1];
$conta = $conta[0];
$carteira = substr($dados2[carteira_con],1,1);
 
$convenio = $dados2[convenio_con];
 
$cedente_con = $dados2[cedente_con];
 
## REGISTRO HEADER de arquivo
# Quando for número coloca zeros à esquerda
# Quando for alfanumérico coloca zeros à direita                
$conteudo .= $codigo_banco; # Código do Banco na Compensação
$conteudo .= formata_numdoc(0,4); # Lote de Serviço
$conteudo .= '0'; # Tipo de Registro
$conteudo .= complementoRegistro(9,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= 2; # Tipo de Inscrição da Empresa
$conteudo .= formata_numdoc($cnpj,14); # Número de Inscrição da Empresa (CNPJ)
$conteudo .= limit($convenio,20); # Convênio
$conteudo .= formata_numdoc($agencia,5); # agência
$conteudo .= formata_numdoc($agencia_digito,1); # dígito agência
$conteudo .= formata_numdoc($conta,12); # conta corrente
$conteudo .= formata_numdoc($conta_digito,1); # dígito conta corrente
$conteudo .= complementoRegistro(1,"brancos"); # Dígito Verificador da Ag/Conta (Analista da CECRED mandou preencher em banco)
$conteudo .= limit($cedente_con,30); # Nome da Empresa
$conteudo .= limit('CECRED',30); # Nome da Cooperativa
$conteudo .= complementoRegistro(10,"brancos"); # Uso Exclusivo FEBRABAN / CNAB
$conteudo .= 1; # 1 - remessa   2 - retorno
$conteudo .= $dia.$mes.$ano; # Data de Geração do Arquivo
$conteudo .= $hora.$minuto.$segundo; # Hora de Geração do Arquivo
$conteudo .= formata_numdoc($id_rem,6); # Número Sequencial do Arquivo
$conteudo .= '087'; # Número da Versão do Layout do Arquivo, padrão 087
$conteudo .= formata_numdoc(1600,5); # Densidade de Gravação do Arquivo (NÃO FAÇO IDEIA DE QUE PORCARIA É ESSA KKK)
$conteudo .= complementoRegistro(20,"brancos"); # Para Uso Reservado da Coop.
$conteudo .= complementoRegistro(20,"brancos"); # Para Uso Reservado da Empresa (pode ser observações ou algo do gênero)
$conteudo .= complementoRegistro(29,"brancos"); # Uso Exclusivo FEBRABAN / CNAB
$conteudo .= chr(13).chr(10); //essa é a quebra de linha
$num++;
$num2++;
$num3++;
 
 
# Registro header de lote
$num4++;
$conteudo .= $codigo_banco; # Código do Banco na Compensação
$conteudo .= formata_numdoc(1,4); # Lote de Serviço
$conteudo .= '1'; # Tipo de Registro
$conteudo .= 'R'; # Tipo de Operação
$conteudo .= '01'; # Tipo de Serviço
$conteudo .= complementoRegistro(2,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= '045'; # Nº da Versão do Layout do Lote
$conteudo .= complementoRegistro(1,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= 2; # Tipo de Inscrição da Empresa
$conteudo .= formata_numdoc($cnpj,15); # Número de Inscrição da Empresa (CNPJ)
$conteudo .= limit($convenio,20); # Convênio
$conteudo .= formata_numdoc($agencia,5); # agência
$conteudo .= formata_numdoc($agencia_digito,1); # dígito agência
$conteudo .= formata_numdoc($conta,12); # conta corrente
$conteudo .= formata_numdoc($conta_digito,1); # dígito conta corrente
$conteudo .= complementoRegistro(1,"brancos"); # Dígito Verificador da Ag/Conta (Analista da CECRED mandou preencher em banco)
$conteudo .= limit($cedente_con,30); # Nome da Empresa
$conteudo .= limit('',40); # Mensagem 1
$conteudo .= limit('',40); # Mensagem 2
$conteudo .= formata_numdoc($id_rem,8); # Número Remessa/Retorno
$conteudo .= $dia.$mes.$ano; # Data de Gravação Remessa/Retorno
$conteudo .= formata_numdoc(0,8); # Data do Crédito
$conteudo .= complementoRegistro(33,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= chr(13).chr(10); //essa é a quebra de linha
$num++;
 
############# Aqui você faz a consulta pra listar todos os registros e gerar remessa para um ou mais boletos
 
# Registro Detalhe – Segmento P
$num5++;
$conteudo .= $codigo_banco; # Código do Banco na Compensação
$conteudo .= formata_numdoc(1,4); # Lote de Serviço
$conteudo .= '3'; # Tipo de Registro
$conteudo .= formata_numdoc($num5,5); # Nº Sequencial do Registro no Lote
$conteudo .= 'P'; # Cód. Segmento do Registro Detalhe
$conteudo .= complementoRegistro(1,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= '01'; # Código de Movimento Remessa
$conteudo .= formata_numdoc($agencia,5); # agência
$conteudo .= formata_numdoc($agencia_digito,1); # dígito agência
$conteudo .= formata_numdoc($conta,12); # conta corrente
$conteudo .= formata_numdoc($conta_digito,1); # dígito conta corrente
$conteudo .= complementoRegistro(1,"brancos"); # Dígito Verificador da Ag/Conta (Analista da CECRED mandou preencher em banco)
 
$nosso_numero1 = formata_numdoc($conta.$conta_digito,8);
$nosso_numero2 = formata_numdoc($dados[id_cob],9);
 
$conteudo .= limit($nosso_numero1.$nosso_numero2,20); # Número do Documento de Cobrança (nosso número)
$conteudo .= $carteira; # Carteira
$conteudo .= 1; # Forma de Cadastr. do Título no Banco
$conteudo .= 1; # Tipo de Documento
$conteudo .= 2; # Identificação da Emissão do Boleto
$conteudo .= 2; # Identificação da Distribuição     
$conteudo .= limit($dados[id_cob],15); # Número do Documento de Cobrança
$conteudo .= $dia.$mes.$ano; # Data vencimento
$conteudo .= formata_numdoc(number_format($dados[valor_cob],2,'',''),15); # Valor Nominal do Título
$conteudo .= formata_numdoc(0,5); # Agência Encarregada da Cobrança
$conteudo .= formata_numdoc(0,1); # Dígito Verificador da Agência
$conteudo .= '04'; # Espécie do Título
 
$conteudo .= 'N'; # Identific. de Título Aceito/Não Aceito
$conteudo .= $dados[data_vencimento_cob_f]; # Data da Emissão/Documento do Título
$conteudo .= 2; # Código do Juros de Mora
$conteudo .= formata_numdoc(0,8); # Data do Juros de Mora
$conteudo .= formata_numdoc(100,15); # Juros de Mora por Dia/Taxa
$conteudo .= 0; # Código do Desconto 1
$conteudo .= formata_numdoc(0,8); # Data do desconto
$conteudo .= formata_numdoc(0,15); # Valor/Percentual a ser Concedido
$conteudo .= formata_numdoc(0,15); # Valor do IOF a ser Recolhido
$conteudo .= formata_numdoc(0,15); # Valor do Abatimento
$conteudo .= limit($dados[id_cob],25); # Identificação do Título na Empresa
$conteudo .= 3; # Código para Negativação via Serasa (protestar ou não)
$conteudo .= formata_numdoc(0,2); # Número de Dias para Negativação
$conteudo .= 2; # Código para Baixa/Devolução
$conteudo .= complementoRegistro(3,"brancos"); # Número de Dias para Baixa/Devolução
$conteudo .= '09'; # Código da Moeda
$conteudo .= formata_numdoc($convenio,10); # Nº do Contrato da Operação de Créd.
$conteudo .= complementoRegistro(1,"brancos"); # Uso livre banco/empresa ou autorização de pagamento parcial
$conteudo .= chr(13).chr(10); //essa é a quebra de linha
$num++;
 
# Registro Detalhe – Segmento Q
$num5++;
$conteudo .= $codigo_banco; # Código do Banco na Compensação
$conteudo .= formata_numdoc($num4,4); # Lote de Serviço
$conteudo .= '3'; # Tipo de Registro
$conteudo .= formata_numdoc($num5,5); # Nº Sequencial do Registro no Lote
$conteudo .= 'Q'; # Cód. Segmento do Registro Detalhe
$conteudo .= complementoRegistro(1,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= '01'; # Código de Movimento Remessa
# dados do sacado
$conteudo .= $dados[tipo_inscricao]; # Tipo de Inscrição da Empresa
 
$documento_cliente = str_replace('.','',$dados[documento_cliente]);
$documento_cliente = str_replace('-','',$documento_cliente);
$documento_cliente = str_replace('/','',$documento_cliente);
 
$conteudo .= formata_numdoc($documento_cliente,15); # Número de Inscrição
$conteudo .= limit($dados[cliente_fornecedor],40); # Nome cliente
$conteudo .= limit($dados[endereco_cli],40); # Endereço cliente
$conteudo .= limit($dados[bairro_cli],15); # Bairro cliente
$conteudo .= limit(substr($dados[cep_cli],0,5),5); # cep cliente
$conteudo .= limit(substr($dados[cep_cli],6,3),3); # sufixo cep cliente
$conteudo .= limit($dados[desc_cid],15); # Cidade cliente
$conteudo .= limit($dados[desc_est],2); # UF cliente
# dados do sacado/avalista
$conteudo .= formata_numdoc(0,1); # Tipo de Inscrição do avalista
$conteudo .= formata_numdoc(0,15); # Número de Inscrição avalista
$conteudo .= limit('',40); # Nome avalista
 
$conteudo .= formata_numdoc(0,3); # Cód. Bco. Corresp. na Compensação
$conteudo .= limit('',20); # Nosso Nº no Banco Correspondente
$conteudo .= complementoRegistro(8,"brancos"); # Uso Exclusivo FEBRABAN / CNAB                              
$conteudo .= chr(13).chr(10); //essa é a quebra de linha
$num++;
 
# Registro Detalhe – Segmento R
$num5++;
$conteudo .= $codigo_banco; # Código do Banco na Compensação
$conteudo .= formata_numdoc($num4,4); # Lote de Serviço
$conteudo .= '3'; # Tipo de Registro
$conteudo .= formata_numdoc($num5,5); # Nº Sequencial do Registro no Lote
$conteudo .= 'R'; # Cód. Segmento do Registro Detalhe
$conteudo .= complementoRegistro(1,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= '01'; # Código de Movimento Remessa
$conteudo .= '0'; # Código do Desconto 2
$conteudo .= formata_numdoc(0,8); # Data do Desconto 2
$conteudo .= formata_numdoc(0,15); # Valor/Percentual a ser Concedido
$conteudo .= '0'; # Código do Desconto 3
$conteudo .= formata_numdoc(0,8); # Data do Desconto 3
$conteudo .= formata_numdoc(0,15); # Valor/Percentual a ser Concedido
$conteudo .= '2'; # Código da multa
$conteudo .= formata_numdoc(0,8); # Data da Multa (na ausência será usada a data de vencimento)
$conteudo .= formata_numdoc(200,15); # Valor/Percentual a Ser Aplicado (2%)
$conteudo .= complementoRegistro(10,"brancos"); # Informação ao Sacado
$conteudo .= complementoRegistro(40,"brancos"); # Mensagem 3
$conteudo .= complementoRegistro(40,"brancos"); # Mensagem 4
$conteudo .= complementoRegistro(20,"brancos"); # Uso Exclusivo FEBRABAN / CNAB 
$conteudo .= formata_numdoc(0,8); # Cód. Ocor. do Sacado
$conteudo .= $codigo_banco; # Cód. do Banco na Conta do Débito
 
$conteudo .= formata_numdoc($agencia,5); # agência
$conteudo .= formata_numdoc($agencia_digito,1); # dígito agência
$conteudo .= formata_numdoc($conta,12); # conta corrente
$conteudo .= formata_numdoc($conta_digito,1); # dígito conta corrente
$conteudo .= complementoRegistro(1,"brancos"); # Dígito Verificador da Ag/Conta (Analista da CECRED mandou preencher em banco)
$conteudo .= 2; # Aviso para Débito Automático
$conteudo .= complementoRegistro(9,"brancos"); # Uso Exclusivo FEBRABAN / CNAB                                  
$conteudo .= chr(13).chr(10); //essa é a quebra de linha
$num++;
############# Aqui termmina sua consulta pra listar todos os registros e gerar remessa para um ou mais boletos
 
 
# Registro Trailler de arquivo
$num++;
$conteudo .= $codigo_banco; # Código do Banco na Compensação
$conteudo .= 9999; # Lote de Serviço
$conteudo .= 9; # Tipo de Registro
$conteudo .= complementoRegistro(9,"brancos");
$conteudo .= formata_numdoc(1,6); # Quantidade de Lotes do Arquivo
$conteudo .= formata_numdoc($num,6); # Quantidade de Registros o Arquivo
$conteudo .= formata_numdoc($num3,6);; # Qtde de Contas p/ Conc. (Lotes
$conteudo .= complementoRegistro(205,"brancos");
 
# Removendo acentuação
$conteudo = strtr($conteudo, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ'', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy ');
#echo $conteudo;
#die;
 
if (!$handle = fopen($filename, 'w+')) 
    {
         echo "Não foi possível abrir o arquivo ($filename)";
    }
// Escreve $conteudo no nosso arquivo aberto.
if(fwrite($handle, "$conteudo") === FALSE) 
    {
        echo "Não foi possível escrever no arquivo ($filename)";
    }
fclose($handle);
echo '<a href="'.$filename.'" target="_blank">Fazer <u>download</u> do arquivo</a>';
?>
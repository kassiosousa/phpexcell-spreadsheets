# CI PHPExcell Spreadsheets
Simples aplicação com CodeIgniter e sem banco de dados. Para leitura de arquivos .xls (Excell) gerados com Google Spreadsheets através da biblioteca PHPExcell.

## Finalidade/Motivação
Quando é necessário um cadastro rápido de informações quaisquer, a maioria das pessoas opta por fazer através de google forms. Nestes casos, é gerada uma tabela com as informações registradas. Esta tabela pode ser exportada no formato .xls (Excell). 
Esta aplicação é para estes casos, quando há muitas informações cadastradas e torna-se complexo realizar uma busca de forma individual, se você (Organizador) deseja ter um meio de consulta prático, vendo qualquer um na lista ou para disponibilizar online aos usuários registrados (Cadastrados) que desejam confirmar seus dados.

## Tecnologia
- CodeIgniter 3.1.3
- Library PHPExcell
- Google Spreadsheets

## Instalação
Necessário:
- (Recomendado) PHP Versão 5.6 ou superior 
- (Funciona) PHP Versão 5.3.7 
- Versão Excell 97-2003 para o arquivo de registros

Como?
- Basta descompactar a pasta completa do projeto onde deseja utilizar, sem necessidade de nenhuma instalação. Localmente ou em Servidor.
 
## Funcionalidades
- Input para CPF, para buscar o registro dentro da tabela.
- Tela de dados não encontrados quando o CPF não é localizado na tabela.
- Tela que lista os dados do usuário quando encontrado o CPF na tabela.
- Impressão dos dados do usuário após ter seus dados localizados através do CPF.

## Configurações
- Não há necessidade de nenhuma configuração de banco de dados, rotas ou projeto.
- Para editar os dados, basta substituir o arquivo .xls chamado "Cadastros.xls" localizado em "assets/files". Tomando o cuidado da versão que deve ser convertido para ".xls 97-2003" devido a limitações da biblioteca PHPExcell não estar lendo arquivos mais recentes.

## Exemplos

O projeto consiste basicamente em 3 telas:
- 1 Tela de captura de CPF para localização do registro na tabela.
- 2 Tela em que informa ao usuário quando não encontrar o CPF informado.
- 3 Tela de dados quando é localizado o registro na tabela através do CPF.

1º Caso, deseja-se alterar as colunas que o usuário irá visualizar.

O PHPExcell trata cada coluna da tabela como uma letra do alfabeto e de forma crescente, portanto, a primeira coluna da tabela será representada por "A".
> <?= $usuarioCarregado['A'];?> <
Com isso em mente, pode-se alterar a ordem e quais dados deverão aparecer.

2 Caso, deseja-se alterar o campo para localizar os dados.
Cada formulário poderá ter uma estruturação diferente de colunas. Visto isso, você pode editar facilmente qual coluna deseja utilizar para consulta editando os arquivos:
> controllers/Acessar.php
> views/acessar/acessar.php 
> views/acessar/dados_conta.php 

No primeiro, você deve mudar o nome da variável/coluna que deseja utilizar. Para o exemplo, vamos levar em conta que atualmente busca-se por CPF e agora deseja-se buscar por email. Então, deve-se mudar:
> <?php echo form_input(array('name'=>'cpf_usuario','id'=>'cpf_usuario', 'class'=>'input-group-field', 'style'=>'border:solid 1px #ccc', 'placeholder'=>'CPF - Somente números', 'required'=>'required')); ?> <
para
>  <?php echo form_input(array('name'=>'email_usuario','id'=>'email_usuario', 'class'=>'input-group-field', 'style'=>'border:solid 1px #ccc', 'placeholder'=>'Email cadastrado', 'required'=>'required')); ?> <

Segundo, no controller, deve-se modificar o nome da variável que está chegando.
Onde tem:
> if ($_POST['cpf_usuario']) <
deve ficar:
> if ($_POST['email_usuario']) <

Por último, deve-se alterar a visão dos dados do usuário para tratar corretamente o valor que está chegando. Levando em conta que o CPF está na coluna "C" e o email na coluna "K".
Antes, com CPF, trata retirando pontos e hífen para comparar a coluna correta:
> 		// Trata o CPF cadastrado para comparação
		$cpfFormatado = str_replace('.', '', $linha['C']);
		$cpfFormatado = str_replace('-', '', $cpfFormatado);
		if ($_POST['cpf_usuario']==$cpfFormatado) {$usuarioCarregado = $linha;} <
		
Agora, trata o email, onde deve ser idêntico:
> 		// Trata o email cadastrado para comparação
		if ($_POST['email_usuario']==$linha['K']) {$usuarioCarregado = $linha;} <

Com isso, caso o usuário esteja registrado e o dado passado esteja igual na tabela, poderemos ter essa informação na variável "$usuarioCarregado" e utiliza-la.

## Problemas
Por favor, reportar ou tirar dúvidas [Aqui](https://github.com/kassiosousa/phpexcell-spreadsheets/issues/)

## Author
[Kássio Sousa](https://kassiosousa.com.br)

## Licence
[MIT] License

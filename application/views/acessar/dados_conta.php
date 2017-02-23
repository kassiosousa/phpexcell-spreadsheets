<?php
// Leitura do arquivo Excell
$inputFileName = 'assets/files/Cadastros.xls';

// Listagem da informação se encontrada
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
//
$isCabecalho = 1;
$cabecalho = '';
$usuarioCarregado = '';
if($sheetData){
	foreach ($sheetData as $linha) {
		if ($isCabecalho) { $cabecalho = $linha; $isCabecalho = 0; }
		// Trata o CPF cadastrado para comparação
		$cpfFormatado = str_replace('.', '', $linha['C']);
		$cpfFormatado = str_replace('-', '', $cpfFormatado);
		if ($_POST['cpf_usuario']==$cpfFormatado) {$usuarioCarregado = $linha;}
	}
}

// Se encontrou o usuário
if ($usuarioCarregado) {
?>
<style>
html, body { padding-top: 0px;}
@media print {
    .top-bar { display: none; }
	.print_restante { display: none; }
}
</style>

<div style="margin-left: 15px; text-align:center;" id="print">
	<div class="small-centered column">
		<div class="input-group">
			<img src="<?php echo base_url();?>assets/img/logo_nead_preto.png" style="width: 200px;" />
		</div>
	</div>
	<h2>Dados do usuário</h2>
	<table>
		<tr>
			<th style="width: 50%">Cadastro em:</th>
			<td><?= $usuarioCarregado['A'];?>
		</tr>
		<tr>
			<th>Nome:</th>
			<td><?= $usuarioCarregado['D'];?>
		</tr>
		<tr>
			<th>Email:</th>
			<td><?= $usuarioCarregado['K'];?>
		</tr>
		<tr>
			<th>Matrícula:</th>
			<td><?= $usuarioCarregado['B'];?>
		</tr>
		<tr>
			<th>CPF:</th>
			<td><?= $usuarioCarregado['C'];?>
		</tr>
		<tr>
			<th>Nascimento:</th>
			<td><?= $usuarioCarregado['E'];?>
		</tr>
		<tr>
			<th>Cidade:</th>
			<td><?= $usuarioCarregado['F'];?>
		</tr>
		<tr>
			<th>Endereço Currículo:</th>
			<td><?= $usuarioCarregado['L'];?>
		</tr>
	</table>
	<button class="button print_restante" onclick="window.print(); return false;">Imprimir</button>
	<button class="button print_restante" onclick="location.href = '<?php echo base_url();?>';">Voltar</button>
<?php 
} else {
?>
	<h2>Usuário não encontrado, tente novamente ou entre em contato.</h2>
	<h6>Você será redirecionado em 3 segundos</h6>
<?php 
	header("refresh: 3; ".base_url()."");
?>
<?php } ?>
</div>

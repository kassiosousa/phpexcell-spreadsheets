<?php echo link_tag('assets/css/style.css'); ?>

<div class="container">
    <div class="row" style="text-align:center;">
        <!--Formulário-->
        <div class="small-centered column">
			<div class="input-group">
				<img src="<?php echo base_url();?>assets/img/logo.png" style="width: 300px;" />
			</div>
		</div>
        <?php $atributos = array("name"=>"form_acessar","id"=>"form_acessar"); echo form_open(base_url('dados-conta'), $atributos); ?>
		<fieldset>
            <legend class="text-center" style="color: #f2f2f2;">Consulte sua inscrição abaixo, informando o CPF</legend>

            <div class="input-group">
                <?php echo form_input(array('name'=>'cpf_usuario','id'=>'cpf_usuario', 'class'=>'input-group-field', 'style'=>'border:solid 1px #ccc', 'placeholder'=>'CPF - Somente números', 'required'=>'required')); ?>
                <span class="input-group-label"><i class="material-icons">person</i></span>
            </div>

            <?php echo form_submit(array('name'=>'entrar','value'=>'Entrar','class'=>'button')); ?>
        </fieldset>
        <?php form_close(); ?>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
	<meta name="color-scheme" content="light dark">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
	<title><?= $titulo_header; ?></title>
</head>
<body>
	<div class="modal-titulo">
		<?= $titulo_header; ?>
	</div>

	<!--Apenas Admin-->
	<div class="modal-tab app-row-flex">
		<a href="javascript:void(0);" onclick="modalTap(this);" class="modal-tab-link modal-tab-active" data-toggle-target=".modal-tab-content-1">Chamado</a>
		<a href="javascript:void(0);" onclick="modalTap(this);" class="modal-tab-link" data-toggle-target=".modal-tab-content-2">Ações</a>
	</div>

	<div class="modal-form">
		<!--formulário adicionar-->
		<div class="modal-tab-content modal-tab-content-1 enabled">
		<form id="form-chamado-adicionar">
			<div class="label-float">
				<input type="text" id="input_titulo" name="input_titulo" placeholder=" "/>
				<label>Titulo</label>
			</div>

			<div class="label-float">
				<select name="input_urgencia" id="input_urgencia" placeholder=" ">
					<option value="1">Alta</option>
					<option value="2">Média</option>
					<option value="3">Baixa</option>
				</select>
				<label>Urgência</label>
			</div>

			<div class="label-float">
				<textarea name="input_descricao" id="input_descricao" placeholder=" "></textarea>
				<label>Descrição</label>
			</div>
			
			<div class="label-btn">
				<!-- <button class="btn-modal btn-save"  onclick="adicionarForm('<?= base_url('espaco/formulario/adicionar'); ?>','#form-espaco-adicionar'); return false;"><i class="far fa-save"></i> Salvar</button> -->
				<!-- <button class="btn-modal btn-cancel" onclick="fecharModal();"><i class="fas fa-times"></i> Fechar</button> -->
			</div>
		</form>
		</div>



		<!--formulario acao-->
		<div class="modal-tab-content modal-tab-content-2">
		<form id="form-chamado-acao">
			<div class="label-float">
				<textarea name="input_descricao" id="input_descricao" placeholder=" "></textarea>
				<label>Descrição</label>
			</div>
		</form>
		</div>


	</div>
	
	
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>


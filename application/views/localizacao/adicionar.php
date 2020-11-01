<div id="modal-conteudo-form">
	<div class="modal-titulo">
		Adicionar Localização
	</div>
	<div class="modal-form">
		<!--formulário-->
		<form id="form-localizacao-adicionar">

			<div class="label-float">
				<select id="p_id_espaco" name="p_id_espaco">
					<option selected="selected">Selecione o Espaço</option>
					<?php foreach($lista_espaco as $info_espaco): ?>
					<option value="<?= $info_espaco['IDESPACO'] ?>"><?= $info_espaco['DESCRICAO']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="label-float">
				<input type="text" id="p_local" name="p_local" placeholder=" "/>
				<label>Localização</label>
			</div>


			<div class="label-btn">
				<button class="btn-modal btn-save" onclick="adicionarForm('<?= base_url('localizacao/formulario/adicionar'); ?>','#form-localizacao-adicionar'); return false;"><i class="far fa-save"></i> Salvar</button>
				<button class="btn-modal btn-cancel" onclick="fecharModal('localizacao/adicionar');"><i class="fas fa-times"></i> Fechar</button>
			</div>

		</form>
	</div>
</div>
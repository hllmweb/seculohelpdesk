<div id="modal-conteudo-form">
	<div class="modal-titulo">
		Adicionar Item 
		<button class="btn-modal-x btn-cancel" onclick="fecharModal();"><i class="fas fa-times"></i></button>
	</div>
	<div class="modal-form">
		<!--formulário-->
		<form id="form-item-adicionar">
			
			<a href="javascript:void(0);" class="label-float-left">
				<img src="<?= base_url('assets/images/img_error.png'); ?>">
			</a>

			<div class="label-float-right">
				<div class="label-float">
					<select id="p_id_item_grupo" name="p_id_item_grupo">
						<option selected="selected">Selecione o Grupo do Item</option>
						<?php foreach($lista_item_grupo as $info_item_grupo): ?>
						<option value="<?= $info_item_grupo['IDITEMGRUPO'] ?>"><?= $info_item_grupo['DESCRICAO']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="label-float">
					<select id="p_id_item_categoria" name="p_id_item_categoria">
						<option selected="selected">Selecione o Grupo da Categoria</option>
						<?php foreach($lista_item_categoria as $info_item_categoria): ?>
						<option value="<?= $info_item_categoria['IDCATEGORIA'] ?>"><?= $info_item_categoria['DESCRICAO']; ?></option>
						<?php endforeach; ?>
					</select>                
				</div>

				<div class="label-float">
					<select id="p_id_item_status" name="p_id_item_status">
						<option value="0" selected="selected">EM FUNCIONAMENTO</option>
						<?php foreach($lista_item_status as $info_item_status): ?>
						<option value="<?= $info_item_status['IDITEMSTATUS'] ?>"><?= $info_item_status['DESCRICAO']; ?></option>
						<?php endforeach; ?>
					</select>                
				</div>
			
			
				<div class="label-float">
					<select id="p_id_espaco_local" name="p_id_espaco_local">
						<option selected="selected">Selecione a Localização</option>
						<?php foreach($lista_localizacao as $info_localizacao): ?>
						<option value="<?= $info_localizacao['IDESPACOLOCAL'] ?>"><?= $info_localizacao['LOCAL']; ?></option>
						<?php endforeach; ?>
					</select>                
				</div>	
			

				<div class="label-float">
						<select id="p_tipo_item" name="p_tipo_item">
							<option selected="selected">Selecione o Tipo de Item</option>
							<option value="1">MATERIAL FIXO</option>
							<option value="2">MATERIAL NÃO FIXO</option>
							<option value="3">SOFTWARE</option>
						</select>
				</div>
			</div>


            <div class="label-float">
				<input type="text" id="p_descricao" name="p_descricao" placeholder=" "/>
				<label>Descrição</label>
			</div>


			<div class="label-btn">
				<button class="btn-modal btn-save" onclick="adicionarForm('<?= base_url('item/formulario/adicionar'); ?>','#form-item-adicionar'); return false;"><i class="far fa-save"></i> Salvar</button>
			</div>

		</form>
	</div>
</div>
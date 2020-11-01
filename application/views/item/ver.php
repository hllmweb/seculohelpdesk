<div id="modal-conteudo-form">
	<div class="modal-titulo">
		Visualizando Item - <span class="title-red"><?= $lista_item[0]['DESCRICAO']; ?></span>
		<button class="btn-modal-x btn-cancel" onclick="fecharModal();"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-scroll">
	<div class="modal-form">
			
			<div class="label-float-left">
                <?php if(empty($lista_item[0]['IMGPRINCIPAL'])): ?>
                <img src="<?= base_url('assets/images/img_error.png'); ?>">
                <?php else: ?>
                <img src="<?= base_url('arquivos')."/".$lista_item[0]['IMGPRINCIPAL']; ?>">
                <?php endif; ?>
            </div>

			<div class="label-float-right">
                <div class="inline-box">
                    <div class="label-float">
                        <strong>Item</strong>
                        <?= $lista_item[0]['DESCRICAO']; ?>
                    </div>

                    <div class="label-float">
                        <strong>Grupo do Item</strong>
                        <?= $lista_item_grupo[0]['DESCRICAO']; ?>
                    </div>
                    
                    <div class="label-float">
                        <strong>Grupo da Categoria</strong>
                        <?= $lista_item_categoria[0]['DESCRICAO']; ?>
                    </div>

                    <div class="label-float">
                        <strong>Status do Item</strong>
                        <?= $lista_item_status[0]['DESCRICAO']; ?>
                    </div>
                
                    <div class="label-float">
                        <strong>Local</strong>
                        <?= $lista_espaco_local[0]['LOCAL']; ?>
                    </div>	
                </div>

                <div class="inline-box">
                    <div class="label-float">
                        <strong>Tipo do Item</strong>
                        <?php
                            if($lista_item[0]['TIPOITEM'] == 1){
                                echo "MATERIAL FIXO";
                            }elseif($lista_item[0]['TIPOITEM'] == 2){
                                echo "MATERIAL NÃO FIXO";
                            }elseif($lista_item[0]['TIPOITEM'] == 3){
                                echo "SOFTWARE";
                            }
                        ?>
                    </div>
      
                    <div class="label-float">
                        <strong>Fabricante</strong>
                        <?= (!empty($lista_item[0]['IDFABRICANTE'])) ? "Nenhuma Informação" : $lista_item[0]['IDFABRICANTE']; ?>
                    </div>
          
                    <div class="label-float">
                        <strong>Data da Fabricação</strong>
                        <?php
                            $dt_fabricacao = new DateTime($lista_item[0]['DTFABRICACAO']);
                            echo $dt_fabricacao->format('d/m/Y');
                        ?>
                    </div>
          
                    <div class="label-float">
                        <strong>Patrimonio</strong>
                        <?= (!empty($lista_item[0]['IDPATRIMONIO'])) ? "-" : $lista_item[0]['IDPATRIMONIO']; ?>
                    </div>
                    
                    <div class="label-float">
                        <strong>Data da Compra</strong>
                        <?php 
                            $dt_compra = new DateTime($lista_item[0]['DTCOMPRA']);
                            echo $dt_compra->format('d/m/Y');
                        ?>
                    </div>

                </div>

			</div>
              
            <div class="inline-box">
                <div class="label-float">
                    <strong>Data da Compra</strong>
                    <?php 
                        $dt_compra = new DateTime($lista_item[0]['DTCOMPRA']);
                        echo $dt_compra->format('d/m/Y');
                    ?>
                </div>
                
                <div class="label-float">
                    <strong>Valor da Compra</strong>
                    <?= (!empty($lista_item[0]['VALORCOMPRA'])) ? "-" : $lista_item[0]['VALORCOMPRA']; ?>
                </div>

                <div class="label-float">
                    <strong>Nota Fiscal</strong>
                    <?= (!empty($lista_item[0]['NOTAFISCAL'])) ? "-" : $lista_item[0]['NOTAFISCAL']; ?>
                </div>
                
                <div class="label-float">
                    <strong>Data do fim da Garantia</strong>
                    <?= (!empty($lista_item[0]['DTFIMGARANTIA'])) ? "-" : $lista_item[0]['DTFIMGARANTIA']; ?>
                </div>
            </div>

            <div class="inline-box">
                <div class="label-float">
                    <strong>Observação</strong>
                    <?= (!empty($lista_item[0]['OBSERVACAO'])) ? "-" : $lista_item[0]['OBSERVACAO']; ?>
                </div>
            </div>
        
			<!-- <div class="label-btn">
				<button class="btn-modal btn-save" onclick="adicionarForm('<?= base_url('item/formulario/adicionar'); ?>','#form-item-adicionar'); return false;"><i class="far fa-save"></i> Salvar</button>
			</div> -->

    </div>
    </div>
</div>
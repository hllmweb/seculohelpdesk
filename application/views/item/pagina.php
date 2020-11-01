<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
        <meta name="color-scheme" content="light dark">
        <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
        <title>Seculo Pass - <?= $titulo; ?></title>
    </head>
    <body>
        <div class="app-main">
            <div class="app-header">
                <div class="app-header-title">
                    <a href="<?= base_url(''.$titulo_header['espaco'].''); ?>" class="app-header-link">Espaço</a> / 
                    <a href="<?= base_url(''.$titulo_header['localizacao'].''); ?>" class="app-header-link">Localização</a> /
                    <a href="<?= base_url(''.$titulo_header['item'].'') ?>" class="app-header-link active">Item</a>
                </div>
            </div>
            <div class="app-content">
                <!--search-->
                <div class="app-search">
                    <input type="text" placeholder="Pesquisar..." class="input-search">
                    <button class="btn-search"><i class="fas fa-search"></i></button>
                </div>

                <!--menu list-->
                <div class="app-menu" id="app-menu-page-1">
                    <?= $info_mensagem; ?>
                    <?php 
                        $id_categoria = "";
                        $id_item      = "";
                        foreach($lista_item_geral as $info_item):  
                            if($info_item['IDCATEGORIA'] != $id_categoria && !empty($info_item['CATEGORIA'])):                      
                    ?>
                    <a href="javascript:void(0);" id="<?= $info_item['IDCATEGORIA'] ?>" data-item="<?= $info_item['IDITEM']; ?>" onclick="abrirToggle(this);" class="app-menu-link">
                        <i class="fas fa-chevron-down"></i> <?= $info_item['CATEGORIA']; ?>
                    </a>
                    <?php 
                            endif;                                                
                            $id_categoria    = $info_item['IDCATEGORIA'];
                            if($info_item['IDITEM'] != $id_item):
                    ?>
                    <div id="<?= $info_item['IDCATEGORIA'] ?>" data-item="<?= $info_item['IDITEM']; ?>" onclick="abrirSubToggle(this);" class="app-toggle">
                        <div class="app-title-item"> 
                            <?= $info_item['ITEM']; ?>
                            <button onclick="abrirModal('modal-corpo-grande', '<?= base_url() ?>item/pagina/ver/<?= $info_item['IDITEM']; ?>');" class="btn-info"><i class="fas fa-info"></i></button>
                        </div> 
                        <div class="label-box">
                            <div class="inline">
                                <div class="label-box-info">
                                    <strong>Categoria</strong>
                                    Info da Categoria Blabal
                                </div>

                                <div class="label-box-info">
                                    <strong>Categoria</strong>
                                    Info da Categoria Blabal
                                </div>   
                            </div>
                            <div class="inline">
                                <?= $info_item['IMGPRINCIPAL']; ?>    
                                <?php if(!empty($info_item['IMGPRINCIPAL'])): ?>
                                <img src="<?= base_url('assets/images/img_error.png'); ?>" class="app-img-item">
                                <?php else: ?>
                                <img src="<?= base_url('arquivos')."/".$info_item['IMGPRINCIPAL']; ?>" class="app-img-item">
                                <?php endif; ?>
                                <button onclick="abrirModal('modal-corpo-grande', '<?= base_url() ?>componente/formulario/index/<?= $info_item['IDITEM']; ?>');" class="btn-add"><i class="fas fa-plus"></i> Adicionar Componente</button>
                            </div>
                        </div>
                        
                                
                    </div>
                    <?php
                            endif;
                            $id_item         = $info_item['IDITEM'];
                            if(!empty($info_item['IDITEMCOMPONENTE'])):
                    ?>
                    <div href="javascript:void(0);" id="componente_<?= $info_item['IDITEM'];?>" class="app-toggle app-sub-toggle">
                        <div class="app-toggle-describer">
                            <div class="app-flex">
                                <div class="app-item">
                                    <div class="inline">
                                        <?php if(!empty($info_item['ID'])): ?>
                                        <p><?= $info_item['COMPONENTE']; ?></p>
                                        <p>Acesso: <?= $info_item['ID']; ?></p>
                                        <p>Senha: <?= $info_item['CH'] ?></p>
                                        <?php endif; ?>

                                        <?php if(!empty($info_item['OBSERVACAO'])): ?>
                                        <p>Observação: <?= $info_item['OBSERVACAO']; ?></p>
                                        <?php endif; ?>                           
                                    </div>
                                    <div class="inline">
                                        <label for="upload">
                                            <img src="<?= base_url('assets/images/img_error.png'); ?>" class="app-img-item">
                                           
                                            <input type="file" id="upload" class="input-file">
                                        </label>
                                    </div>
                                    <button class="btn-toggle btn-edit"><i class="far fa-edit"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            endif;
                        endforeach;  
                    ?>
                </div>
            </div>

            <div class="button-float-right"><a href="javascript:void(0);" onclick="abrirModal('modal-corpo-grande', '<?= base_url() ?>item/formulario/index');" class="btn btn-success"><i class="fas fa-plus"></i></a></div>
        </div>


        <!--modal ou popup-->
        <div id="modal" class="modal-geral">
            <div id="modal-tamanho">
                <div id="modal-conteudo"></div>
            </div>
        </div>

        <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/main.js') ?>"></script>
    </body>
</html>
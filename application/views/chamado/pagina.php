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
        <title>Seculo - HelpDesk</title>
    </head>
    <body>
        <div class="app-main">
            <div class="app-header"><div class="app-header-title"><?= $titulo_header; ?></div></div>
            <div class="app-content">
                <!--search-->
                <div class="app-search">
                    <input type="text" placeholder="Pesquisar..." class="input-search">
                    <button class="btn-search"><i class="fas fa-search"></i></button>
                </div>

                <!--menu list-->
                <div class="app-menu" id="app-menu-page-1">
                    <a href="#" class="app-menu-link">
                        <div class="app-row-flex">
                            <div class="width-auto text-left font-10">
								<strong>Titulo</strong>
								<span>{TITULO DO CHAMADO #01}</span>
                            </div>
                            
                            <div class="width-auto text-left font-10">
								<!-- <strong>Titulo</strong> -->
								<span><button class="btn-modal btn-success">{STATUS}</button></span>
                            </div>

                            <div class="width-auto text-left font-10">
								<strong>Última Atualização</strong>
								<span>{00/00/00 00:00}</span>
                            </div>
                            
                            <div class="width-auto text-left font-10">
								<strong>Data de Abertura</strong>
								<span>{00/00/00 00:00}</span>
                            </div>
                        </div>    
                    </a>


                    <a href="#" class="app-menu-link">
                        <div class="app-row-flex">
                            <div class="width-auto text-left font-10">
								<strong>Titulo</strong>
								<span>{TITULO DO CHAMADO #01}</span>
                            </div>
                            
                            <div class="width-auto text-left font-10">
								<!-- <strong>Titulo</strong> -->
								<span><button class="btn-modal btn-success">{STATUS}</button></span>
                            </div>

                            <div class="width-auto text-left font-10">
								<strong>Última Atualização</strong>
								<span>{00/00/00 00:00}</span>
                            </div>
                            
                            <div class="width-auto text-left font-10">
								<strong>Data de Abertura</strong>
								<span>{00/00/00 00:00}</span>
                            </div>
                        </div>    
                    </a>


                </div>
            </div>

            <div class="button-float-right"><a href="<?= base_url('chamado/pagina/adicionar') ?>" class="btn btn-success"><i class="fas fa-plus"></i></a></div>
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
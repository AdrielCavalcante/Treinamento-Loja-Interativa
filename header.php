<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                    ?>
                        <span style="font-family: 'Squada One', saens-serif">18° SEMANA NACIONAL DE CIÊNCIA <br> E TECNOLOGIA FIOCRUZ 2021</span>
                    <?php
                    }
                    ?>
                    <div class="d-flex flex-column">
                        <div class="row d-leg-flex">
                            <div class="d-flex justify-content-end">
                                <div class="d-lg-block">
                                    <div class="pular-conteudo box-top d-flex align-items-center mt-3 mt-lg-0 py-2 py-lg-0 mr-3 h-100">
                                        <a href="#">
                                            icon
                                            <strong>PULAR PARA CONTEÚDO</strong>
                                        </a>
                                    </div>
                                </div>
                                <div class="box-top na-web d-flex mr-3 align-items-center">
                                    <strong>NA WEB</strong>
                                    <a href="#">link das redes</a>
                                </div>
                                <div class="box-top texto-size d-flex align-items-baseline mr-3 mt-3 mt-lg-0">
                                    <strong>TEXTO</strong>
                                    <div>
                                        3 icon
                                    </div>
                                </div>
                                <div class="box-top alto-contraste d-flex align-items-center mt-3 mt-lg-0 py-2 py-lg-0">
                                    <a href="#">Contraste</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <?php wp_nav_menu(array('theme_location' => 'main-menu', 'depth' => 2, 'menu_class' => 'navbar-nav')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
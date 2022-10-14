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
                <div class="container">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                    ?>
                        <span style="font-family: 'Squada One', saens-serif">18° SEMANA NACIONAL DE CIÊNCIA <br> E TECNOLOGIA FIOCRUZ 2021</span>
                    <?php
                    }
                    ?>
                    
                    <button class="navbar-toggler" style="width: 4rem;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" style="width: 100vw" id="navbarSupportedContent">
                    <div class="d-flex flex-column" id="top-menu">
                        <div class="row d-leg-flex">
                            <div class="d-flex justify-content-end">
                                <div class="box-top align-items-center">
                                    <strong>NA WEB</strong>
                                    <a href="#"><i style="margin-top: .45rem;" class="fab fa-twitter"></i></a>
                                    <a href="#"><i style="margin-top: .45rem;" class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i style="margin-top: .45rem;" class="fab fa-instagram"></i></a>
                                    <a href="#"><i style="margin-top: .45rem;" class="fab fa-youtube"></i></a>
                                </div>
                                <div class="box-top align-items-baseline">
                                    <strong>TEXTO</strong>
                                    <div>
                                        <span style="color: #05C6B7; font-size: 0.75rem">A</span>
                                        <span style="color: #05C6B7; font-size: 1rem">A</span>
                                        <span style="color: #05C6B7; font-size: 1.25rem">A</span>
                                    </div>
                                </div>
                                <div class="box-top alto-contraste align-items-center">
                                    <i class="fas fa-adjust" style="color: #05C6B7"></i>
                                    <strong>ALTO CONTRASTE</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <?php wp_nav_menu(array('theme_location' => 'main-menu', 'depth' => 2, 'menu_class' => 'navbar-nav', 'container' => false)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
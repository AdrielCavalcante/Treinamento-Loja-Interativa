<?php

define("THEME_URL", get_stylesheet_directory_uri());
define("THEME_DIR", get_stylesheet_directory());

require_once get_template_directory() . '/inc/customizer.php';

//script ou style
function registro_script() {
    //style PAI
    wp_register_style("pai_style", THEME_URL . "/style.css?rand=" . rand(10, 10000), [
        // Deixei as dependencias vazias, porque não carregava o css antes, ex: bootstrap
    ]);
}

add_action('init', function () {
    registro_script();
});

function init_scripts() {
    wp_enqueue_style('pai_style');
}

add_action('wp_enqueue_scripts', 'init_scripts', 10);

function configs(){
    register_nav_menus(
        array(
            'main-menu' => 'Main Menu'
        )
    );

    $args = array(
        'height' => 480,
        'width' => 1350
    );

    add_theme_support('custom-header', $args);
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 210,
        'flex-height' => true,
        'flex-width' => true
    ));
}

add_action('after_setup_theme', 'configs', 0); //prioridade max

add_filter('nav_menu_link_attributes', 'add_class_to_anchor', 10, 3);

function add_class_to_anchor($atts, $item, $args)
{
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}


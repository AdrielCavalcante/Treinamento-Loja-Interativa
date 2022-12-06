<?php

define("THEME_URL", get_stylesheet_directory_uri());
define("THEME_DIR", get_stylesheet_directory());

//script ou style
function registro_script() {

    wp_register_style("fontawesome", "https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css");

    //style PAI
    wp_register_style("pai_style", THEME_URL . "/style.css?rand=" . rand(10, 10000), [
        'fontawesome'
    ]);

    wp_register_script('bootstap', THEME_URL . "/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js");
    wp_register_script('Vue', THEME_URL . "/js/vue.global.js");
    wp_register_script('vue-app', THEME_URL . "/js/app.js", 'Vue');
    wp_register_script('axios', THEME_URL . "/node_modules/axios/dist/axios.min.js", 'Vue');
    wp_register_script('pai_script', THEME_URL . "/js/index.js?rand=" . rand(10, 10000), [
        'Vue',
        'vue-app',
        'axios',
        'bootstap'
    ]);


}

add_action('init', function () {
    registro_script();
});

function init_scripts() {
    wp_enqueue_style('pai_style');
    wp_enqueue_script('pai_script');
}

add_action('wp_enqueue_scripts', 'init_scripts', 10);

function configs(){
    register_nav_menus(
        array(
            'main-menu' => 'Main Menu',
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
add_filter('nav_menu_css_class', 'add_class_to_li', 10, 3);

function add_class_to_anchor($atts, $item, $args)
{
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

function add_class_to_li($atts, $item, $args)
{
    $class = 'nav-item'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

add_action('wp_head', 'site_wp_head');

function site_wp_head()
{
    echo sprintf("<script>var siteurl = '%s'; var current_post_id = '%s'</script>", get_option('siteurl'), get_the_ID());

}

add_action('rest_api_init', 'restApiConvidados');

add_action('rest_api_init', 'restApiEventos');

function restApiConvidados()
{
    register_rest_route('api/v1', 'convidados', [
        'methods' => ['GET'],
        'callback' => 'convidados_posts',
        'permission_callback' => '__return_true',
    ]);
}

function restApiEventos()
{
    register_rest_route('api/v1', 'eventos', [
        'methods' => ['GET'],
        'callback' => 'eventos_posts',
        'permission_callback' => '__return_true',
    ]);
}

/**
 * @param $request WP_REST_Request
 *
 * @return WP_REST_Response
 */
function convidados_posts($request)
{
    $params = $request->get_params();

    $paged = !empty($params['paged']) ? $params['paged'] : 1;

    $args = [
        'paged' => $paged,
        'post_type' => 'convidados', 'posts_per_page' => 5
    ];

    $query = new WP_Query($args);

    $post = [];
    $count = 0;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post[$count]['id'] = get_the_ID();
            $post[$count]['title'] = get_the_title();
            $post[$count]['conteudo'] = get_the_content();
            $post[$count]['nome'] = get_field('nome');
            $post[$count]['fotoConvidado'] = get_field('fotoConvidado');
            $post[$count]['evento'] = get_field('evento');
            $count++;
        }

        wp_reset_postdata();
        return new WP_REST_Response(['success' => true, 'posts' => $post, 'request' => $params, 'maxpages' => $query->max_num_pages]
            , 200);
    } else {
        return new WP_REST_Response(['success' => false, 'posts' => $post, 'request' => $params], 200);
    }
}

/**
 * @param $request WP_REST_Request
 *
 * @return WP_REST_Response
 */
function eventos_posts($request)
{

    $params = $request->get_params();

    $paged = !empty($params['paged']) ? $params['paged'] : -1;

    $args = [
        'paged' => $paged,
        'post_type' => 'eventos', 'posts_per_page' => 8
    ];

    $query = new WP_Query($args);

    $post = [];
    $count = 0;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post[$count]['id'] = get_the_ID();
            $post[$count]['title'] = get_the_title();
            $post[$count]['conteudo'] = get_the_content();
            $post[$count]['titulo'] = get_field('titulo');
            $post[$count]['descricao'] = get_field('descricao');
            $post[$count]['embed'] = get_field('embed');
            $post[$count]['dataHora'] = get_field('dataHora');
            $post[$count]['horario'] = get_field('horario');
            $post[$count]['localizacao'] = get_field('localizacao');
            $count++;
        }

        wp_reset_postdata();
        return new WP_REST_Response(['success' => true, 'posts' => $post, 'request' => $params], 200);
    } else {
        return new WP_REST_Response(['success' => false, 'posts' => $post, 'request' => $params], 200);
    }
}
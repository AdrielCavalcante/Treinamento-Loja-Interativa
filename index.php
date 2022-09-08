<?php get_header(); 

$hero_title = get_theme_mod( 'set_hero_title', __( 'A transversalidade da ciência, tecnologia e inovações para o planeta.', 'wp-fiocruz' ) );
$hero_button_link = get_theme_mod( 'set_hero_button_link', '#' );
$hero_button_text = get_theme_mod( 'set_hero_button_text', __( 'CONFIRA A PROGRAMAÇÃO', 'wp-fiocruz' ) );
$hero_background = wp_get_attachment_url( get_theme_mod( 'set_hero_background' ) );

?>

<main class="container-fluid">
    <div class="hero" style="background-image: url('<?php echo esc_url( $hero_background ) ?>');">
        <h1> <?php echo esc_html( $hero_title ); ?></h1>
        <button class="btn"> <?php echo esc_html( $hero_button_text ); ?> </button>
    </div>
    <div class="contador">

        <div class="d-flex flex-column align-items-center">
            <strong>21</strong>
            <span>Dias</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>14</strong>
            <span>Horas</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>16</strong>
            <span>Minutos</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>25</strong>
            <span>Segundos</span>
        </div>
    </div>
    <section class="container d-flex" id="apresentacao">
        <img src="" alt="">

    </section>
</main>

<?php get_footer(); ?>
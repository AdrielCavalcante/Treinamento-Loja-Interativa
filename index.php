<?php get_header(); 

$hero_title = get_theme_mod( 'set_hero_title', __( 'A transversalidade da ciência, tecnologia e inovações para o planeta.', 'wp-fiocruz' ) );
$hero_button_link = get_theme_mod( 'set_hero_button_link', '#' );
$hero_button_text = get_theme_mod( 'set_hero_button_text', __( 'CONFIRA A PROGRAMAÇÃO', 'wp-fiocruz' ) );
$hero_background = wp_get_attachment_url( get_theme_mod( 'set_hero_background' ) );

?>

<main class="container-fluid">

    <div class="hero" style="background-image: url('<?php echo esc_url( $hero_background ); ?>');">
        <h1 style="text-align: left;"> <?php echo esc_html( $hero_title ); ?></h1>
        <button class="btn"> <?php echo esc_html( $hero_button_text ); ?> </button>
    </div>
    <div class="contador" id="contador">
        <div class="d-flex flex-column align-items-center">
            <strong>{{ days }}</strong>
            <span>Dias</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>{{ hours }}</strong>
            <span>Horas</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>{{ minutes }}</strong>
            <span>Minutos</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>{{ seconds }}</strong>
            <span>Segundos</span>
        </div>
    </div>
    <section class="container" id="apresentacao">
        <article class="col-md-6">
            <img src="http://fiocruz.local/wp-content/uploads/2022/09/img-apresentacao-nova.jpeg" alt="img n carregou" width="1200">
        </article>
        <article class="col-md-6">
            <h2>FIOCRUZ NA SEMANA NACIONAL DE CIÊNCIA E TECNOLOGIA</h2>
            <p>A SNCT 2021 na Fiocruz vai discutir “A transversalidade da ciência, tecnologia e inovações para o planeta”, em uma série de atividades on-line durante o mês de outubro. O objetivo do evento é mobilizar a comunidade da instituição, incluindo escolas e organizações civis que atuam em parceria com a Fiocruz; e fortalecer nosso compromisso com a promoção em saúde, preservação do ambiente e defesa da ciência para o desenvolvimento do país. Entre os dias 4 e 8 de outubro, teremos programações ao vivo diariamente, que vão desde debates técnico-científicos a apresentações culturais. Posteriormente, ao longo do mês, uma série de conteúdos gravados inéditos serão lançados.</p>
            <button class="btn">SAIBA MAIS SOBRE A SEMANA</button>
        </article>
    </section>
    <section id="inscricao">
        <h1>INSCRIÇÃO</h1>
        <p>As inscrições devem ser realizadas na plataforma Even3. Para acessá-la, basta clicar no botão abaixo. Inscreva-se como ouvinte a partir do dia 20/09 para receber os informes e o certificado de participação do evento. Qualquer pessoa pode se inscrever de forma totalmente gratuita! Para quem deseja participar dos jogos e oficinas da programação ao vivo, a inscrição como ouvinte é obrigatória para acesso à sala do Zoom. Os certificados para ouvintes, proponentes e colaboradores do evento vão estar disponíveis na plataforma a partir de novembro.</p>
        <button class="btn">INSCREVA-SE</button>
        <article>
            <a href="#">Link Complementar 01</a>
            <a href="#">Link Complementar 02</a>
            <a href="#">Link Complementar 03</a>
        </article>
    </section>
    <section id="convidados" class="container">
        <h1>CONVIDADOS</h1>
        <!-- LOOP DE POST DOS CONVIDADOS COM AJAX -->
        <div class="row">
            <div class="col-2" style="margin: 0 1rem;" v-for="(post,index) in posts">

                <a data-bs-toggle="modal" :data-bs-target="'#modal-'+index" href="#" v-html="post.title"></a>

<!-- Modal -->
<div class="modal fade" :id="'modal-'+index" tabindex="-1" :aria-labelledby="'modal-'+index"
        aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" v-html="post.title"></h5>
                <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
            </div>
            <div class="modal-body" v-html="post.conteudo"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>

        <div v-if="show" class="row">
            <div class="col-12" style="text-align: center;">
                <button @click="loadMore()" class="btn btn-primary">CARREGAR MAIS</button>
            </div>
        </div>

    </div>
    </section>
    <section id="programacao" class="container">
        <h1>PROGRAMAÇÃO AO VIVO</h1>

        <!-- LOOP DE POST DOS PROGRAMAS COM PAGINACAO E BUSCA EM AJAX -->
    </section>
</main>

<?php get_footer(); ?>
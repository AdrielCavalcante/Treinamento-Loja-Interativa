<?php get_header(); 

$hero_title = get_field('titulo');
$hero_button_text = get_field('textButton');
$hero_background = get_field('bannerBackground');

?>

<main class="container-fluid">

    <div class="hero" style="background-image: url('<?php echo esc_url( $hero_background ); ?>');">
        <h1 style="text-align: left;"> <?php echo esc_html( $hero_title ); ?></h1>
        <button class="btn"> <?php the_field('textButton'); ?> </button>
    </div>
    <div class="contador" id="contador">
        <div class="d-flex flex-column align-items-center">
            <strong>{{ days }}</strong>
            <span>DIAS</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>{{ hours }}</strong>
            <span>HORAS</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>{{ minutes }}</strong>
            <span>MINUTOS</span>
        </div>
        <div class="d-flex flex-column align-items-center">
            <strong>{{ seconds }}</strong>
            <span>SEGUNDOS</span>
        </div>
    </div>
    <section class="container" id="apresentacao">
        <article class="col-md-6">
            <img src="http://fiocruz.local/wp-content/uploads/2022/09/img-apresentacao-nova.jpeg" alt="img n carregou" width="1200">
        </article>
        <article class="col-md-6">
            <h2>AQUI ENTRA A FRASE DE APRESENTAÇÃO</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, in? Accusantium vel magnam quo omnis veniam dolorem suscipit, maxime quasi saepe rerum illum totam nesciunt possimus commodi sed pariatur non? Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque totam neque officiis perspiciatis obcaecati voluptas veritatis inventore eos soluta nemo, rerum quibusdam repellat laudantium quis tempora explicabo laboriosam vel praesentium?.</p>
            <button class="btn">SAIBA MAIS SOBRE A SEMANA</button>
        </article>
    </section>
    <section id="inscricao">
        <h1>INSCRIÇÃO</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto facilis inventore qui cum unde repudiandae rem assumenda neque tenetur enim asperiores tempora, laboriosam iste? Modi qui fugit harum aliquam impedit?.</p>
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
        <i class="fas fa-search"></i>
        <i class="far fa-plus-circle"></i>
        <i class="far fa-clock"></i>
        <i class="fas fa-map-marker-alt"></i>
        <!-- LOOP DE POST DOS PROGRAMAS COM PAGINACAO E BUSCA EM AJAX -->
    </section>
</main>

<?php get_footer(); ?>
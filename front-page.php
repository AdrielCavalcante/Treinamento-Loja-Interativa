<?php get_header(); 

$hero_title = get_field('titulo');
$hero_button_text = get_field('textButton');
$hero_background = get_field('bannerBackground');

?>

<main class="container-fluid">

    <div class="hero" style="background-image: url('<?php echo esc_url( $hero_background ); ?>');">
        <h1 style="text-align: left; text-transform: uppercase;"> <?php echo esc_html( $hero_title ); ?></h1>
        <button class="btn" style="text-transform: uppercase;"> <?php the_field('textButton'); ?> </button>
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
        <div class="row justify-content-evenly">
            <div class="col-xl-2 col-lg-3 col-md-4" style="margin: 0 1rem;" v-for="(post, index) in posts">

                <a data-bs-toggle="modal" @click="EventData(post.evento)" :data-bs-target="'#modal-'+index" href="#">
                    <div class="card">
                        <img :src="post.fotoConvidado" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" v-html="post.nome"></h5>
                            <small><i class="far fa-plus-circle"></i> Ver Programação</small>
                        </div>
                    </div>
                </a>

<!-- Modal convidados-->
<div class="modal fade" :id="'modal-'+index" tabindex="-1" :aria-labelledby="'modal-'+index"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content eventoModal" style="padding: 1.75rem;">
            <div class="modal-header" style="padding: 0; border-bottom: 0;">
                <h5 class="modal-title" id="exampleModalLabel">{{ evento.titulo }}</h5>
                <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="ratio ratio-16x9">
                    <iframe :src="evento.embed" title="Veja o vídeo do evento" allowscriptaccess="always" allow="autoplay" allowfullscreen></iframe>
                </div>
                <p style="color: #555; margin-bottom: 2rem;">{{ evento.descricao }}</p>
                <strong style="font-family: 'Squada one'">Youtube e Canal de TV Canal Saúde</strong>
            </div>
            <div class="modal-footer justify-content-start" style="padding: 0; gap: 1.5rem; color: #4f4f4f; border-color: #10277c; margin-bottom: 0;">
                <span><i class="fas fa-calendar-alt"></i> {{ evento.dataHora }}</span>
                <span><i class="fas fa-map-marker-alt"></i> {{ evento.localizacao }}</span>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>

        <div v-if="show" class="row">
            <div class="col-12" style="text-align: center;">
                <button @click="loadMore()" class="btn btn-primary carregar">CARREGAR MAIS</button>
            </div>
        </div>

    </section>
    <section id="programacao" class="container">
        <h1>PROGRAMAÇÃO AO VIVO</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" :class="active == 17 ? 'active' : ''" aria-current="page" style="cursor: pointer;" @click="getDayProgramacao(17)">SEGUNDA, 17</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" :class="active == 18 ? 'active' : '' " aria-current="page" style="cursor: pointer;" @click="getDayProgramacao(18)">TERÇA, 18</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" :class="active == 19 ? 'active' : '' " aria-current="page" style="cursor: pointer;" @click="getDayProgramacao(19)">QUARTA, 19</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" :class="active == 20 ? 'active' : '' " aria-current="page" style="cursor: pointer;" @click="getDayProgramacao(20)">QUINTA, 20</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" :class="active == 21 ? 'active' : '' " aria-current="page" style="cursor: pointer;" @click="getDayProgramacao(21)">SEXTA, 21</a>
            </li>
        </ul>
        <div class="d-flex" style="margin: 1rem 0; gap: 2rem;">
            <div style="width: 50%;">
                <div class="input-group">
                    <input type="text" v-model="message" @change="search(message)" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" @click="search(message)" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div style="width: 50%;">
                <select class="form-select" @change="select(localizacao)" v-model="localizacao" aria-label="As unidades">
                    <option value="">Todas as unidades</option>
                    <option value="Instituto de Comunicação e Informação Científica e Tecnológica em Saúde">Instituto de Comunicação e Informação Científica e Tecnológica em Saúde</option>
                    <option value="Instituto do Teste">Instituto do Teste</option>
                </select>
            </div>
        </div>
        <div v-if="filtered">
            <div  id="programacaoEvento">
                <div class="row" v-if="postsFiltrados.length != 0">
                    <div class="col-6" v-for="(post, index) in postsFiltrados">
                        <div class="card" style="padding: 1rem; border-radius: 12px;">
                            <div class="row" style="gap: 1.25rem; min-height: 10rem;">
                                <div class="col-1" style="padding: 0 .5rem;">
                                    <button data-bs-toggle="modal" @click="selectedPost(post.id)" :data-bs-target="'#modal2-'+index" style="cursor: pointer; height: 100%;"><i class="far fa-plus-circle"></i> Saiba Mais</button>
                                </div>
                                <div class="col-10">
                                    <a data-bs-toggle="modal" @click="selectedPost(post.id)" :data-bs-target="'#modal2-'+index" style="cursor: pointer;" >{{post.titulo}}</a>
                                    <hr>
                                    <div class="row" style="font-size: .95rem; color: #4f4f4f;">
                                        <div class="col-4">
                                            <span><i class="far fa-clock"></i> {{post.horario}}</span>
                                        </div>
                                        <div class="col-8">
                                            <span><i class="fas fa-map-marker-alt"></i> {{post.localizacao}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal - programacao ao vivo -->
        <div class="modal fade" :id="'modal2-'+index" tabindex="-1" :aria-labelledby="'modal2-'+index"
                aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content eventoModal" style="padding: 1.75rem;">
                    <div class="modal-header" style="padding: 0; border-bottom: 0;">
                        <h5 class="modal-title" id="exampleModalLabel">{{ evento.titulo }}</h5>
                        <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
                    </div>
                    <div class="modal-body" style="padding: 0;">
                        <div class="ratio ratio-16x9">
                            <iframe :src="evento.embed" title="Veja o vídeo do evento" allowscriptaccess="always" allow="autoplay" allowfullscreen></iframe>
                        </div>
                        <p style="margin-bottom: 2rem;">{{ evento.descricao }}</p>
                        <strong style="font-family: 'Squada one';">Youtube e Canal de TV Canal Saúde</strong>
                    </div>
                    <div class="modal-footer justify-content-start" style="padding: 0; gap: 1.5rem; border-color: #10277c; margin-bottom: 0;">
                        <span><i class="fas fa-calendar-alt"></i> {{ evento.dataHora }}</span>
                        <span><i class="fas fa-map-marker-alt"></i> {{ evento.localizacao }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div v-else>
    <div class="col-12">
        <h5 style="text-align: center;">Não há eventos para esse filtro</h5>
    </div>
</div>
            </div>    
        </div>
        <div v-else-if="pressed">
            <div  id="programacaoEvento">
                <div class="row" v-if="postsDia.length != 0">
                    <div class="col-6" v-for="(post, index) in postsDia">
                        <div class="card" style="padding: 1rem; border-radius: 12px;">
                            <div class="row" style="gap: 1.25rem; min-height: 10rem;">
                                <div class="col-1" style="padding: 0 .5rem;">
                                    <button data-bs-toggle="modal" @click="selectedPost(post.id)" :data-bs-target="'#modal2-'+index" style="cursor: pointer; height: 100%;"><i class="far fa-plus-circle"></i> Saiba Mais</button>
                                </div>
                                <div class="col-10">
                                    <a data-bs-toggle="modal" @click="selectedPost(post.id)" :data-bs-target="'#modal2-'+index" style="cursor: pointer;" >{{post.titulo}}</a>
                                    <hr>
                                    <div class="row" style="font-size: .95rem;">
                                        <div class="col-4">
                                            <span><i class="far fa-clock"></i> {{post.horario}}</span>
                                        </div>
                                        <div class="col-8">
                                            <span><i class="fas fa-map-marker-alt"></i> {{post.localizacao}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal - programacao ao vivo -->
        <div class="modal fade" :id="'modal2-'+index" tabindex="-1" :aria-labelledby="'modal2-'+index"
                aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content eventoModal" style="padding: 1.75rem;">
                    <div class="modal-header" style="padding: 0; border-bottom: 0;">
                        <h5 class="modal-title" id="exampleModalLabel">{{ evento.titulo }}</h5>
                        <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
                    </div>
                    <div class="modal-body" style="padding: 0;">
                        <div class="ratio ratio-16x9">
                            <iframe :src="evento.embed" title="Veja o vídeo do evento" allowscriptaccess="always" allow="autoplay" allowfullscreen></iframe>
                        </div>
                        <p style="margin-bottom: 2rem;">{{ evento.descricao }}</p>
                        <strong style="font-family: 'Squada one';">Youtube e Canal de TV Canal Saúde</strong>
                    </div>
                    <div class="modal-footer justify-content-start" style="padding: 0; gap: 1.5rem; border-color: #10277c; margin-bottom: 0;">
                        <span><i class="fas fa-calendar-alt"></i> {{ evento.dataHora }}</span>
                        <span><i class="fas fa-map-marker-alt"></i> {{ evento.localizacao }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div v-else>
    <div class="col-12">
        <h5 style="text-align: center;">Não há eventos para esse dia</h5>
    </div>
</div>
            </div>    
        </div>
        <div v-else>
        <div  id="programacaoEvento">
            <div class="row" v-if="posts.length != 0">
                <div class="col-6" v-for="(post, index) in posts">
                    <div class="card" style="padding: 1rem; border-radius: 12px;">
                        <div class="row" style="gap: 1.25rem; min-height: 10rem;">
                            <div class="col-1" style="padding: 0 .5rem;">
                                <button data-bs-toggle="modal" @click="selectedPost(post.id)" :data-bs-target="'#modal2-'+index" style="cursor: pointer; height: 100%;"><i class="far fa-plus-circle"></i> Saiba Mais</button>
                            </div>
                            <div class="col-10">
                                <a data-bs-toggle="modal" @click="selectedPost(post.id)" :data-bs-target="'#modal2-'+index" style="cursor: pointer;" >{{post.titulo}}</a>
                                <hr>
                                <div class="row" style="font-size: .95rem;">
                                    <div class="col-4">
                                        <span><i class="far fa-clock"></i> {{post.horario}}</span>
                                    </div>
                                    <div class="col-8">
                                        <span><i class="fas fa-map-marker-alt"></i> {{post.localizacao}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal - programacao ao vivo -->
    <div class="modal fade" :id="'modal2-'+index" tabindex="-1" :aria-labelledby="'modal2-'+index"
            aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content eventoModal" style="padding: 1.75rem;">
                <div class="modal-header" style="padding: 0; border-bottom: 0;">
                    <h5 class="modal-title" id="exampleModalLabel">{{ evento.titulo }}</h5>
                    <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
                </div>
                <div class="modal-body" style="padding: 0;">
                    <div class="ratio ratio-16x9">
                        <iframe :src="evento.embed" title="Veja o vídeo do evento" allowscriptaccess="always" allow="autoplay" allowfullscreen></iframe>
                    </div>
                    <p style="margin-bottom: 2rem;">{{ evento.descricao }}</p>
                    <strong style="font-family: 'Squada one';">Youtube e Canal de TV Canal Saúde</strong>
                </div>
                <div class="modal-footer justify-content-start" style="padding: 0; gap: 1.5rem; border-color: #10277c; margin-bottom: 0;">
                    <span><i class="fas fa-calendar-alt"></i> {{ evento.dataHora }}</span>
                    <span><i class="fas fa-map-marker-alt"></i> {{ evento.localizacao }}</span>
                </div>
            </div>
        </div>
    </div>
                </div>
                </div>
                <div v-else>
                    <div class="col-12">
                        <h5 style="text-align: center;">Não há eventos esta semana</h5>
                    </div>
                </div>
            </div>   
        </div>
        
    </section>

    <section id="programacaoGravada">
        <h1 style="text-align: center; margin-bottom: 2rem;">PROGRAMAÇÃO GRAVADA</h1>
        <section class="justify-content-center">
        <?php 
            $args = array(
                'numberposts'   => -1,
                'post_type'     => 'temas',
            );

            $query = new WP_Query($args);
            $i = 0;
            while($query->have_posts()) : $query->the_post();
        ?>
            <article class="card col-3" style="cursor: pointer" @mouseover="getTema('<?php the_title(); ?>')" data-bs-toggle="modal" data-bs-target="#modalGravado<?php the_title(); ?>">
                <img src="http://fiocruz.local/wp-content/uploads/2022/09/Grupo-287.png" width="95" alt="">
                <h6 class="card-title"><?php the_title(); ?></h6>
            </article>
        <?php 
            $temas[$i]['titulo'] = get_the_title();
            $temas[$i]['id'] = get_the_ID();
            $i++;
            endwhile;
            wp_reset_query();
        ?>
        </section>
<?php

foreach($temas as $key => $tema):
    ?>
<div v-if="tema == '<?php echo $tema['titulo']; ?>'">
        <!-- Modal Eventos Gravados -->
<div class="modal fade" id="modalGravado<?php echo $tema['titulo']; ?>" tabindex="-1" aria-labelledby="modalGravado<?php echo $tema['titulo']; ?>"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" style="padding: .5rem;">
            <div class="modal-header" style="border-bottom: 0;">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $tema['titulo']; ?></h5>
                <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
            </div>
            <div class="modal-body">
            <div class="accordion" id="accordionExample">
            <?php 
                $args = array(
                    'numberposts'   => -1,
                    'post_type'     => 'eventosgravados',
                    'meta_key'      => 'tema',
                    'meta_value'    => $tema['id']
                );

                $query = new WP_Query($args);

                while($query->have_posts()) : $query->the_post();
            ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapseOne">
                    <i class="far fa-plus-circle"></i>
                        <div>
                            <h6><?php the_field('titulo'); ?></h6>      
                            <p><?php the_field('descricao'); ?></p>
                        </div>
                    </button>
                    </h2>
                    <div id="collapse<?php the_ID(); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?php the_field('embed'); ?>" title="Veja o vídeo do evento" allowscriptaccess="always" allow="autoplay" allowfullscreen></iframe>
                        </div>
                        <span><i class="fas fa-map-marker-alt"></i> <?php the_field('localizacao'); ?></span>
                    </div>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
    endforeach;
?>

    </section>
    <section id="novidades" style="margin: 2.5rem 0;">
        <h1>NOVIDADES</h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.unsplash.com/photo-1666059368813-3b84b929e28d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" class="d-block w-100" height="20" style="opacity: 0;" alt="...">
      <div class="carousel-caption d-flex container" style="color: black; position: initial; gap: 1.5rem;">
      <?php 
                $args = array(  
                    'post_type' => 'novidades'
                );

                $query = new WP_Query($args);

                while($query->have_posts()) : $query->the_post();
                ?>
                    <a data-bs-toggle="modal" class="col-5" style="text-decoration: none; cursor: pointer;" data-bs-target="#modal<?php echo the_ID();?>">
                        <div class="card" style="padding: 1rem 1.5rem; text-align: left;">
                            <?php the_post_thumbnail('full')?>
                            <div class="conteudo">
                                <h6 style="margin-top: 1rem;"><?php the_title(); ?></h6>
                                <p><?php the_field('breveDescricao'); ?></p>
                            </div>
                        </div>
                    </a>
                        

    <!-- Modal - Novidades -->
    <div class="modal fade" id="modal<?php echo the_ID();?>" tabindex="-1" aria-labelledby="modal<?php echo the_ID();?>"
            aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content eventoModal" style="padding: 1.75rem;">
                <div class="modal-header" style="padding: 0; border-bottom: 0;">
                    <h5 class="modal-title" id="exampleModalLabel"><?php the_title(); ?></h5>
                    <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
                </div>
                <div class="modal-body novidades-body" style="padding: 0;">
                    <?php the_post_thumbnail('full')?>
                    <p style="margin-top: 1rem; margin-bottom: 1rem; text-align: left;"><?php the_field('descricao'); ?></p>
                </div>
            </div>
        </div>
    </div>
                        <?php
                endwhile;
                ?>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" style="opacity: 1;" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" style="opacity: 1;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </section>
</main>

<?php get_footer(); ?>
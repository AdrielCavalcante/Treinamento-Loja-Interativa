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
                        <p style="color: #555; margin-bottom: 2rem;">{{ evento.descricao }}</p>
                        <strong style="font-family: 'Squada one';">Youtube e Canal de TV Canal Saúde</strong>
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
                        <p style="color: #555; margin-bottom: 2rem;">{{ evento.descricao }}</p>
                        <strong style="font-family: 'Squada one';">Youtube e Canal de TV Canal Saúde</strong>
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
                    <p style="color: #555; margin-bottom: 2rem;">{{ evento.descricao }}</p>
                    <strong style="font-family: 'Squada one';">Youtube e Canal de TV Canal Saúde</strong>
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
                <div v-else>
                    <div class="col-12">
                        <h5 style="text-align: center;">Não há eventos esta semana</h5>
                    </div>
                </div>
            </div>   
        </div>
        
    </section>

    <section id="programacaoGravada">
        <h1 style="text-align: center;">PROGRAMAÇÃO GRAVADA</h1>
        <section class="justify-content-center">
            <article class="card col-3">
                <img src="http://fiocruz.local/wp-content/uploads/2022/09/Grupo-287.png" width="64" alt="">
                <a class="card-title" data-bs-toggle="modal" data-bs-target="#modalGravado" href="#">Podcasts</a>
            </article>
            <article class="card col-3">
                <img src="http://fiocruz.local/wp-content/uploads/2022/09/Grupo-287.png" width="64" alt="">
                <a class="card-title" data-bs-toggle="modal" data-bs-target="#modalGravado" href="#">Podcasts</a>
            </article>
            <article class="card col-3">
                <img src="http://fiocruz.local/wp-content/uploads/2022/09/Grupo-287.png" width="64" alt="">
                <a class="card-title" data-bs-toggle="modal" data-bs-target="#modalGravado" href="#">Podcasts</a>
            </article>
            <article class="card col-3">
                <img src="http://fiocruz.local/wp-content/uploads/2022/09/Grupo-287.png" width="64" alt="">
                <a class="card-title" data-bs-toggle="modal" data-bs-target="#modalGravado" href="#">Podcasts</a>
            </article>
            <article class="card col-3">
                <img src="http://fiocruz.local/wp-content/uploads/2022/09/Grupo-287.png" width="64" alt="">
                <a class="card-title" data-bs-toggle="modal" data-bs-target="#modalGravado" href="#">Podcasts</a>
            </article>
            <article class="card col-3">
                <img src="http://fiocruz.local/wp-content/uploads/2022/09/Grupo-287.png" width="64" alt="">
                <a class="card-title" data-bs-toggle="modal" data-bs-target="#modalGravado" href="#">Podcasts</a>
            </article>
        </section>

<!-- Modal -->
<div class="modal fade" id="modalGravado" tabindex="-1" :aria-labelledby="modalGravado"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0;">
                <div>
                    <h5 class="modal-title" id="exampleModalLabel">Podcasts</h5>
                    <h6 class="modal-title">Lançamento: 29/09</h6>
                </div>
                <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close"></i>
            </div>
            <div class="modal-body">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Accordion Item #1
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Accordion Item #2
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Accordion Item #3
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
    </section>
    <section id="novidades">
        <h1>NOVIDADES</h1>
    </section>
</main>

<?php get_footer(); ?>
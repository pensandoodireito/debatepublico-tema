<?php get_header(); ?>
<!-- Código bicheira, só para testar as repetiçoes de li -->
<?php
    $repeteLi = '';
    //$repeteLi .=  "";
    for($i=0;$i<5;$i++)
    {
    $repeteLi .= "
    ";
    }
?>
<div id="anti-corr">
    <div class="anti-corr-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/anti-corrupcao/logo-anti-corrupcao.png" class="img-adptive" alt="Logo: Medidas de combate à corrupção e a impunidade ">
                </div>
                <div class="col-sm-6 col-md-4 white">
                    <h1 class="font-roboto h1 mt-md"><strong>Participe, opine, ajude!</strong></h1>
                    <p class="mt-md">As medidas de enfrentamento à impunidade e a corrupção são uma série de propostas de reformas legais com o objetivo de tornar mais eficiente o processo penal</p>
                </div>
            </div>
        </div>
    </div>
    <div class="anti-corr-oque">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h2 class="font-roboto red">O que é?</h2>
                    <p class="mt-md">Muitas medidas voltadas à prevenção e ao enfrentamento à corrupção e à impunidade vem sendo implementadas, mas há contínua necessidade de aperfeiçoamento deste sistema anticorrupção.</p>
                    <p class="mt-md">Conforme as debilidades das estruturas são constatadas e são apresentadas soluções, coloca-se luz sobre novos desafios que precisam ser enfrentados.</p>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/anti-corrupcao/img-anti-corrupcao-001.png" class="img-adptive" alt="Logo: Medidas de combate à corrupção e a impunidade ">
                </div>
            </div>
        </div>
    </div>
    <div class="anti-corr-eixos">
        <div class="container">
            <h2 class="font-roboto red">Eixos em debate</h2>
        </div>
        <div class="tabs-main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- tabs left -->
                        <div class="tabs-left">
                            <?php
                                $eixos = get_terms('tema', array(
                                    'hide_empty' => 0
                                    )
                                );
                                if ( empty( $eixos ) || is_wp_error( $eixos ) ) {
                                    echo 'Nenhum eixo cadastrado';
                                } else {
                                    echo '<ul class="nav nav-tabs">';
                                    $first = true;
                                    foreach( $eixos as $eixo ) {
                                        echo '<li';
                                        if( $first ) {
                                            echo ' class="active"';
                                            $first = false;
                                        }
                                        echo '><a href="#eixo' . $eixo->term_id. '" data-toggle="tab">' . $eixo->name . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                            <div class="tab-content">
                            <?php
                                if ( !empty( $eixos ) && !is_wp_error( $eixos ) ) {
                                    $first = true;
                                    //Inserindo eixos (temas)
                                    foreach( $eixos as $eixo ) {
                                        //Início do Eixo/Tema
                                        echo '<div class="tab-pane';
                                        if( $first ) {
                                            //Marcando o primeiro eixo/tema
                                            //como ativo
                                             echo ' active';
                                             $first = false;
                                        }
                                        echo '" id="eixo' . $eixo->term_id . '">';
                                        // descrição do eixo/tema
                                        echo $eixo->description;

                                        // Agora iremos buscar as pautas deste
                                        // eixo que foram comentadas mais
                                        // recentemente.

                                        // Para isso, primeiro pegaremos a
                                        // lista de pautas deste eixo.
                                        $pautas_args = array(
                                            'post_type' => 'pauta',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'tema',
                                                    'field' => 'name',
                                                    'terms' => $eixo->name
                                                )
                                            ),
                                        );
                                        $pautas_do_eixo = new WP_Query( $pautas_args );

                                        // IDs das pautas deste eixo
                                        $ids_pautas_filtradas = array();
                                        foreach( $pautas_do_eixo->posts as $pauta ){
                                            $ids_pautas_filtradas[] = $pauta->ID;
                                        }

                                        // Agora iremos buscar os comentários
                                        // das pautas selecionadas acima.
                                        // Primeiro gerando os argumentos
                                        $ultimos_comentarios_args = array(
                                            'status' => 'approve',
                                            'post__in' => $ids_pautas_filtradas,
                                            'order' => 'DESC'
                                        );

                                        // Fazendo a consulta efetivamente
                                        $comentarios_filtrados = get_comments($ultimos_comentarios_args);

                                        // Agora iremos pegar os IDs das três
                                        // primeiras pautas dos comentários
                                        // selecionados
                                        $ids_tres_pautas = array();
                                        foreach ( $comentarios_filtrados as $comentario ) {
                                            if ( !in_array( $comentario->comment_post_ID, $ids_tres_pautas ) ) {
                                                $ids_tres_pautas[] = $comentario->comment_post_ID;
                                            }
                                            // Finaliza o loop ao chegar nas
                                            // três pautas com comentários mais
                                            // recentes.
                                            if ( count( $ids_tres_pautas ) >= 3 ) {
                                                break;
                                            }
                                        }

                                        // Agora sim seleciona só os três posts
                                        // com comentários mais recentes
                                        // e recupera eles ordenados de acordo
                                        // com o array criado anteriormente
                                        $pautas_args[ 'nopagin' ] = true;
                                        $pautas_args[ 'posts_per_page' ] = 3;
                                        $pautas_args[ 'post__in' ] = $ids_tres_pautas;
                                        $pautas_args[ 'orderby' ] = 'post__in';

                                        $pautas = new WP_Query( $pautas_args );

                                        //Verifica se existe alguma pauta no
                                        // eixo atual
                                        if ( $pautas->have_posts() ) {
                                            echo '<div class="comments-structure">';
                                            echo '<div class="comments-main">';
                                            //Eixo com pauta única
                                            if ( $pautas->post_count == 1 ) {
                                                $pautas->the_post();
                                                echo '<div class="one-coluns">';
                                                    echo '<div class="comments-colun">';
                                                        echo '<div class="comments-header">';
                                                            echo '<p class="red">';
                                                                echo '<strong><a href="' . get_permalink( get_the_ID() ) . '">' . get_the_title() . '</a></strong>';
                                                            echo '</p>';
                                                        echo '</div>'; //comments-header
                                                        $args_comentarios = array(
                                                            'post_id' => get_the_ID(),
                                                            'status' => 'approve',
                                                            'number' => 5
                                                            );
                                                        $comentarios = get_comments( $args_comentarios );
                                                        if ( count($comentarios) > 0 ) {
                                                            echo '<ul class="list-group">';
                                                            foreach( $comentarios as $comentario ) {
                                                                echo '<li class="list-group-item">';
                                                                    echo '<div class="comments-line">';
                                                                        echo '<div class="comments-image">';
                                                                            echo get_avatar( $comentario, 32 );
                                                                            //<img src="http://placehold.it/80" class="img-circle img-responsive" alt="" />
                                                                        echo '</div>'; //comments-image
                                                                        echo '<div class="comments-text">';
                                                                            echo '<div class="comment-content">';
                                                                                echo '<div class="comment-comment"><p>';
                                                                                    echo $comentario->comment_content;
                                                                                echo '</p></div>';//comment-comment
                                                                                echo '<div class="comments-mic-info"><small>Comentado por: ';
                                                                                    //<a href="#">jõao Paulo da Silva</a> <span class="ml-md"><i class="fa fa-clock-o"></i> Há 15 min</span>
                                                                                    echo $comentario->comment_author;
                                                                                    echo ' <span class="ml-md"><i class="fa fa-clock-o"></i> em ';
                                                                                        echo get_comment_date("j/m/Y", $comentario->comment_ID);
                                                                                    echo '</span>';
                                                                                echo '</small></div>'; //comments-mic-info
                                                                            echo '</div>'; //comment-content
                                                                        echo '</div>'; //comment-text
                                                                    echo '</div>'; //comments-line
                                                                echo '</li>'; //list-group-item
                                                            }
                                                            echo '</ul>'; //list-group
                                                        }
                                                    echo '</div>'; //comments-colun
                                                echo '</div>'; //one-coluns
                                            } else if ( $pauta->post_count == 2 ) {
                                                echo '<div class="two-coluns">';
                                                    while ( $pautas->have_posts() ) {
                                                        $pautas->the_post();
                                                        echo '<div class="comments-colun">';
                                                            echo '<div class="comments-header">';
                                                                echo '<p class="red">';
                                                                    echo '<strong><a href="' . get_permalink( get_the_ID() ) . '">' . get_the_title() . '</a></strong>';
                                                                echo '</p>';
                                                            echo '</div>'; //comments-header
                                                            $args_comentarios = array(
                                                                'post_id' => get_the_ID(),
                                                                'status' => 'approve',
                                                                'number' => 5
                                                                );
                                                            $comentarios = get_comments( $args_comentarios );
                                                            if ( count($comentarios) > 0 ) {
                                                                echo '<ul class="list-group">';
                                                                foreach( $comentarios as $comentario ) {
                                                                    echo '<li class="list-group-item">';
                                                                        echo '<div class="comments-line">';
                                                                            echo '<div class="comments-image">';
                                                                                echo get_avatar( $comentario, 32 );
                                                                                //<img src="http://placehold.it/80" class="img-circle img-responsive" alt="" />
                                                                            echo '</div>'; //comments-image
                                                                            echo '<div class="comments-text">';
                                                                                echo '<div class="comment-content">';
                                                                                    echo '<div class="comment-comment"><p>';
                                                                                        echo $comentario->comment_content;
                                                                                    echo '</p></div>';//comment-comment
                                                                                    echo '<div class="comments-mic-info"><small>Comentado por: ';
                                                                                        //<a href="#">jõao Paulo da Silva</a> <span class="ml-md"><i class="fa fa-clock-o"></i> Há 15 min</span>
                                                                                        echo $comentario->comment_author;
                                                                                        echo ' <span class="ml-md"><i class="fa fa-clock-o"></i> em ';
                                                                                            echo get_comment_date("j/m/Y", $comentario->comment_ID);
                                                                                        echo '</span>';
                                                                                    echo '</small></div>'; //comments-mic-info
                                                                                echo '</div>'; //comment-content
                                                                            echo '</div>'; //comment-text
                                                                        echo '</div>'; //comments-line
                                                                    echo '</li>'; //list-group-item
                                                                }
                                                                echo '</ul>'; //list-group
                                                            }
                                                        echo '</div>'; //comments-colun
                                                    }
                                                echo '</div>'; //three-coluns
                                            } else {
                                                echo '<div class="three-coluns">';
                                                    while ( $pautas->have_posts() ) {
                                                        $pautas->the_post();
                                                        echo '<div class="comments-colun">';
                                                            echo '<div class="comments-header">';
                                                                echo '<p class="red">';
                                                                    echo '<strong><a href="' . get_permalink( get_the_ID() ) . '">' . get_the_title() . '</a></strong>';
                                                                echo '</p>';
                                                            echo '</div>'; //comments-header
                                                            $args_comentarios = array(
                                                                'post_id' => get_the_ID(),
                                                                'status' => 'approve',
                                                                'number' => 5
                                                                );
                                                            $comentarios = get_comments( $args_comentarios );
                                                            if ( count($comentarios) > 0 ) {
                                                                echo '<ul class="list-group">';
                                                                foreach( $comentarios as $comentario ) {
                                                                    echo '<li class="list-group-item">';
                                                                        echo '<div class="comments-line">';
                                                                            echo '<div class="comments-image">';
                                                                                echo get_avatar( $comentario, 32 );
                                                                                //<img src="http://placehold.it/80" class="img-circle img-responsive" alt="" />
                                                                            echo '</div>'; //comments-image
                                                                            echo '<div class="comments-text">';
                                                                                echo '<div class="comment-content">';
                                                                                    echo '<div class="comment-comment"><p>';
                                                                                        echo $comentario->comment_content;
                                                                                    echo '</p></div>';//comment-comment
                                                                                    echo '<div class="comments-mic-info"><small>Comentado por: ';
                                                                                        //<a href="#">jõao Paulo da Silva</a> <span class="ml-md"><i class="fa fa-clock-o"></i> Há 15 min</span>
                                                                                        echo $comentario->comment_author;
                                                                                        echo ' <span class="ml-md"><i class="fa fa-clock-o"></i> em ';
                                                                                            echo get_comment_date("j/m/Y", $comentario->comment_ID);
                                                                                        echo '</span>';
                                                                                    echo '</small></div>'; //comments-mic-info
                                                                                echo '</div>'; //comment-content
                                                                            echo '</div>'; //comment-text
                                                                        echo '</div>'; //comments-line
                                                                    echo '</li>'; //list-group-item
                                                                }
                                                                echo '</ul>'; //list-group
                                                            }
                                                        echo '</div>'; //comments-colun
                                                    }
                                                echo '</div>'; //three-coluns
                                            }
                                            echo '</div>'; //comments-main
                                            echo '</div>'; //comments-structure
                                        }
                                        echo '</div>'; //fecha eixo tab-pane
                                    }
                                }
                            ?>
                            </div>
                        </div>
                        <!-- /tabs left -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

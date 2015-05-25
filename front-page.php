<?php get_header(); ?>
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
                                        echo '><a href="#' . $eixo->term_id. '" data-toggle="tab">' . $eixo->name . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                            <div class="tab-content">
                            <?php
                                if ( !empty( $eixos ) && !is_wp_error( $eixos ) ) {
                                    $first = true;
                                    foreach( $eixos as $eixo ) {
                                        echo '<div class="tab-pane';
                                        if( $first ) {
                                             echo ' active';
                                             $first = false;
                                        }
                                        echo '" id="' . $eixo->term_id . '">';
                                        echo $eixo->description;
                                        echo '</div>';
                                    }
                                }
                            ?>
                            </div>
                        </div>
                        <!-- /tabs -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

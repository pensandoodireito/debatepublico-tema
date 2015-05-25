<?php get_header(); ?>
<!-- Código bicheira, só para testar as repetiçoes de li -->
<?php
    $repeteLi = '';
    //$repeteLi .=  "";
    for($i=0;$i<5;$i++)
    {
    $repeteLi .= "
    <li class=\"list-group-item\">
                                <div class=\"comments-line\">
                                                            <div class=\"comments-image\">
                                                                                        <img src=\"http://placehold.it/80\" class=\"img-circle img-responsive\" alt=\"\" />
                                                            </div>
                                                            <div class=\"comments-text\">
                                                                                        <div class=\"comment-content\">
                                                                                                                    <div class=\"comment-comment\">
                                                                                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rhoncus nulla sed egestas pretium. Nullam porttitor felis nec nulla congue cursus. Aenean nec eleifend quam. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                                                                                                                    </div>
                                                                                                                    <div class=\"comments-mic-info\">
                                                                                                                                                <small><a href=\"#\">jõao Paulo da Silva</a> <span class=\"ml-md\"><i class=\"fa fa-clock-o\"></i> Há 15 min</span></small>
                                                                                                                    </div>
                                                                                        </div>
                                                            </div>
                                </div>
    </li>
    ";
    }
    //$repeteLi .="";
    //echo $repeteLi;
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
                                <!-- tab 01 -->
                                <div class="tab-pane active" id="content-tab-01">
                                    <p><strong class="red">Lorem ipsum dolor sit amet:</strong> consectetur adipiscing elit. Donec laoreet ex dignissim dui tincidunt, a hendrerit lorem vulputate.</p>
                                    <div class="comments-structure">

                                        <div class="comments-main">
                                            <div class="one-coluns">
                                                <div class="comments-colun">
                                                <div class="comments-header"><p class="red"><strong>Razões em segunda instância: revogação do § 4º do art. 600 do Código de Processo Penal</strong></p></div>
                                                    <ul class="list-group">
                                                        <?php echo "$repeteLi"; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab 01 -->
                                <!-- tab 02 -->
                                <div class="tab-pane" id="content-tab-02">
                                    <p><strong class="red">Lorem ipsum dolor sit amet:</strong> consectetur adipiscing elit. Donec laoreet ex dignissim dui tincidunt, a hendrerit lorem vulputate.</p>
                                    <div class="comments-structure">
                                        <div class="comments-main">
                                            <div class="two-coluns">
                                                <div class="comments-colun">
                                                <div class="comments-header"><p class="red"><strong>Razões em segunda instância: revogação do § 4º do art. 600 do Código de Processo Penal</strong></p></div>
                                                    <ul class="list-group">
                                                        <?php echo "$repeteLi"; ?>
                                                    </ul>
                                                </div>
                                                <div class="comments-colun">
                                                <div class="comments-header"><p class="red"><strong>Embargos infringentes e de nulidade: revogação do art. 609 do Código de Processo Penal...</strong></p></div>
                                                    <ul class="list-group">
                                                        <?php echo "$repeteLi"; ?>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /tab 02 -->
                                <!-- tab 03 -->
                                <div class="tab-pane" id="content-tab-03">
                                    <p><strong class="red">Lorem ipsum dolor sit amet:</strong> consectetur adipiscing elit. Donec laoreet ex dignissim dui tincidunt, a hendrerit lorem vulputate.</p>
                                    <div class="comments-structure">

                                        <div class="comments-main">
                                            <div class="tree-coluns">
                                                <div class="comments-colun">
                                                    <div class="comments-header"><p class="red"><strong>Razões em segunda instância: revogação do § 4º do art. 600 do Código de Processo Penal</strong></p></div>
                                                    <ul class="list-group">
                                                        <?php echo "$repeteLi"; ?>
                                                    </ul>
                                                </div>
                                                <div class="comments-colun">
                                                <div class="comments-header"><p class="red"><strong>Razões em segunda instância: revogação do § 4º do art. 600 do Código de Processo Penal</strong></p></div>
                                                    <ul class="list-group">
                                                        <?php echo "$repeteLi"; ?>
                                                    </ul>
                                                </div>
                                                <div class="comments-colun">
                                                <div class="comments-header"><p class="red"><strong>Razões em segunda instância: revogação do § 4º do art. 600 do Código de Processo Penal</strong></p></div>
                                                    <ul class="list-group">
                                                        <?php echo "$repeteLi"; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab 03 -->
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

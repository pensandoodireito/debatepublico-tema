<?php
add_action( 'admin_init', 'debate_settings_init' );

function debate_settings_init() {
    $options = get_option( 'participacao_settings' );

    add_settings_field(
            'participacao_site_excerpt',
            'Resumo da descrição do debate para capa',
            'debate_site_excerpt_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_data_abertura',
            'Data de abertura do Debate',
            'debate_data_abertura_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_data_encerramento',
            'Data de encerramento do Debate',
            'debate_data_encerramento_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_fase_debate',
            'Fase do Debate',
            'debate_fase_debate_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

    add_settings_field(
            'participacao_normas',
            'Normas em discussão',
            'debate_normas_render',
            'pluginPage',
            'participacao_pluginPage_section'
    );

}

/**
 * Render do campo para o resumo da descrição do site
 */
function debate_site_excerpt_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <textarea cols='20' rows='2' name='participacao_settings[participacao_site_excerpt]'>
        <?php echo $options['participacao_site_excerpt']; ?>
    </textarea>
    <?php

}

/**
 * Render do campo para a data de abertura do debate
 */
function debate_data_abertura_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_data_abertura]'
           value="<?php echo $options['participacao_data_abertura']; ?>"/>
    <?php
}

/**
 * Render do campo para a data de encerramento do debate
 */
function debate_data_encerramento_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_data_encerramento]'
           value="<?php echo $options['participacao_data_encerramento']; ?>"/>
    <?php
}

/**
 * Render do campo para a fase atual do debate
 */
function debate_fase_debate_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_fase_debate]'
           value="<?php echo $options['participacao_fase_debate']; ?>"/>
    <?php
}

/**
 * Render do campo para a lei referida no debate
 */
function debate_normas_render() {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_normas]'
           value="<?php echo $options['participacao_normas']; ?>"/>
    <?php
}

function debatepublico_customizer_register( $wp_customize ) {

    // Configurações cor de fundo
    $wp_customize->add_setting( 'header_bgcolor', array(
            'default'   => '#5d7987',
            'transport' => 'postMessage',
    ) );

    // Configurações da imagem de fundo
    $wp_customize->add_setting( 'header_image', array(
            'default'   => get_stylesheet_directory_uri() . '/images/anti-corrupcao/bck-anti-corrupcao.jpg',
            'transport' => 'postMessage',
    ) );

    // Criando uma nova seção "Cabeçalho"
    $wp_customize->add_section( 'debatepublico_banner', array(
            'title'    => __( 'Cabeçalho', 'debatepublico' ),
            'priority' => 30,
    ) );

    // Adicionando um controle de escolha de cor
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
            'label'    => __( 'Cor de Fundo', 'debatepublico' ),
            'section'  => 'debatepublico_banner',
            'settings' => 'header_bgcolor',
    ) ) );

    // Adicionando um controle de escolha de imagem
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image', array(
            'label'    => __( 'Imagem de Fundo', 'debatepublico' ),
            'section'  => 'debatepublico_banner',
            'settings' => 'header_image',
    ) ) );
}

// Adiciona ao registro de Personalizacão
add_action( 'customize_register', 'debatepublico_customizer_register' );


function debatepublico_customizer_live_preview() {
    wp_enqueue_script(
            'debatepublico-themecustomizer',
            get_stylesheet_directory_uri() . '/js/theme-customizer.js',
            array( 'jquery', 'customize-preview' ),
            '',        //Versão
            true    //No rodapé
    );
}

add_action( 'customize_preview_init', 'debatepublico_customizer_live_preview' );

function debatepublico_customize_css() {
    $bgimage = get_theme_mod( 'header_image', get_stylesheet_directory_uri() . '/images/anti-corrupcao/bck-anti-corrupcao.jpg' );
    ?>
    <style type="text/css">
        .anti-corr-top {
            background-color: <?php echo get_theme_mod('header_bgcolor', '#5d7987'); ?>;
        <?php if ($bgimage != '') { ?> background: url(<?php echo $bgimage; ?>) <?php } ?>
        }
    </style>
    <?php
}

add_action( 'wp_head', 'debatepublico_customize_css' );

//registrando areas de widgets (sidebars)

register_sidebar( array(
        'id'            => 'debate-publico-imagem-primaria',
        'name'          => 'Imagem Principal',
        'description'   => __( 'Deve ser configurado um widget de imagem. Atenção: Não adicionar mais de um widget à esta àrea.', 'debate-publico' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
) );

register_sidebar( array(
        'id'            => 'debate-publico-descricao-primaria',
        'name'          => 'Descrição Primária',
        'description'   => __( 'Deve ser configurado um widget de texto com título e texto. Atenção: Não adicionar mais de um widget à esta àrea.', 'debate-publico' ),
        'before_widget' => '<p class="mt-md">',
        'after_widget'  => '</p>',
        'before_title'  => '<h1 class="font-roboto h1 mt-lg"><strong>',
        'after_title'   => '</strong></h1>',
) );

register_sidebar( array(
        'id'            => 'debate-publico-imagem-secundaria',
        'name'          => 'Imagem Secundária',
        'description'   => __( 'Deve ser configurado um widget de imagem. Atenção: Não adicionar mais de um widget à esta àrea.', 'debate-publico' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
) );

register_sidebar( array(
        'id'            => 'debate-publico-descricao-secundaria',
        'name'          => 'Descrição Secundária',
        'description'   => __( 'Deve ser configurado um widget de texto com título e texto. Atenção: Não adicionar mais de um widget à esta àrea.', 'debate-publico' ),
        'before_widget' => '<p class="mt-md">',
        'after_widget'  => '</p>',
        'before_title'  => '<h2 class="font-roboto red h1">',
        'after_title'   => '</h2>',
) );

register_sidebar( array(
        'id'            => 'debate-publico-ultimos-comentarios',
        'name'          => 'Últimos Comentários',
        'description'   => __( 'Área de exibição dos últimos comentários por eixo de debate', 'debate-publico' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
) );

register_sidebar( array(
        'id'            => 'debate-publico-ficha-tecnica',
        'name'          => 'Ficha Técnica',
        'description'   => __( 'Área de exibição da ficha técnica do debate', 'debate-publico' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
) );

register_sidebar( array(
        'id'            => 'debate-publico-como-participar',
        'name'          => 'Como Participar',
        'description'   => __( 'Área de exibição do passo-a-passo de como participar do debate', 'debate-publico' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
) );

register_sidebar( array(
        'id'            => 'debate-publico-realizacao',
        'name'          => 'Realização',
        'description'   => __( 'Área de exibição dos responsáveis pela realização do debate', 'debate-publico' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
) );

register_sidebar( array(
        'id'            => 'debate-publico-noticias',
        'name'          => 'Notícias',
        'description'   => __( 'Área de exibição das notícias', 'debate-publico' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
) );
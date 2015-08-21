<?php
add_action( 'admin_init', 'debate_settings_init' );

function debate_settings_init()
{
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
function debate_site_excerpt_render(  ) {

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
function debate_data_abertura_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_data_abertura]' value="<?php echo $options['participacao_data_abertura']; ?>"/>
<?php
}

/**
 * Render do campo para a data de encerramento do debate
 */
function debate_data_encerramento_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_data_encerramento]' value="<?php echo $options['participacao_data_encerramento']; ?>"/>
<?php
}

/**
 * Render do campo para a fase atual do debate
 */
function debate_fase_debate_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_fase_debate]' value="<?php echo $options['participacao_fase_debate']; ?>"/>
<?php
}

/**
 * Render do campo para a lei referida no debate
 */
function debate_normas_render(  ) {

    $options = get_option( 'participacao_settings' );
    ?>
    <input class="regular-text" type="text" cols='20' name='participacao_settings[participacao_normas]' value="<?php echo $options['participacao_normas']; ?>"/>
<?php
}
<?php get_header(); ?>
    <div id="anti-corr">
        <div class="anti-corr-top">
            <div class="container">
                <div class="row pb-lg">
                    <div class="col-md-offset-1 col-sm-4 text-center mt-md">
                        <?php if ( is_active_sidebar( 'debate-publico-imagem-primaria' ) ) :
                            dynamic_sidebar( 'debate-publico-imagem-primaria' );
                        else : ?>
                            Você deve configurar um widget de imagem na área de imagem primária!
                        <?php endif; ?>
                    </div>
                    <div class="col-md-offset-1 col-sm-6 col-md-4 white mt-md">
                        <?php if ( is_active_sidebar( 'debate-publico-descricao-primaria' ) ) :
                            dynamic_sidebar( 'debate-publico-descricao-primaria' );
                        else : ?>
                            Você deve configurar um widget de texto na área de descrição primária!
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="anti-corr-oque">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-offset-1">
                        <?php if ( is_active_sidebar( 'debate-publico-descricao-secundaria' ) ) :
                            dynamic_sidebar( 'debate-publico-descricao-secundaria' );
                        else : ?>
                            Você deve configurar um widget de texto na área de descrição secundária!
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4 text-center">
                        <?php if ( is_active_sidebar( 'debate-publico-imagem-secundaria' ) ) :
                            dynamic_sidebar( 'debate-publico-imagem-secundaria' );
                        else : ?>
                            Você deve configurar um widget de imagem na área de imagem secundária!
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ( is_active_sidebar( 'debate-publico-ultimos-comentarios' ) ) {
            dynamic_sidebar( 'debate-publico-ultimos-comentarios' );
        }
        if ( is_active_sidebar( 'debate-publico-ficha-tecnica' ) ) {
            dynamic_sidebar( 'debate-publico-ficha-tecnica' );
        }
        ?>
    </div>
<?php
if ( is_active_sidebar( 'debate-publico-como-participar' ) ) {
    dynamic_sidebar( 'debate-publico-como-participar' );
}
if ( is_active_sidebar( 'debate-publico-realizacao' ) ) {
    dynamic_sidebar( 'debate-publico-realizacao' );
}
?>
    <div class="back-to-top">
        <a href="#" class="white"><i class="fa fa-level-up"></i> Voltar para o topo</a>
    </div>
<?php get_footer(); ?>
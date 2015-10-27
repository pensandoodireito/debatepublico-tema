<?php
get_header();
$situacao = delibera_get_situacao( get_the_ID() );
?>

<div class="conteudo" id="debatepublico-generic">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php get_template_part( 'menu', 'horizontal' ); ?>
			</div>
		</div>
		<div class="situacao-<?php echo $situacao->slug; ?> clearfix">
			<?php

			load_template( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'loop-pauta.php', true );

			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>

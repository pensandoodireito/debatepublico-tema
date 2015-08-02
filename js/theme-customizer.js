( function( $ ) {

	//Atualizando a cor de fundo do cabeçalho
	wp.customize( 'header_bgcolor', function( value ) {
		value.bind( function( newval ) {
			$('.anti-corr-top').css('background-color', newval );
		} );
	} );

	// Atualizando a imagem de fundo do cabeçalho
	wp.customize( 'header_image', function( value ) {
		value.bind( function( newval ) {
			$('.anti-corr-top').css('background', 'url('+newval+')' );
		} );
	} );	
	
} )( jQuery );
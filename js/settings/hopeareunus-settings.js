jQuery( function( $ ){ 

	/* Brian Dichiara wrote this magic. */
     
	$( '#menu-primary li' ).each( function( i, el ) { 
	   
		if ( $( this ).find( 'ul' ).length > 0 ) {
		   
			var $span = $( '<span />' ).addClass( 'sub-indicator' ).html( ' <i class="icon-angle-right"></i> ' );
			
			$( this ).addClass( 'has-sub' ).find( 'a:first' ).append( $span );
		
		}
	
	});
	
	/* FitVids. */
	$('#container').fitVids();

});
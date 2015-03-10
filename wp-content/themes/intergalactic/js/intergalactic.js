( function( $ ) {

	/*
	 * Toggle slide menu
	 */
	function slideControl() {
		$( '.menu-toggle' ).on( 'click', function( e ) {
			e.preventDefault();
			$( '.slide-menu' ).toggleClass( 'expanded' ).resize();
			$( 'body' ).toggleClass( 'sidebar-open' );
			$( this ).toggleClass( 'toggle-on' );
		} );
	}

	/*
	 * Close slide menu with escape key
	 */
	$( document ).keyup( function( e ) {
		if ( e.keyCode === 27 && $( '.slide-menu' ).hasClass( 'expanded' ) ) {
			$( 'body' ).removeClass( 'sidebar-open' );
			$( '.menu-toggle' ).removeClass( 'toggle-on' );
			$( '.slide-menu' ).removeClass( 'expanded' );
		}
	} );

	/*
	 * Wrap tiled gallery
	 */
	function galleryWrapper() {
		$gallery = $( '.entry-content' ).find( '.tiled-gallery' );
		$gallery.wrap( '<div class="tiled-gallery-wrapper"></div>' );
		$gallery.resize();
	}

	/*
	 * Add extra class to large images
	 */
	function outdentImages() {
		$( '.entry-content img' ).each( function() {
			var img = $( this ),
			    caption = $( this ).closest( 'figure' ),
				new_img = new Image();

				new_img.src = img.attr( 'src' );

				$( new_img ).load( function() {

					var img_width = new_img.width;
					if ( img_width >= 1000 ) {
						$( img ).addClass( 'size-big' );
					}

				if ( caption.hasClass( 'wp-caption' ) && img_width >= 1000 ) {
					caption.addClass( 'caption-big' );
				}
			} );
		} );
	}

	// After page loads
	$( window ).load( function() {
		slideControl();
		galleryWrapper();
		outdentImages();
	} );

	// After infinite scroll loads
	$( window ).on( 'post-load', function() {
		galleryWrapper();
		outdentImages();
	} );

} )( jQuery );

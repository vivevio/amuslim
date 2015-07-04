<script>
	var URL_CHECK_USERNAME = "<?php echo site_url('admin/account/check_username') ?>";
	var URL_CHECK_EMAIL = "<?php echo site_url('admin/account/check_email') ?>";

	$( document ).ready( function () {
		
		var default_username = $( 'input[name="username"]' ).val(),
			default_email = $( 'input[name="email"]' ).val();
		var form = $( 'form#account' );

		$( 'button#triggerEditAccount' ).click( function () {
			
			var defaultText = $( this ).html();

			if( $( this ).hasClass( 'cancel-edit' ) ) {

				form.find( '.form-group input' ).attr( 'readonly', 'readonly' );
				form.find( '.hidden-element' ).addClass( 'hide' );
				$( this ).html( '<i class="fa fa-pencil-square-o"></i> Change' );
			} else {

				form.find( '[readonly]' ).removeAttr( 'readonly' );
				form.find( '.hide' ).removeClass( 'hide' );
				$( this ).html('<i class="fa fa-ban"> Cancel</i>');
			}
			
			$( this ).toggleClass( 'cancel-edit' );
			return false;
		})

		$( 'input[name="username"], input[name="email"]' ).on( 'keyup', function () {

			var input = $( this ),
				form_group = input.parent(),
				val = input.val();

			if( $.trim( val ) == default_username || $.trim( val ) == default_email ) {
				return false;
			}

			var URL_TARGET;
			if( $( this ).attr('name') == 'username' ) {
				URL_TARGET = URL_CHECK_USERNAME; 
			} else {
				URL_TARGET = URL_CHECK_EMAIL;  
			}

			setTimeout( function () {
				
				$.ajax({
					type: 'POST',
					url: URL_TARGET,
					data: { 'value' : val },
					dataType: 'json',
					success: function ( r ) {
						
						if( r.result ) {

							form_group
								.removeClass( 'has-error' )
								.addClass( 'has-success' )
								.find('label')
								.html( r.msg );
						} else {

							form_group
								.removeClass( 'has-success' )
								.addClass( 'has-error' )
								.find('label')
								.html( r.msg );

						}
					}
				});
			}, 500 );
		})

		$( 'input[name="confirm_password"]' ).on( 'keyup', function () {

			var input = $( this ),
				form_group = input.parent(),
				val = input.val(),
				origin_password = $( 'input[name="password"]' ).val();

			setTimeout( function () {
				
				if( val == origin_password ) {

					form_group
						.removeClass( 'has-error' )
						.addClass( 'has-success' )
						.find('label')
						.html( '<i class="fa fa-check"></i> Password match.' );
				} else {

					form_group
						.removeClass( 'has-success' )
						.addClass( 'has-error' )
						.find('label')
						.html( '<i class="fa fa-times-circle-o"></i> Password not match.' );

				}
			}, 500 );
		})

		$( form ).submit( function () {
			
			var check_error = form.find('.has-error');

			if( check_error.length == 0 || undefined != check_error ) {

				var msgSuccess = $( '#msgSuccess' ),
					msgError = $( '#msgError' );

				$.ajax({
					type: 'POST',
					url: form.attr('action'),
					data: form.serializeArray(),
					dataType: 'json',
					success: function ( r ) {
						
						if( r.result ) {

							msgError.addClass('hide');
							msgSuccess.removeClass('hide').append( r.msg );

							setTimeout( function () {
								
								location.reload();
							}, 3000 );
						} else {

							msgSuccess.addClass('hide');
							msgError.removeClass('hide').append( r.msg );
						}
					}
				});
			}

			return false;
		})
	});
</script>
<script>
	$( document ).ready( function () {

		var form = $( '#murottal' );
		$( form ).submit( function () {

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

			return false;
		})
	});
</script>
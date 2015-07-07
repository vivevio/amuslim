<?php

if(  ! function_exists( 'CI' ) ) {
	function CI()
	{
		$CI =& get_instance();
		return  $CI;
	}
}

function options_role( $default = NULL, $extra = NULL )
{	

	$groups = CI()->ion_auth->groups()->result();
	foreach ( $groups as $group ) {
		
		$options[ $group->id ] = $group->name;
	}

	$extra .= 'class="form-control"';

	return form_dropdown( 'group_id', $options, $default, $extra );
}

function dropdown_surah( $default = NULL, $extra = NULL )
{
	
	CI()->load->model('ayat_model');
	$posts = CI()->ayat_model->get_many();
	$options = array();
	if( ! empty( $posts ) ) : foreach( $posts as $post ) :
		$options[ $post->ayat_id ] = $post->nomor_surah . '. ' . $post->nama_ayat;
	endforeach; endif;

	$extra .= 'class="form-control"';

	return form_dropdown('ayat_id', $options, $default, $extra);
}

function dropdown_murottal( $default = NULL, $extra = NULL )
{
	
	CI()->load->model('murottal_model');
	$posts = CI()->murottal_model->get_many();
	$options = array();
	if( ! empty( $posts ) ) : foreach( $posts as $post ) :
		$options[ $post->murottal_id ] = $post->nama_murottal;
	endforeach; endif;

	$extra .= 'class="form-control"';

	return form_dropdown('murottal_id', $options, $default, $extra);
}

function dropdown_nomor_surah( $default = NULL, $extra = NULL )
{
	
	$options = array();
	for ($i=1; $i <= 114; $i++) { 
		$options[ $i ] = $i;
	}

	$extra .= 'class="form-control"';

	return form_dropdown('nomor_surah', $options, $default, $extra);
}
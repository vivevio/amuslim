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
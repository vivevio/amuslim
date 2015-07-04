<?php

if(  ! function_exists( 'CI' ) ) {
	function CI()
	{
		$CI =& get_instance();
		return  $CI;
	}
}

function get_user_group_desc( $user_id = NULL )
{
	
	$groups = CI()->ion_auth->get_users_groups( $user_id )->result();
	$result = array();
	foreach ( $groups as $value ) {

		$result[] = $value->description;
	}

	return implode(', ', $result);
}

<?php

function get_assets( $file )
{
	
	$fullpath = base_url('assets/' . $file);
	return $fullpath;	
}

function enqueue_script( $file )
{
	
	$return = NULL;
	if( is_array( $file ) ) {

		foreach ( $file as $value ) {

			$fullpath = get_assets( $value );
			$return .= "<script src='$fullpath'></script>";
		}
	} else {

		$fullpath = get_assets( $file );
		$return .= "<script src='$fullpath'></script>";		
	}

	return $return;

}

function admin_enqueue_script( $file )
{
	
	$return = NULL;
	if( is_array( $file ) ) {

		foreach ( $file as $value ) {

			$fullpath = get_assets('admin_dist/' . $value);
			$return .= "<script src='$fullpath'></script>";
		}
	} else {

		$fullpath = get_assets( 'admin_dist/' . $file );
		$return .= "<script src='$fullpath'></script>";		
	}

	return $return;

}


function enqueue_style( $file )
{
	
	$return = NULL;
	if( is_array( $file ) ) {

		foreach ( $file as $value ) {

			$fullpath = get_assets( $value );
			$return .= "<link href='$fullpath' rel='stylesheet' type='text/css' />";
		}
	} else {

		$fullpath = get_assets( $file );
		$return .= "<link href='$fullpath' rel='stylesheet' type='text/css' />";
	}

	return $return;

}

function admin_enqueue_style( $file )
{
	
	$return = NULL;
	if( is_array( $file ) ) {

		foreach ( $file as $value ) {

			$fullpath = get_assets( 'admin_dist/' . $value);
			$return .= "<link href='$fullpath' rel='stylesheet' type='text/css' />";
		}
	} else {

		$fullpath = get_assets( 'admin_dist/' . $file );
		$return .= "<link href='$fullpath' rel='stylesheet' type='text/css' />";
	}

	return $return;

}
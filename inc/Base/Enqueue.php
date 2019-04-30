<?php  

/*
*
* @package Yariko
*
*/

namespace Inc\Base;

class Enqueue{

	public function register(){

		add_action( 'admin_enqueue_scripts', array( $this , 'enqueue' ) ); //action to include script to the backend, in order to include in the frontend is just wp_enqueue_scripts instead admin_enqueue_scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend'));
		
	}

	function enqueue(){
		
	}

	function enqueue_frontend(){
		//enqueue all css 
		wp_enqueue_style('my_customs_styles',  PLUGIN_URL . '/assets/css/main_wrn.css' );
		//enqueue all our scripts frontend
		wp_register_script( 'easy_auto' , PLUGIN_URL . '/assets/js/jquery.easy-autocomplete.min.js', array('jquery'));
		wp_register_script( 'search_script' , PLUGIN_URL . '/assets/js/main_wrn.js', array('jquery','easy_auto'));

		wp_enqueue_script( 'search_script');
		wp_localize_script( 'search_script', 'search_vars',['ajax_url'=>admin_url('admin-ajax.php')]);

		
	}
}
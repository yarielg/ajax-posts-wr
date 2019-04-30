<?php  

/*
*
* @package Yariko
*
*/

namespace Inc\Base;

class Shortcode{

	public function register(){

		add_shortcode( 'apwr', array( $this, 'ajax_posts_wr') );
		
	}

	function ajax_posts_wr($atts){

		$search_html = '<input id="ajax_posts_text" type="text" placeholder="Search.." >';

		return $search_html;

	}
}
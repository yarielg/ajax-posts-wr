<?php  

/*
*
* @package Yariko
*
*/

namespace Inc\Functions;

class PostsResult{

	public function register(){

		add_action( 'wp_ajax_nopriv_search_posts_wr', array($this,'search_posts_wr' ));
		add_action( 'wp_ajax_search_posts_wr', array($this,'search_posts_wr' ));
		
	}

	function search_posts_wr(){
		global $wpdb;
		$value_search = $_POST['phrase'];
		$search_posts =  array();
		
		$result = $wpdb->get_results ( "
		    SELECT * FROM  $wpdb->posts WHERE post_type = 'post' AND post_status='publish' AND post_title LIKE '%".$value_search."%' LIMIT 10" );

		foreach ( $result as $post ){
				array_push($search_posts, array(
					'id' => $post->ID,
					'title' => $post->post_title,
					'guid' => $post->guid,
					'image' => wp_get_attachment_url(get_post_thumbnail_id($post->ID)),
					'post_content' => substr(strip_tags($post->post_content),0,150) . '...'
				));
		}
		
		echo json_encode($search_posts);
		wp_die();
	}
}
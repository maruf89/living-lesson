<?php
require_once('../../../wp-load.php');
preview_form();
function preview_form($redirect = true)
{
	$special_captainform_code = "[captainform i{cf_form_id}]";
	$post_exists = false;
	$post_arr = array();
	$post_content = null;
	$post_id = null;
	if(isset($_GET['cf_form_id']))
		$form_id = (int)$_GET['cf_form_id'];
	else
		$form_id = 726633;
	
	//search for the post
	$args = "pagename=CaptainForm_form_preview";
	$query1 = new WP_Query($args);
	
	if($query1->have_posts())
		while($query1->have_posts()) 
		{
			$post_arr =  $query1->the_post();
			$post_id = $query1->post->ID;
			$post_content = get_the_content();
			$post_exists = true;
			break;
		}
	wp_reset_postdata();

	//Create the post if not exists
	if($post_exists == false)
	{
		$post = array(
			'post_content'   =>  $special_captainform_code, // The full text of the post.
			'post_name'      =>  "CaptainForm_form_preview", // The name (slug) for your post
			'post_title'     => "CaptainForm Preview", // The title of your post.
			'post_status'    =>  'draft',
			'post_type'      =>  'page',
			'post_excerpt'   =>  $special_captainform_code, // For all your post excerpt needs.
		);   
		$post_id = wp_insert_post( $post );
	}
	else if($post_exists == true && strpos($post_content,$special_captainform_code)===false && $post_id != null) 
	{
		$my_post = array();
        $my_post['ID'] = $post_id;
        $my_post['post_content'] = $post_content.$special_captainform_code;
        wp_update_post( $my_post );
	}

	$url = add_query_arg('cf_form_id',$form_id,esc_url(get_permalink( $post_id )));

	if($redirect === true)
	{
		wp_redirect($url);
		exit(); 
	}
	else	
		return $url;
}
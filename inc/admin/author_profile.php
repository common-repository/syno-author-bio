<?php

/**
 * Add new options in user profile
 * @return null;
 */
function syno_author_bio_author_profile( $methods ){
	$methods = array(
		'facebook' => __( 'Facebook', 'syno-author-bio' ),
		'twitter' => __( 'Twitter', 'syno-author-bio' ),
		'linkedin' => __( 'Linkedin', 'syno-author-bio' ),
		'instagram' => __( 'Instagram', 'syno-author-bio' ),
		'youtube' => __( 'Youtube', 'syno-author-bio' ),
		'tumblr' => __( 'Tumblr', 'syno-author-bio' ),
		'flickr' => __( 'Flickr', 'syno-author-bio' ),
		'vimeo' => __( 'Vimeo', 'syno-author-bio' ),
	);
	return $methods;
}
add_filter( 'user_contactmethods', 'syno_author_bio_author_profile' );
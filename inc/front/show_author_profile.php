<?php
/**
 * Show author profile in the post or page
 * @return null;
 */

function syno_author_bio_show_author_profile($content) {
	global $post;
	$author           = get_user_by('id', $post->post_author);
	$author_fb        = get_user_meta($author->ID, 'facebook', true);
	$author_twitter   = get_user_meta($author->ID, 'twitter', true);
	$author_linkedin  = get_user_meta($author->ID, 'linkedin', true);
	$author_instagram = get_user_meta($author->ID, 'instagram', true);
	$author_youtube   = get_user_meta($author->ID, 'youtube', true);
	$author_tumblr    = get_user_meta($author->ID, 'tumblr', true);
	$author_flickr    = get_user_meta($author->ID, 'flickr', true);
	$author_vimeo     = get_user_meta($author->ID, 'vimeo', true);

	if (is_single()) {
		ob_start();
		?>
        <div class="sap_bio_wrap">
            <div class="author_img">
				<?php echo get_avatar($author->ID, 100); ?>
            </div>
            <div class="bio_content">
                <div class="author_name">
                    <a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo esc_html($author->display_name); ?></a>
                </div>
                <div class="author_bio">
					<?php echo wpautop(wp_kses_post($author->user_description)); ?>
                </div>
                <div class="author_social_links">
                    <ul>
						<?php if ($author_fb) { ?>
                            <li><a href="<?php echo esc_url($author_fb) ?>"><i class="fab fa-facebook-f"></i></a></li>
						<?php } ?>

						<?php if ($author_twitter) { ?>
                            <li><a href="<?php echo esc_url($author_twitter); ?>"><i class="fab fa-twitter"></i></a>
                            </li>
						<?php } ?>

						<?php if ($author_linkedin) { ?>
                            <li><a href="<?php echo esc_url($author_linkedin); ?>"><i
                                            class="fab fa-linkedin-in"></i></a></li>
						<?php } ?>

						<?php if ($author_instagram) { ?>
                            <li><a href="<?php echo esc_url($author_instagram); ?>"><i class="fab fa-instagram"></i></a>
                            </li>
						<?php } ?>

						<?php if ($author_youtube) { ?>
                            <li><a href="<?php echo esc_url($author_youtube); ?>"><i class="fab fa-youtube"></i></a>
                            </li>
						<?php } ?>

						<?php if ($author_tumblr) { ?>
                            <li><a href="<?php echo esc_url($author_tumblr); ?>"><i class="fab fa-tumblr"></i></a></li>
						<?php } ?>

						<?php if ($author_flickr) { ?>
                            <li><a href="<?php echo esc_url($author_flickr); ?>"><i class="fab fa-flickr"></i></a></li>
						<?php } ?>

						<?php if ($author_vimeo) { ?>
                            <li><a href="<?php echo esc_url($author_vimeo); ?>"><i class="fab fa-vimeo-v"></i></a></li>
						<?php } ?>

						<?php if ($author->user_email) { ?>
                            <li><a href="<?php echo esc_url($author->user_email); ?>"><i
                                            class="far fa-envelope-open"></i></a></li>
						<?php } ?>

						<?php if ($author->user_url) { ?>
                            <li><a href="<?php echo esc_url($author->user_url); ?>"><i class="fa fa-link"></i></a></li>
						<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
		<?php
		$author_details = ob_get_clean();
	}
	return $content . $author_details;

}

add_filter('the_content', 'syno_author_bio_show_author_profile');
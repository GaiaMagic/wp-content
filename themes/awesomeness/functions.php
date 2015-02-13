<?php
	function wpseo_img_src_filter ($uri) {
		return preg_replace('/^https?:\/\/([^\/]+?)(mg|musicianguide)([^\/]+?)\//', 'http://dn-musicianguide.qbox.me/', $uri);
	}
	add_filter('wpseo_xml_sitemap_img_src', 'wpseo_img_src_filter');

	function content_feed_replace ($content) {
		return preg_replace('/https?:\/\/control\.musicianguide\.cn\//', 'http://dn-musicianguide.qbox.me/', $content);
	}
	add_filter('the_content_feed', 'content_feed_replace');
	add_filter('rss_enclosure', 'content_feed_replace');

	register_nav_menus( array(
		'global' => '全局导航'
	) );

	add_theme_support( 'post-formats', array( 'aside', 'test' ) );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured', 196, 99999 );


	// add & remove profile field
	add_filter('user_contactmethods', 'hide_profile_fields', 10, 1);
	add_filter('user_contactmethods', 'extended_contact_info');

	function hide_profile_fields( $contactmethods ) {
	  unset($contactmethods['aim']);
	  unset($contactmethods['jabber']);
	  unset($contactmethods['yim']);
	  return $contactmethods;
	}

	function extended_contact_info($user_contactmethods) {  
	  $user_contactmethods = array('weibo' => __('微博帐号'),
	                               );
	  return $user_contactmethods;
	}


	// allow contributor upload file
	if ( current_user_can('contributor') && !current_user_can('upload_files') )
	        add_action('admin_init', 'allow_contributor_uploads');

	function allow_contributor_uploads() {
	        $contributor = get_role('contributor');
	        $contributor->add_cap('upload_files');
	}


	// add class to next_posts_link()
	add_filter('next_posts_link_attributes', 'posts_link_attributes');

	function posts_link_attributes() {
 		return 'class="next"';
	}


	// add odd / even to post_class
	add_filter ( 'post_class' , 'my_post_class' );
	global $current_class;
	$current_class = 'odd';

	function my_post_class ( $classes ) { 
	   	global $current_class;
	   	$classes[] = $current_class;

	   	$current_class = ($current_class == 'odd') ? 'even' : 'odd';

	   	return $classes;
	}


	// append content to each post and feed
	function add_post_content($content) {
		if(is_feed() || is_single()) {
			if ( function_exists( 'ot_get_option' ) ) {
				$banners = ot_get_option( 'single_post_banners', array() );

				if ( ! empty( $banners ) ) {
					foreach( $banners as $banner ) {
						$content .= '<p class="post-banner"><a href="' . $banner['link'] . '"><img src="' . $banner['image'] . '" alt="' . $banner['title'] . '" /></a></p>';
					}
				}
			}
		}
		return $content;
	}

	add_filter('the_content', 'add_post_content');

        function search_filter($query) {
          if ($query->is_search) {
            $query->set('post_type', 'post');
          }
          return $query;
        }

        add_filter('pre_get_posts','search_filter');

// Add SoundCloud oEmbed
function add_oembed_soundcloud(){
wp_oembed_add_provider('http://soundcloud.com/*', 'http://soundcloud.com/oembed');
}
add_action('init','add_oembed_soundcloud');
remove_filter('the_excerpt', 'wpautop');

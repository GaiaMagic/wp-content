<?php
function musicianguide_setup() {

  add_theme_support( 'automatic-feed-links' );

  register_nav_menu( 'primary', __( '导航菜单', 'musicianguide' ) );
}

add_action( 'after_setup_theme', 'musicianguide_setup' );


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


// admin javascript
// add_action( 'admin_enqueue_scripts', 'fuck_wp_admin' );
// 
// function fuck_wp_admin() {
//   wp_enqueue_script( 'fuck_wp_admin', home_url() . '/javascripts/admin.js' );
// }


// allow contributor upload file
if ( current_user_can('contributor') && !current_user_can('upload_files') )
        add_action('admin_init', 'allow_contributor_uploads');

function allow_contributor_uploads() {
        $contributor = get_role('contributor');
        $contributor->add_cap('upload_files');
}


// 专题
add_action( 'init', 'create_topic_taxonomies', 0 );

function create_topic_taxonomies()
{
  $labels = array(
                  'name' => '专题',
                  'search_items' => '搜索专题',
                  'all_items' => '所有专题',
                  'parent_item' => '父专题',
                  'parent_item_colon' => '父专题:',
                  'edit_item' => '编辑专题',
                  'update_item' => '更新专题',
                  'add_new_item' => '添加新专题',
                  'new_item_name' => '新专题名',
                  'menu_name' => '专题',
                  );
  register_taxonomy('topic',array('post'), array(
                                                 'hierarchical' => false,
                                                 'labels' => $labels,
                                                 'public' => true,
                                                 'show_ui' => true,
                                                 'query_var' => true,
                                                 'capabilities' => array (
                                                                          'manage_terms' => 'manage_categories',
                                                                          'edit_terms' => 'manage_categories',
                                                                          'delete_terms' => 'manage_categories',
                                                                          'assign_terms' => 'manage_categories'
                         ),
                                                 'rewrite' => array(
                                                                    'slug' => 'topic',
                                                                    'hierarchical' => true
                                                                    ),
                                                 ));
}

include (TEMPLATEPATH . '/taxonomy-meta.php');

$meta_sections[] = array(
        'id' => 'topic-image',
        'title' => '专题图片',
        'taxonomies' => array('topic'),

        'fields' => array(
                array(
                      'name' => '测试',
                      'desc' => '测试',
                      'id' => 'test',
                      'type' => 'text',
                ),
                array(
                        'name' => '专题图片',
                        'desc' => '上传专题图片',
                        'id' => 'image',
                        'type' => 'image'                                                       )
        )
);

foreach ($meta_sections as $meta_section) {
        $my_section = new RW_Taxonomy_Meta($meta_section);
};

// thumbnail sizes
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

add_image_size( 'topic', 225, 100 );
add_image_size( 'category-featured', 330, 240 );


// breadcrumbs
function breadcrumbs() {
  $home = '首页';
  $before = '<span class="current">';
  $after = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="breadcrumbs">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '" class="home">' . $home . '</a>';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . ' '));
      echo $before . single_cat_title('', false) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . ' ';
      echo $before . get_the_time('m') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . '搜索 "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Tag "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before  . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    echo '</div>';
 
  }
}

function get_paginate_archive_page_links( $type = 'plain', $endsize = 1, $midsize = 1 ) {
        global $wp_query, $wp_rewrite;  
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        // Sanitize input argument values
        if ( ! in_array( $type, array( 'plain', 'list', 'array' ) ) ) $type = 'plain';
        $endsize = (int) $endsize;
        $midsize = (int) $midsize;

        // Setup argument array for paginate_links()
        $pagination = array(
                'base' => @add_query_arg('paged','%#%'),
                'format' => '',
                'total' => $wp_query->max_num_pages,
                'current' => $current,
                'show_all' => false,
                'end_size' => $endsize,
                'mid_size' => $midsize,
                'type' => $type,
                'prev_text' => '',
                'next_text' => ''
        );

        if( $wp_rewrite->using_permalinks() )
                $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
                $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        return paginate_links( $pagination );
}


function odd_even() {
        global $post_num;
        if ( ++$post_num % 2 )
                $class = 'even';
        else
                $class = 'odd';
        echo $class;
}


function musicianguide_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li class='comment clearfix'>
    <div class='avatar l'>
        <?php echo get_avatar( $comment, 50 ); ?>
    </div>

    <article class='comment'>
        <div class='user'><?php comment_author(); ?></div>
        <div class='content'>
            <p><?php comment_text(); ?></p>
            <?php if ($comment->comment_approved == '0') : ?>
            <br />
            <em><?php _e('Your comment is awaiting moderation.') ?></em>
            <?php endif; ?>
        </div>
        <footer class='meta clearfix'>
            <time class='l'><?php get_comment_date('Y-m-d'); ?></time>
            <div class='links r'>
                <?php comment_reply_link(array_merge( $args, array("depth" => $depth, "max_depth" => $args["max_depth"]))) ?>
            </div>
        </footer>
    </article>
    <?php
        }

<?php

require_once(TEMPLATEPATH . '/about-admin.php');

require_once(TEMPLATEPATH . '/home-admin.php');

function native_pagenavi(){
    global $wp_query, $wp_rewrite;           
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'prev_text' => '« ',
    'next_text' => ' »'
    );

    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));

    echo '<div class="page_m clearfix">'.paginate_links($pagination).'</div>';
}

function most_comm_posts($days=30, $nums=6) {
global $wpdb;
$today = date("Y-m-d H:i:s"); //获取今天日期时间
$daysago = date( "Y-m-d H:i:s", strtotime($today) - ($days * 24 * 60 * 60) );  //Today – $days
$result = $wpdb->get_results("SELECT comment_count, ID, post_title, post_date FROM $wpdb->posts WHERE post_date BETWEEN '$daysago' AND '$today' ORDER BY comment_count DESC LIMIT 0 , $nums");
$output = '';
if(empty($result)) {
$output = '<li>None data.</li>';
} else {
foreach ($result as $topten) {
$postid = $topten->ID;
$title = $topten->post_title;
$commentcount = $topten->comment_count;
if ($commentcount != 0) {
$output .= '<li><a href="'.get_permalink($postid).'" title="'.$title.'">'.$title.'</a> ('.$commentcount.').<div class="line"></div></li>';
}
}
}
echo $output;
}


function filter_where($where = '') {
$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
return $where;
}
function some_posts($orderby = '', $plusmsg = '',$limit = 10) {
add_filter('posts_where', 'filter_where');
$some_posts = query_posts('posts_per_page='.$limit.'&caller_get_posts=1&orderby='.$orderby);
foreach ($some_posts as $some_post) {
$output = '';
$post_date = mysql2date('（y年m月d日）', $some_post->post_date);
$commentcount = '('.$some_post->comment_count.' 条评论)';
$post_title = htmlspecialchars(stripslashes($some_post->post_title));
$permalink = get_permalink($some_post->ID);
$output .= '<li><a href="' . $permalink . '" title="'.$post_title.'">' . $post_title . '</a>'.$$plusmsg.'<div class="line"></div></li>';
echo $output;
}
wp_reset_query();
}

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
     <div class="comment">
	 <div class="userimg"><?php echo get_avatar($comment,$size='50',$default='<path_to_url>' ); ?></div>
	 <div class="rbox">
	 <p class="name"><?php comment_author(); ?></p>
	 <?php if ($comment->comment_approved == '0') : ?>
	 <em>您的评论正在等待审核.</em>
	 <?php endif; ?>
	 <div class="info"><?php comment_text() ?></div>
	 <div class="time"><span class="r"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span><?php printf(__('%1$s %2$s'), get_comment_date(),  get_comment_time()) ?></div>
	  </div>
	  </div>
<?php
        }

?>

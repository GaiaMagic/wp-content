<iframe width="100%" height="500"  frameborder="0" scrolling="no" src="http://widget.weibo.com/distribution/comments.php?language=zh_cn&width=0&height=500&skin=1&dpc=1&url=<?php the_permalink(); ?>&titlebar=1&border=1&appkey=1620491747&dpc=1"></iframe>

<?php if (function_exists('wp_list_comments')) : ?>

<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请不要直接加载本页!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">本文有密码保护.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<p class="pTitle">留言</p>
<?php if ( have_comments() ) : ?>
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
<ul class="page_m clearfix">
<?php
	// 如果用户在后台选择要显示评论分页
	if (get_option('page_comments')) {
		$comment_pages = paginate_comments_links('echo=0');
		if ($comment_pages) {
?>
		<?php echo $comment_pages; ?>
<?php
		}
	}
?>
	</ul>
	<div class="cline"></div>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div class="comTable">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>您必须 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录</a> 来发表评论.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  <p><span class="fb">姓名</span></p>
  <?php if ( $user_ID ) : ?>
  <p>登录为 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="注销登录">注销 &raquo;</a></p>
  <?php else : ?>
  <p><label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="inbg"/></label><?php douban_connect(); ?><?php sina_connect(); ?></p>
  <p><span class="fb">Email</span></p>
  <p><label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="inbg"/></label></p>
  <p><span class="fb">网址</span></p>
  <p><label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>"  class="inbg"/></label></p>
  <?php endif; ?>
  <p><label class="textar"><textarea name="comment" id="comment" cols="" rows=""></textarea></label></p>
  <div class="link"><span class="r"><input type="image" src="<?php bloginfo('template_url'); ?>/image/img_ty_90.jpg" onclick="this.form.submit()"><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></span></div>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('box'); ?>>
	<a href="<?php the_permalink() ?>" rel="#overlay" class="click" title="<?php the_title() ?>" target="_blank">
		<header class="header">
			<strong><?php the_title() ?></strong>

			<hr>
		</header>

		<div class="content">
			<?php the_post_thumbnail('featured'); ?>

			<?php echo mb_strimwidth(strip_tags($post->post_content), 0, 136, '...'); ?>
		</div>
	</a>

	<hr>

	<footer class="footer clearfix">
		<span class="time hidden inline"><?php the_time('Y.m.d') ?></span>
		<span class="inline">评论 <?php comments_number( '0', '1', '%' ); ?></span>
		<a href="<?php comments_link() ?>" class="hidden inline">参与讨论</a>

		<div class="share clearfix">
			<a href="http://v.t.sina.com.cn/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink();?>" class="sn" target="_blank"></a>
			<a href="http://www.douban.com/recommend/?url=<?php the_permalink();?>&title=<?php the_title(); ?>" class="db" target="_blank"></a>
			<a href="http://v.t.qq.com/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink();?>" class="qq" target="_blank"></a>
		</div>
	</footer>
</article>
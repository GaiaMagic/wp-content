<?php get_header(); ?>
<div class="con">

<div class="dy_Box music_people">

<!-- 分享到微薄浮层 -->
<div class="pop_wb" id="wp_obj">
<p class="tcor">分享到：</p>
<div class="icon1"><a href="http://www.douban.com/recommend/?url=<?php the_permalink();?>&title=<?php the_title(); ?>" target="blank" rel="nofollow"><img src="<?php bloginfo('template_url'); ?>/image/wb1.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/wbn1.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/wb1.jpg'" /></a></div>
<p class="tcor tcor2">豆瓣</p>
<div class="wline"></div>
<div class="icon1"><a href="http://share.renren.com/share/buttonshare?link=<?php the_permalink();?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/wb2.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/wbn2.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/wb2.jpg'" /></a></div>
<p class="tcor tcor2">人人网</p>
<div class="wline"></div>
<div class="icon1"><a href="http://v.t.sina.com.cn/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink();?>"><img src="<?php bloginfo('template_url'); ?>/image/wb3.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/wbn3.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/wb3.jpg'" /></a></div>
<p class="tcor tcor2">新浪微薄</p>
</div>
<!-- 分享到微薄浮层end -->

<div class="combox_3">
<div class="top_Bg"></div>
<div class="centetn_Bg">
<div class="m_lbox ">
<div class="cline"></div>
<div class="sonMain">
<div class="sonrbox">
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; ?>
<ul class="m_c_list">
<?php while (have_posts()) : the_post(); ?>
	<li>
	<div class="lpic"><img src="<?php $values = get_post_custom_values("img"); echo $values[0]; ?>" width="210" height="150" /></div>
	<div class="rDes">
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="info"><?php the_time('Y-m-d') ?><span class="pd_l10">by：<?php the_author() ?></span></p>
	<p class="pDes"><?php the_excerpt(); ?></p>
	<div class="link"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_63.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_64.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_63.jpg'" /></a></div>
	</div>
	</li>
	<?php endwhile; ?>
	</ul>
<div class="clear"></div>

<?php native_pagenavi();?>

<?php else : ?>

<p>抱歉，搜索不到相应的内容...</p>

<div class="clear"></div>
</div>
<?php endif; ?>
<div class="clear"></div>
</div>
</div>

<?php include 'rightsidebar.php' ?>

<div class="clear"></div>
</div>
<div class="foot_bg"></div>

</div>

</div>



</div>
<?php get_footer(); ?>

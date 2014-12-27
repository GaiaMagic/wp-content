<?php $options = get_option('classic_options'); ?>

<div class="r_sidebar">
<div class="dybox">
<div class="link"><a href="http://feed.feedsky.com/MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a38.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg'"/></a><a href="http://www.feedsky.com/msub_wr.html?burl=MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg" alt="" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a39.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg'" /></a><a href="http://t.sina.com.cn/musicianguidecn"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a40.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg'" /></a></div>
</div>
<div class="cline p5"></div>

<div class="tabBox ">

<div class="tabMenu">
<ul class="listNav clearHidden">
<li class="cur" id="on1"><a href="javascript:void(0)" onclick="javascript:wrapTag(1)"></a></li>
<li id="on2"><a href="javascript:void(0)" onclick="javascript:wrapTag(2)">历史热门</a></li>
<li id="on3"><a href="javascript:void(0)" onclick="javascript:wrapTag(3)">最近热评</a></li>
</ul>
</div>

<div class="tabCon" >
<ul class="list5 list_1" id="fcwr_cont1">
<?php some_posts( $orderby = 'comment_count', $plusmsg = 'commentcount', 6 ); ?>
<div class="cline"></div>
<?php endwhile; ?>
<?php endif ?>
<?php wp_reset_query();?>
</ul>
<ul class="list5 list_1" id="fcwr_cont2" style="display:none">
<?php query_posts('v_sortby=views&v_orderby=desc&showposts=6') ?> 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<div class="cline"></div>
<?php endwhile; ?>
<?php endif ?>
<?php wp_reset_query();?>
</ul>
<ul class="list5 list_1" id="fcwr_cont3" style="display:none">
<?php query_posts('orderby=comment_count&showposts=6');?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<div class="cline"></div>
<?php endwhile; ?>
<?php endif ?>
<?php wp_reset_query();?>
</ul>
</div>

</div>

<div class="cline p5"></div>

<div class="tagsbox">
<p class="t">TAGS</p>
<div class="taglist"><?php wp_tag_cloud('number=30&orderby=count&order=DESC'); ?></div>
</div>


<div class="cline p5"></div>
<div class="date">
<p  class="year">2011</p>
<div class="month">
<span><a href="<?php echo get_option('home') ?>/2011/01/">01.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/02/">02.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/03/">03.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/04/">04.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/05/">05.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/06/">06.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/07/">07.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/08/">08.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/09/">09.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/10/">10.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/11/">11.</a></span>
<span><a href="<?php echo get_option('home') ?>/2011/12/">12.</a></span>
</div>
</div>
<div class="date">
<p  class="year">2010</p>
<div class="month">
<span><a href="<?php echo get_option('home') ?>/2010/01/">01.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/01/">02.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/03/">03.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/04/">04.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/05/">05.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/06/">06.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/07/">07.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/08/">08.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/09/">09.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/10/">10.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/11/">11.</a></span>
<span><a href="<?php echo get_option('home') ?>/2010/12/">12.</a></span>
</div>
</div>
<div class="date">
<p  class="year">2009</p>
<div class="month"><span>
<span><a href="<?php echo get_option('home') ?>/2009/01/">01.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/01/">02.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/03/">03.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/04/">04.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/05/">05.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/06/">06.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/07/">07.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/08/">08.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/09/">09.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/10/">10.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/11/">11.</a></span>
<span><a href="<?php echo get_option('home') ?>/2009/12/">12.</a></span>
</div>
</div>
<div class="cline p5"></div>
</div>
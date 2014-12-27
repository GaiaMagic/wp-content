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
          <div class="centetn_Bg">
            <div class="m_lbox ">
              <div class="linenew"></div>
              <div class="pdlart">
              <div class="navlist">
              <?php get_navgation();?>
              </div>
               <?php if (have_posts()) : ?>
			   <?php $post = $posts[0]; ?>
			   <?php while (have_posts()) : the_post(); ?>
				<div class="line_l"></div>
                <div class="sonMain">
                  <div class="sonlbox">
                    <div class="topline"></div>
                    <div class="lNav"><?php the_time('Y-m-d');?></div>
                    <div class="line"></div>
                    <p class="p2"><?php the_author() ?></p>
                  </div>
                  <div class="sonrbox">
                    <ul class="m_c_list">
                      <li>
                        <div class="rDes">
                          <h3><?php the_title(); ?></h3>
                          <p class="pDes"><?php the_excerpt(); ?></p>
                          <div class="link"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_63.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_64.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_63.jpg'" /></a></div>
                        </div>
                      </li>
                    </ul>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                </div>
				<div class="line_l"></div>
				<?php endwhile; ?>
				<?php endif; ?>				
                <div class="musicp">
                  <ul class="page_m clearfix">
                    <?php native_pagenavi();?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="r_sidebar">
              <div class="dybox">
              <div class="link"><a href="http://feed.feedsky.com/MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a38.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg'"/></a><a href="http://www.feedsky.com/msub_wr.html?burl=MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg" alt="" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a39.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg'" /></a><a href="http://t.sina.com.cn/musicianguidecn"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a40.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg'" /></a></div>
              </div>
              <div class="cline p5"></div>
              <p class="pTitleNew">作者</p>
              <div class="ulwrap">
                <ul class="list9 clearfix">
                <?php 
                	 get_authors();
                ?>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                  <li><a href="#">CHEW （10）</a></li>
                </ul>
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
                <div class="month"><span>
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
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bgFoot"></div>
</div>
<?php get_footer(); ?>

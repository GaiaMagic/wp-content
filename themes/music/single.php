<?php get_header(); ?>
<div class="con">
      <div class="dy_Box music_people artBox">
<!-- 分享到微薄浮层 -->

<div class="pop_wb" id="wp_obj">
<p class="tcor">分享到：</p>
<div class="icon1"><a href="http://www.douban.com/recommend/?url=<?php the_permalink();?>&title=<?php the_title(); ?>" target="blank" rel="nofollow"><img src="<?php bloginfo('template_url'); ?>/image/wb1.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/wbn1.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/wb1.jpg'" /></a></div>
<p class="tcor tcor2">豆瓣</p>
<div class="wline"></div>
<div class="icon1"><a href="http://share.renren.com/share/buttonshare?link=<?php the_permalink();?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/wb2.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/wbn2.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/wb2.jpg'" /></a></div>
<p class="tcor tcor2">人人网</p>
<div class="wline"></div>
<div class="icon1"><a href="http://v.t.sina.com.cn/share/share.php?title=<?php the_title(); ?>%20@音乐人攻略&url=<?php the_permalink();?>"><img src="<?php bloginfo('template_url'); ?>/image/wb3.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/wbn3.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/wb3.jpg'" /></a></div>
<p class="tcor tcor2">新浪微博</p>
</div>
</script>
<!-- 分享到微薄浮层end -->
        <div class="combox_3" id="conid">
          <div class="centetn_Bg">
            <div class="m_lbox ">
              <div class="linenew"></div>
              <div class="pdlart">
                <div class="navlist">
			    <?php 
			   		if(is_single()){
			   			$cat_id = the_category_ID(false);
			   			echo '<a href='.get_option('home').'>首页</a> &nbsp; > &nbsp;'.get_category_parents($cat_id,true).the_title('','',false);
			   		}
			    ?>
			    </div>
			    <?php if (have_posts()) : the_post(); ?>
                <div class="line_l"></div>
                <div class="sonMain">
                  <div class="sonrbox">
                    <div class="artcon">
                      <h3><?php the_title(); ?></h3>
                      By <?php the_author();?> <?php the_time("Y-m-d")?>
                      <div class="cline"></div>
                      <div class="artText">
                        <?php the_content(); ?>
                      </div>
                      <div class="cline"></div>
                      <p class="tags"><span class="pd_r">TAGS</span><?php the_tags(); ?></p>
                      <div class="wb"> <span class="pd_r">分享到</span>
                      <span class="rpic"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_84.jpg" alt="" usemap="#Map3" />
						<map name="Map3" id="Map3">
						<area shape="rect" coords="8,4,30,29" href="http://www.douban.com/recommend/?url=<?php the_permalink();?>&title=<?php the_title(); ?>" alt="" />
						<area shape="rect" coords="38,4,65,33" href="http://v.t.sina.com.cn/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink();?>" alt="" />
						<area shape="rect" coords="72,5,97,32" href="http://share.renren.com/share/buttonshare?link=<?php the_permalink();?>&title=<?php the_title(); ?>" alt="" />
						<area shape="rect" coords="105,5,128,30" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" alt="" />
						<area shape="rect" coords="137,4,159,30" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(document.location.href)+'&t='+encodeURIComponent(document.title));void(0)"" alt="" />
						<area shape="rect" coords="167,4,191,32" href="javascript:window.open('http://del.icio.us/post?url='+encodeURIComponent(document.location.href)+'&title='+encodeURIComponent(document.title)+'&notes=');void(0)" alt="" />
						<area shape="rect" coords="199,5,221,31" href="http://digg.com/remote-submit?phase=2&url=<?php the_permalink();?>&title=<?php the_title(); ?>" alt="" />
						<area shape="rect" coords="229,4,259,32" href="http://www.stumbleupon.com/" onclick="window.open('http://www.stumbleupon.com/submit?url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;" title="Add to: StumbleUpon" alt="" />
						</map>
						</span>
                      </div>
                      <div class="cline"></div>
                    </div>
                    <?php endif ?>
                    <div class="clear"></div>
                    <ul class="page_m clearfix">
                      <!--
                      <li class="cur"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      -->
                    </ul>
                    <div class="cline"></div>
                    <!-- 评论组件 -->
                    <div class="comTable">
                      <table border="0" cellspacing="0" cellpadding="0">
							<?php comments_template('', true); ?>
                      </table>
                    </div>
                    <!--评论组件-->
                  </div>

                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <div class="r_sidebar">
              <div class="dybox">
                <div class="link"><a href="http://feed.feedsky.com/MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a38.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_38.jpg'"/></a><a href="http://www.feedsky.com/msub_wr.html?burl=MGuide"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg" alt="" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a39.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_39.jpg'" /></a><a href="http://t.sina.com.cn/musicianguidecn"><img src="<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg" onmouseover="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_a40.jpg'" onmouseout="this.src='<?php bloginfo('template_url'); ?>/image/img_ty_40.jpg'" /></a></div>
              </div>
              <div class="cline p5"></div>
              <p class="pTitle">在这里可以找到我们</p>
	      <div class="wb">
                <div class="clearfix">
                    <ul>
                        <li class="db">
                            <a href="http://site.douban.com/111914/">豆瓣</a>
			</li>

                        <li class="sn">
                            <a href="http://weibo.com/musicianguidecn">新浪微博</a>
			</li>

                        <li class="rr">
                            <a href="http://page.renren.com/600962666">人人</a>
			</li>

                        <li class="dd">
                            <a href="http://musicianguidecn.diandian.com/">点点</a>
			</li>

                        <li class="yy">
                            <a href="http://pro.yeeyan.org/musicianguidecn">译言</a>
			</li>

                        <li class="qq">
                            <a href="http://t.qq.com/musicianguidecn">腾讯微博</a>
			</li>

                        <li class="sh">
                            <a href="http://musicianguide.t.sohu.com/">搜狐微博</a>
			</li>

                        <li class="wy">
                            <a href="http://t.163.com/musicianguidecn">网易微博</a>
			</li>
                    </ul>
                </div>
            </div>

              <div class="cline p5"></div>
              <div class="coment">
                <div class="topBg"></div>
                <div class="cententer">
                  <ul class="comlist">                   
                   <?php
                    //最新5条评论 
                    global $wpdb;
                    $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,comment_post_ID, comment_author, comment_date_gmt,comment_approved,comment_type,comment_author_url,SUBSTRING(comment_content,1,30) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =$wpdb->posts.ID) WHERE comment_approved = '1' AND $wpdb->comments.comment_post_ID = ".get_the_ID()."  AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 5";
                    $comments = $wpdb->get_results($sql);
                    $output = $pre_HTML;
                    foreach ($comments as $comment) {
                    	echo '<li><p><a href='.get_permalink($comment->ID).'>'.strip_tags($comment->com_excerpt).'</a></p><p class="author">by：'.$comment->comment_author.'</p></li>';
                    }
                   ?>
                  </ul>
                  <div class="linkmore"><a href="javascript:void(0);" onclick="javascript:$('#comment').focus();">我要评论</a> &nbsp;&nbsp;&nbsp;&nbsp; <!--<a href="#">查看全部</a></div> -->
                </div>
                <div class="footbg"></div>
              </div>
              <div class="weibo">
                <EMBED src=" http://tjs.sjs.sinajs.cn/t3/miniblog/static/swf/miniblogwidget.swf" wmode="transparent" quality="high" width="230" height="500" align="L" scale="noborder" flashvars="width=230&height=500&uid=1791950544&skin=skin1" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></EMBED>
              </div>
              <div class="line"></div>
              <div class="tabBox ">

<div class="tabMenu">
<ul class="listNav" style="display:inline;">
<li  class="cur" id="on1"><a href="javascript:void(0)" onclick="javascript:wrapTag(1)">本月热门</a></li>
<li  id="on2"><a href="javascript:void(0)" onclick="javascript:wrapTag(2)">历史热门</a></li>
<li  id="on3"><a href="javascript:void(0)" onclick="javascript:wrapTag(3)">最近热评</a></li>
</ul>
</div>
<div class="tabCon" >
<ul class="list5 list_1" id="fcwr_cont1">
<?php query_posts('v_sortby=views&v_orderby=desc&cat=22&showposts=6') ?> 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
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
                <div class="taglist">
                <?php wp_tag_cloud('number=30&orderby=count&order=DESC'); ?>
                </div>
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
